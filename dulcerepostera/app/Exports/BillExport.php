<?php

namespace App\Exports;

use App\Item;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BillExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($data){
        $this->order = $data["order"];
        $this->items = $data["items"];
    }

    public function headings(): array{
        return [
            [
                'Dulce Repostera',
                'Order number: '.$this->order->getId(),
                'Total: '.$this->order->getTotal(),
            ],
            [],
            [
                'name',
                'description',
                'category',
                'price',
                'quantity',
                'subtotal',
            ],
        ];
    }

    public function collection(){
        $items = Item::where('order_id', $this->order->getId())->get();
        $products = new Collection();
        foreach ($items as $item){
            $products->push((object)[
                'name' => $item->product->getName(),
                'description' => $item->product->getDescription(),
                'category' => $item->product->getCategory(),
                'price' => $item->product->getPrice(),
                'quantity' => $item->getQuantity(),
                'subtotal' => $item->getQuantity() * $item->product->getPrice(),
            ]);
        }
        return $products;
    }
}