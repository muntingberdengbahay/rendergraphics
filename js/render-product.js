document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('products-grid');
    if (!container) return;

    // Get all product IDs
    const productIds = Object.keys(products).map(Number);

    // Optionally filter by category (from URL param)
    const urlParams = new URLSearchParams(window.location.search);
    const category = urlParams.get('category') || 'digital-art';

    // Assign default category to each product (you can customize per product later)
    const categoryMap = {
        1: 'digital-art',
        2: 'digital-art',
        3: 'digital-art',
        4: 'digital-art',
        5: 'posters',
        6: 'posters',
        7: 'posters',
        8: 'posters',
        9: 'illustrations',
        10: 'illustrations',
        11: 'illustrations',
        12: 'illustrations'
        // You can add more mappings here up to ID 44
    };

    // Render each product card
    productIds.forEach(id => {
        const product = products[id];
        const card = document.createElement('div');
        card.className = 'product-card';
        card.setAttribute('data-product-id', id);
        card.setAttribute('data-category', categoryMap[id] || 'digital-art');

        card.innerHTML = `
            <div class="product-badge">${product.discount}</div>
            <div class="product-image-watermark">
                <img src="${product.image}" alt="${product.name}">
                <img src="/render-graphics/images/watermark30.png" class="watermark-image">
            </div>
            <div class="product-info">
                <h4>${product.name}</h4>
                <div class="product-rating">
                    <div class="stars">
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <span class="rating-count">(0)</span>
                </div>
                <div class="product-pricing">
                    <span class="current-price">${product.price}</span>
                    <span class="original-price">${product.originalPrice}</span>
                </div>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        `;
        card.addEventListener('click', (e) => {
            if (e.target.tagName === 'BUTTON') return;
            window.location.href = `product.php?id=${id}`;
        });

        container.appendChild(card);
    });

    // Initialize sorting
    if (typeof initializeSorting === 'function') {
        initializeSorting();
    }

    // Reapply click handlers
    document.querySelectorAll('.product-card').forEach(card => {
        card.style.cursor = 'pointer';
        card.addEventListener('click', (e) => {
            if (e.target.tagName === 'BUTTON') return;
            const productId = card.dataset.productId;
            window.location.href = `product.php?id=${productId}`;
        });
    });
});