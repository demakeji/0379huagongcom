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
        // ========== 1. 打印完整的请求信息（解决日志无内容问题） ==========
        $ci4Method = $this->request->getMethod(true); // true：返回大写方法名
        $nativeMethod = $_SERVER['REQUEST_METHOD'] ?? '未知';
        $getParams = $this->request->getGet();
        $fullUrl = (string) current_url(true); // 核心修复：替换 getUriString()
        $upurl_fix ='';
        $imagename ='';
        $message = '';

        // 写入完整日志
        $this->logger->info('【Upload控制器】请求详情：', [
            'CI4识别的方法' => $ci4Method,
            '原生PHP识别的方法' => $nativeMethod,
            'GET参数' => $getParams,
            '请求URL' => $fullUrl
        ]);
        // ========== 2. 强制识别 GET 请求（大写匹配） ==========
        if ($ci4Method === 'GET' || $nativeMethod === 'GET') {
            $this->logger->info('【Upload控制器】进入GET分支'); // 确认进入分支
            
            $pathParam = trim($this->request->getGet('path') ?? '');
            $data = [
                'upimgpath' => $pathParam ?: 'hproduct',
                'upurl_fix' => $upurl_fix,
                'imagename' => $imagename,
                'message' => $message,
            ];
            $viewContent = view('Admin/upload/image', $data);
            echo $viewContent;
            exit; // 强制退出，避免后续代码执行
        }

        // ========== 3. POST 逻辑（大写匹配） ==========
        if ($ci4Method !== 'POST') {
            $response = [
                'code' => 1,
                'msg'  => '仅支持GET（展示页面）/POST（上传）方式',
                'path' => ''
            ];
            return $this->response->setJSON($response);
        }

        // 后续上传逻辑（不变）...
        $response = [
            'code' => 1,
            'msg'  => '上传失败',
            'path' => ''
        ];
        try {
            $file = $this->request->getFile('file');
            if (!$file) {
                $response['msg'] = '请选择要上传的图片';
                return $this->response->setJSON($response);
            }
            if (!$file->isValid()) {
                $response['msg'] = '请选择有效图片：' . $file->getErrorString();
                return $this->response->setJSON($response);
            }

            // 验证文件类型/大小
            $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
            $maxSize = 2 * 1024 * 1024;
            if (!in_array(strtolower($file->getExtension()), $allowedExts)) {
                $response['msg'] = '仅支持jpg/jpeg/png/gif格式图片';
                return $this->response->setJSON($response);
            }
            if ($file->getSize() > $maxSize) {
                $response['msg'] = '图片大小不能超过2M';
                return $this->response->setJSON($response);
            }

            // 保存文件
            $saveDir = 'uploads/hproduct/' . date('Ymd');
            $absoluteDir = WRITEPATH . '../public/' . $saveDir;
            if (!is_dir($absoluteDir)) {
                mkdir($absoluteDir, 0755, true);
            }
            $newFileName = md5(uniqid()) . '.' . $file->getExtension();
            $file->move($absoluteDir, $newFileName);

            // 返回成功结果
            $response = [
                'code' => 0,
                'msg'  => '上传成功',
                'path' => base_url($saveDir . '/' . $newFileName)
            ];
            return $this->response->setJSON($response);
        } catch (\Exception $e) {
            $response['msg'] = '上传异常：' . $e->getMessage();
            return $this->response->setJSON($response);
        }
    }
}