var quiz = {
	type: null,
	cnt: 0,
	answers: null,
	endpoint: 10,
	colorWrong: "#eb4d4b",
	colorCorrect: "#6ab04c",
	completed: true,

	start: function(type) {
		this.type = type;
		this.load();
		this.increment();
		document.querySelector('.quiz-start').style.display = 'none';
		document.querySelector('.main-quiz').style.display = 'none';
		document.querySelector('.main-quiz-heading').style.display = 'none';
		document.querySelector('#next').style.display = 'inline-block';
	},

	increment: function() {
		++this.cnt
		document.querySelector('.question-cnt span').innerHTML = this.cnt;
		if (this.cnt == this.endpoint) {
			quiz.bindNextBtn('done', 'Done');
		}
	},

	bindNextBtn: function(className, text) {
		var next = document.getElementById('next');
		next.innerText = text;
		next.classList.add(className);
	},

	bindAnswers: function() {
		this.answers = document.getElementsByClassName('answer');
		for (var i = 0; i < this.answers.length; i++) {
			this.answers[i].addEventListener('click', function() {
				var questionId = this.parentNode.getAttribute('data-id');
				var answer = quiz.type == 1 ? this.getAttribute('data-value') : this.getAttribute('data-id');
				quiz.checkAnswer(this, questionId, answer);
			});
		}
	},

	load: function(){
		var xhr = new XMLHttpRequest();
		var data = new FormData();
		xhr.open("POST", 'http://quiz.test/quiz/getquestion', true);
		data.append('type', quiz.type);
		xhr.send(data);
		xhr.onload = function (e) {
			if (xhr.readyState === 4) {
				if (xhr.status === 200) {
					if (xhr.responseText) {
						document.querySelector('.quiz-container').innerHTML = xhr.responseText;
						quiz.bindAnswers();
					} else {
						quiz.bindNextBtn('done', 'Done');
						quiz.completed = false;
						document.querySelector('.quiz-container').innerHTML = "<h2 class='empty-s'>Sorry out of questions</h2>";
					}
				} else {
					console.error(xhr.statusText);
				}
			}
		};
	},

	checkAnswer: function(obj, questionId, answer) {
		var xhr = new XMLHttpRequest();
		var data = new FormData();
		xhr.open("POST", 'http://quiz.test/quiz/checkAnswer', true);
		data.append('type', quiz.type);
		data.append('questionId', questionId);
		data.append('answer', answer);
		xhr.send(data);
		xhr.onload = function (e) {
			if (xhr.readyState === 4) {
				if (xhr.status === 200) {
					obj.style.color = 'white';
					if (quiz.type == 1) {
						obj.style.backgroundColor = (answer == xhr.responseText ? quiz.colorCorrect : quiz.colorWrong) ;
					} else {
						if (answer != xhr.responseText) {
							obj.style.backgroundColor = quiz.colorWrong;
							var object_correct = document.querySelector('.answer.multi[data-id="'+xhr.responseText+'"]');
							object_correct.style.backgroundColor = quiz.colorCorrect;
							object_correct.style.color = 'white';
						} else {
							obj.style.backgroundColor = quiz.colorCorrect;
						}
					}

					quiz.disableAnswers();
				}
			}
		};
	},

	disableAnswers: function() {
		for (var i = 0; i < this.answers.length; i++) {
			this.answers[i].setAttribute('disabled', true);
		}
	},

	next: function(obj) {
		if (obj.classList.contains('start-again')) {
			window.location.reload();
		}
		if (obj.classList.contains('done')) {
			obj.classList.add('start-again');
			obj.innerText = "Start again";
			this.getScore();
			return;
		}
		this.increment();
		this.load();
	}, 

	getScore: function() {
		document.querySelector('.question-cnt').remove();
		var xhr = new XMLHttpRequest();
		var data = new FormData();
		xhr.open("POST", 'http://quiz.test/quiz/getScore', true);
		xhr.send();
		xhr.onload = function (e) {
			if (xhr.readyState === 4) {
				if (xhr.status === 200) {
					document.querySelector('.quiz-container').innerHTML = "<div class='score'>Score: "+xhr.responseText+"/"+(quiz.completed ? quiz.endpoint : quiz.cnt - 1)+"</div>";
				}
			}
		};
	}

}