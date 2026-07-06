<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing :)</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <!-- Feather icon -->
  <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <!-- Navbar Awal -->
    <nav class="navbar">
      <a href="/" class="navbar-logo">Delicious Cake.</a>
      <div class="navbar-nav">
        <a href="/">Home</a>
        <a href="menu">Menu</a>
        <a href="kategori">Kategori</a>
        <a href="about">Tentang Kami</a>
      </div>

      <div class="navbar-extra">
        <div class="container">
          <a href="login" class="btn login-btn">Login</a>
          <a href="register" class="btn register-btn">Register</a>
        </div>
      </div>
    </nav>
    <footer>
      
    </footer>
    <script src="js/script.js"></script>
    <script> feather.replace(); </script>
    @include('layouts.footer')
   </body>
</html>