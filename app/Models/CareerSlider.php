<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CareerSlider extends Model
{
    protected $table = 'career_slider';

    protected $fillable = [
        'lang',
        'slider_id',
        'title',
        'title_1',
        'description',
        'image',
        'alt',
    ];

     protected $dates = [
        'created_at',
        'deleted_at',
    ];

    public $timestamps = false;
}
