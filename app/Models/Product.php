<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $title = 'Sản phẩm';

    public function editingConfigs()
    {
    }

    public function listingConfigs()
    {
        return [
            [
                'field' => 'id',
                'name'  => 'ID',
                'type'  => 'text',
                'filter' => 'equal',
                'sort'  => true,
                'listing'   => true,
                'editing'   => false
            ],
            [
                'field' => 'name',
                'name'  => 'Tên sản phẩm',
                'type'  => 'text',
                'filter' => 'like',
                'sort'  => true,
                'listing'   => true,
                'editing'   => true
            ],
            [
                'field' => 'image',
                'name'  => 'Ảnh sản phẩm',
                'type'  => 'image',
                'listing'   => true,
                'editing'   => true
            ],
            [
                'field' => 'price',
                'name'  => 'Giá sản phẩm',
                'type'  => 'number',
                'filter'   => 'between',
                'sort'  => true,
                'listing'   => true,
                'editing'   => true,
            ],
            [
                'field' => 'content',
                'name'  => 'Nội dung',
                'type'  => 'ckeditor',
                'listing'   => false,
                'editing'   => true,
            ],
        ];
    }
}
