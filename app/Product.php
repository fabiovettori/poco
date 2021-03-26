<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductImage;
use App\DetailOrder;
use App\Ingredient;
use App\Nutrient;
use App\Category;
use App\Config;
use App\Review;
use App\Tag;

class Product extends Model
{
    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'ingredients_products', 'product_id', 'ingredient_id')
        ->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'products_tags', 'product_id', 'tag_id')
        ->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function nutrient()
    {
        return $this->hasOne('App\Nutrient');
    }

    public function configs()
    {
        return $this->hasMany('App\Config');
    }

    public function images()
    {
        return $this->hasMany('App\ProductImage', 'product_id');
    }

    public function reviews()
   {
       return $this->hasMany('App\Review');
   }

   public function orders()
  {
      return $this->belongsToMany('App\DetailOrder');
  }
}
