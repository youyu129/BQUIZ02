<fieldset>
    <legend>
        目前位置：首頁 > 問卷調查
    </legend>

    <table style="width:90%">
        <tr>
            <th>編號</th>
            <th width="60%">問卷題目</th>
            <th>投票總數</th>
            <th>結果</th>
            <th>狀態</th>
        </tr>

        <?php
        // main_id 為 0 的才是題目
        $rows=$Que->all(['main_id'=>0]);
        foreach($rows as $key =>$row):
        ?>

        <tr>
            <td class="ct"><?=$key+1;?>.</td>
            <td><?=$row['text'];?></td>
            <td class="ct"><?=$row['vote'];?></td>
            <td class="ct"><a href="?do=result&id=<?=$row['id'];?>">結果</a></td>
            <td class="ct">
                <?php
                if(!isset($_SESSION['user'])){
                    echo "請先登入";
                }else{
                    echo "<a href='?do=vote&id=<?={$row['id']}'>我要投票</a>";
                }
                ?>
            </td>
        </tr>
        <?php
        endforeach;
        ?>
    </table>
</fieldset>