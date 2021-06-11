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
        $filterResult = $this->baseModel->getFilter($request, $config, $modelName);

        $orderBy = [
            'field' => 'id',
            'sort'  => 'asc'
        ];

        if ($request->input('sort')) {
            $field = substr($request->input('sort'), 0, strrpos($request->input('sort'), "_"));
            $sort = substr($request->input('sort'), strrpos($request->input('sort'), "_") + 1);
            $orderBy = [
                'field' => $field,
                'sort'  =>   $sort
            ];
        }

        $config = $filterResult['configs'];
        $records = $this->baseModel->getRecords($model, $filterResult['conditions'], $orderBy);

        return view('admin.listing', [
            'user'      => $admin,
            'records'   => $records,
            'configs'   => $config,
            'title'     => $model->title,
            'model'     => $modelName,
            'orderBy'   => $orderBy,
        ]);
    }
}
