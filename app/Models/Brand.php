<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    protected $table = 'brand';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'brand_id',
        'lang',
        'title',
        'url',
        'title_1',
        'description',
        'bg_image',
        'image',
        'alt',
        'seo_url',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'sort',
    ];

    // If you want to automatically cast created_at as datetime
    protected $dates = [
        'created_at',
        'deleted_at',
    ];

}
