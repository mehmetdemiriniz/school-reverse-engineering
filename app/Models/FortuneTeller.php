<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FortuneTeller extends Model
{
    protected $fillable = ['user_id', 'status', 'nick_name', 'description', 'second_description', 'member_status', 'is_sentry', 'is_new', 'is_fast', 'is_experienced', 'is_best', 'is_certified_astrologer', 'last_sentry_at', 'last_new_at', 'last_fast_at', 'last_experienced_at', 'last_best_at', 'is_reading_type_text', 'is_reading_type_voice', 'is_reading_type_call', 'is_reading_type_video', 'is_reading_type_live_voice', 'on_phone_call', 'avaliable_fal_types', 'fal_prices', 'old_fal_prices', 'is_discount', 'tags', 'fortune_points', 'fortune_counts', 'profile_picture', 'horoscope', 'waiting_fortunes_count', 'waiting_status_fortunes_count', 'completed_fortunes_count', 'slug', 'average_telling_time', 'quality_score', 'score', 'voice_info', 'detailed_description', 'comments_count', 'followers_count', 'rateCommentsCount', 'allowed_fortune_comment_types', 'allowed_fortune_types', 'bank_information'];
}