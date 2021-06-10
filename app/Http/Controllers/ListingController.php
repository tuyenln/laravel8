<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base;


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
        $records = $model::paginate(5);
        $admin = \Auth::guard('admin')->user();
        $model = new $model;
        $config = $model->listingConfigs();
        $config = array_merge($config,$this->defaultListingConfigs);
        return view('admin.listing', [
            'user' => $admin,
            'records' => $records,
            'configs' => $config
        ]);
    }
}
