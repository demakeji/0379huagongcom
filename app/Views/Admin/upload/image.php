<!-- 1. 先引入 jQuery（解决 $ 未定义） -->
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- 保留原有 JS 引入（404 不影响核心功能，后续可按之前方案修复） -->
<script type="text/javascript" src="/js/ajax.js"></script>

<!-- 2. 重构表单：去掉默认提交，改为 AJAX 提交 -->
<!-- 去掉 action/method/onsubmit，避免默认提交；给表单加 id；按钮改为 button 并加 id -->
<form id="uploadForm" enctype="multipart/form-data">
    <table>
        <tr>
            <td> 
                <input type="file" name="upfile" id="upfile" size="30" class="input" accept="image/jpeg,image/gif,image/png" >  
                <!-- 按钮改为 type="button"，加 id="submitBtn"，去掉默认提交 -->
                <input type="button" id="submitBtn" value="上传" style="cursor:pointer;" > <br/>
            </td>
            <td>
                <img id="img" 
                    src="<?= empty($img_path) ? site_url('img/no_up_form1.jpg') : $img_path ?>" 
                    height="90" 
                    class="img-preview"/>
                <?php if (!empty($img_path)): ?>
                    <!-- 修改删除按钮：绑定自定义删除函数，去掉原有 href -->
                    <a href="javascript:void(0);" 
                        class="link-del" 
                        data-path="<?= $img_path ?>"
                        onclick="deleteImage(this)">删除</a>
                <?php endif; ?>
                <span class="text-error" id="errorMsg"></span>
            </td>
        </tr>
        <tr>
            <td cols="2" style="color:#555; font-size:12px; font-weight:normal;" align="left">建议上传不大于 200K 的 jpg,gif 格式图片</td>
        </tr>
    </table>
</form>

<script type="text/javascript" >
function deleteImage(el) {
    // 1. 弹出确认框
    if (!confirm('确定删除这张图片吗？')) {
        return false;
    }
    
    // 2. 清空父页面的 img_path 和 upload 输入框值（核心需求）
    if (window.parent) {
        const imgPathInput = window.parent.document.getElementById('img_path');
        const uploadInput = window.parent.document.getElementById('upload');
        if (imgPathInput) imgPathInput.value = '';
        if (uploadInput) uploadInput.value = '';
    }
    
    // 3. 获取图片路径，调用删除接口（保留原有删除逻辑）
    const imgPath = el.getAttribute('data-path');
    if (imgPath) {
        // 发起删除请求
        $.get("<?= site_url('admin/upload/image') ?>", {
            act: 'del',
            path: imgPath
        }, function(res) {
            // 删除成功后更新当前页面预览图
            $("#img").attr("src", "<?= site_url('img/no_up_form1.jpg') ?>");
            // 隐藏删除按钮
            $(el).hide();
            $("#errorMsg").text("图片已删除");
        }).fail(function() {
            $("#errorMsg").text("图片删除失败");
        });
    }
    
    return false;
}

// 1. 原有校验逻辑（修复 jQuery 语法，调整大小限制为 200K）
function chkfile() {
    const fileInput = $("#upfile")[0]; // jQuery 转原生 DOM
    const file = fileInput.files[0];
    if (!file) {
        $("#errorMsg").text("请选择要上传的文件！");
        return false;
    }
    // 修复：200K 而非 1M（1024*200 而非 1024*1024）
    const maxSize = 1024 * 200;
    if (file.size > maxSize) {
        $("#errorMsg").text(`文件大小超过限制！请上传不大于200K的图片（当前：${Math.round(file.size/1024)}K）`);
        fileInput.value = "";
        return false;
    }
    const allowedTypes = ['image/jpeg', 'image/gif', 'image/png'];
    if (!allowedTypes.includes(file.type)) {
        $("#errorMsg").text("文件格式错误！仅支持jpg、gif、png格式");
        fileInput.value = "";
        return false;
    }
    $("#errorMsg").text("");
    return true;
}

// 2. AJAX 提交逻辑（修复按钮绑定 + 回调逻辑）
$(function() {
    // 绑定按钮点击事件（id 匹配）
    $("#submitBtn").click(function() {
        // 先执行校验
        if (!chkfile()) return;

        // 构建 FormData（关联表单 id）
        const formData = new FormData($("#uploadForm")[0]);
        
        // AJAX 提交
        $.ajax({
            url: "<?= site_url('admin/upload/image') ?>" + "<?= isset($upurl_fix) ? '?' . $upurl_fix : '' ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(res) {
                // ✅ 此时 JSON 会被解析，执行以下逻辑
                if (res.code === 0) {
                    // 更新预览图
                    $("#img").attr("src", res.path);
                    // 回填到父页面
                    if (window.parent && window.parent.document.getElementById('img_path') && window.parent.document.getElementById('upload')) {
                        window.parent.document.getElementById('img_path').value = res.path;
                        window.parent.document.getElementById('upload').value = res.path;
                        const preview = window.parent.document.getElementById('imgPreview');
                        if (preview) {
                            preview.innerHTML = `<img src="${res.path}" style="width:100px;height:auto;">`;
                        }
                    }
                    alert("上传成功！路径已回填");
                    $("#upfile").val(""); // 清空文件框
                } else {
                    $("#errorMsg").text("上传失败：" + res.msg);
                }
            },
            error: function(xhr, status, error) {
                // 调试：打印响应体，定位 JSON 解析失败原因
                console.log("AJAX 错误：", status, error);
                console.log("响应内容：", xhr.responseText); // 看返回的是不是纯 JSON
                $("#errorMsg").text("上传失败：" + error + "（请查看控制台）");
            }
        });
    });
});
</script>