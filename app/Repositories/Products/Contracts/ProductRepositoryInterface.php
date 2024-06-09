<?php

namespace App\Repositories\Products\Contracts;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function all();
    public function paginate($perPage);
    public function find($id);
    public function create(array $data);
    public function update(Product $product, array $data);
    public function delete(Product $product);
}
