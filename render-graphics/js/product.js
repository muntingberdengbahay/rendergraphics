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

// Load auth modal
const script = document.createElement('script');
script.src = 'js/auth-modal.js';
document.head.appendChild(script);

// product.js - Add this at the bottom

// Sorting Functionality
/*
function initializeSorting() {
    const sortSelect = document.getElementById('sort-options');
    if (!sortSelect) return; // Exit if not on a page with sorting

    sortSelect.addEventListener('change', function () {
        const productGrid = document.querySelector('.products-grid');
        if (!productGrid) return;

        const products = Array.from(productGrid.querySelectorAll('.product-card'));

        // Price parsing utility
        const parsePrice = (elem) =>
            parseInt(elem.querySelector('.current-price').textContent.replace(/[^\d]/g, ''), 10);

        // Sorting logic
        products.sort((a, b) => {
            const aName = a.querySelector('h4').textContent.toLowerCase();
            const bName = b.querySelector('h4').textContent.toLowerCase();
            const aPrice = parsePrice(a);
            const bPrice = parsePrice(b);

            switch (this.value) {
                case 'price-low':
                    return aPrice - bPrice;
                case 'price-high':
                    return bPrice - aPrice;
                case 'name-asc':
                    return aName.localeCompare(bName);
                case 'name-desc':
                    return bName.localeCompare(aName);
                default:
                    return 0; // Keep original order
            }
        });

        // Clear the grid
        productGrid.innerHTML = '';

        // Re-append all sorted products at once
        productGrid.append(...products);
    });
}

// Initialize when DOM loads
document.addEventListener('DOMContentLoaded', () => {
    initializeSorting();
});

*/
