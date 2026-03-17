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
        // 1. 处理删除图片（原有逻辑）
        if ($this->request->getGet('act') === 'del') {
            $imgPath = $this->request->getGet('path');
            if (!empty($imgPath)) {
                $absolutePath = WRITEPATH . '../public/' . str_replace(base_url(), '', $imgPath);
                if (file_exists($absolutePath)) {
                    unlink($absolutePath);
                }
                return view('Admin/upload/image', [
                    'message' => '图片已删除',
                    'imagename' => ''
                ]);
            }
        }

        // 2. GET请求：返回上传页面（原有逻辑）
        if ($this->request->getMethod(true) === 'GET') {
            $data['upimgpath'] = trim($this->request->getGet('path') ?? '') ?: 'hproduct';
            $data['imagename'] = ''; // 初始化预览图路径
            return view('Admin/upload/image', $data);
        }

        // 3. POST请求：处理上传（保留JSON返回）
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
                $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
                $maxSize = 2 * 1024 * 1024; // 2M（可改为200K：200*1024）
                if (!in_array(strtolower($file->getExtension()), $allowedExts)) {
                    $response['msg'] = '仅支持jpg/jpeg/png/gif格式图片';
                } elseif ($file->getSize() > $maxSize) {
                    $response['msg'] = '图片大小不能超过2M'; // 可改为200K
                } else {
                    $saveDir = 'upload/hproduct/' . date('Ymd');
                    $absoluteDir = WRITEPATH . '../public/' . $saveDir;
                    if (!is_dir($absoluteDir)) {
                        mkdir($absoluteDir, 0755, true);
                    }
                    $newFileName = md5(uniqid()) . '.' . $file->getExtension();
                    $file->move($absoluteDir, $newFileName);
                    
                    $response['code'] = 0;
                    $response['msg'] = '上传成功';
                    $response['path'] = base_url($saveDir . '/' . $newFileName);
                }
            }
        } catch (\Exception $e) {
            $response['msg'] = '上传异常：' . $e->getMessage();
        }

        // 核心：保留JSON返回（不传递给视图）
        return $this->response->setJSON($response);
    }
}