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
                'type'  => 'text',
            ],
            [
                'field' => 'copy',
                'name'  => 'Copy',
                'type'  => 'copy'
            ],
            [
                'field' => 'edit',
                'name'  => 'Sửa',
                'type'  => 'edit'
            ],
            [
                'field' => 'delete',
                'name'  => 'Xoá',
                'type'  => 'delete'
            ],
        ];
    }
}
