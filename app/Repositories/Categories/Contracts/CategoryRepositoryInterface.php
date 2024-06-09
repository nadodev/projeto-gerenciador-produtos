<?php

namespace App\Repositories\Categories\Contracts;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function all();
    public function paginate($perPage);
    public function find($id);
    public function create(array $data);
    public function update(Category $product, array $data);
    public function delete(Category $product);
}
