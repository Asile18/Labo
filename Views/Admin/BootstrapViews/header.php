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
