// JavaScript Document
function lo(th, url) {
	$.ajax(url, { cache: false, success: function (x) { $(th).html(x) } })
}
function good(id, type, user) {
	$.post("back.php?do=good&type=" + type, { "id": id, "user": user }, function () {
		if (type == "1") {
			$("#vie" + id).text($("#vie" + id).text() * 1 + 1)
			$("#good" + id).text("收回讚").attr("onclick", "good('" + id + "','2','" + user + "')")
		}
		else {
			$("#vie" + id).text($("#vie" + id).text() * 1 - 1)
			$("#good" + id).text("讚").attr("onclick", "good('" + id + "','1','" + user + "')")
		}
	})
}

function logout() {
	$.get("api/logout.php", function () {
		// 方法二：一律到首頁
		location.href = 'index.php';

		// 方法一：重整當前頁
		// location.reload();
	})
}