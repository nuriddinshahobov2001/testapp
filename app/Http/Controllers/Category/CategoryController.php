<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Resources\Category\CategoryGetResource;
use App\Models\Category\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryModel::whereNull('parent_id')->with('children')->get();
        return CategoryGetResource::collection($categories);
    }

    public function store(CategoryStoreRequest $request)
    {

        $data = $request->validated();
        $category = CategoryModel::create([
            'name' => $data['name'],
            'parent_id' => $data['parent_id'] ?? null,
        ]);
        return new CategoryGetResource($category);
    }

}
