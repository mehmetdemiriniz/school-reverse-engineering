<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ApiGeneratorController extends Controller
{
    public function form()
    {
        return view('api-generator.form');
    }

    public function generate(Request $request)
    {
        $url = $request->input('url');
        $response = Http::get($url);

        if (!$response->successful()) {
            return back()->with('error', 'API isteği başarısız.');
        }

        $data = $response->json()['data'];
        $tableName = $request->input('table') ?? 'auto_generated';
        $modelName = Str::studly(Str::singular($tableName));
        $controllerName = $modelName . 'Controller';

        $getType = function ($value) {
            if (is_int($value)) return 'integer';
            if (is_float($value)) return 'float';
            if (is_bool($value)) return 'boolean';
            if (is_array($value)) return 'json';
            if (strtotime($value)) return 'timestamp';
            return 'string';
        };

        $migrationFields = '';
        $fillableFields = [];
        foreach ($data as $key => $val) {
            if (in_array($key, ['id', 'created_at', 'updated_at'])) continue;
            $migrationFields .= "            \$table->{$getType($val)}('$key')->nullable();\n";
            $fillableFields[] = "'$key'";
        }

        $migrationContent = "<?php

use Illuminate\\Database\\Migrations\\Migration;
use Illuminate\\Database\\Schema\\Blueprint;
use Illuminate\\Support\\Facades\\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('$tableName', function (Blueprint \$table) {
            \$table->id();
$migrationFields            \$table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('$tableName');
    }
};";

        File::put(database_path('migrations/'.date('Y_m_d_His')."_create_{$tableName}_table.php"), $migrationContent);

        // Model oluştur
        $modelContent = "<?php

namespace App\\Models;

use Illuminate\\Database\\Eloquent\\Model;

class $modelName extends Model
{
    protected \$fillable = [" . implode(', ', $fillableFields) . "];
}";
        File::put(app_path("Models/{$modelName}.php"), $modelContent);

        // Controller oluştur
        $controllerContent = "<?php

namespace App\\Http\\Controllers;

use App\\Models\\$modelName;
use Illuminate\\Http\\Request;

class $controllerName extends Controller
{
    public function index() {
        return $modelName::all();
    }

    public function store(Request \$request) {
        return $modelName::create(\$request->all());
    }

    public function show(\$id) {
        return $modelName::findOrFail(\$id);
    }

    public function update(Request \$request, \$id) {
        \$record = $modelName::findOrFail(\$id);
        \$record->update(\$request->all());
        return \$record;
    }

    public function destroy(\$id) {
        $modelName::destroy(\$id);
        return response()->json(['message' => 'Silindi']);
    }
}";
        File::put(app_path("Http/Controllers/{$controllerName}.php"), $controllerContent);

        // Route'a otomatik ekle
        File::append(base_path('routes/api.php'), "\nRoute::apiResource('$tableName', App\\Http\\Controllers\\{$controllerName}::class);");

        return back()->with('success', 'Migration, Model, Controller ve Route başarıyla oluşturuldu!');
    }

}
