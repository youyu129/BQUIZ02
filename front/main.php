<style>
.type {
    border: 1px solid #999;
    padding: 5px 10px;
    /* 方法一 讓格子不要重疊 */
    /* margin: 0 1px; */
    /* 方法二 讓線條往左重疊 */
    margin-left: -1px;
}

.types {
    display: flex;
    /* 校正左方偏移 */
    margin-left: 1px;
}

.texts {}

.text {
    width: 95%;
    /* min-height: calc(525px - ); */
    min-height: 450px;
    border: 1px solid #999;
    display: none;
}

.active {
    display: block;
}
</style>
<div class="types">
    <div class='type'>健康新知</div>
    <div class='type'>菸害防治</div>
    <div class='type'>癌症防治</div>
    <div class='type'>慢性病防治</div>
</div>
<div class="texts">
    <div class="text">
        1
    </div>
    <div class="text">
        2
    </div>
    <div class="text">
        3
    </div>
    <div class="text">
        4
    </div>
</div>

<script>
$(".type").on('click', function() {
    let idx = $(this).index();
    $(".text").removeClass('active');
    $(".text").eq(idx).addClass('active');
})
</script>