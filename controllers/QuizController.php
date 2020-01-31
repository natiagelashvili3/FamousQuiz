<?php 
	
	require_once(__DIR__.'../../models/Question.php');

	class Quiz extends Controller {
		protected $data = [];
		protected $question;

		public function __construct($action, $request) {
			parent::__construct($action, $request);
			$this->question = new Question();
		}

		/**
	     * Display a binary quiz page
	     */
		public function binary() {
			Session::set('question', '');
			Session::set('score', 0);
			return ['tpl' => 'quiz/binary', 'data' => ['module' => 'binary']];
		}

		/**
	     * Display a Multiple quiz page
	     */
		public function multiple() {
			Session::set('question', '');
			Session::set('score', 0);
			return ['tpl' => 'quiz/multiple', 'data' => ['module' => 'multiple']];
		}

		/**
	     * returns single questions
	     */
		public function getquestion() {
			$type = (int) $_POST['type'];
			$question = $this->question->getQuiestion($type, Session::get('question'));

			if (!$question) {
				exit();
			}

			if ($type == 2) {
				$answers = $this->question->getQuiestionAnswers($question['id']);
			}
			$q = Session::get('question') ? Session::get('question').$question['id'].',' : $question['id'].',' ;
			Session::set('question', $q);
			include_once (__DIR__.'../../views/quiz/item.php');
			exit();
		}

		/**
	     * Checks answers of the question
	     */
		public function checkAnswer() {
			$type 		 = $_POST['type'];
			$question_id = $_POST['questionId'];
			$answer 	 = $_POST['answer'];

			if ($type == 1) {
				$data = $this->question->getBinaryAnswer($question_id);
				if ($answer == $data['correct']) Session::set('score', Session::get('score') + 1);
				echo $data['correct'];
				exit();
			} else if($type == 2) {
				$data = $this->question->getMultiplesAnswer($question_id);
				if ($answer == $data['a_id']) Session::set('score', Session::get('score') + 1);
				echo $data['a_id'];
			}

			exit();
		}

		/**
	     * Returns score from session
	     */
		public function getScore() {
			echo Session::get('score');
			exit();
		}

	
	}

 ?>