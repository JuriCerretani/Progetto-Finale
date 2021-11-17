<?php

require "../PHP/connection.php";
require "../PHP/coinmarketcap_api.php";
require "../PHP/assets.php";

if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){
  header("location: login.html");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="../CSS/wallet.css">
    <link rel="stylesheet" href="../CSS/main.css">
  </head>
  <body>
    <div class="wrapper">

      <!-- Header -->
      <div class="hero">
        <div class="navbar__content">
          <ul class="nav">
              <li><a class="link" href="../index.php">Home</a></li>
              <li><a class="link active" href="">Portafoglio</a></li>
          </ul>
          <div class="nav-btn">
            <?php if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){ ?>
              <a class="btn" href="login.html">Login</a>
              <a class="btn" href="register.html">Sign Up</a>
            <?php }else{ ?>
              <a class="btn" href="../PHP/logout.php">Logout</a>
              <a class="btn delete_user" href="../PHP/delete_user.php" onclick="if (confirm('Sei sicuro di voler eliminare questo account?')){return true;}else{event.stopPropagation(); event.preventDefault();};">Delete</a>
            <?php } ?>
          </div>
        </div>
      </div>

      <?php if ($data != null) { ?>
      <!-- Form-box sinistra -->
      <div class="form-box">
        <form method="post" action="../PHP/insert_coin.php" class="form-asset">
          <legend class="form-legend">Aggiungi un asset e monitora i tuoi investimenti !</legend>
          <label for="crypto_name">Criptovaluta</label>
          <input class="input" list="criptovaluta" name="crypto_name" required>
          <datalist id="criptovaluta">
            <?php foreach ($data as $arr) { ?>
            <option><?= $arr->name ?></option>
            <?php } ?>
          </datalist>
          <label for="usd">USD investiti?</label>
          <input class="input" id="usd" name="usd" required />
          <label for="price">A che prezzo?</label>
          <input class="input" id="price" name="price" required />
          <input class="btn" type="submit" name="submit" value="Aggiungi Criptovaluta" />
        </form>
      </div>

      <!-- Form-box destra -->
      <div class="form-box form-box-2">
        <form method="post" action="../PHP/insert_coin.php" class="form-asset">
          <legend class="form-legend">Non ricordi il prezzo della criptovaluta all'acquisto? Insersci quanto hai investito e quanti token possiedi !</legend>
          <label for="crypto_name" required>Criptovaluta</label>
          <input class="input" list="criptovaluta" name="crypto_name" required>
          <datalist id="criptovaluta">
            <?php foreach ($data as $arr) { ?>
            <option><?= $arr->name ?></option>
            <?php } ?>
          </datalist>
          <label for="usd">USD investiti?</label>
          <input class="input" id="usd" name="usd" required />
          <label for="value">Quanti token possiedi?</label>
          <input class="input" id="value" name="value" required />
          <input class="btn" type="submit" name="submit" value="Aggiungi Criptovaluta" />
        </form>
      </div>

      <!-- Content (Wallet) -->
      <div class="wallet">
        <?php if($result->num_rows < 1){ ?>
        <div class="title">
            <h3><?= $_SESSION['nickname'] ?> , il tuo portafoglio è vuoto!</h3>
            <h4>Aggiungi le criptovalute che hai comprato specificando il nome , quanti USD hai investito e a che prezzo erano.</h4>
        </div>
        <?php } else { ?>
          <div class="assets-box">
            <?php $sum = 0;
            foreach ($result as $coin) { ?>
            <div class="coin">
              <div class="center">
                <h2><?= $coin['crypto_name'] ?> (<?= $coin['symbol'] ?>)</h2>
              </div>
              <div class="info">
                <div class="coin__content">
                  <h3>Investimento</h3>
                  <p><?= $coin['usd'] ?> USD</p>
                </div>
                <div class="coin__content">
                  <h3>Prezzo di acquisto</h3>
                  <p><?= $coin['price'] ?> USD</p>
                </div>
              </div>
              <div class="info">
                <div class="coin__content">
                  <h3>Quantità</h3>
                  <p><?= $coin['value'].' '.$coin['symbol'] ?></p>
                </div>
                <div class="coin__content">
                  <h3>Prezzo corrente</h3>
                  <p><?php foreach ($data as $arr) {
                    if ($arr->name == $coin['crypto_name']) {
                      $quote = round($arr->quote->USD->price, 2);
                      echo $quote;
                    }
                  } ?> USD</p>
                </div>
              </div>
              <div class="center">
                <h3>Resoconto</h3>
                <?php
                $summary = round($coin['value']*$quote-$coin['usd'], 2);
                $sum += $summary;
                if ($summary>0) { ?>
                  <h3 class="bull">+<?= $summary ?> USD</h3>
                <?php } else { ?>
                  <h3 class="bear"><?= $summary ?> USD</h3>
                <?php } ?>
              </div>
              <div class="delete_coin"><a href="../PHP/delete_coin.php?id=<?= $coin['id'] ?>" onclick="if (confirm('Sei sicuro di voler eliminare questo asset?')){return true;}else{event.stopPropagation(); event.preventDefault();};" > <img width="25px" src="src/img/trash.png" alt="Elimina"> </a></div>
              </div>
            <?php } ?>
          </div>
          <div class="summary center">
            <h2>Sommario totale</h2>
            <?php if ($sum>=0) { ?>
              <h3 class="bull">+<?= $sum ?> USD</h3>
            <?php } else { ?>
              <h3 class="bear"><?= $sum ?> USD</h3>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
      <?php } else { ?>
        <div class="wallet">
          <div class="title">
            <h3>Numero di chiamate API al sito coinmarketcap.com superato, torna domani per continuare ad usare il sito.</h3>
          </div>
        </div>
      <?php } ?>

    </div>
    <!-- Footer -->
    <footer></footer>

  </body>
</html>
