<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Base extends Model
{
    use HasFactory;

    protected $perPage = 5;

    public function defaultListingConfigs()
    {
        return [
            [
                'field' => 'created_at',
                'name'  => 'Ngày tạo',
                'type'  => 'text'
            ],
            [
                'field' => 'updated_at',
                'name'  => 'Ngày cập nhật',
                'type'  => 'text',
            ],
            [
                'field' => 'copy',
                'name'  => 'Copy',
                'type'  => 'copy'
            ],
            [
                'field' => 'edit',
                'name'  => 'Sửa',
                'type'  => 'edit'
            ],
            [
                'field' => 'delete',
                'name'  => 'Xoá',
                'type'  => 'delete'
            ],
        ];
    }

    public function getFilter($request, $configs, $model)
    {
        $conditions = [];
        $modelFilter = Cookie::get(strtolower($model).'_filter');
        if ($request->method() == 'POST') {
            foreach ($configs as &$config) {
                if (!empty($config['filter'])) {
                    $value = $request->input($config['field']);
                    if (empty($value)) {
                        continue;
                    }
                    switch ($config['filter']) {
                        case 'equal':
                            $conditions[] = [
                                'field' => $config['field'],
                                'condition' => '=',
                                'value' => $value
                            ];
                            $config['filter_value'] = $value;
                            break;
                        case 'like':
                            $conditions[] = [
                                'field' => $config['field'],
                                'condition' => 'like',
                                'value' => '%'. $value . '%'
                            ];
                            $config['filter_value'] = $value;
                            break;
                        case 'between':
                            if (!empty($value['from'])) {
                                $conditions[] = [
                                    'field'     => 'price',
                                    'condition' => '>=',
                                    'value'     => $value['from']
                                ];
                                $config['filter_from_value'] = $value['from'];
                            }
                            if (!empty($value['to'])) {
                                $conditions[] = [
                                    'field'     => 'price',
                                    'condition' => '<=',
                                    'value'     => $value['to']
                                ];
                                $config['filter_to_value'] = $value['to'];
                            }
                            break;
                        default:
                    }
                }
                // if (!empty($conditions)) {
                    Cookie::queue(strtolower($model).'_filter', json_encode($conditions), 24 * 60);
                // }
            }
        } else {
            //Get Method
            $conditions = json_decode($modelFilter, true);
            if ($conditions) {
                foreach ($conditions as $condition) {
                    foreach ($configs as &$config) {
                        if ($config['field'] == $condition['field'] ) {
                            switch($config['filter']) {
                                case 'equal':
                                    $config['filter_value'] = $condition['value'];
                                    break;
                                case 'like':
                                    $config['filter_value'] = str_replace("%", "", $condition['value']);
                                    break;
                                case 'between':
                                    if ($condition['condition'] == '>=') {
                                        $config['filter_from_value'] = $condition['value'];
                                    } else {
                                        $config['filter_to_value'] = $condition['value'];
                                    }
                                    break;
                            }
                        }
                    }
                }
            }
        }
        return [
            'conditions' => $conditions,
            'configs' => $configs
        ];
    }

    public function getRecords($model, $conditions)
    {
        $records = $model::where($conditions)->paginate($this->perPage);
        return $records;
    }
}
