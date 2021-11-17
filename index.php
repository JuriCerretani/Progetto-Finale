<?php

session_start();

$config = require "config.php";
require "PHP/coinmarketcap_api.php";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/main.css">
  </head>
  <body>
    <div class="wrapper">

      <!-- Header -->
      <div class="hero">
        <div class="navbar__content">
          <ul class="nav">
              <li><a class="link active" href="#">Home</a></li>
              <li><a class="link" href="views/wallet.php">Portafoglio</a></li>
          </ul>
          <div class="nav-btn">
            <?php if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){ ?>
              <a class="btn" href="views/login.html">Login</a>
              <a class="btn" href="views/register.html">Sign Up</a>
            <?php }else{ ?>
              <a class="btn" href="PHP/logout.php">Logout</a>
              <a class="btn delete_user" href="PHP/delete_user.php" onclick="if (confirm('Sei sicuro di voler eliminare questo account?')){return true;}else{event.stopPropagation(); event.preventDefault();};">Delete</a>
            <?php } ?>
          </div>
        </div>
      </div>

      <!-- Home -->
      <div class="home">
        <?php if ($data != null ) { ?>
        <!-- Content (List) -->
        <div class="container">
          <ul class="responsive-table">
            <li class="table-header">
              <div class="col col-1">Rank</div>
              <div class="col col-2">Nome</div>
              <div class="col col-3">Simbolo</div>
              <div class="col col-4">Prezzo (USD)</div>
            </li>

            <?php foreach ($data as $arr) { ?>
              <?php if ($arr->cmc_rank<=100) { ?>
                <li class="table-row">
                  <div class="col col-1"><?php echo $arr->cmc_rank ?></div>
                  <div class="col col-2"><?php echo $arr->name ?></div>
                  <div class="col col-3"><?php echo $arr->symbol ?></div>
                  <div class="col col-4"><?php echo round($arr->quote->USD->price, 6) ?></div>
                </li>
              <?php } ?>
            <?php } ?>

          </ul>
        </div>

        <?php } else { ?>
          <h3 style="margin: 0 auto;text-align: center; max-width: 600px">Numero di chiamate API al sito coinmarketcap.com superato, torna domani per continuare ad usare il sito.</h3>
        <?php } ?>
      </div>

    </div>

    <!-- Footer -->
    <footer></footer>

  </body>
</html>
