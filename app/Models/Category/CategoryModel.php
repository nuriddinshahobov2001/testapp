<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $fillable = ['name', 'parent_id'];

    public function children()
    {
        return $this->hasMany(CategoryModel::class, 'parent_id', 'id')->with('children');
    }
}
