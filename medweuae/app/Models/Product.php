<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class)->active();
    }

    public function brandData()
    {
        return $this->belongsTo(ProductBrand::class, 'brand')->active();
    }

    public function thumbnail(){
        return $this->hasMany(ProductGallery::class)->where('status','Active')->take(1);   
    }

    public function photos(){
        return $this->hasMany(ProductGallery::class)->where('status','Active');
    }
}
