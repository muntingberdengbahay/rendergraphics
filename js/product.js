// js/product.js
document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('id');
    const product = products[productId];

    if (product) {
        // Populate product data
        document.getElementById('product-name').textContent = product.name;
        document.getElementById('product-image').src = product.image;
        document.getElementById('product-price').textContent = product.price;
        document.getElementById('original-price').textContent = product.originalPrice;
        document.getElementById('product-description').textContent = product.description;

        // Load reviews
        const reviewsContainer = document.getElementById('reviews-container');
        product.reviews.forEach(review => {
            reviewsContainer.innerHTML += `<div class="review">${review}</div>`;
        });

        // Handle new reviews
        document.getElementById('review-form').addEventListener('submit', (e) => {
            e.preventDefault();
            const reviewText = e.target.querySelector('textarea').value;
            product.reviews.push(reviewText);
            reviewsContainer.innerHTML += `<div class="review">${reviewText}</div>`;
            e.target.reset();
        });
    }
});

// NADAGDAG 
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function() {
        const productCard = this.closest('.product-card');
        const productId = productCard.dataset.productId;
        const productName = productCard.querySelector('h4').textContent;
        const productPrice = parseFloat(productCard.querySelector('.current-price').textContent.replace(/₱|,/g, ''));
        const productImage = productCard.querySelector('img').src; // Get product image
        const productQuantity = 1; // Default quantity
        // Send product data to the server
        fetch('cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                product_id: productId,
                product_name: productName,
                product_price: productPrice,
                product_image: productImage, // Send image path
                product_quantity: productQuantity // Ensure this is sent
            })
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Optional: Handle response
            alert('Product added to cart!');
        })
        .catch(error => console.error('Error:', error));
    });
});

// HANGGANG DITO

// Load auth modal
const script = document.createElement('script');
script.src = 'js/auth-modal.js';
document.head.appendChild(script);

// product.js - Add this at the bottom

// Sorting Functionality

