<style>
.type {
    display: block;
    margin: 10px 0;
}
</style>
<div>目前位置：首頁 > 分類網誌 > <span id='type'>健康新知</span></div>

<fieldset style="width:150px;display:inline-block;vertical-align:top">
    <legend>分類網誌</legend>

    <!-- a*4 -->
    <!-- 1.2.3.4是資料表建立的type欄位 -->
    <a href="#" class='type'>健康新知</a>
    <a href="#" class='type'>菸害防制</a>
    <a href="#" class='type'>癌症防治</a>
    <a href="#" class='type'>慢性病防治</a>
</fieldset>

<fieldset style="width:500px;display:inline-block">
    <legend>文章列表</legend>

</fieldset>

<script>
// 上方目前位置的文字
// 註冊事件

// 方法一：回呼函式
$('.type').on('click', function() {
    // 點下去 this代表那一個a標籤的DOM
    console.log($(this).text());
    $('#type').text($(this).text())
})

// 方法二：箭頭函式
// $('.type').on('click', (e) => {
// console.log(e);
// $('#type').text($(e.target).text())
// })

// 右方文章列表
function getList() {

}
</script>