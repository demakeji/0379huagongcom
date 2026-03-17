<form action="<?= site_url('admin/upload/image') . (isset($upurl_fix) ? '?' . $upurl_fix : '') ?>" method="post" enctype="multipart/form-data" onsubmit="return chkfile()" >
    <table>
        <tr>
            <td> 
                <input type="file" name="upfile" id="upfile" size="30" class="input" accept="image/jpeg,image/gif,image/png" >  
                <input type="submit" value="上传" style="cursor:pointer;" > <br/>
            </td>
            <td>
                <img id="img" 
                    src="<?= empty($one['image']) ? site_url('img/no_up_form1.jpg') : $one['image'] ?>" 
                    height="90" 
                    class="img-preview"/>
                <?php if (!empty($one['image'])): ?>
                    <a href="<?= site_url('admin/upload/image?act=del&path=' . $one['image']) ?>" 
                        class="link-del" 
                        onclick="return confirm('确定删除这张图片吗？')">删除</a>
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
    // 1. 原有文件校验逻辑（保留）
    function chkfile() {
        const fileInput = document.getElementById("upfile");
        const file = fileInput.files[0];
        if (!file) {
            $("#errorMsg").text("请选择要上传的文件！");
            return false;
        }
        const maxSize = 1024 * 1024;
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

    // 2. AJAX提交表单（核心：接收JSON响应）
    $(function() {
        $("#submitBtn").click(function() {
            // 先执行前端校验
            if (!chkfile()) return;

            // 构建FormData（文件上传必须）
            const formData = new FormData($("#uploadForm")[0]);
            
            // AJAX提交
            $.ajax({
                url: "<?= site_url('admin/upload/image') ?>", // 上传接口地址
                type: "POST",
                data: formData,
                processData: false, // 禁止处理数据
                contentType: false, // 禁止设置Content-Type
                dataType: "json", // 预期返回JSON
                success: function(res) {
                    if (res.code === 0) {
                        // 上传成功：1. 更新预览 2. 回填到父页面
                        $("#img").attr("src", res.path); // 更新当前iframe的预览图
                        // 回填到产品编辑页的隐藏字段
                        if (window.parent && window.parent.document.getElementById('img_path')) {
                            window.parent.document.getElementById('img_path').value = res.path;
                            // 更新父页面预览
                            const preview = window.parent.document.getElementById('imgPreview');
                            if (preview) {
                                preview.innerHTML = `<img src="${res.path}" style="width:100px;height:auto;">`;
                            }
                        }
                        alert("上传成功！");
                        $("#upfile").val(""); // 清空文件选择框
                    } else {
                        // 上传失败：显示错误信息
                        $("#errorMsg").text(res.msg);
                    }
                },
                error: function(xhr, status, error) {
                    // 网络/接口错误
                    $("#errorMsg").text("上传失败：" + error);
                }
            });
        });
    });
    </script>
