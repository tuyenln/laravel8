<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base;
use Illuminate\Support\Facades\Auth;


class ListingController extends Controller
{
    private $base;
    private $defaultListingConfigs;

    public function __construct(Base $base)
    {
        $this->base = $base;
        $this->defaultListingConfigs = $this->base->defaultListingConfigs();
    }
    public function index(Request $request, $modelName)
    {
        $model = '\App\Models\\' . ucfirst($modelName);
        $admin = Auth::guard('admin')->user();
        $model = new $model;
        $config = $model->listingConfigs();
        $config = array_merge($config,$this->defaultListingConfigs);

        $conditions  = [
            [
                'field'     => 'id',
                'condition' => '=',
                'value'     => 5
            ],
            [
                'field'     => 'name',
                'condition' => 'like',
                'value'     => '%' . 'Product 4' . '%'
            ]
        ];

        $conditions  = [];
        $records = $model::where($conditions)->paginate(5);
        // $records = $model::paginate(5);
        return view('admin.listing', [
            'user'      => $admin,
            'records'   => $records,
            'configs'   => $config,
            'title'     => $model->title,
        ]);
    }
}
