<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function getFilter($request, $configs)
    {
        $conditions = [];
        if ($request->method() == 'POST') {
            foreach ($configs as $config) {
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
                            break;
                        case 'like':
                            $conditions[] = [
                                'field' => $config['field'],
                                'condition' => 'like',
                                'value' => '%'. $value . '%'
                            ];
                            break;
                        case 'between':
                            if (!empty($value['from'])) {
                                $conditions[] = [
                                    'field'     => 'price',
                                    'condition' => '>=',
                                    'value'     => $value['from']
                                ];
                            }
                            if (!empty($value['to'])) {
                                $conditions[] = [
                                    'field'     => 'price',
                                    'condition' => '<=',
                                    'value'     => $value['to']
                                ];
                            }
                            break;
                        default:
                    }
                }
            }
        }
        return $conditions;
    }

    public function getRecords($model, $conditions)
    {
        $records = $model::where($conditions)->paginate($this->perPage);
        return $records;
    }
}
