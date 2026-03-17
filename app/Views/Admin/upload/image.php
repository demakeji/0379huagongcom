<form action="<?= site_url('admin/upload/image') . (isset($upurl_fix) ? '?' . $upurl_fix : '') ?>" method="post" enctype="multipart/form-data" onsubmit="return chkfile()" >
    <table>
        <tr>
            <td> 
                <input type="file" name="upfile" id="upfile" size="30" class="input" accept="image/jpeg,image/gif,image/png" >  
                <input type="submit" value="上传" style="cursor:pointer;" > <br/>
            </td>
            <td><img id="img" src="<?php echo empty($imagename) ? 'img/no_up_form1.jpg' : $imagename ?>" height="90"/>
                <?php echo empty($imagename) ? '' : '<a href="uploadimage.php?act=del">删除</a>' ?></td>
        </tr>
        <tr>
            <td cols="2" style="color:#555; font-size:12px; font-weight:normal;" align="left">建议上传不大于 200K 的 jpg,gif 格式图片</td>
        </tr>
    </table>
    </form>
    <script type="text/javascript" >
    function chkfile(){
        var file=document.getElementById("upfile");
        if(file.value){
            return true;
        }else{
            alert("请选择要上传的文件！");
            return false;
        }
    }
    </script>
