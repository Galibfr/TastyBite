
<body style="background:url('../assets/images/chicken-haleem.jpg')">
  
  <div class="wrapper">
    <?php  //svar_dump($message); ?>
    <h2>Créez votre compte</h2>
    <form action="#" method="post">
      <div class="input-box">
        <input type="text" name="name" placeholder="Votre Nome" required>
      </div>
      <div class="input-box">
        <input type="text" name="email" placeholder="Votre email" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Créer votre mot de passe" required>
      </div>
      <div class="input-box">
        <input type="password" name="confirmPassword" placeholder="Confirmer votre mot de passe" required>
      </div>
      <div class="policy">
        <input type="checkbox">
        <h3>J'accepte tous les termes et conditions</h3>
      </div>
      <div class="input-box button">
        <input type="submit" name="submit" value="Inscrivez-vous">
      </div>
      <div class="text">
        <h3>Vous avez déjà un compte? <a href="login.view.php">Se connecter </a></h3>
      </div>
    </form>
  </div>

</body>