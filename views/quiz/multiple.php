<main>
	
	<div>
		<p class="question-cnt">Questions: <span id="cnt">0</span>/10</p>
		<div class="main-quiz main-quiz-2"></div>
		<div class="main-quiz-heading">
			<h1 class="quiz-title">Funny quiz for you and your friends!</h1>
		</div>
		<button class="btn primary quiz-start" onclick="quiz.start(2)">Start</button>
	</div>

	<div class="quiz-container">
		
	</div>

	<p id="answer"></p>
	<div class="btn-container">
		<button onclick="quiz.next(this)" id="next">Next</button>
	</div>

</main>