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
        $data = [];
        foreach ($config as $conf) {
            if (!empty($conf['editing']) && $conf['editing']) {
                switch ($conf['type']) {
                    case 'image':
                        if ($request->hasFile($conf['field'])) {
                            $name = $request->file($conf['field'])->getClientOriginalName();
                            $path = $request->file($conf['field'])->storeAs(
                                'public/product',
                                $name
                            );
                            $data[$conf['field']] = '/' . str_replace("public", "storage", $path);
                        }
                        break;
                    default:
                        $data[$conf['field']] = $request->input($conf['field']);
                        break;
                }
            }
        }

        $res = $model->create($data);
        if ($res) {
            $request->session()->flash('alert-success', 'Product was successful added!');
        } else {
            $request->session()->flash('alert-error', 'Product save fail!');
        }

        return view('admin.editing', [
            'success'   => $res,
            'user'      => $admin,
            'model'     => $modelName,
            'configs'    => $config
        ]);
    }
}
