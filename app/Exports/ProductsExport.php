<?php
namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Retorna os produtos com os nomes das categorias
        return Product::with('category')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nome',
            'Categoria',
            'Status',
            'Stock',
            'Descrição',
            'Preço',
            'Data de Expiração',
        ];
    }

    public function map($product): array
    {
        return [
            'ID' => $product->id,
            'Name' => $product->name,
            'Category' => $product->category->name ?? 'N/A', // Acessando o nome da categoria, com fallback para 'N/A'
            'Status' => $product->active,
            'Stock' => $product->stock ==  0 ? '0':  $product->stock , // Usando coalescência nula para garantir que o estoque seja 0 se estiver vazio
            'Description' => $product->description,
            'Price' => $product->price,
            'Data de Expiração' => \Carbon\Carbon::parse($product->expiration_date)->locale('pt-BR')->isoFormat('DD/MM/YYYY')
        ];
    }
}
