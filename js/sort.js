// js/sort.js

let originalOrder = [];

function initializeSorting() {
    const sortSelect = document.getElementById('sort-options');
    if (!sortSelect) return;

    // Save original product order on page load
    const allProducts = document.querySelectorAll('.product-card');
    originalOrder = Array.from(allProducts);

    sortSelect.addEventListener('change', function () {
        const allProducts = document.querySelectorAll('.product-card');

        if (!allProducts.length) return;

        const productArray = Array.from(allProducts);
        const parentGrid = document.querySelector('.products-grid');

        if (!parentGrid) return;

        // Sorting logic
        switch (this.value) {
            case 'featured':
                // Restore original DOM order
                productArray.sort((a, b) => {
                    return originalOrder.indexOf(a) - originalOrder.indexOf(b);
                });
                break;

            case 'price-low':
                productArray.sort((a, b) => getPrice(a) - getPrice(b));
                break;

            case 'price-high':
                productArray.sort((a, b) => getPrice(b) - getPrice(a));
                break;

            case 'name-asc':
                productArray.sort((a, b) => getProductName(a).localeCompare(getProductName(b)));
                break;

            case 'name-desc':
                productArray.sort((a, b) => getProductName(b).localeCompare(getProductName(a)));
                break;

            default:
                // Keep original order
                productArray.sort((a, b) => originalOrder.indexOf(a) - originalOrder.indexOf(b));
                break;
        }

        // Clear and re-append sorted products
        parentGrid.innerHTML = '';
        productArray.forEach(product => parentGrid.appendChild(product));
    });
}

// Utility: Get price from product card
function getPrice(product) {
    const priceText = product.querySelector('.current-price')?.textContent || '0';
    return parseInt(priceText.replace(/[^\d]/g, ''), 10);
}

// Utility: Get product name from product card
function getProductName(product) {
    return product.querySelector('h4')?.textContent.toLowerCase() || '';
}

document.addEventListener('DOMContentLoaded', () => {
    initializeSorting();
});
