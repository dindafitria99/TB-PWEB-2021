<?php
include "config.php";
if (isset($_SESSION['tipe'])){
  header ("location:index.php");
}
?>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Login Absen Mahasiswa</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">

  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">


 <style>
  a {
      text-decoration: none;
    }
    body {
      background: radial-gradient(circle at top left, #98fb98 , #6495ed, #afeeee, #ffd700, #ff8c00, #f08080, #db7093, #fa8072);
      background-repeat: no-repeat;
      max-height: calc(100vh - 104px);
      height : 100vh;
    }
    label {
      font-family: "Raleway", sans-serif;
      font-size: 11pt;
    }
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
 <!-- Custom styles for this template -->
 <link href="assets/dist/css/floating-labels.css" rel="stylesheet">
  <link rel="shortcut icon" href="logounand.png" />


</head>
<body>
 
<body>
  <form class="form-signin" method="POST" action="cek_login.php">
    <div class="text-center mb-4">
      <!-- <img class="mb-4" src="assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
      <h1 class="h3 mb-3 font-weight-normal"><b>Form Login</b></h1>
      <p><b>Masukkan Username dan Password anda dengan Benar!</b></p>
    </div>

    <div class="form-label-group">
      <input type="text" class="form-control" name="username" placeholder="Masukkan Username Anda!" required autofocus>
      <label>Masukkan Username Anda!</label>
    </div>

    <div class="form-label-group">
      <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda!" required>
      <label>Masukkan Password Anda!</label>
    </div>
    


    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    
    <p class="mt-5 mb-3 text-muted text-center">&copy; TB Pemrograman WEB <?= date('Y') ?></p>
  </form>




</div> 
</div>

</body>
<script type="text/javascript">
  $(document).ready(function(){   
    $('.form-checkbox').click(function(){
      if($(this).is(':checked')){
        $('.form-password').attr('type','text');
      }else{
        $('.form-password').attr('type','password');
      }
    });
  });
</script>
</html>