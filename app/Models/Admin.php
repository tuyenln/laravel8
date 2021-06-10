<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Admin extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;

    public function listingConfigs()
    {
        return [
            [
                'field' => 'name',
                'name'  => 'Tên quản trị viên',
                'type'  => 'text'
            ],
            [
                'field' => 'email',
                'name'  => 'Email',
                'type'  => 'text'
            ],
        ];
    }
}
