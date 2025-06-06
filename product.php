<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - Render Graphics</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Lora:wght@400;500;600&display=swap" rel="stylesheet">
    <meta name="description" content="Premium digital art product details">
</head>
<body>
    <!-- Same Header as Index -->
   <?php include 'includes/header.php'; ?>

    <main class="product-detail">
    <div class="container">
        <button class="elegant-back-btn" onclick="window.history.back()">
    <i class="fas fa-chevron-left"></i>
    <span>Back to Products</span>
</button>
        <div class="product-watermark-container">
    <img id="product-image" src="" class="product-main-image">
    <img src="/images/watermark30.png" class="product-centered-watermark">
</div>
            
            <div class="product-info">
                <h1 id="product-name"></h1>
                
                <div class="product-meta">
                    <div class="product-pricing">
                        <span id="current-price" class="current-price"></span>
                        <span id="original-price" class="original-price"></span>
                        <span id="product-discount" class="product-badge"></span>
                    </div>
                    
                    <p id="product-description" class="product-description"></p>
                    
                    <button class="add-to-cart">Add to Cart</button>
                    
                    <div class="delivery-info">
                            <div class="product-rating">
                                <div class="stars">
                                    <i class="far fa-star" data-index="1"></i>
                                    <i class="far fa-star" data-index="2"></i>
                                    <i class="far fa-star" data-index="3"></i>
                                    <i class="far fa-star" data-index="4"></i>
                                    <i class="far fa-star" data-index="5"></i>
                                </div>
                                <span class="rating-count">(0)</span>
                            </div>
                        <p><i class="fas fa-undo"></i> 14-day return policy</p>
                    </div>
                </div>
                
                <!-- Reviews Section -->
                <div class="reviews-section">
                    <h2>Customer Reviews</h2>
                    <div id="reviews-container" class="reviews-container">
                        <!-- Reviews will be dynamically inserted here -->
                    </div>
                    
                   <form id="review-form" class="review-form">
						<h3>Write a Review</h3>
						<textarea placeholder="Share your thoughts..." required></textarea>
							<button type="submit" class="submit-review-btn">
								<i class="fas fa-pen-fancy"></i> Post Review
							</button>
					</form>
                </div>
            </div>
        </div>
    </main>
	<?php include 'includes/footer.php'; ?>

    <!-- JavaScript Files -->
    <script src="js/render-products.js"></script>
    <script src="js/sort.js"></script>
    <script src="js/products.js?v=<?php echo time(); ?>"></script>
    <script src="js/product.js"></script>
    <script src="js/security.js"></script>
    <script src="js/auth-modal.js"></script>
    <script src="js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const productId = urlParams.get('id');
            const product = products[productId];

            if (!product) {
                window.location.href = 'index.php';
                return;
            }

            // Populate Product Data
            document.title = `${product.name} | Render Graphics`;
            document.getElementById('product-name').textContent = product.name;
            document.getElementById('product-image').src = product.image;
            document.getElementById('product-image').alt = product.name;
            document.getElementById('current-price').textContent = product.price;
            document.getElementById('original-price').textContent = product.originalPrice;
            document.getElementById('product-discount').textContent = product.discount;
            document.getElementById('product-description').textContent = product.description;

            // Load Reviews
            const reviewsContainer = document.getElementById('reviews-container');
            if (product.reviews.length > 0) {
                product.reviews.forEach(review => {
                    reviewsContainer.innerHTML += `
                        <div class="review">
                            <div class="review-author">
                                <i class="fas fa-user-circle"></i>
                                <span>Anonymous</span>
                            </div>
                            <p>${review}</p>
                        </div>
                    `;
                });
            } else {
                reviewsContainer.innerHTML = '<p>No reviews yet. Be the first!</p>';
            }

            // Handle Review Submission
            document.getElementById('review-form').addEventListener('submit', (e) => {
                e.preventDefault();
                const reviewText = e.target.querySelector('textarea').value.trim();
                if (reviewText) {
                    product.reviews.push(reviewText);
                    reviewsContainer.innerHTML = ''; // Clear "No reviews" message if present
                    
                    product.reviews.forEach(review => {
                        reviewsContainer.innerHTML += `
                            <div class="review">
                                <div class="review-author">
                                    <i class="fas fa-user-circle"></i>
                                    <span>Anonymous</span>
                                </div>
                                <p>${review}</p>
                            </div>
                        `;
                    });
                    
                    e.target.reset();
                }
            });
        });
    </script>
</body>
<script src="js/security.js"></script>
</html>