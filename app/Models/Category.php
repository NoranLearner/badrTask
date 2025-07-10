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

    // For Category Tree

    // public static function tree()
    // {
    //     $allCategories = Category::all();

    //     $rootCategories = $allCategories->whereNull('parent_cat_id');

    //     foreach ($rootCategories as $rootCategory) {

    //         $rootCategory->children = $allCategories->where('parent_cat_id', $rootCategory->id)->values();

    //         foreach ($rootCategory->children as $child) {

    //             $child->children = $allCategories->where('parent_cat_id', $child->id)->values();

    //         }

    //     }

    //     return $rootCategories;
    // }

    public static function tree()
    {
        $allCategories = Category::all();

        $rootCategories = $allCategories->whereNull('parent_cat_id');

        self::formatTree($rootCategories, $allCategories);

        return $rootCategories;
    }

    public static function formatTree($categories, $allCategories)
    {
        foreach ($categories as $category) {

            $category->children = $allCategories->where('parent_cat_id', $category->id)->values();

            if (!empty($category->children)) {

                self::formatTree($category->children, $allCategories);

            }

        }
    }

    public function isChild(): bool
    {
        return $this->parent_cat_id != null;
    }

}
