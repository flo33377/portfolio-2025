
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./public/css/design-system.css/">

  <script src="./public/js/js-functions.js" defer></script>

  <link rel="apple-touch-icon" sizes="180x180" href="https://fneto-prod.fr/timecapsule/img/favicon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="https://fneto-prod.fr/timecapsule/img/favicon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://fneto-prod.fr/timecapsule/img/favicon.png">

  <title>Florian Neto - Portfolio</title>
</head>

<body>

  <header>
    <div id="header_container">
      <div class="header_content" id="name"><p>Florian Neto</p></div>
      <div class="header_content" id="social_icons">
        <a href="https://www.linkedin.com/in/florian-neto-751008b9/"><img src="https://fneto-prod.fr/portfolio/img/linkedin_icon.png" alt="Icone LinkedIn"></a>
        <a href="http://github.com/flo33377/"><img src="https://fneto-prod.fr/portfolio/img/github_icon.png" alt="Icone GitHub"></a>
      </div>
      <div class="header_content">
          <img id="toggle_lightmode" src="https://fneto-prod.fr/portfolio/img/sun_icon.png" alt="Toggle lightmode">
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
      <a href="" id="download_cv_button">Télécharger mon CV</a>
      <a href="" id="go_github_button">Voir les coulisses de ce site</a>
    </div>

    <!-- Partie à propos de moi -->
    <div id="about_me_part">
      <h3>On fait connaissance ?</h3>

      <img src="https://fneto-prod.fr/portfolio/img/photo.png" alt="Photo Florian Neto">

      <p>Florian Neto, 29 ans ! 🤝<br>
      Chef de projet digital de formation, j'ai commencé le code en 2020 en me formant en autonomie sur les langages front.<br>
      Grâce mon métier, j'ai pu côtoyer des développeurs qui m'ont fait grandir en me partageant leur passion, continué de me former en back, 
      et mis en application tout ça sur des projets personnels.<br>
      Passionné par ce domaine, je souhaite passer un cap et en faire mon métier.</p>
      <p>C'est là que vous intervenez 🫵<br>
      Comment ? En m'accueillant dans votre entreprise !
      Au travers d'une alternance 3 semaines entreprise, 1 semaine école, je peux enrichir vos équipes par ma motivation, ma créativité et mon savoir-faire grandissant.</p>
    </div>

    <div>
      <a href="mailto:florianneto95@gmail.com" class="contact_button">Contactez-moi !</a>
    </div>

    <!-- Accordéon des compétences et expériences -->
    <div id="accordeon_skills">

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

      <div id="skills_content">
        <!-- Contenu affiché dynamique en JS -->
      </div>

    </div>

    <!-- Projets personnels -->
    <div id="my_projects_part">
      <h3>Projets personnels</h3>

      <div id="projects_content"></div>
    
    </div>

    <!-- Partie prise de contact -->
    <div id="contact_part">
      
      <h3>On échange ? 💬</h3>

      <div id="cta_contact">
        <div>
          <a href="">
            <img src="https://fneto-prod.fr/portfolio/img/phone_icon.png" alt="Icône téléphone">
            <p>Sur Whats'App</p>
          </a>
        </div>

        <div>
          <a href="">
            <img src="https://fneto-prod.fr/portfolio/img/email_icon.png" alt="Icône email">
            <p>Par email</p>
          </a>
        </div>
      </div>

    </div>

    <footer>
      <p>Réalisé fièrement par Florian Neto</p>
      <p>© Copyright 2025 - Florian Neto. Tous droits réservés.</p>
    </footer>

  </main>

  <!-- Nav bar -->
  <nav>
    <div>

      <a href="">
        <img src="https://fneto-prod.fr/portfolio/img/profile_icon.jpg" alt="Navigation - Qui suis-je ?">
      </a>

      <a href="">
        <img src="https://fneto-prod.fr/portfolio/img/project_icon.jpg" alt="Navigation - Projets personnels">
      </a>

      <a href="">
        <img src="https://fneto-prod.fr/portfolio/img/contact_icon.png" alt="Navigation - Me contacter">
      </a>

      <a href="">
        <img src="https://fneto-prod.fr/portfolio/img/arrow_icon.jpg" alt="Navigation - Revenir en haut">
      </a>

    </div>
  </nav>

</body>

</html>