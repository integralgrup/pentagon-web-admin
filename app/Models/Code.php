<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    // Table name
    protected $table = 'code';

    // Primary key (default: id, so no need to set)
    protected $primaryKey = 'id';

    // Auto-incrementing ID (default: true, so no need to set)
    public $incrementing = true;

    // If table doesn't have updated_at and created_at
    public $timestamps = false;

    // Mass assignable fields
    protected $fillable = [
        'lang',
        'ga_code',
        'bitrix_form_code',
        'bitrix_widget_code',
        'yandex_metrica_code',
        'facebook_pixel_code',
        'microsoft_clarity_code',
        'google_tag_manager_head_code',
        'google_tag_manager_body_code'
    ];
}
