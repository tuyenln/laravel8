<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base;

class Product extends Base
{
    use HasFactory;

    public $title = 'Sản phẩm';


    public function configs()
    {
        $defaultListingConfigs = parent::defaultListingConfigs();
        $listingConfigs =  [
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
                'editing'   => true,
                'validate'  => 'required|max:100',
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
                'validate'  => 'required|numeric'
            ],
            [
                'field' => 'content',
                'name'  => 'Nội dung',
                'type'  => 'ckeditor',
                'listing'   => false,
                'editing'   => true,
            ],
        ];
        return array_merge($listingConfigs, $defaultListingConfigs);
    }
}
