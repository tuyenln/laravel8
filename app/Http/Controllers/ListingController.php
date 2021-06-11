<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base;
use Illuminate\Support\Facades\Auth;


class ListingController extends Controller
{
    private $baseModel;
    private $defaultListingConfigs;

    public function __construct(Base $baseModel)
    {
        $this->baseModel = $baseModel;
        $this->defaultListingConfigs = $this->baseModel->defaultListingConfigs();
    }
    public function index(Request $request, $modelName)
    {
        $model = '\App\Models\\' . ucfirst($modelName);
        $admin = Auth::guard('admin')->user();
        $model = new $model;
        $config = $model->listingConfigs();
        $config = array_merge($config,$this->defaultListingConfigs);
        $conditions = $this->baseModel->getFilter($request, $config);

        // $records = $model::where($conditions)->paginate(5);
        $records = $this->baseModel->getRecords($model, $conditions);
        // $records = $model::paginate(5);
        return view('admin.listing', [
            'user'      => $admin,
            'records'   => $records,
            'configs'   => $config,
            'title'     => $model->title,
            'model'     => $modelName
        ]);
    }
}
