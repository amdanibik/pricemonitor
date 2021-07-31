<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fabelio | Price Monitor</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>FABELIO</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Price Monitor Web APP</p>

      <form method="get" action="detail.php">
        <div class="input-group mb-3">
          <input type="text" name="link" class="form-control" placeholder="Fill with link product from fabelio">
          <input type="hidden" name="status" value="1">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-link"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="press" class="btn btn-primary btn-block">SUBMIT</button><br>
            <a href="list.php"><button type="button" class="btn btn-warning"><i class="fa fa-list"></i> List Products </button></a>
          </div>
          <!-- /.col -->
        </div>
        <br>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <b><u>Example Accepted Link from Fabelio : </u></b><br>https://fabelio.com/ip/fabelio-cloud-latex-mattress?bed_size=78
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>