<fieldset>
    <legend>
        目前位置：首頁 > 分類網誌 > <span id='type'>健康新知</span>
    </legend>

    <!-- table>(tr>th*3)tr>td*3 -->
    <table style="width:100%">
        <tr>
            <th width="20%">標題</th>
            <th width="60%">內容</th>
            <th></th>
        </tr>
        <!-- 被設定為要顯示的才顯示出來 -->
        <?php

        $total=$News->count();
        $div=5;
        $pages=ceil($total/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;

        $rows=$News->all(['sh'=>1]," Limit $start,$div");
        foreach($rows as $row):
        ?>
        <tr>
            <td><?=$row['title'];?></td>
            <td><?=mb_substr($row['news'],0,25);?>...</td>
            <td>
                <!-- 登入的才看得到讚 -->
                <?php
                if(isset($_SESSION['user'])){
                    echo "<a href='#' data-id='{$row['id']}' class='like'>讚</a>";
                }
                ?>
            </td>
        </tr>
        <?php endforeach;?>
    </table>

    <!-- 分頁 -->
    <div>
        <?php
        if(($now-1)>0){
            echo "<a href='?do=news&p=".($now-1)."'> &lt;</a>";
        }
        for($i=1;$i<=$pages;$i++){
            $size=($i==$now)?"24px":"16px";
            echo "<a href='?do=news&p=$i' style='font-size:$size'> $i </a>";
        }
        if(($now+1)<=$pages){
            echo "<a href='?do=news&p=".($now+1)."'> &gt;</a>";
        }
        ?>
    </div>

</fieldset>

<script>
$(".like").on("click", function() {
    let id = $(this).data('id');
    let like = $(this).text();
    switch (
        like) {
        case "讚":
            $(this).text("收回讚");
            break;
        case "收回讚":
            $(this).text("讚");
            break;
    }
})
</script>