
// Fonctionnalité : Système de fallback en cas d'indisponibilité du mailto

function showToast(message) {
    const toast = document.getElementById('toast');
    toast.textContent = message;
    toast.classList.add('show');
  
    // Disparaît après 5 secondes
    setTimeout(() => {
      toast.classList.remove('show');
    }, 5000);
}


let contactButton = document.getElementById("contact_button");
if(contactButton) {
    const contactButtons = document.querySelectorAll(".contact_button");
    const email = "florianneto95@gmail.com";

    contactButtons.forEach(button => {
    button.addEventListener("click", function(e) {
        e.preventDefault();
    
        // Création d’un lien mailto invisible
        const tempLink = document.createElement("a");
        tempLink.href = `mailto:${email}`;
        tempLink.style.display = "none";
        document.body.appendChild(tempLink);

        // Simule le clic
        tempLink.click();

        // Suppression du lien après le clic
        setTimeout(() => {
        document.body.removeChild(tempLink);

        // Fallback : on suppose qu’aucun client mail ne s’est ouvert
        navigator.clipboard.writeText(email).then(() => {
            showToast("Votre messagerie semble indisponible. Adresse e-mail copiée dans le presse-papier !");
          }).catch(() => {
            showToast("Impossible de copier l'adresse. Écrivez-moi à : " + email);
          });

        }, 800); // délai suffisant pour détecter une absence de réaction
        });
})
};

// Fonctionnalité : Fonction qui affiche les compétences

/* get le contenu du json */
fetch('./public/js/json/skills.json')
  .then(response => response.json())
  .then(data => {
    accordeonContent = data;
    /* lance la fonction au démarrage (ici car fetch = asychrone, n'est pris en compte que quand tout le reste est lu) */
    getAccordeonNewContent(radioAccordeonOptions);
})

/* selectionne le radio complet + le bloc content */
let radioAccordeonOptions = document.getElementsByName('accordeon_choice');
let dynamicContainer = document.getElementById('skills_dynamic_display');

/* pose les events */
radioAccordeonOptions.forEach(input => {
    input.addEventListener('change', () => {
        dynamicContainer.innerHTML = ''; // vide le container
        getAccordeonNewContent(radioAccordeonOptions); // injecte le nouveau contenu
    })
})

/* get la valeur du radio */
function getSelectedAccordeonRadio(radioAccordeon) {
    for (i = 0; i < radioAccordeon.length; i++) {
        if (radioAccordeon[i].checked) {
        return backgOptionChosen = radioAccordeon[i].value; //renvoie la valeur sélectionnée
        break;
        }
    }
    return null; //renvoie null par défaut si radio vide 
}

/* clean le content et injecte le nouveau séleectionné */
function getAccordeonNewContent(radioAccordeon) {
    let selectedOption = getSelectedAccordeonRadio(radioAccordeon);

    // switch avec ce qu'il faut faire pour chaque radio de l'accordeon
    switch(selectedOption) {
        case 'pratical_skills': {
            // 1. Organise les compétences par catégorie
            const groupedSkills = {
                'Gestion de projet': [],
                'Méthode': [],
                'Développement': [],
                'Langues': []
            };
        
            accordeonContent.skills.forEach(skill => {
                switch (skill.categorie.toLowerCase()) {
                    case 'dev':
                        groupedSkills['Développement'].push(skill); // si dans la catégorie, le copie dans le tableau
                        break;
                    case 'méthode':
                        groupedSkills['Méthode'].push(skill);
                        break;
                    case 'outil':
                        groupedSkills['Gestion de projet'].push(skill);
                        break;
                    case 'langue':
                        groupedSkills['Langues'].push(skill);
                        break;
                }
            });
        
            // 2. Affiche chaque groupe avec un titre
            for (const category in groupedSkills) { // pour chaque catégorie
                if (groupedSkills[category].length > 0) { // si contient au moins 1 élément
                    categoryContainer = document.createElement('div');
                    switch(category) {
                        case('Développement'):
                            categoryContainer.className = 'dev_card';
                            break;
                        case('Méthode'):
                            categoryContainer.className = 'organization_card';
                            break;
                        case('Gestion de projet'):
                            categoryContainer.className = 'tools_card';
                            break;
                        case('Langues'):
                            categoryContainer.className = 'languages_card';
                            break;
                    }

                    const title = document.createElement('h3');
                    title.textContent = category;
                    categoryContainer.appendChild(title);
        
                    groupedSkills[category].forEach(skill => {
                        const div = document.createElement('div');
                        div.className = 'card';
                        div.innerHTML = `
                            <h4>${skill.nom}</h4>
                            <p>${skill.niveau}</p>
                        `;
                        categoryContainer.appendChild(div);
                    });

                    dynamicContainer.appendChild(categoryContainer);
                }
            }
        
            break;
        }        

        case('education'): {
            container = document.createElement('div');
            accordeonContent.education.forEach(diploma => {
                const div = document.createElement('div');
                div.className = "education_card";
                div.innerHTML = `
                    <h3>${diploma.ecole}</h3>
                    <p>${diploma.date}</p>
                    <p>${diploma.diplome}</p>
                    `;
                container.appendChild(div);
            });
            dynamicContainer.appendChild(container);
            break;
        }

        case('pro_experiences'): {
            container = document.createElement('div');
            accordeonContent.experiences.forEach(experience => {
                const div = document.createElement('div');
                div.className = "experiences_card";
                if(experience.poste != "Freelance") {
                    div.innerHTML = `
                        <h3>${experience.poste} chez ${experience.entreprise}</h3>
                        <p>${experience.date}</p>
                        <p>${experience.missions}</p>
                        `;
                } else {
                    div.innerHTML = `
                        <h3>${experience.poste}</h3>
                        <p>${experience.date}</p>
                        <p>${experience.missions}</p>
                        `;
                }
                container.appendChild(div);
            });
            dynamicContainer.appendChild(container);
            break;
        }

        default: {
            break;
        }
    }

}


// Fonctionnalité : Fonction qui affiche les projets

/* get le contenu du json */
fetch('./public/js/json/projects.json')
  .then(response => response.json())
  .then(data => {
    projectsContent = data;
    getProjectsContent();
})

projetsContainer = document.getElementById('projects_content');

/* clean le content et injecte le nouveau séleectionné */
function getProjectsContent() {
    container = document.createElement('div');
    projectsContent.forEach(project => {
        const div = document.createElement('div');
        div.className = "project_card";
        if(project.url_online != null) {
            div.innerHTML = `
                    <div>
                        <img src='${project.url_logo}' alt="logo project ${project.nom}">
                    </div>
                    <div class="project_top">
                        <h3>${project.nom}</h3>
                        <div class="project_icon">
                            <a href="${project.url_online}" target="_blank"><img src="https://fneto-prod.fr/portfolio/img/external-link-icon.png"></a>
                            <a href="${project.url_github}" target="_blank"><img src="https://fneto-prod.fr/portfolio/img/github_icon.png"></a>
                        </div>
                    </div>
                <p>${project.description}</p>
                <div class="project_bottom">
                    <p>${project.date}</p>
                    <p>${project.langages}</p>
                </div>
                `;
        } else {
            div.innerHTML = `
                <div>
                    <img src='${project.url_logo}' alt="logo project ${project.nom}">
                </div>
                <div class="project_top">
                    <h3>${project.nom}</h3>
                    <div></div>
                </div>
            <p>${project.description}</p>
            <div class="project_bottom">
                <p>${project.date}</p>
                <p>${project.langages}</p>
            </div>
            `;
        }
        container.appendChild(div);
    })
    projetsContainer.appendChild(container);
}

/* Fonctionnalité : toogle lightmode */

const toggle = document.getElementById('toggle_lightmode');
toggle.addEventListener('click', () => {
  document.body.classList.toggle('dark');
});



