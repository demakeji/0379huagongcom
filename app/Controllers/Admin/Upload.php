<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\Log\Logger;

class Upload extends BaseController
{
    protected $logger;

    public function __construct()
    {
        $this->logger = service('logger'); // 改用 CI4 推荐的 service 方式获取日志（避免手动实例化）
    }

    public function image()
    {
        // GET请求：返回上传页面（原有逻辑）
        if ($this->request->getMethod(true) === 'GET') {
            $data['upimgpath'] = trim($this->request->getGet('path') ?? '') ?: 'hproduct';
            return view('Admin/upload/image', $data);
        }

        // POST请求：处理上传（修改返回逻辑）
        $response = [
            'code' => 1,
            'msg'  => '上传失败',
            'path' => ''
        ];

        try {
            $file = $this->request->getFile('upfile');
            if (!$file) {
                $response['msg'] = '请选择要上传的图片';
            } elseif (!$file->isValid()) {
                $response['msg'] = '请选择有效图片：' . $file->getErrorString();
            } else {
                // 原有验证/保存逻辑（不变）
                $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
                $maxSize = 2 * 1024 * 1024;
                if (!in_array(strtolower($file->getExtension()), $allowedExts)) {
                    $response['msg'] = '仅支持jpg/jpeg/png/gif格式图片';
                } elseif ($file->getSize() > $maxSize) {
                    $response['msg'] = '图片大小不能超过2M';
                } else {
                    $saveDir = 'upload/hproduct/' . date('Ymd');
                    $absoluteDir = WRITEPATH . '../public/' . $saveDir;
                    if (!is_dir($absoluteDir)) {
                        mkdir($absoluteDir, 0755, true);
                    }
                    $newFileName = md5(uniqid()) . '.' . $file->getExtension();
                    $file->move($absoluteDir, $newFileName);
                    
                    // 拼接可访问路径
                    $response['code'] = 0;
                    $response['msg'] = '上传成功';
                    $response['path'] = base_url($saveDir . '/' . $newFileName);
                }
            }
        } catch (\Exception $e) {
            $response['msg'] = '上传异常：' . $e->getMessage();
        }

        // 关键修改：把上传结果传递给上传视图，而非直接返回JSON
        return view('Admin/upload/image', [
            'uploadResult' => $response
        ]);
    }
}