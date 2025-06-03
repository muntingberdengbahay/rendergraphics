<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - Render Graphics</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Lora:wght@400;500;600&display=swap"
        rel="stylesheet">
    <meta name="description" content="Premium digital art product details">
</head>

<body>
    <!-- Same Header as Index -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="index.php">
                        <img src="/images/logo.png"
                            alt="Render Graphics Logo">
                    </a>
                </div>


                <div class="user-actions">
                    <a href="javascript:void(0)" class="sign-in"><i class="far fa-user"></i> Sign In</a>
                    <a href="#" class="cart"><i class="fas fa-shopping-cart"></i> Cart</a>
                </div>
            </div>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <div class="container-categories">
                <h1>Digital Design Tees</h1>
                <section class="posters"></section>
            </div>
        </div>
        <div class="container">
            
            <div class="filters-category">        <button class="elegant-back-btn" onclick="window.history.back()">
    <i class="fas fa-chevron-left"></i>
    <span>Back to Products</span>
</button>
                <div class="filter-item">
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
            <div class="products-grid">
                <div class="product-card" data-product-id="9">
                    <div class="product-badge">-15%</div>
                    <div class="product-image-watermark">
                        <img src="https://i.ibb.co/4RBCSgxs/tshirt-design-admit-it-you-re-smitten.png"
                            alt="Smittenbadoobee">
                        <img src="/images/watermark30.png" class="watermark-image">
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

                <div class="product-card" data-product-id="10">
                    <div class="product-badge">-20%</div>
                    <div class="product-image-watermark">
                        <img src="https://i.ibb.co/PGVz0TYZ/no-pressure-1.png" alt="No Pressure (LP)">
                        <img src="/images/watermark30.png" class="watermark-image">
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
                        <img src="https://i.ibb.co/cSKhb2Cj/no-pressure-2.png" alt="No Pressure (EP)">
                        <img src="/images/watermark30.png" class="watermark-image">
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
                        <img src="https://i.ibb.co/fzZwC8ZG/hot-ulligan.png" alt="Hot Mulligan">
                        <img src="/images/watermark30.png" class="watermark-image">
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
                        <img src="https://i.ibb.co/5WkSSvdj/tshirt-design-admit-it-you-re-smitten-dark.png"
                            alt="Smitten (Black)">
                        <img src="/images/watermark30.png" class="watermark-image">
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
                        <img src="https://i.ibb.co/RpcfSG0T/finding-beauty-tshirt.png" alt="Finding Beauty">
                        <img src="/images/watermark30.png" class="watermark-image">
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
                        <img src="https://i.ibb.co/Z6Cqcr5L/isolate-and-medicate-mockup.png" alt="Isolate and Medicate">
                        <img src="/images/watermark30.png" class="watermark-image">
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
                        <img src="https://i.ibb.co/G4brT7dS/cat-milf.png" alt="Cat Milf">
                        <img src="/images/watermark30.png" class="watermark-image">
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
    </main>


    <footer class="footer">
        <div class="container">
            <div class="footer-main">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="index.php">
                            <img src="/images/logo.png"
                                alt="Render Graphics Logo">
                        </a>
                    </div>
                </div>

                <div class="footer-middle">
                    <div class="links-column">
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="links-column">
                        <ul>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Copyright Policy</a></li>
                        </ul>
                    </div>
                    <div class="links-column">
                        <ul>
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Help Center</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>

            <div class="footer-bottom">
                <p>© 2025 Render Graphics. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    <script src="js/sort.js"></script>
    <script src="js/main.js"></script>
   <script src="js/products.js>"></script>
    <script src="js/product.js"></script>
    <script src="js/security.js"></script>
    <script src="js/auth-modal.js"></script>
</body>

</html>