document.addEventListener("DOMContentLoaded", function () {
  let dropdown = document.querySelector("#dropdown");
  let welcomeText = document.querySelector("#welcomeText");
  let btn1 = document.querySelector("#btn1");

  welcomeText.addEventListener("click", function (e) {
    // Toggle the class that controls visibility and transition
    dropdown.classList.toggle("show");
  });

});

document.getElementById('contact').addEventListener('submit', function(event) {
  event.preventDefault(); // Empêche le rechargement de la page

  var formData = new FormData(this); // Récupère les données du formulaire

  fetch('/contact_processed', {
      method: 'POST',
      body: formData
  })
  .then(response => response.text()) // récupère la réponse en texte
  .then(data => {
      // affiche une notification avec SweetAlert
      if (data.includes("Votre réservation a été envoyée avec succès")) {
          swal("Succès", "Votre réservation a été envoyée avec succès !", "success");
      } else {
          swal("Erreur", data, "error"); // affiche le message d'erreur
      }
      document.getElementById('contact').reset(); // Réinitialise le formulaire
  })
  .catch(error => {
      console.error('Erreur:', error);
      swal("Erreur", "Erreur lors de la soumission du formulaire.", "error");
  });
});
