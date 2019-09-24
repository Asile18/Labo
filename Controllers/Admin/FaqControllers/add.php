<?php
if(isset($_POST["faqAddButton"], $_POST["question"], $_POST["priority"], $_POST["answer"]))
{
    $question= trim($_POST["question"]);
    $answer= trim($_POST["answer"]);
    $priority= intval($_POST["priority"]);
    // $id= intval($_POST["id"]);
    // var

    if(preg_match("/^[A-Z][a-zA-Z0-9.-`´é'\s-€'à,]{0,244}$/",$question))
    {
        if(preg_match("/^[A-Z][a-zA-Z0-9.-`´é'\s-€'à,]{0,244}$/",$answer))
        {
                try 
                {
                    require_once("Models/FrequentlyAskedQuestions.php");
                    $newFaq= $faq->addFaq($question, $answer, $priority);
                   
                }
                catch(PDOException $e)
	            {
		            echo $e->getMessage();
	            }
    
        }
        else
        {
            echo "Answer must start with a capital letter";
            // "<p style=color:red;></p>";
            // var_dump($_POST["answer"]);
        }
    }
    else
    {
        echo "Question must start with a capital letter and end with a '?'";

    }
}
?>