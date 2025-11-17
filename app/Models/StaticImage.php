<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class StaticImage extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'static_image';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'image_id',
        'lang',
        'title',
        'image',
        'alt',
    ];

    // If you want to automatically cast created_at as datetime
    protected $dates = [
        'created_at',
        'deleted_at',
    ];

}
