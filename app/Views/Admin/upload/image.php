<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>图片上传</title>
    <!-- 重置默认样式，提升兼容性 -->
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "微软雅黑", Arial, sans-serif;
        }
        body {
            margin: 0;
            padding: 5px; /* 增加内边距，避免内容贴边 */
            background: url("img/allbg.gif") repeat; /* 补全repeat，避免背景拉伸 */
        }
        .upload-table {
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }
        .upload-table td {
            padding: 5px 0;
            vertical-align: middle; /* 垂直居中 */
        }
        .input-file {
            padding: 2px;
            border: 1px solid #ccc;
            border-radius: 2px;
            font-size: 12px;
            width: 200px; /* 固定宽度，避免变形 */
        }
        .btn-upload {
            cursor: pointer;
            padding: 2px 10px;
            border: 1px solid #ccc;
            background: #f5f5f5;
            border-radius: 2px;
            font-size: 12px;
            margin-left: 5px;
        }
        .btn-upload:hover {
            background: #e8e8e8; /* 鼠标悬浮效果 */
        }
        .img-preview {
            border: 1px solid #eee;
            margin-left: 10px;
        }
        .text-tip {
            color: #555;
            font-size: 11px;
            font-weight: normal;
            padding-top: 5px;
        }
        .text-error {
            color: red;
            margin-left: 5px;
        }
        .link-del {
            color: #0066cc;
            text-decoration: none;
            margin-left: 5px;
            font-size: 11px;
        }
        .link-del:hover {
            text-decoration: underline;
        }
    </style>
</head>
<!-- 移除过时的topmargin/leftmargin，用CSS替代 -->
<body>
<!-- 1. 适配CI4的site_url，修复upurl_fix未输出的问题 -->
<form action="<?= site_url('admin/upload/image') . (isset($upurl_fix) ? '?' . $upurl_fix : '') ?>" 
      method="post" 
      enctype="multipart/form-data" 
      onsubmit="return chkfile()">
  <table class="upload-table">
      <tr>
        <td> 
          <!-- 2. 优化文件输入框样式，补充ID和name匹配CI4控制器 -->
          <input type="file" 
                 name="upfile" 
                 id="upfile" 
                 class="input-file" 
                 accept="image/jpeg,image/gif,image/png" >  
          <button type="submit" class="btn-upload">上传</button> <br/>
        </td>
        <td>
          <!-- 3. 优化图片预览，增加容错，避免空值报错 -->
          <img id="img" 
               src="<?= empty($imagename) ? site_url('img/no_up_form1.jpg') : $imagename ?>" 
               height="90" 
               class="img-preview"/>
          <!-- 4. 优化删除链接，适配CI4路由，增加空值判断 -->
          <?php if (!empty($imagename)): ?>
              <a href="<?= site_url('admin/upload/image?act=del&path=' . $imagename) ?>" 
                 class="link-del" 
                 onclick="return confirm('确定删除这张图片吗？')">删除</a>
          <?php endif; ?>
          <!-- 5. 优化错误提示，避免空值显示空标签 -->
          <?php if (!empty($message)): ?>
              <span class="text-error"><?= $message ?></span>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <!-- 6. 修正cols属性错误（td没有cols，用colspan） -->
      <td> 
          <!-- 2. 优化文件输入框样式，补充ID和name匹配CI4控制器 -->
          <input type="file" 
                 name="upfile" 
                 id="upfile" 
                 class="input-file" 
                 accept="image/jpeg,image/gif,image/png" >  
          <button type="submit" class="btn-upload">上传</button> <br/>
        </td>
        <td>
          <!-- 3. 优化图片预览，增加容错，避免空值报错 -->
          <img id="img" 
               src="<?= empty($imagename) ? site_url('img/no_up_form1.jpg') : $imagename ?>" 
               height="90" 
               class="img-preview"/>
          <!-- 4. 优化删除链接，适配CI4路由，增加空值判断 -->
          <?php if (!empty($imagename)): ?>
              <a href="<?= site_url('admin/upload/image?act=del&path=' . $imagename) ?>" 
                 class="link-del" 
                 onclick="return confirm('确定删除这张图片吗？')">删除</a>
          <?php endif; ?>
          <!-- 5. 优化错误提示，避免空值显示空标签 -->
          <?php if (!empty($message)): ?>
              <span class="text-error"><?= $message ?></span>
          <?php endif; ?>
        </td>
      </tr>
   </table>
</form>

<script type="text/javascript" >
// 7. 增强文件校验：不仅判断是否选择文件，还校验大小和格式
function chkfile() {
    const fileInput = document.getElementById("upfile");
    const file = fileInput.files[0]; // 获取选中的文件对象
    
    // 第一步：判断是否选择文件
    if (!file) {
        alert("请选择要上传的文件！");
        return false;
    }

    // 第二步：校验文件大小（200K）
    const maxSize = 1024 * 1024; // 200KB
    if (file.size > maxSize) {
        alert(`文件大小超过限制！请上传不大于200K的图片（当前大小：${Math.round(file.size/1024)}K）`);
        fileInput.value = ""; // 清空选择的文件
        return false;
    }

    // 第三步：校验文件格式（白名单）
    const allowedTypes = ['image/jpeg', 'image/gif', 'image/png'];
    if (!allowedTypes.includes(file.type)) {
        alert("文件格式错误！仅支持jpg、gif、png格式的图片");
        fileInput.value = ""; // 清空选择的文件
        return false;
    }

    // 所有校验通过
    return true;
}

// 8. 可选：上传成功后自动回填路径到父页面（适配产品编辑页）
<?php if (isset($uploadResult) && $uploadResult['code'] === 0): ?>
    // 上传成功，通知父页面回填路径
    if (window.parent && window.parent.document.getElementById('img_path')) {
        window.parent.document.getElementById('img_path').value = "<?= $uploadResult['path'] ?>";
        // 更新父页面的图片预览
        const preview = window.parent.document.getElementById('imgPreview');
        if (preview) {
            preview.innerHTML = `<img src="<?= $uploadResult['path'] ?>" style="width:100px;height:auto;">`;
        }
        // 提示上传成功
        alert("图片上传成功！");
    }
<?php endif; ?>
</script>
</body>
</html>