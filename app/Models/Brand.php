<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BrandSlider1;
use App\Models\BrandSlider2;

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

    // Define relationship with BrandSlider1 model
    public function slider1()
    {
        return $this->hasMany(BrandSlider1::class, 'brand_id', 'id');
    }

    // Define relationship with BrandSlider2 model
    public function slider2()
    {
        return $this->hasMany(BrandSlider2::class, 'brand_id', 'id');
    }

}
