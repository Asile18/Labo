<style>
 /* Sidenav fixe, pleine hauteur */
.sidenav {
height: 100%;
width: 200px;
position: fixed;
z-index: 1;
top: 46px;
left: 0;
background-color: grey;
overflow-x: hidden;
padding-top: 78px;
}

/* Style les liens sidenav et le bouton déroulant*/
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  color: black;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: black;
}

/* Main content */
.main, .title {
  margin-left: 200px; /* Identique à la largeur du sidenav */
  padding: 0px 10px;
  font-size: 20px;
}

/* Ajouter une classe active au bouton déroulant actif */
.active {
  background-color: grey;
  color: black;
}

/* Conteneur déroulant (masqué par défaut). Facultatif: ajoutez une couleur de fond plus claire et un peu de remplissage à gauche pour modifier la conception du contenu de la liste déroulante */
.dropdown-container {
  display: none;
  background-color: grey;
  padding-left: 8px;
}

/* Facultatif: Style de l'icône d'insertion */
.fa-caret-down {
  float: right;
  padding-right: 8px;
} 

</style>

 <div class="sidenav">
  <a href="#">LIENS</a>

    <button class="dropdown-btn">HOTELS
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a href="?section=admin&subsection=hotels">Voir/modifier</a>
      <a href="#">Ajouter</a>
    </div>
  
    <button class="dropdown-btn">CHAMBRES
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a href="?section=admin&subsection=rooms">Voir/modifier</a>
      <a href="#">Ajouter</a>
    </div>
  
    <button class="dropdown-btn">SousMenu3
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  
</div> 

<h1 class="title">Tableau de bord admin</h1>

<script>
//* Parcourez tous les boutons déroulants pour alterner entre masquer et afficher le contenu de la liste déroulante - Ceci permet à l'utilisateur de disposer de plusieurs listes déroulantes sans aucun conflit. */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
} 
</script>