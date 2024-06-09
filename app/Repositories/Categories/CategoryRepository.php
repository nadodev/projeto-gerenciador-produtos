<?php

namespace App\Repositories\Categories;

use App\Models\Category;
use App\Repositories\Categories\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function paginate($perPage)
    {
        return Category::paginate($perPage);
    }

    public function find($id)
    {
        return Category::findOrFail($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update(Category $category, array $data)
    {
        return $category->update($data);
    }

    public function delete(Category $category)
    {
        return $category->delete();
    }

    public function getAll(): Builder
    {
        return Category::query();
    }
}
