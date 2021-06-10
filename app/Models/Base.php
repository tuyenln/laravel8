<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    use HasFactory;

    public function defaultListingConfigs()
    {
        return [
            [
                'field' => 'created_at',
                'name'  => 'Ngày tạo',
                'type'  => 'text'
            ],
            [
                'field' => 'updated_at',
                'name'  => 'Ngày cập nhật',
                'type'  => 'text'
            ],
        ];
    }
}
