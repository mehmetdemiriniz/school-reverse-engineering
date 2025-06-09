<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fortune_tellers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('status')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('description')->nullable();
            $table->string('second_description')->nullable();
            $table->integer('member_status')->nullable();
            $table->boolean('is_sentry')->nullable();
            $table->boolean('is_new')->nullable();
            $table->boolean('is_fast')->nullable();
            $table->boolean('is_experienced')->nullable();
            $table->boolean('is_best')->nullable();
            $table->boolean('is_certified_astrologer')->nullable();
            $table->timestamp('last_sentry_at')->nullable();
            $table->string('last_new_at')->nullable();
            $table->timestamp('last_fast_at')->nullable();
            $table->timestamp('last_experienced_at')->nullable();
            $table->timestamp('last_best_at')->nullable();
            $table->boolean('is_reading_type_text')->nullable();
            $table->boolean('is_reading_type_voice')->nullable();
            $table->boolean('is_reading_type_call')->nullable();
            $table->boolean('is_reading_type_video')->nullable();
            $table->boolean('is_reading_type_live_voice')->nullable();
            $table->boolean('on_phone_call')->nullable();
            $table->json('avaliable_fal_types')->nullable();
            $table->json('fal_prices')->nullable();
            $table->json('old_fal_prices')->nullable();
            $table->boolean('is_discount')->nullable();
            $table->json('tags')->nullable();
            $table->json('fortune_points')->nullable();
            $table->json('fortune_counts')->nullable();
            $table->string('profile_picture')->nullable();
            $table->integer('horoscope')->nullable();
            $table->integer('waiting_fortunes_count')->nullable();
            $table->integer('waiting_status_fortunes_count')->nullable();
            $table->integer('completed_fortunes_count')->nullable();
            $table->string('slug')->nullable();
            $table->string('average_telling_time')->nullable();
            $table->integer('quality_score')->nullable();
            $table->float('score')->nullable();
            $table->string('voice_info')->nullable();
            $table->json('detailed_description')->nullable();
            $table->integer('comments_count')->nullable();
            $table->integer('followers_count')->nullable();
            $table->json('rateCommentsCount')->nullable();
            $table->json('allowed_fortune_comment_types')->nullable();
            $table->json('allowed_fortune_types')->nullable();
            $table->string('bank_information')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fortune_tellers');
    }
};