<?php

namespace App\Http\Controllers;

use App\Models\FortuneTeller;
use Illuminate\Http\Request;

class FortuneTellerController extends Controller
{
    public function index() {
        return FortuneTeller::all();
    }

    public function store(Request $request) {
        return FortuneTeller::create($request->all());
    }

    public function show($id) {
        return FortuneTeller::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $record = FortuneTeller::findOrFail($id);
        $record->update($request->all());
        return $record;
    }

    public function destroy($id) {
        FortuneTeller::destroy($id);
        return response()->json(['message' => 'Silindi']);
    }
}