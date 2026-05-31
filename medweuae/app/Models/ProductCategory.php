<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Scope a query to only include active items.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    /**
     * relationships with this same Category model
     * a  Category may contain another parent Category
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id')->active();
    }

    public function childs(){
        return $this->hasMany(ProductCategory::class, 'parent_id', 'id')->active();
    }
}
