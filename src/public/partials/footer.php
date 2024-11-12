<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xs-12">
                <div class="right-text-content">
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="logo">
                    <a href="index.html"><img src="/assets/images/tastybite-logo_processed.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-12">
                <div class="left-text-content">
                    <p>© Tous droits réservés
                        <br>Tasty Bite.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="assets/js/script.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Récupère tous les liens des onglets
        const tabLinks = document.querySelectorAll('#tabs ul li a');
        // Récupère tous les articles des onglets
        const tabContents = document.querySelectorAll('.tabs-content article');

        // Fonction pour activer un onglet
        function activateTab(tabIndex) {
            // Cacher tous les contenus des onglets
            tabContents.forEach(content => {
                content.classList.remove('active');
            });

            // Afficher le contenu de l'onglet actif
            tabContents[tabIndex].classList.add('active');

            // Mettre à jour la classe active sur les onglets
            tabLinks.forEach(link => {
                link.classList.remove('active');
            });
            tabLinks[tabIndex].classList.add('active');
        }

        // Écouteurs d'événements pour chaque onglet
        tabLinks.forEach((link, index) => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Empêche le comportement par défaut de l'ancre
                activateTab(index); // Active l'onglet correspondant
            });
        });

        // Active le premier onglet par défaut
        activateTab(0);
    });
    const hamburgerIcon = document.querySelector('#hamburgerIcon');
    const header = document.querySelector('.nav');

    hamburgerIcon.addEventListener("click", function() {
        if (header.classList.contains('unactive')) {
            header.classList.add('active');
            header.classList.remove('unactive');
        } else {
            header.classList.remove('active');
            header.classList.add('unactive');
        }
    });

    
</script>

</body>

</html>