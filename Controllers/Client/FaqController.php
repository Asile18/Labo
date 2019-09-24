<?php 
require_once("Views/Faq/faq.php");
require_once("Models/FrequentlyAskedQuestions.php");
require_once("Controllers/Admin/FaqControllers/add.php");
require_once("Controllers/Admin/FaqControllers/delete.php");
require_once("Controllers/Admin/FaqControllers/update.php");

$faqArray=$faq->getAll();
$faqAllId=array();

for ($i=0; $i < count($faqArray); $i++) 
{ 
	if($_SESSION !=null)
	{
		if(isset($_SESSION["roleId"]))
		{
			if($_SESSION["roleId"] ==2 )
			{
				if( isset($_POST["id"]) && $_POST["id"] == $faqArray[$i]["faqId"]){
					$question = $_POST["question"];
					$answer = $_POST["answer"];
				}else{
				$question = $faqArray[$i]["question"];
				$answer = $faqArray[$i]["answer"];
				}

			echo '
			
			<div class="roomSearch">
				<div class="questionIcone">
					<i class="far fa-question-circle fa-lg"></i>
				</div>
				<div class="faq">
					<form action="" method="post">
						<label for=""><h3>Question: </label>
						<input size="80" type="text" name="question" value="'.$question.'" required ></h3>
						<label for="">Message: </label>
						<input size="80" type="text" name="answer" value="'.$answer.'" required>
						<label for=""><p><strong>Priority: </label><input type="number" min="1" max="10" name="priority" value="'.$faqArray[$i]["priority"].'" required></strong></p>
						<input type="submit" name="delete" value="Delete">
						<input type="submit" name="edit" value="Update">
						<input type="number" name="id" style="display:none" value="'.$faqArray[$i]["faqId"].'">
					</form>
					<p><?php $error ?></p>
					
				</div>
			</div>';
			}
			else 
			{
				echo 
				'<div class="roomSearch">
						<div class="questionIcone">
						 <i class="far fa-question-circle fa-lg"></i>
					 </div>
					 <div class="faq">
						   <h3 >'.$faqArray[$i]["question"].'</h3>
						 <p class="italic">'.$faqArray[$i]["answer"].'</p><br>
					</div>
				</div>';
			}

		}
		
		else 
		{
			echo 
			'<div class="roomSearch">
					<div class="questionIcone">
					 <i class="far fa-question-circle fa-lg"></i>
				 </div>
				 <div class="faq">
					   <h3 >'.$faqArray[$i]["question"].'</h3>
					 <p class="italic">'.$faqArray[$i]["answer"].'</p><br>
				</div>
			</div>';
		}
	}
	
	else 
	{
		echo 
		'<div class="roomSearch">
	   		 <div class="questionIcone">
				 <i class="far fa-question-circle fa-lg"></i>
	    	 </div>
			 <div class="faq">
		  		 <h3 >'.$faqArray[$i]["question"].'</h3>
				 <p class="italic">'.$faqArray[$i]["answer"].'</p><br>
			</div>
		</div>';
	}
	
}

// $newQuestion = $_POST["question"];
// $newAnswer = $_POST["answer"];


// if(isset($_POST["hostelName"], $_POST["hostelStars"], $_POST["add_postCode"],$_POST["add_number"],$_POST["add_streetName"],$_POST["add_country"],$_POST["coo_lat"],$_POST["coo_long"],$_POST["phone"],$_POST["email"],$_POST["pool"],$_POST["valet"],$_POST["roomService"],$_POST["touristTaxes"],$_POST["isDeleted"])){
	// if(trim($_POST["hostelName"]) != "" &&
	
 ?>
 
 