<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_cat_id'];

    // Self Relation

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_cat_id', 'id')->withDefault(['name' => 'NoParent']);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_cat_id', 'id');
    }

}
