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