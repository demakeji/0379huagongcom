<?php

namespace App\Models;

use CodeIgniter\Model;

class HproductsModel extends Model
{
    protected $table = 'hproducts';
    protected $primaryKey = 'Hpid';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    
    // 关键修复1：填充允许批量赋值的字段（和你提交的字段一致）
    protected $allowedFields = [
        'Cid',       //类目id
        'title',    // 产品标题
        'img_path',    // 图片路径
        'hanliang',  // 含量
        'guige',     // 规格
        'price',     // 价格
        'chandi',    // 产地
        'content'   // 产品内容
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // 关键修复2：补充验证规则（和控制器验证逻辑对应）
    protected $validationRules = [
        'Cid'      => 'required|numeric',
        'title'    => 'required|max_length[24]',
        'hanliang' => 'required|numeric',
        'guige'    => 'required|numeric',
        'price'    => 'required|numeric|greater_than[0]',
        'chandi'   => 'required|max_length[50]',
        'img_path'    => 'required|max_length[200]',
        'content'  => 'permit_empty|max_length[2000]',
    ];
    
    // 可选：自定义验证错误提示（更友好）
    protected $validationMessages = [
        'title' => ['required' => '产品标题不能为空'],
        'price'  => [
            'required' => '产品价格不能为空',
            'numeric' => '产品价格必须是数字',
            'greater_than' => '产品价格必须大于0'
        ]
    ];
    
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function getHporducts(string|bool|null $title = false): ?array
    {
        if ($title === false || $title == null) 
        {
            $str = $this->findAll();
            return $str;
        }
        
        $str = $this->where(['title' => $title])->first();
        return $str;
    }

    public function getHproductById($id): object|array|null
    {
        $str = $this->where(['Hpid' => $id])->first();
        return $str;
    }
}
