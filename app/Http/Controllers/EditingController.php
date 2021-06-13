<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Base;

class EditingController extends Controller
{

    private $baseModel;
    private $defaultListingConfigs;

    public function __construct(Base $baseModel)
    {
        $this->baseModel = $baseModel;
        $this->defaultListingConfigs = $this->baseModel->defaultListingConfigs();
    }

    public function create($modelName)
    {
        $admin = Auth::guard('admin')->user();

        $model = '\App\Models\\' . ucfirst($modelName);
        $model = new $model;
        $config = $model->listingConfigs();
        $config = array_merge($config, $this->defaultListingConfigs);

        return view('admin.editing', [
            'user'     => $admin,
            'model'    => $modelName,
            'configs'    => $config
        ]);
    }
}
