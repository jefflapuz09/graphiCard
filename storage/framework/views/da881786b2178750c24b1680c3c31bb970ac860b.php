<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <?php if(count($comp) != 0 ): ?>
  <link rel="icon" href="<?php echo e(asset($comp->company_logo)); ?>">
  <title><?php echo e($comp->company_name); ?>-Admin</title>
  <?php else: ?> 
  <title>Admin</title>
  <?php endif; ?>
  <!-- Bootstrap core CSS-->
  <?php echo $__env->yieldContent('styles'); ?>
  <link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <<link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
  <!-- Page level plugin CSS-->
  <!-- <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->
  <!-- Custom styles for this template-->

  <link href="<?php echo e(asset('css/select2.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/sb-admin.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
  
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <?php if(count($comp) != 0 ): ?>
      <a class="navbar-brand" href="<?php echo e(url('/')); ?>" title="Go to website"><img src="<?php echo e(asset($comp->company_logo)); ?>" height="25px" style="margin-left:37px;  max-height:25px;"><?php echo e($comp->company_name); ?></a>
      <?php else: ?>
      <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="">Company Name</a>
      <?php endif; ?>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
     
  
        <?php echo $__env->yieldContent('content'); ?>
    </div>
  </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <?php if(count($comp) != 0 ): ?>
          <small>Copyright © <?php echo e($comp->company_name); ?></small>
          <?php else: ?>
          <small>Copyright © Company Name</small>
          <?php endif; ?>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/sb-admin.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
     <script>
        $(document).ready(function() {
          $('#example').DataTable( {
              "scrollX": true,
              responsive: true
          } );

          $('.select2').select2();
          
        } );

    </script>
    <?php echo $__env->yieldContent('script'); ?>
  </div>
</body>

</html>
