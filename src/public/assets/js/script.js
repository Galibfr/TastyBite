document.addEventListener("DOMContentLoaded", function () {
  // Ensure the dropdown and welcomeText elements exist before adding event listeners
  let dropdown = document.querySelector("#dropdown");
  let welcomeText = document.querySelector("#welcomeText");
  let contact = document.querySelector('#contact');
  let basket = document.querySelector('.basket');

  // Only attach the click event to welcomeText if it exists
  if (welcomeText) {
    welcomeText.addEventListener("click", function () {
      // Toggle the 'show' class to control visibility of the dropdown
      if (dropdown) {
        dropdown.classList.toggle("show");
      }
    });
  }

  // Only attach the form submission event if the form exists
  if (contact) {
    contact.addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent the page from reloading

      var formData = new FormData(this); // Get form data

      // Send form data via a POST request
      fetch('/contact_processed', {
          method: 'POST',
          body: formData
      })
      .then(response => response.text()) // Parse the response as text
      .then(data => {
          // Display a SweetAlert notification based on the response
          if (data.includes("Votre réservation a été envoyée avec succès")) {
              Swal.fire({
                title: "Succès",
                text: "Message envoyé!!"
                });
              
          } else {
              swal("Erreur", data, "error"); // Show error message
          }
          // Reset the form after submission
          document.getElementById('contact').reset();
      })
      .catch(error => {
          // Log any errors to the console and show an error notification
          console.error('Erreur:', error);
          swal("Erreur", "Erreur lors de la soumission du formulaire.", "error");
      });
    });
  }
});

document.addEventListener("DOMContentLoaded", function() {
    const basketIcon = document.querySelector("#basketIcon");
    const basketDropdown = document.querySelector("#basketDropdown");
    const cartItemsList = document.querySelector("#cart-items-list");
    const cartCountBadge = document.querySelector("#cart-count");
    const checkoutBtn = document.querySelector("#checkoutBtn");

    // Example cart data (this would normally come from your server or session)
    const cartItems = [
        { id: 1, name: "Dish 1", quantity: 2 },
        { id: 2, name: "Dish 2", quantity: 1 },
        { id: 3, name: "Dish 3", quantity: 3 }
    ];

    // Update the cart count (for the badge)
    function updateCartCount() {
        const totalItems = cartItems.reduce((sum, item) => sum + item.quantity, 0);
        cartCountBadge.textContent = totalItems;
    }

    // Render the cart items in the dropdown
    function renderCartItems() {
        cartItemsList.innerHTML = ""; // Clear the list before re-rendering

        cartItems.forEach(item => {
            const li = document.createElement("li");
            li.classList.add("cart-item");
            li.innerHTML = `
                <span>${item.name}</span>
                <span>Quantité: <button class="quantity-decrease" data-id="${item.id}">-</button>
                ${item.quantity}
                <button class="quantity-increase" data-id="${item.id}">+</button></span>
            `;
            cartItemsList.appendChild(li);
        });
    }

    // Toggle the visibility of the basket dropdown
    basketIcon.addEventListener("click", function() {
        if (basketDropdown.style.display === "none" || basketDropdown.style.display === "") {
            basketDropdown.style.display = "block";
            renderCartItems(); // Re-render the cart items when the dropdown is opened
        } else {
            basketDropdown.style.display = "none";
        }
    });

    

    // Event listeners for increasing and decreasing quantities
    cartItemsList.addEventListener("click", function(event) {
        if (event.target.classList.contains("quantity-increase")) {
            const itemId = parseInt(event.target.getAttribute("data-id"));
            const item = cartItems.find(item => item.id === itemId);
            if (item) {
                item.quantity += 1;
                renderCartItems(); // Re-render after update
                updateCartCount(); // Update the cart count
            }
        }

        if (event.target.classList.contains("quantity-decrease")) {
            const itemId = parseInt(event.target.getAttribute("data-id"));
            const item = cartItems.find(item => item.id === itemId);
            if (item && item.quantity > 1) {
                item.quantity -= 1;
                renderCartItems(); // Re-render after update
                updateCartCount(); // Update the cart count
            }
        }
    });

    // Handle checkout button click (redirect to checkout page)
    checkoutBtn.addEventListener("click", function() {
        window.location.href = "/checkout"; // You can change this to your checkout route
    });

    // Initial render
    renderCartItems();
    updateCartCount();
});
