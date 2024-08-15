<?php session_start() ?>

<!-- Menu -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php?p=index" style="position:relative; margin-left: 20px">Dubbies the Drug Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="position:relative; margin-left:850px">
    <div class="navbar-nav" method="post">
      <a class="nav-item nav-link" href="index.php?p=home">Home </a>
      <a class="nav-item nav-link" href="index.php?p=about">About </a>
      <a class="nav-item nav-link" href="index.php?p=contact">Contact </a>

      <a class="nav-item nav-link" href="index.php?p=cart">Cart</a>
      <?php
      if (isset($_SESSION["user_name"])) {
        echo "<a class='nav-item nav-link' href='index.php?p=out'>Logout</a>";
        echo "<a class='nav-item nav-link' style='border-radius: 2px; border: 1px solid #1b7cde; color:white;background-color:#1b7cde'
                href='index.php?p=user'>" . $_SESSION["user_name"] . "</a>";
      } else {
        echo "<a class='nav-item nav-link' href='index.php?p=log'>Login</a>"; #index.php?p=log'
      }
      ?>

    </div>
    
  </div>
</nav>

<!-- js bootstrap navbar -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>