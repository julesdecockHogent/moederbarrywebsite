<style>
  header {
    height: 30rem;
  }

  .header__content {
    display: none;
  }

  body {
    text-align:center;
  }

  input[type="text"],input[type="date"] { 

    max-width: none;
    width: 400px;
    height: 3rem;
  }

  textarea
  {
  	margin:0;
  	border:0;
  	padding:0;
  	display:inline-block;
  	vertical-align:middle;
  	white-space:normal;
  	background:none;
  	line-height:1;
  	font-size:13px;
  	font-family:Arial;
    background-color: #FFF;
    height: 20rem;
    width: 40rem;
    border: 1px solid lightgrey;
    padding: 1rem;
  }
</style>
<main>
  <section id="activiteiten" class="main__activiteiten">
  <?php

  if (isset($_SESSION["admin"]) && $_SESSION["admin"] == "jaman") {
    if (empty($_GET["eventid"])) {
      echo $events;
    } else {
      $date = date('Y-m-d', strtotime($editEvent["date"]));
      echo <<<editForm
      <form aciton="" method="POST">
        <input type="text" name="name" value="{$editEvent["name"]}" required /><br />
        <input type="date" name="dates" value="{$date}" required /><br />
        <input type="text" name="times" placeholder="hh:mm:ss" value="{$editEvent["time"]}" required /><br />
        <input type="text" name="location" value="{$editEvent["location"]}" required /><br />
        <input type="text" name="fbevent" placeholder="(Geen facebook event? -> vul https://www.facebook.com/moederbarry/ in!!)" value="{$editEvent["fbevent"]}" />https://www.facebook.com/moederbarry/<br />
        <input type="text" name="image" placeholder="(Geen afbeelding? -> vul ./assets/img/mb.jpg in!!!)" value="{$editEvent["image"]}" />./assets/img/mb.jpg<br />
        (BESCHRIJVING -> MINIMUM 100 KARAKTERS!!!)<br />
        <textarea name="description" required>{$editEvent["description"]}</textarea><br />
        <input type="submit" name="subedit">
      </form>
editForm;
    }
    if (isset($_GET["do"]) && $_GET["do"] == "add") {
      echo <<<addForm
      <form aciton="" method="POST">
        <input type="text" placeholder="Naam" name="name" required /><br />
        <input type="date" placeholder="Datum" name="dates" required /><br />
        <input type="text" placeholder="Uur van aanvang" name="times" required /><br />
        <input type="text" placeholder="Locatie" name="location" required /><br />
        <input type="text" placeholder="Facebook event link (niet ingevuld = link mb fb pagina)" name="fbevent" /><br />https://www.facebook.com/moederbarry/<br /><br />
        <input type="text" placeholder="(Geen afbeelding? -> vul ./assets/img/mb.jpg in!!!)" name="image" /><br />./assets/img/mb.jpg<br /><br />
        (BESCHRIJVING -> MINIMUM 100 KARAKTERS!!!)<br />
        <textarea placeholder="Beknopte beschrijving van het evenement" name="description" required></textarea><br />
        <input type="submit" value="Evenement toevoegen!" name="subadd">
      </form>
addForm;
    }
  } else {
    echo <<<adminlogin
    <form method="post" action="#">
      <input type="text" name="admun" placeholder="Username" required /><br />
      <input type="password" name="admpass" placeholder="password" required /><br />
      <input type="submit" name="admsub" value="login" /><br />
    </form>
adminlogin;

    if (isset($_POST["admsub"])) {
      if (isset($_POST["admun"]) && isset($_POST["admpass"])) {
        if ($_POST["admun"] == "MBadmin" && $_POST["admpass"] == "events@mb.be") {
          $_SESSION["admin"] = "jaman";
          header('location: index.php?page=admin');
        }
      }
    }
  }

  ?>
</section>
</main>
