<?php
if(isset($_POST['edit']))
{
    $error="";
    $question= trim($_POST["question"]);
    $answer= trim($_POST["answer"]);
    $priority= intval($_POST["priority"]);
    $id= intval($_POST["id"]);
        // var_dump($question, $answer, $priority, $id);
    if(preg_match("/^[A-Z][a-zA-Z0-9.-`´é'\s-€à,]{0,244}\?$/",$question))
    {
        if(preg_match("/^[A-Z][a-zA-Z0-9.-`´é'\s-€à,]{0,244}$/",$answer))
        {
                try 
                {
                    require_once("Models/FrequentlyAskedQuestions.php");
                    $updateFaq= $faq->updateFaq($id, $question, $answer, $priority);
                }
                catch(PDOException $e)
	            {
		            echo $e->getMessage();
	            }
            
        }

        else 
        {
            echo "Answer must start with a capital letter";

        }
    }
    else 
    {
        echo "Question must start with a capital letter and end with a '?'";
    }

}
   

?>

