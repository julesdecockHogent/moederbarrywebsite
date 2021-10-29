<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Website Moeder Barry, studentenvereniging.">
  <link rel="stylesheet" href="./assets/css/reset.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="shortcut icon" href="assets/img/favicon.png">
  <title>Moeder Barry</title>
</head>
<body>
  <header>
    <h1>Moeder Barry</h1>
    <nav>
      <div class="nav__container">
        <div class="nav__name">
          <a href="index.php">MOEDER BARRY</a>
        </div>
        <div class="nav__links">
          <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="#activiteiten">ACTIVITEITEN</a></li>
            <li><a href="#praesidium">PRAESIDIUM</a></li>
            <li><a href="#contact">CONTACT</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="header__content">
      <!-- <img src="./assets/img/logo.png" alt="Moeder Barry logo" /> -->
      <div class="header__quote">
        <h2>Moeder Barry</h2>
        <h3>Veni, Bibi, Vomui</h3>
      </div>
    </div>
  </header>
    <?php echo $content; ?>
  <footer>
    <div class="footer__container">
      <div>
        <h2>Locatie</h2>
        <p>
          James Ensorlaan 28,<br />9051 Sint-Denijs Westrem
        </p>
      </div>
      <div>
        <h2>Socials</h2>
        <a class="fbbutton" href="https://www.facebook.com/moederbarry/" style="overflow:hidden"><img src="./assets/img/fb.png" height="20" alt="fb icon" style="overflow:hidden"/></a>
        <a class="fbbutton" href="https://www.instagram.com/moederbarry/?hl=nl" style="overflow:hidden"><img src="./assets/img/ig.png" height="20" alt="ig icon" style="overflow:hidden"/></a>
      </div>
      <div>
        <h2>Rekening nummer</h2>
        <p>
          BE84 7380 4182 0459
        </p><p>&nbsp;</p>
        <h2>Email</h2>
        <p>
          <a href="mailto:info@moederbarry.be">info@moederbarry.be</a>
        </p>
      </div>
    </div>
    <div class="copy">
      Copyright &copy; Sam Amant - Moeder Barry 2018</br>
      <a class="disapear">sponsors door Jules Decock</a>
    </div>
  </footer>
  <script src="./js/main.js"></script>
</body>
</html>
