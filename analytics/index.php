
<!DOCTYPE html>
<html lang="fr">

<?php
// dépendances
include_once(__DIR__ . "/src/analytics_system.php");
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./../public/css/design-system.css">
  <link rel="stylesheet" href="./../public/css/analytics_page.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">

  <script src="./../public/js/analytics-js-functions.js" defer></script>

  <link rel="apple-touch-icon" sizes="180x180" href="https://fneto-prod.fr/portfolio/img/photo.png">
  <link rel="icon" type="image/png" sizes="32x32" href="https://fneto-prod.fr/portfolio/img/photo.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://fneto-prod.fr/portfolio/img/photo.png">

  <title>Interface de monitoring : Florian Neto - Portfolio</title>
</head>


<body>

  <header>
    <div id="header_container">
      <div class="header_content">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="toggle_lightmode">
          <path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/>
        </svg>
      </div>
      <div class="header_content" id="name"><a href='<?= BASE_URL ?>'><h3>Florian Neto</h3></a></div>
      <div class="header_content" id="social_icons">
        <a href="https://www.linkedin.com/in/florian-neto-751008b9/">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M20.47,2H3.53A1.45,1.45,0,0,0,2.06,3.43V20.57A1.45,1.45,0,0,0,3.53,22H20.47a1.45,1.45,0,0,0,1.47-1.43V3.43A1.45,1.45,0,0,0,20.47,2ZM8.09,18.74h-3v-9h3ZM6.59,8.48h0a1.56,1.56,0,1,1,0-3.12,1.57,1.57,0,1,1,0,3.12ZM18.91,18.74h-3V13.91c0-1.21-.43-2-1.52-2A1.65,1.65,0,0,0,12.85,13a2,2,0,0,0-.1.73v5h-3s0-8.18,0-9h3V11A3,3,0,0,1,15.46,9.5c2,0,3.45,1.29,3.45,4.06Z"/></svg>
        </a>
        <a href="http://github.com/flo33377/">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,2.2467A10.00042,10.00042,0,0,0,8.83752,21.73419c.5.08752.6875-.21247.6875-.475,0-.23749-.01251-1.025-.01251-1.86249C7,19.85919,6.35,18.78423,6.15,18.22173A3.636,3.636,0,0,0,5.125,16.8092c-.35-.1875-.85-.65-.01251-.66248A2.00117,2.00117,0,0,1,6.65,17.17169a2.13742,2.13742,0,0,0,2.91248.825A2.10376,2.10376,0,0,1,10.2,16.65923c-2.225-.25-4.55-1.11254-4.55-4.9375a3.89187,3.89187,0,0,1,1.025-2.6875,3.59373,3.59373,0,0,1,.1-2.65s.83747-.26251,2.75,1.025a9.42747,9.42747,0,0,1,5,0c1.91248-1.3,2.75-1.025,2.75-1.025a3.59323,3.59323,0,0,1,.1,2.65,3.869,3.869,0,0,1,1.025,2.6875c0,3.83747-2.33752,4.6875-4.5625,4.9375a2.36814,2.36814,0,0,1,.675,1.85c0,1.33752-.01251,2.41248-.01251,2.75,0,.26251.1875.575.6875.475A10.0053,10.0053,0,0,0,12,2.2467Z"/></svg>
        </a>
      </div>
    </div>
  </header>

  <main id='content'>

  <?php
/* echo '<pre>';
print_r($_SESSION);
echo '<pre>'; */
?>

<?php if((!isset($_SESSION['admin_access_granted']) || $_SESSION['admin_access_granted'] !== true) 
&& ($notification_message != "demo" && $notification_message != "granted")) : ?>
  <div id="authentification_content">
    <div id="authentification_form_bloc">
      <h3>Pour accéder à l'interface de suivi, authentifiez-vous :</h2>
      <form action='<?= BASE_URL ?>analytics/' method='POST'>
      <input type='hidden' id='password_proposition' name='password_proposition' required />
        <label>Mot de passe :</label>
        <input type='password' id='password' name='password' required />

        <?php if($notification_message !== null) : echo $notification_message; endif ?>

        <div class="cta"><input type="submit" value="Continuer" class="main_cta" id="submit_button"></div>
      </form>
    </div>

    <div id="demo_link_bloc">
      <h3>Ou bien utilisez le lien de démo :</h3>
      <div class="cta"><a href='<?= BASE_URL ?>analytics/?mode=demo'>Lien de démo</a></div>
    </div>

  </div>

  <?php else : ?>

    <?php include_once(__DIR__ . "/src/content/analytics_interface.php"); ?>

  <?php endif ?>


  </main>


  <footer>
    <p>© Copyright 2025 - Florian Neto. Tous droits réservés.</p>
  </footer>

</body>

</html>