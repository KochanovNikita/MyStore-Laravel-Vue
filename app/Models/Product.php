<?php

namespace App\Models;

use App\Models\Scopes\LatestScope;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    const GENDER_UNISEX = 0;
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    protected $guarded = false;

    public static function getGenders() {
        return [
            self::GENDER_UNISEX => 'унисекс',
            self::GENDER_MALE => 'мужской',
            self::GENDER_FEMALE => 'женский',
        ];
    }

    public function getGenderTitleAttribute() {
        return self::getGenders()[$this->gender_id];
    }

    public function getMainImagePathAttribute() : string {
        return url('storage/'.$this->main_image);
    }

    public function getPreviewImagePathAttribute() : string {
        return url('storage/'.$this->preview_image);
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function color() {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function group() {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function subcategories() {
        return $this->belongsToMany(Subcategory::class, 'product_subcategories', 'product_id', 'subcategory_id');
    }

    public function images() {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }

    public function getPriceWithDiscountAttribute() {
        return round((float)$this->price-($this->price/100*$this->discount), 2);
    }

    protected static function booted()
    {
        static::addGlobalScope(new LatestScope);
    }

}
