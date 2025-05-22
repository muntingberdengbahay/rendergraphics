// Wait for DOM to load
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search');
    const suggestionsDiv = document.getElementById('suggestions');
    const searchBtn = document.getElementById('search-btn');
    const searchResult = document.getElementById('search-result');

    // Helper: get products array from products.js (assume window.products or global products object)
    function getProductsArray() {
        // products is an object like {1: {...}, 2: {...}, ...}
        if (typeof products === 'object') {
            return Object.entries(products).map(([id, prod]) => ({ id, ...prod }));
        }
        return [];
    }

    // Show suggestions as user types
    searchInput.addEventListener('input', function () {
        const query = this.value.trim().toLowerCase();
        suggestionsDiv.innerHTML = '';
        if (query.length < 2) return;

        const filtered = getProductsArray().filter(prod =>
            prod.name.toLowerCase().includes(query)
        );
        if (filtered.length === 0) {
            suggestionsDiv.innerHTML = '<div class="suggestion-item no-result" style="padding: 8px; color: var(--brown-medium); background: var(--tan-light); border-radius: 6px;">No result.</div>';
            return;
        }
        suggestionsDiv.innerHTML = filtered.map(prod =>
            `<div class="suggestion-item" style="padding:8px; cursor:pointer; border-bottom:1px solid var(--tan-medium);" data-product-id="${prod.id}">${prod.name}</div>`
        ).join('');
    });

    // Handle click on suggestion
    suggestionsDiv.addEventListener('click', function (e) {
        const item = e.target.closest('.suggestion-item');
        if (item && !item.classList.contains('no-result')) {
            const productId = item.getAttribute('data-product-id');
            if (productId) {
                window.location.href = `product.html?id=${productId}`;
            }
        }
    });

    // Handle search button click or Enter key
    function handleSearch() {
        const query = searchInput.value.trim().toLowerCase();
        if (query.length < 2) {
            suggestionsDiv.innerHTML = '';
            return;
        }
        const filtered = getProductsArray().filter(prod =>
            prod.name.toLowerCase().includes(query)
        );
        if (filtered.length === 1) {
            window.location.href = `product.html?id=${filtered[0].id}`;
        } else if (filtered.length > 1) {
            // Show all matches in the result area below
            searchResult.innerHTML = filtered.map(prod =>
                `<div class="suggestion-item" style="padding:8px; cursor:pointer; border-bottom:1px solid var(--tan-medium);" data-product-id="${prod.id}">${prod.name}</div>`
            ).join('');
        } else {
            searchResult.innerHTML = '<div class="no-result" style="padding: 8px; color: var(--brown-medium); background: var(--tan-light); border-radius: 6px;">No result.</div>';
        }
    }

    searchBtn.addEventListener('click', function (e) {
        e.preventDefault();
        handleSearch();
    });

    searchInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            handleSearch();
        }
    });

    // Allow click on search results to redirect
    if (searchResult) {
        searchResult.addEventListener('click', function (e) {
            const item = e.target.closest('.suggestion-item');
            if (item && !item.classList.contains('no-result')) {
                const productId = item.getAttribute('data-product-id');
                if (productId) {
                    window.location.href = `product.html?id=${productId}`;
                }
            }
        });
    }
});
