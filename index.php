
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./public/css/design-system.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">

  <script src="./public/js/js-functions.js" defer></script>

  <link rel="apple-touch-icon" sizes="180x180" href="https://fneto-prod.fr/portfolio/img/photo.png">
  <link rel="icon" type="image/png" sizes="32x32" href="https://fneto-prod.fr/portfolio/img/photo.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://fneto-prod.fr/portfolio/img/photo.png">

  <title>Florian Neto - Portfolio</title>
</head>

<body>

  <header>
    <div id="header_container">
      <div class="header_content">
          <img id="toggle_lightmode" src="https://fneto-prod.fr/portfolio/img/sun_icon.png" alt="Toggle lightmode">
      </div>
      <div class="header_content" id="name"><h3>Florian Neto</h3></div>
      <div class="header_content" id="social_icons">
        <a href="https://www.linkedin.com/in/florian-neto-751008b9/"><img src="https://fneto-prod.fr/portfolio/img/linkedin_icon.png" alt="Icone LinkedIn"></a>
        <a href="http://github.com/flo33377/"><img src="https://fneto-prod.fr/portfolio/img/github_icon.png" alt="Icone GitHub"></a>
      </div>
    </div>
  </header>

  <main id='content'>

    <!-- Partie du haut -->
    <div id="top_part">
      <h1>Florian Neto</h1>
      <h2>Développeur web en devenir.<br>En recherche d'alternance.</h2>
    </div>

    <div class="cta">
      <a href="https://fneto-prod.fr/portfolio/document/CV-FlorianNeto.pdf" download id="download_cv_button">Télécharger mon CV</a>
      <a href="https://github.com/flo33377/portfolio-2025" id="go_github_button">Voir les coulisses de ce site</a>
    </div>

    <!-- Partie à propos de moi -->
    <div id="about_me_part">

      <div id="aboutme_toppart">
        <img src="https://fneto-prod.fr/portfolio/img/photo.png" alt="Photo Florian Neto" id="aboutme_photo">
        <h3 id="aboutme_title">On fait connaissance ?</h3>
      </div>

      <div id="aboutme_text">
        <p>Chef de projet digital de formation, j'ai commencé le code en 2020 en me formant en autonomie sur les langages front (HTML, CSS, JavaScript) puis back (PHP, SQL), 
        au travers de différents projets personnels.
        <p>Passionné par ce domaine, je souhaite passer un cap et en faire mon métier.</p>
        <p><span class="bold highlight">C'est là que vous intervenez 🫵</span></p>
        <p>Comment ? En m'accueillant dans votre entreprise !</p>
        <p>Au travers d'une alternance 3 semaines entreprise, 1 semaine école, je peux enrichir vos équipes par <span class="bold">ma motivation, ma créativité et mon savoir-faire</span> grandissant.</p>

        <div class="description_cta">
          <a href="#" id="contact_button" class="contact_button">Contactez-moi !</a>
        </div>

      </div>

    </div>

    <!-- div qui encapsule accordeon + projects pour responsive -->
    <div id="skills_projects_content">

      <!-- Accordéon des compétences et expériences -->
      <div id="accordeon_full_bloc">
      <h3 class="title_category">Compétences et expériences</h3>
        <div id="accordeon_radio_bloc">

          <div class="accordeon_icon">
            <input type="radio" id="education" name="accordeon_choice" value="education">
            <label for="education"><img src="https://fneto-prod.fr/portfolio/img/education_icon.png" alt="Icône formation"></label>
          </div>

          <div class="accordeon_icon">
            <input type="radio" id="pratical_skills" name="accordeon_choice" value="pratical_skills" checked>
            <label for="pratical_skills"><img src="https://fneto-prod.fr/portfolio/img/skills_icon.png" alt="Icône compétences"></label>
          </div>

          <div class="accordeon_icon">
            <input type="radio" id="pro_experiences" name="accordeon_choice" value="pro_experiences">
            <label for="pro_experiences"><img src="https://fneto-prod.fr/portfolio/img/experiences_icon.png" alt="Icône expériences pro"></label>
          </div>

        </div>

          <div id="skills_dynamic_display">
            <!-- Contenu affiché dynamique en JS -->
          </div>

      </div>

      <!-- Projets personnels -->
      <div id="my_projects_part">
        <h3 class="title_category">Projets personnels</h3>

        <div id="projects_content"></div>
      
      </div>

    <!-- fin div encapsule accordeon + projects -->
    </div>


    <!-- Partie prise de contact -->
    <div id="contact_part">
      
      <h3>On prend contact ? 💬</h3>

      <div id="cta_contact">
        <div class="contact_card">
          <a href="https://wa.me/+33689633277">
            <img src="https://fneto-prod.fr/portfolio/img/phone_icon.png" alt="Icône téléphone">
            <p>Sur Whats'App</p>
          </a>
        </div>

        <div class="contact_card">
          <a href="#" class="contact_button">
            <img src="https://fneto-prod.fr/portfolio/img/email_icon.png" alt="Icône email">
            <p>Par email</p>
          </a>
        </div>
      </div>

    </div>

    <footer>
      <p>© Copyright 2025 - Florian Neto. Tous droits réservés.</p>
    </footer>

  </main>

  <!-- Nav bar -->
  <nav>

      <a href="./#about_me_part">
        <img src="https://fneto-prod.fr/portfolio/img/profile_icon.jpg" alt="Navigation - Qui suis-je ?">
      </a>

      <a href="./#my_projects_part">
        <img src="https://fneto-prod.fr/portfolio/img/project_icon.jpg" alt="Navigation - Projets personnels">
      </a>

      <a href="./#contact_part">
        <img src="https://fneto-prod.fr/portfolio/img/contact_icon.png" alt="Navigation - Me contacter">
      </a>

      <a href="./#header_container">
        <img src="https://fneto-prod.fr/portfolio/img/arrow_icon.jpg" alt="Navigation - Revenir en haut" id="nav_arrow">
      </a>

  </nav>

<!-- banner fallback en cas d'indispo mailto -->
<div id="toast" class="toast"></div>


</body>

</html>