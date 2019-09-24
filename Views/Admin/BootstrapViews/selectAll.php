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