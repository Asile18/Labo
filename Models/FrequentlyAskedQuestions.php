<?php 
require_once('Connection.php');
class FrequentlyAskedQuestions extends Connection{
	public function getAll (){
		$pdo = $this->dbConnection();
		$request = 'SELECT * FROM FAQ ORDER BY PRIORITY DESC';
		$object = $pdo->query($request);
		return $object->fetchAll(PDO::FETCH_ASSOC);
	}

	public function addFaq ($question, $answer, $priority){
		$pdo = $this->dbConnection();
		$request = 'INSERT INTO  faq (question, answer, priority) VALUES (:question, :answer, :priority)';
		$objects = $pdo->prepare($request);
		$objects->execute(array(
			'question'=> $question,
			'answer'=>$answer,
			'priority'=>$priority
		));
	}

	public function deleteFaq ($id){
		$pdo = $this->dbConnection();
		$request = 'DELETE FROM faq WHERE faqId=?';
		$objects = $pdo->prepare($request);
		$result = $objects->execute([$id]);
		// var_dump($result);
		// return $stmt->rowCount();
	}

	public function updateFaq ($id, $question, $answer, $priority){
		$pdo = $this->dbConnection();
		$request = 'UPDATE faq SET question=:question, answer= :answer, priority =:priority WHERE faqId=:faqId';
		$objects = $pdo->prepare($request);
		$objects->execute(
			array(
				'faqId'=>$id,
				'question'=> $question, 
				'answer'=> $answer, 
				'priority'=> $priority
			));
		// return $stmt->rowCount();
	}

	
 }
 $faq = new FrequentlyAskedQuestions();
 $con = new FrequentlyAskedQuestions();
?>
