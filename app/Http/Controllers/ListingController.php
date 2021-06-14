<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ListingController extends Controller
{
    public function index(Request $request, $modelName)
    {
        $model = '\App\Models\\' . ucfirst($modelName);
        $admin = Auth::guard('admin')->user();
        $model = new $model;
        $config = $model->listingConfigs();



        $filterResult = $model->getFilter($request, $config, $modelName);

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
        $records = $model->getRecords($filterResult['conditions'], $orderBy);

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
