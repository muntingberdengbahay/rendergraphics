document.querySelectorAll('.product-card').forEach(card => {
            card.style.cursor = 'pointer';
            card.addEventListener('click', (e) => {
                // Don't redirect if clicking buttons/links inside the card
                if (e.target.tagName === 'BUTTON' || e.target.closest('a')) return;

                const productId = card.dataset.productId;
                window.location.href = `product.php?id=${productId}`;
            });
        });