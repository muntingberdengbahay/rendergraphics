<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Render Graphics - Digital Art Portfolio - Page 2</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Lora:wght@400;500;600&display=swap" rel="stylesheet">
	<link rel="icon" href="https://i.ibb.co/5WQKGctR/494691228-9365597156877381-4171739963554539291-n.png" type="image/png">
    <meta name="description" content="Premium digital art portfolio featuring limited edition prints and custom artwork">
</head>
<body>
   <?php include 'includes/header.php'; ?>

    <main class="main-content">
        <div class="container">
            <section class="categories">
                <h2>Digital Art Portfolio</h2>
                <p class="subtitle">Discover exquisite digital creations and custom commissions from our studio</p>
				
                
                <div class="filters">
  <div class="filter-items">
    <button class="btn-draw" onclick="location.href='indexdrawing.php'">Create Your Own Art</button>
      <button class="btn-sell" id="sellArtButton">Sell Your Art</button>

<script>
document.getElementById("sellArtButton").addEventListener("click", function() {
    const isLoggedIn = localStorage.getItem('isLoggedIn'); // Check login state
    
    if (isLoggedIn) {
        window.location.href = 'sellart.php'; // Allow access
    } else {
        document.getElementById("authModal").style.display = "flex"; // Show login modal
    }
});
</script>
  </div>
  <div class="filter-items">
    <span class="centered-text">25+ unique artworks available</span>
  </div>
  <div class="filter-items">
        <select id="sort-options" class="sort-select">
            <option value="featured">Sort by: Featured</option>
            <option value="newest">Newest First</option>
            <option value="price-low">Price: Low to High</option>
            <option value="price-high">Price: High to Low</option>
            <option value="name-asc">Name: A-Z</option>
            <option value="name-desc">Name: Z-A</option>
        </select>
  </div>
</div>
        
        <section class="featured-products">
            <div class="container">
                <h3>Featured Artworks</h3>
                <div class="products-grid">
                    <div class="product-card" data-product-id="9">
                        <div class="product-badge">-15%</div>
                        <div class="product-image-watermark">
						<img src="watermarked_image.php?img=Smittenbadoobee.png">
                        </div>
                        <div class="product-info">
                            <h4>Smittenbadoobee</h4>
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
                                <span class="current-price">₱4,250</span>
                                <span class="original-price">₱5,000</span>
                            </div>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card"  data-product-id="10">
                        <div class="product-badge">-20%</div>
                        <div class="product-image-watermark">
						<img src="watermarked_image.php?img=No Pressure (LP).png">
                        </div>
                        <div class="product-info">
                            <h4>No Pressure (LP)</h4>
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
                                <span class="current-price">₱5,600</span>
                                <span class="original-price">₱7,000</span>
                            </div>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card" data-product-id="11">
                        <div class="product-badge">-10%</div>
                        <div class="product-image-watermark">
						<img src="watermarked_image.php?img=No Pressure (EP).png">
                        </div>
                        <div class="product-info">
                            <h4>No Pressure (EP)</h4>
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
                                <span class="current-price">₱3,150</span>
                                <span class="original-price">₱3,500</span>
                            </div>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card" data-product-id="12">
                        <div class="product-badge">-25%</div>
                        <div class="product-image-watermark">
						<img src="watermarked_image.php?img=Hot Mulligan.png">
                        </div>
                        <div class="product-info">
                            <h4>Hot Mulligan</h4>
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
                                <span class="current-price">₱6,750</span>
                                <span class="original-price">₱9,000</span>
                            </div>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- 2nd linya ng products-->
                    <div class="product-card" data-product-id="13">
                        <div class="product-badge">-15%</div>
                        <div class="product-image-watermark">
						<img src="watermarked_image.php?img=Smitten (Black).png">
                        </div>
                        <div class="product-info">
                            <h4>Smitten (Black)</h4>
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
                                <span class="current-price">₱4,250</span>
                                <span class="original-price">₱5,000</span>
                            </div>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card" data-product-id="14">
                        <div class="product-badge">-20%</div>
                       <div class="product-image-watermark">
						<img src="watermarked_image.php?img=Finding Beauty in Negative Spaces.png">
                        </div>
                        <div class="product-info">
                            <h4>Finding Beauty in Negative Spaces</h4>
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
                                <span class="current-price">₱5,600</span>
                                <span class="original-price">₱7,000</span>
                            </div>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card" data-product-id="15">
                        <div class="product-badge">-10%</div>
                        <div class="product-image-watermark">
			<img src="watermarked_image.php?img=Isolate and Medicate.png">
                        </div>
                        <div class="product-info">
                            <h4>Isolate and Medicate</h4>
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
                                <span class="current-price">₱3,150</span>
                                <span class="original-price">₱3,500</span>
                            </div>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    
                    <div class="product-card" data-product-id="16">
                        <div class="product-badge">-25%</div>
                       <div class="product-image-watermark">
			<img src="watermarked_image.php?img=Cat Milf.png">
                        </div>
                        <div class="product-info">
                            <h4>Cat Milf</h4>
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
                                <span class="current-price">₱6,750</span>
                                <span class="original-price">₱9,000</span>
                            </div>
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="additional-products">
					<div class="discovery-section">
						<p class="discovery-text">There's so much more for you to discover</p>	
						<div class="pagination">
						<a href="index.php" class="page-arrow"><i class="fas fa-chevron-left"></i></a>
							  <a href="index.php" class="page-number">1</a>
                            <a href="index2.php" class="page-number active">2</a>
                            <a href="index3.php" class="page-number">3</a>
							<a href="index4.php" class="page-number">4</a>	
							<a href="index5.php" class="page-number">5</a>	
							<a href="index6.php" class="page-number">6</a>
                            <a href="index3.php" class="page-arrow"><i class="fas fa-chevron-right"></i></a>
						</div>

					</div>

        </section>
    </main>
	<?php include 'includes/footer.php'; ?>
    <script src="js/render-products.js"></script>
	<script src="js/sort.js"></script>
    <script src="js/main.js"></script>
<script src="js/products.js>"></script>
	<script src="js/product.js"></script>
    <script src="js/security.js"></script>
	<script src="js/auth-modal.js"></script>
</body>
</html>
