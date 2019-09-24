<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Projet Labo">
  <meta name="author" content="Evoliris Full STack Dev">
  <title>GestHotel Admin</title>
  <link href="css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="index.html">GestHotel Admin</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
  </nav>

<div id="wrapper">
    <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Hotels/Chambres</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Hotels:</h6>
            <a class="dropdown-item" href="blank.html">Voir/modifier</a>
            <a class="dropdown-item" href="blank.html">Ajouter</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Chambres:</h6>
            <a class="dropdown-item" href="blank.html">Voir/modifier</a>
            <a class="dropdown-item" href="blank.html">Ajouter</a>
          </div>
        </li>
      </ul>
<div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Tableau de Bord</a>
          </li>
          <li class="breadcrumb-item active">GESTION HOTEL</li>
        </ol>
        <!-- Page Content -->
   		<h1>GESTION HOTEL</h1>
        <hr>
      </div>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Liste:</div>
          <div class="card-body">
            <div class="table-responsive">
				<?= $table ?>
            </div>
          </div>
          <div class="card-footer small text-muted">DATE ET HEURE DE LA DERNIERE MAJ</div>
        </div>
      </div>
      <!-- /.container-fluid -->
            <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Projet Labo 2019</span>
          </div>
        </div>
      </footer>
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Bootstrap core JavaScript-->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="js/jquery.easing.min.js"></script>
  <!-- Page level plugin JavaScript-->
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <!-- Demo scripts for this page-->
  <script src="js/datatables-demo.js"></script>
</body>
</html>
