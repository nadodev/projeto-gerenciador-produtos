<?php

namespace App\Repositories\Products;

use App\Models\Product;
use App\Repositories\Products\Contracts\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::all();
    }

    public function paginate($perPage)
    {
        return Product::paginate($perPage);
    }

    public function find($id)
    {
        return Product::findOrFail($id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(Product $product, array $data)
    {
        return $product->update($data);
    }

    public function delete(Product $product)
    {
        return $product->delete();
    }

    public function getAll(): Builder
    {
        return Product::query();
    }
}
