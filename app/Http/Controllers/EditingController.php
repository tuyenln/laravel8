<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Base;

class EditingController extends Controller
{

    public function create($modelName)
    {
        $admin = Auth::guard('admin')->user();

        $model = '\App\Models\\' . ucfirst($modelName);
        $model = new $model;
        $config = $model->editingConfigs();


        return view('admin.editing', [
            'user'     => $admin,
            'model'    => $modelName,
            'configs'    => $config
        ]);
    }

    public function store(Request $request, $modelName)
    {
        if ($request->hasFile('image')) {
            echo 1;
            die;
        }
        $admin = Auth::guard('admin')->user();
        $model = '\App\Models\\' . ucfirst($modelName);
        $model = new $model;

        $config = $model->editingConfigs();

        $arrayValidateFields = [];

        foreach ($config as $conf) {
            if (!empty($conf['validate'])) {
                $arrayValidateFields[$conf['field']] = $conf['validate'];
            }
        }


        $validated = $request->validate($arrayValidateFields);


        return view('admin.editing', [
            'user'     => $admin,
            'model'    => $modelName,
            'configs'    => $config
        ]);
    }
}
