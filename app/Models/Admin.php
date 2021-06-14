<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use App\Models\Base;

class Admin extends Base implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;

    public $title = 'Quản trị viên';

    public function listingConfigs()
    {
        $defaultListingConfigs = parent::defaultListingConfigs();
        $listingConfigs =  [
            [
                'field' => 'id',
                'name'  => 'ID',
                'type'  => 'text'
            ],
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
        return array_merge($listingConfigs, $defaultListingConfigs);
    }
}
