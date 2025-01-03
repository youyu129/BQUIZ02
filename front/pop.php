<style>
.detail {
    background: rgba(51, 51, 51, 0.8);
    color: #FFF;
    height: 300px;
    width: 400px;
    /* fixed 針對可視範圍定位 */
    /* absolute 針對parent(沒有的話是body)定位 */
    position: absolute;
    left: 10px;
    top: 10px;
    display: none;
    z-index: 9999;
    overflow: auto;
}
</style>

<fieldset>
    <!-- 修改為人氣文章區 -->
    <legend>目前位置：首頁 > 人氣文章區</legend>

    <!-- table>(tr>th*3)tr>td*3 -->
    <table style="width:100%">
        <tr>
            <th width="20%">標題</th>
            <th width="60%">內容</th>
            <!-- 新增人氣 -->
            <th>人氣</th>
        </tr>
        <!-- 被設定為要顯示的才顯示出來 -->
        <?php

        $total=$News->count();
        $div=5;
        $pages=ceil($total/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;

        // 加上排序
        $rows=$News->all(['sh'=>1]," order by `likes` desc Limit $start,$div");
        foreach($rows as $row):
        ?>
        <tr>
            <td class='row-title'><?=$row['title'];?></td>
            <td style="position:relative" class="row-content">
                <span class="title"><?=mb_substr($row['news'],0,25);?>...</span>
                <span class="detail">
                    <h2 style="color:skyblue"><?=$News::$type[$row['type']];?></h2>
                    <?=nl2br($row['news']);?>...
                </span>
            </td>
            <td>
                <?=$row['likes'];?>個人說<img src="./icon/02B03.jpg" alt="" style="width:25px">
                <!-- 登入的才看得到讚 -->
                <?php
                if(isset($_SESSION['user'])){
                    $chk=$Log->count(['news'=>$row['id'],'user'=>$_SESSION['user']]);
                    $like=($chk>0)?"收回讚":"讚";
                    echo "<a href='#' data-id='{$row['id']}' class='like'>$like</a>";
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
            // 要修改do=pop
            echo "<a href='?do=pop&p=".($now-1)."'> &lt;</a>";
        }
        for($i=1;$i<=$pages;$i++){
            $size=($i==$now)?"24px":"16px";
            echo "<a href='?do=pop&p=$i' style='font-size:$size'> $i </a>";
        }
        if(($now+1)<=$pages){
            echo "<a href='?do=pop&p=".($now+1)."'> &gt;</a>";
        }
        ?>
    </div>

</fieldset>

<script>
$(".like").on("click", function() {
    let id = $(this).data('id');
    let like = $(this).text();

    $.post("./api/like.php", {
        id
    }, () => {
        switch (like) {
            case "讚":
                $(this).text("收回讚");
                break;
            case "收回讚":
                $(this).text("讚");
                break;
        }
        location.reload();
    })
})

$(".row-title").hover(
    function() {
        $(this).next().children(".detail").show();
    },
    function() {
        $(this).next().children(".detail").hide();
    }
)

$(".row-content").hover(
    function() {
        $(this).children(".detail").show();
    },
    function() {
        $(this).children(".detail").hide();
    }
)
</script>