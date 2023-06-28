<div class="mt-3">
    <div class="d-flex justify-content-between m-3">
        <h3 class="text-center"><?= $Str->header; ?></h3>
        <input type="button" class="btn btn-primary" onclick="op('#cover','#cvr','./modal/<?= $Str->table; ?>.php?do=<?= $Str->table; ?>')" value="<?= $Str->addBtn; ?>">
    </div>
    <form method="post" action="./api/edit.php">
        <table width="100%" class="text-center">
            <tbody>
                <tr class="bg-dark text-white p-3 fs-5">
                    <td width="15%"><?= $Str->tdHead[0]; ?></td>
                    <td width="20%"><?= $Str->tdHead[1]; ?></td>
                    <td width="20%"><?= $Str->tdHead[2]; ?></td>
                    <td width="30%"><?= $Str->tdHead[3]; ?></td>
                    <td width="5%">顯示</td>
                    <td width="5%">刪除</td>
                    <td width="5%"></td>
                </tr>
                <?php

                $all = $DB->math('count', "id");
                $div = 5;
                $pages = ceil($all / $div);
                $now = $_GET['p'] ?? 1;
                $start = ($now - 1) * $div;
                //select * from table limit 0,3   
                $rows = $DB->all(" limit $start,$div");
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td>
                            <input class="w-100" type="text" name="title[]" value="<?= $row['title']; ?>">
                        </td>
                        <td>
                            <input class="w-100" type="text" name="href[]" value="<?= $row['href']; ?>">
                        </td>
                        <td>
                            <img src="./img/<?= $row['img']; ?>" style="width:120px;heigh:80px;">
                        </td>
                        <td>
                            <textarea class="w-100" name="text[]" ><?= $row['text']; ?></textarea>
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input class="btn btn-secondary" type="button" value="<?= $Str->updateImg; ?>" onclick="op('#cover','#cvr','./modal/upload.php?id=<?= $row['id']; ?>&table=<?= $Str->table; ?>')">
                        </td>
                    </tr>
                    <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="cent">

            <?php
            if (($now - 1) > 0) {
                $p = $now - 1;
                echo "<a href='?do={$Str->table}&p=$p'> < </a>";
            }
            for ($i = 1; $i <= $pages; $i++) {
                $fontsize = ($now == $i) ? '1.5rem' : '';
                echo "<a href='?do={$Str->table}&p=$i' style='font-size:$fontsize'> ";
                echo $i;
                echo " </a>";
            }
            if (($now + 1) <= $pages) {
                $p = $now + 1;
                echo "<a href='?do={$Str->table}&p=$p'> > </a>";
            }
            ?>

        </div>
        <table style="margin-top:40px; width:100%;">
            <tbody>
                <tr>
                    <td class="cent">
                        <input type="submit" value="修改確定" class="btn btn-primary me-2"><input type="reset" value="重置" class="btn btn-danger">
                    </td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="table" value="<?= $do; ?>">
    </form>
</div>