<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function listingConfigs()
    {
        return [
            [
                'field' => 'name',
                'name'  => 'Tên sản phẩm',
                'type'  => 'text'
            ],
            [
                'field' => 'image',
                'name'  => 'Ảnh sản phẩm',
                'type'  => 'image'
            ],
            [
                'field' => 'price',
                'name'  => 'Giá sản phẩm',
                'type'  => 'number'
            ],
        ];
    }
}
