<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $title= 'Sản phẩm';

    public function listingConfigs()
    {
        return [
            [
                'field' => 'id',
                'name'  => 'ID',
                'type'  => 'text',
                'filter' => 'equal',
                'sort'  => true
            ],
            [
                'field' => 'name',
                'name'  => 'Tên sản phẩm',
                'type'  => 'text',
                'filter' => 'like',
                'sort'  => true
            ],
            [
                'field' => 'image',
                'name'  => 'Ảnh sản phẩm',
                'type'  => 'image'
            ],
            [
                'field' => 'price',
                'name'  => 'Giá sản phẩm',
                'type'  => 'number',
                'filter'   => 'between',
                'sort'  => true
            ],
        ];
    }
}
