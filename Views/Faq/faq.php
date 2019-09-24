<h1>Foire aux questions</h1>
<div class="searchBar">
    <form action="#" method="get">
        <?php
        
        if($_SESSION!=null)
        {
        //    var_dump($_SESSION);
           if(isset($_SESSION["roleId"]))
           {
                 if($_SESSION["roleId"]==2)
                {
                echo '<button type="button" onclick="showAdd()" id="buttonAdd"> Add Subject </button>';
                 }
           }
             else 
             {
            // echo 'pas de role';
             }
        }
        
        else 
        {

        }
        ?>
        
    </form>
</div>
<div class="roomSearch" id="addFaq" >
    <form action="" method="post">
        <label for="question">Question : </label>
        <input type="text"  placeholder="Type subject here" name="question" required value="<?=isset($_POST["question"])&& !isset($_POST["id"]) ? $_POST["question"] : "";?>"><br>
        <label for="question">Answer : </label>
        <input type="text" placeholder="Type answere here" name="answer" required value="<?=isset($_POST["answer"]) && !isset($_POST["id"]) ? $_POST["answer"] : "";?>"><br>
        <label for="priority">Priority : </label>
        <input type="number" placeholder="Type number between 0 and 10" name="priority" required value="<?=isset($_POST["priority"]) && !isset($_POST["id"]) ? $_POST["priority"] : "";?>"><br>
        <input type="submit" value="Add Faq" name="faqAddButton">
    </form>
</div>
<script src="Contents/js/faq.js"></script>


