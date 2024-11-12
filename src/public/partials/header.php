<?php
// Ensure the session is started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <img src="assets/images/tastybite-logo.png">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav unactive">
                        <li class="scroll-to-section"><a href="/">Accueil</a></li>
                        <li class="scroll-to-section"><a href="/product">La Carte</a></li>
                        <li class="scroll-to-section"><a href="/contact">Contactez Nous</a></li>

                        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                            <li id="welcomeText" class="scroll-to-section"><a>Bienvenue, <?php echo htmlspecialchars($_SESSION['user_name']); ?></a></li>
                            <div id="dropdown">
                            <li class="scroll-to-section"><a href="/profile">Profile</a></li>
                                <li class="scroll-to-section"><a href="/logout">Déconnexion</a></li>
                            </div>
                            <!-- Basket/Cart Icon with Badge -->
                            <a class="nav-link basket" href="javascript:void(0);" id="basketIcon">
                                <i style="color:black;" class="fas fa-shopping-cart"></i>
                                <span class="badge badge-pill badge-danger" id="cart-count">0</span>
                            </a>

                            <!-- Dropdown Menu for Basket -->
                            <div id="basketDropdown" style="display:none;">
                                <ul>
                                    <li><a href="/cart">View Cart</a></li>
                                    <li><a href="/checkout">Checkout</a></li>
                                </ul>
                            </div>


                        <?php else: ?>
                            <li class="scroll-to-section"><a href="/login">Connexion</a></li>
                            <li class="scroll-to-section"><a href="/register">Inscription</a></li>
                        <?php endif; ?>
                    </ul>

                    <!-- ***** Menu End ***** -->
                </nav>

            </div>
        </div>
        <div id="hamburgerIcon">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->