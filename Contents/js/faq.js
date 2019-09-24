
    var addModule = document.getElementById("addFaq")
    var addModuleNone= addModule.style.display="none";
    console.log(addModule);
    console.log(addModuleNone);
    function showAdd()
    {
        if(addModule.style.display ==="none")
        {
            addModule.style.display ="block";
            let buttonAdd= document.getElementById("buttonAdd");
            buttonAdd.innerHTML="Close addition window";

        }
        else 
        {
            addModule.style.display ="none";
            buttonAdd.innerHTML="Add Subject";
        }
    }
