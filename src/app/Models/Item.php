<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'image_path',
        'category_id',
        'condition',
        'brand',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->hasMany(comment::class);
    }
    public function favorites(){
        return $this->hasMany(Item::class);
    }
    public function purchase(){
        return $this->hasOne(Purchase::class);
    }
    public function scopeRecommended($query)
    {
    return $query->where('is_recommended', true);
    }
}
