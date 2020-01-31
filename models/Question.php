<?php 
	
	class Question extends Model{
		
		public function getQuiestion($type, $not_query = '') {
			return $this->fetchSingle('SELECT q.* 
										 FROM questions q
								   INNER JOIN answers a ON a.question_id = q.id 
										WHERE q.type = '.$type.' '.( $not_query ? ' AND q.id NOT IN ('.rtrim($not_query, ',').')' : '' ).' ORDER BY RAND() LIMIT 1 ');
		}

		public function getQuiestionById($id) {
			return $this->fetchSingle('SELECT * FROM questions WHERE id = '.$id);
		}

		public function getQuiestionAnswers($question_id) {
			return $this->fetchData('SELECT * FROM answers WHERE question_id = '.$question_id);
		}

		public function getBinaryAnswer($question_id) {
			return $this->fetchSingle('SELECT q.id, q.type, q.title, a.correct, a.id as a_id
								   	   FROM questions q
								 INNER JOIN answers a ON a.question_id = q.id
								      WHERE q.type = 1 AND q.id = '.$question_id);
		}

		public function getMultiplesAnswer($question_id) {
			return $this->fetchSingle('SELECT q.id, q.type, q.title, a.correct, a.id as a_id, a.title as a_title
								   	   FROM questions q
								 INNER JOIN answers a ON a.question_id = q.id
								      WHERE a.correct = 1 AND q.id = '.$question_id);
		}

		public function getAll() {
			return $this->fetchData('SELECT * FROM questions ORDER BY id DESC');
		}

		public function store($title, $type) {
			$query = "INSERT INTO questions (title, type) VALUES (?,?)";
			$stmt= $this->conn->prepare($query);
			$stmt->execute([$title, $type]);
		}

		public function updateBinaryQuestion($id, $correct) {
			$query = "UPDATE answers SET correct=:correct WHERE id=:id";
			$stmt= $this->conn->prepare($query);
			$stmt->execute(['correct' => $correct, 'id' => $id]);
		}

		public function insertBinaryQuestion($question_id, $correct) {
			$query = "INSERT INTO answers (question_id, correct) VALUES (?,?)";
			$stmt= $this->conn->prepare($query);
			$stmt->execute([$question_id, $correct]);
		}

		public function insertMultiplesQuestion($question_id, $title, $correct) {
			$query = "INSERT INTO answers (question_id, title, correct) VALUES (?,?,?)";
			$stmt= $this->conn->prepare($query);
			$stmt->execute([$question_id, $title, $correct]);
		}

		public function deleteAnswer($id) {
			$sql = "DELETE FROM answers WHERE id =  :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id', $id);	
			$stmt->execute();
		}

		public function deleteQuestion($id) {
			$sql = "DELETE FROM questions WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id', $id);	
			$stmt->execute();

			$sql = "DELETE FROM answers WHERE question_id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id', $id);	
			$stmt->execute();
				
		}

	}


 ?>