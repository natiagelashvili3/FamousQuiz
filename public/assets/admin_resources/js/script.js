var btns = document.getElementsByClassName('deleted-items');
if (btns) {
	for (var i = 0; i < btns.length; i++) {
		btns[i].addEventListener('click', function() {
			var btn = this;
			var id = btn.getAttribute('data-id');
			if (confirm('Delete Question?')) {
				var xhr = new XMLHttpRequest();
				var data = new FormData();
				xhr.open("POST", 'http://quiz.test/admin/deleteAnswer', true);
				data.append('id', id);
				xhr.send(data);
				xhr.onload = function (e) {
					if (xhr.readyState === 4) {
						if (xhr.status === 200) {
							btn.parentNode.parentNode.remove();
						} else {
							console.error(xhr.statusText);
						}
					}
				};
			}
		});
	}
}


var q_btns = document.getElementsByClassName('delete-item');
if (q_btns) {
	for (var i = 0; i < q_btns.length; i++) {
		q_btns[i].addEventListener('click', function() {
			var btn = this;
			var id = btn.getAttribute('data-id');
			if (confirm('Delete Question?')) {
				var xhr = new XMLHttpRequest();
				var data = new FormData();
				xhr.open("POST", 'http://quiz.test/admin/deleteQuestion', true);
				data.append('id', id);
				xhr.send(data);
				xhr.onload = function (e) {
					if (xhr.readyState === 4) {
						if (xhr.status === 200) {
							btn.parentNode.parentNode.remove();
						} else {
							console.error(xhr.statusText);
						}
					}
				};
			}
		});
	}
}