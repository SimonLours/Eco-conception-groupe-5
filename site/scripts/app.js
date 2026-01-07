document.addEventListener("DOMContentLoaded", () => {
    
    // 1. Gestion du Menu Mobile
    const menuIcon = document.querySelector(".menu-icon");
    const navLinks = document.querySelector(".nav-links");
    if (menuIcon) {
        menuIcon.addEventListener("click", () => {
            navLinks.classList.toggle("active");
        });
    }

    // 2. Initialisation du Slider (si présent)
    const sliderSection = document.getElementById("slider-section");
    if (sliderSection) {
        initSlider();
    }

    // 3. Chargement des Produits (page produits.php)
    const container = document.getElementById("container");
    if (container && window.location.pathname.includes("produits.php")) {
        loadProducts();
    }

    // 4. Chargement des Selects Admin (page administration.php)
    const containerModif = document.querySelector(".containerModifProduit");
    if (containerModif) {
        loadAdminSelects();
    }

    // 5. Chargement du contenu Accueil (page index.php)
    const accueilContainer = document.getElementById("accueil-container");
    if (accueilContainer) {
        loadAccueil();
    }

    // 6. Gestion des Onglets (Page Connexion)
    const onglets = document.querySelectorAll(".onglet a");
    if (onglets.length > 0) {
        onglets.forEach(lien => {
            lien.addEventListener("click", function(e) {
                e.preventDefault();
                
                // Gestion de la classe active sur l'onglet
                document.querySelectorAll(".onglet").forEach(onglet => onglet.classList.remove("active"));
                this.parentElement.classList.add("active");

                // Affichage du bon formulaire
                const targetId = this.getAttribute("href").substring(1); // Enlève le #
                const loginForm = document.getElementById("login");
                const registerForm = document.getElementById("sinscrire");

                if (loginForm && registerForm) {
                    loginForm.style.display = "none";
                    registerForm.style.display = "none";
                    document.getElementById(targetId).style.display = "block";
                }
            });
        });
    }

    // 7. Initialisation des formulaires AJAX (Connexion / Inscription)
    initAuthForms();
});

/* --- FONCTIONS --- */

function initSlider() {
    fetch("data.xml")
        .then(response => response.text())
        .then(str => (new DOMParser()).parseFromString(str, "text/xml"))
        .then(xml => {
            const slides = xml.querySelectorAll("slide");
            const sliderContainer = document.getElementById("slider-section");
            let htmlContent = "";

            slides.forEach((slide, index) => {
                const image = slide.querySelector("image").textContent;
                const description = slide.querySelector("description").textContent;
                const activeClass = (index === 0) ? "active" : "";
                const loadingAttr = (index === 0) ? "" : 'loading="lazy"';

                htmlContent += `
                    <div class="slide ${activeClass}">
                        <img src="${image}" alt="${description}" ${loadingAttr}>
                        <div class="slide-desc">${description}</div>
                    </div>`;
            });

            sliderContainer.innerHTML = htmlContent;
            
            // Changement automatique de slide toutes les 5 secondes
            setInterval(nextSlide, 5000);
        })
        .catch(err => console.error("Erreur slider:", err));
}

function nextSlide() {
    const slides = document.querySelectorAll(".slide");
    if (slides.length === 0) return;

    let activeIndex = 0;
    slides.forEach((slide, index) => {
        if (slide.classList.contains("active")) {
            slide.classList.remove("active");
            activeIndex = index;
        }
    });

    const nextIndex = (activeIndex + 1) % slides.length;
    slides[nextIndex].classList.add("active");
}

function loadProducts() {
    fetch("controleur/initFormListeProduits.php")
        .then(response => response.text())
        .then(html => {
            document.getElementById("container").innerHTML = html;
        })
        .catch(err => console.error("Erreur produits:", err));
}

function loadAdminSelects() {
    // Charge le select pour la modification
    fetch("controleur/initSelectModifProduit.php")
        .then(response => response.text())
        .then(html => {
            document.getElementById("rowModificationProduit").innerHTML = html;
        });

    // Charge le select pour la suppression
    fetch("controleur/initSelectSuprProduit.php")
        .then(response => response.text())
        .then(html => {
            document.getElementById("rowSuppression").innerHTML = html;
        });
}

function loadAccueil() {
    fetch("controleur/initIndex.php")
        .then(response => response.text())
        .then(html => {
            const container = document.getElementById("accueil-container");
            if (container) {
                container.innerHTML = html;
            }
        })
        .catch(err => console.error("Erreur accueil:", err));
}

/**
 * Gestion AJAX des formulaires de connexion et d'inscription
 * Remplace la soumission classique pour éviter le rechargement de page
 */
function initAuthForms() {
    
    // --- Formulaire Connexion ---
    const loginForm = document.getElementById('login');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Empêche le rechargement
            const formData = new FormData(this);
            
            fetch('controleur/traitementFormConnexion.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // Attend du JSON en réponse
            .then(data => {
                const errSpan = loginForm.querySelector('.err');
                
                if (data.success) {
                    // Redirection vers l'accueil ou dashboard si succès
                    window.location.href = 'index.php'; 
                } else {
                    // Affichage de l'erreur
                    if(errSpan) {
                        errSpan.innerHTML = '<span style="color:red">' + data.message + '</span>';
                    } else {
                        alert(data.message);
                    }
                }
            })
            .catch(error => console.error('Erreur AJAX Connexion:', error));
        });
    }

    // --- Formulaire Inscription ---
    const registerForm = document.getElementById('sinscrire');
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Empêche le rechargement
            const formData = new FormData(this);
            
            fetch('controleur/traitementFormInscription.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // Attend du JSON en réponse
            .then(data => {
                const errSpan = registerForm.querySelector('.err');
                
                if (data.success) {
                    // Succès : on peut recharger pour afficher l'utilisateur connecté ou rediriger
                    alert(data.message);
                    window.location.href = 'connexion.php'; // Ou recharger la page
                } else {
                    // Affichage de l'erreur
                    if(errSpan) {
                        errSpan.innerHTML = '<span style="color:red">' + data.message + '</span>';
                    } else {
                        alert(data.message);
                    }
                }
            })
            .catch(error => console.error('Erreur AJAX Inscription:', error));
        });
    }
}