<?php 
	
	require_once(__DIR__.'../../models/User.php');
	require_once(__DIR__.'../../models/Question.php');

	class Admin extends Controller {
		protected $user;
		protected $question;

		public function __construct($action, $request) {
			$this->user = new User();
			$this->question = new Question();
			parent::__construct($action, $request);
			if (empty(Session::get('user_id')) && !in_array($action, ['login', 'loginin', 'logout'])) {
				header('Location: '. SITE_URL.'admin/login');
			}
		}

		/**
	     * Renders Vievs
	     */
		public function renderView() {
			$view = $this->{$this->action}();
			$tpl = __DIR__.'../../views/'.$view['tpl'].'.php';
			$data = $view['data'];
			include_once (__DIR__.'../../views/admin/layout.php');
		}

		/**
	     * Display a Questions page
	     */
		public function index() {
			header('Location: '.SITE_URL.'admin/questions');
		}

		/**
	     * Display a login page
	     */
		public function login() {
			return ['tpl' => 'admin/login', 'data' => []];
		}

		/**
	     * After submit login in checks user and sets session
	     */
		public function loginIn() {
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$user = $this->user->getMember($username, $password);
			if ($user) {
				Session::set('user_id', $user['id']);
			}
			header('Location: '.SITE_URL.'admin');
		}

		/**
	     * User logout
	     */
		public function logout() {
			Session::unset('user_id');
			header('Location: '.SITE_URL.'admin');
		}

		/**
	     * Display the questions listing page
	     */
		public function questions() {
			$questions = $this->question->getAll();
			return ['tpl' => 'admin/quiz/questions/index', 'data' => ['questions' => $questions]];
		}

		/**
	     * Display form for add question 
	     */
		public function addQuestion() {
			return ['tpl' => 'admin/quiz/questions/add', 'data' => []];
		}

		/**
	     * Stores question in db
	     */
		public function storequestion() {
			$title = $_POST['title'];
			$type = (int) $_POST['type'];
			$this->question->store($title, $type);
			header('Location: '.SITE_URL.'admin/questions/index');
		}

		/**
	     * Display an answers list of the question
	     */
		public function answers() {
			$question_id = (int) $this->request['id'];
			$question = $this->question->getQuiestionById($question_id);
			if ($question['type'] == 1) {
				$answers = $this->question->getBinaryAnswer($question_id);
			} else {
				$answers = $this->question->getQuiestionAnswers($question_id);
			}

			return ['tpl' => 'admin/quiz/questions/answers', 'data' => ['question' => $question, 'answers' => $answers]];
		}

		/**
	     * Stores answer in db
	     */
		public function storeAnswer() {
			$question_id = (int) $_POST['question_id'];
			$type = (int) $_POST['type'];
			$post_answer = (int) $_POST['answer'];

			$question = $this->question->getQuiestionById($question_id);

			if ($type == 1) {
				$answer = $this->question->getBinaryAnswer($question_id);
				if ($answer) {
					$this->question->updateBinaryQuestion($answer['a_id'], $post_answer);
				} else {
					$this->question->insertBinaryQuestion($question_id, $post_answer);
				}
			}

			header('Location: '.SITE_URL.'admin/questions/index');

		}

		/**
	     * Display a form for multiple type question answers
	     */
		public function addAnswer() {
			$question_id = (int) $this->request['id'];
			return ['tpl' => 'admin/quiz/questions/add_answers', 'data' => ['question_id' => $question_id]];
		}

		/**
	     * stores multiple type questions answer in db
	     */
		public function storeMultiplesAnswer() {
			$question_id = (int) $_POST['question_id'];
			$title = $_POST['title'];
			$post_answer = isset($_POST['correct']) ? 1 : 0;

			$this->question->insertMultiplesQuestion($question_id, $title, $post_answer);

			header('Location: '.SITE_URL.'admin/answers/'.$question_id);
		}

		/**
	     * Delete answer
	     */
		public function deleteAnswer() {
			$id = (int) $_POST['id'];
			$this->question->deleteAnswer($id);
			exit();
		}

		/**
	     * Delete question
	     */
		public function deleteQuestion() {
			$id = (int) $_POST['id'];
			$this->question->deleteQuestion($id);
			exit();	
		}

	}


 ?>