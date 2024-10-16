document.addEventListener("DOMContentLoaded", function () {
  let dropdown = document.querySelector("#dropdown");
  let welcomeText = document.querySelector("#welcomeText");
  let btn1 = document.querySelector("#btn1");

  welcomeText.addEventListener("click", function (e) {
    // Toggle the class that controls visibility and transition
    dropdown.classList.toggle("show");
  });

});
