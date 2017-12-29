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
  
  <link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Page level plugin CSS-->
  <!-- <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->
  <!-- Custom styles for this template-->
  <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="<?php echo e(asset('css/sb-admin.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/jquery.dataTables.min')); ?>" rel="stylesheet">
  
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo e(url('/admin')); ?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>

        <?php if((Auth::user()->role)==1): ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="<?php echo e(url('/Feedback')); ?>">
              <i class="fa fa-comments"></i>
              <span class="nav-link-text">Feedback</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Maintenance</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Service</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="<?php echo e(url('/Category')); ?>">Service Category</a>
                </li>
                <li>
                  <a href="<?php echo e(url('/ServiceType')); ?>">Item</a>
                </li>
              </ul>
              <a class="nav-link" href="<?php echo e(url('/Customer')); ?>">
                <span class="nav-link-text">Customer</span>
              </a>
            </li>
          </ul>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
              <a class="nav-link" href="<?php echo e(url('/Post')); ?>">
                <i class="fa fa-paste"></i>
                <span class="nav-link-text">Post</span>
              </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="<?php echo e(url('/Utilities')); ?>">
                  <i class="fa fa-cog"></i>
                  <span class="nav-link-text">Utilities</span>
                </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                  <a class="nav-link" href="<?php echo e(url('/User')); ?>">
                    <i class="fa fa-user"></i>
                    <span class="nav-link-text">User</span>
                  </a>
          </li>
          <?php elseif((Auth::user()->role)==2): ?>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="<?php echo e(url('/Post')); ?>">
              <i class="fa fa-paste"></i>
              <span class="nav-link-text">Post</span>
            </a>
          </li>
          <?php endif; ?>
          </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
       
       
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i><?php echo e(Auth::user()->name); ?></a>
        </li>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo e(route('logout')); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/jquery.dataTables.min')); ?>"></script>
    <script src="<?php echo e(asset('js/sb-admin.min.js')); ?>"></script>


     <script>
        $(document).ready(function() {
          $('#example').DataTable( {
              "scrollX": true
          } );
        } );

    </script>
  </div>
</body>

</html>
