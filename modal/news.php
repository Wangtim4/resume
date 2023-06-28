<?php
$do=$_GET['do']??'title';
include_once "../base.php";?>
<h3 class="text-center p-3"><?=$Str->addModalHeader;?></h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table class="text-center">
        <tr>
            <td><?=$Str->addModalcol[0];?>:</td>
            <td>
                <textarea name="text" style="width:700px;height:120px;"></textarea>
            </td>
        </tr>
        <tr>
            <td><?=$Str->addModalcol[1];?>:</td>
            <td>
                <textarea name="content" style="width:700px;height:120px;"></textarea>
            </td>
        </tr>
        <tr>
            <td><?=$Str->addModalcol[1];?>:</td>
            <td>
                <textarea name="time" style="width:700px;height:120px;"></textarea>
            </td>
        </tr>
    </table>
    <div class="text-center mt-2">
    <input type="hidden" name="table" value="<?=$do;?>">
        <input type="submit" value="新增" class="btn w-25 btn-primary me-5"><input type="reset" value="重置" class="btn btn-danger w-25">
    </div>
</form>