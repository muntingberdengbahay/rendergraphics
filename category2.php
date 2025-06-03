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
    <?php include 'includes/header.php'; ?>
    <main class="main-content">
        <div class="container">
            <div class="container-categories">
                <h1>Posters</h1> 
             <section class="posters"></section>
            </div>
            </div>
                        <div class="container">
                    <div class="filters-category"><button class="elegant-back-btn" onclick="window.history.back()">
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
                        <div class="product-card" data-product-id="25">
                            <div class="product-badge">-50%</div>
                           <div class="product-image-watermark"> 
<img src="https://i.ibb.co/XrkyfdDq/Bea-Baduday.jpg" alt="Bea-Baduday">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>
                            <div class="product-info">
                                <h4>Bea Baduday 1</h4>
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

                        <div class="product-card" data-product-id="26">
                            <div class="product-badge">-60%</div>
 <div class="product-image-watermark"> 
                           <img src="https://i.ibb.co/VYzJSy3p/Bea-Baduday2.jpg" alt="Bea-Baduday2">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                            <div class="product-info">
                                <h4>Bea Baduday 2</h4>
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

                        <div class="product-card" data-product-id="27">
                            <div class="product-badge">-60%</div>
                           <div class="product-image-watermark"> 
 <img src="https://i.ibb.co/HpknrHQ9/Bea-Baduday-3.jpg" alt="Bea-Baduday-3">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                            <div class="product-info">
                                <h4>Bea Baduday 3</h4>
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

                        <div class="product-card" data-product-id="28">
                            <div class="product-badge">-60%</div>
<div class="product-image-watermark"> 
                            <img src="https://i.ibb.co/ynHNhR1R/Apple.jpg" alt="Apple">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                            <div class="product-info">
                                <h4>Apple Ni Bea</h4>
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
                </section>

                <section class="posters1">
                    <div class="products-grid">
                        <div class="product-card" data-product-id="29">
                            <div class="product-badge">-50%</div>
<div class="product-image-watermark"> 
                            <img src="https://i.ibb.co/HDh7dXGY/TV-Girl.jpg" alt="TV-Girl">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                            <div class="product-info">
                                <h4>TV Girl 1</h4>
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

                        <div class="product-card" data-product-id="30">
                            <div class="product-badge">-60%</div>
<div class="product-image-watermark"> 
                            <img src="https://i.ibb.co/KptsXwKy/TV-Girl-2.jpg" alt="TV-Girl-2">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                            <div class="product-info">
                                <h4>TV Girl 2</h4>
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

                        <div class="product-card" data-product-id="31">
                            <div class="product-badge">-40%</div>
<div class="product-image-watermark"> 
                            <img src="https://i.ibb.co/20TGDY4f/Wallflower.jpg" alt="Wallflower">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                            <div class="product-info">
                                <h4>Perks of being a Wallflower</h4>
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

                        <div class="product-card" data-product-id="32">
                            <div class="product-badge">-50%</div>
<div class="product-image-watermark"> 
                            <img src="https://i.ibb.co/SwPPn1yn/The-End.jpg" alt="The-End">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                            <div class="product-info">
                                <h4>The End of the F***king World</h4>
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
        </div>
        </section>

        <section class="posters2">
            <div class="container">
                <div class="products-grid">
                    <div class="product-card" data-product-id="33">
                        <div class="product-badge">-55%</div>
<div class="product-image-watermark"> 
                        <img src="https://i.ibb.co/dJLdRgZK/Clairo.jpg" alt="Clairo">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                        <div class="product-info">
                            <h4>Clairo</h4>
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

                    <div class="product-card" data-product-id="34">
                        <div class="product-badge">-60%</div>
<div class="product-image-watermark"> 
                        <img src="https://i.ibb.co/VWYGCRFG/Chappell.jpg" alt="Chappell">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                        <div class="product-info">
                            <h4>Chappell Roan 1</h4>
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

                    <div class="product-card" data-product-id="35">
                        <div class="product-badge">-50%</div>
<div class="product-image-watermark"> 
                        <img src="https://i.ibb.co/jkHt7m0f/Chappell-2.jpg" alt="Chappell-2">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                        <div class="product-info">
                            <h4>Chappel Roan 2</h4>
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

                    <div class="product-card" data-product-id="36">
                        <div class="product-badge">-60%</div>
<div class="product-image-watermark"> 
                        <img src="https://i.ibb.co/bDmzwz0/Mitski.jpg" alt="Mitski">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>
                        <div class="product-info">
                            <h4>Mitski</h4>
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
            </div>
        </section>

        <section class="posters3">
            <div class="container">
                <div class="products-grid">
                    <div class="product-card" data-product-id="37">
                        <div class="product-badge">-50%</div>
<div class="product-image-watermark"> 
                        <img src="https://i.ibb.co/B2X2dpjh/Summer.jpg" alt="Summer">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                        <div class="product-info">
                            <h4>500 Days of Summer</h4>
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

                    <div class="product-card" data-product-id="38">
                        <div class="product-badge">-60%</div>
<div class="product-image-watermark"> 
                        <img src="https://i.ibb.co/99M3SSwK/Juno.jpg" alt="Juno">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                        <div class="product-info">
                            <h4>Juno 1</h4>
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

                    <div class="product-card" data-product-id="397">
                        <div class="product-badge">-50%</div>
<div class="product-image-watermark"> 
                        <img src="https://i.ibb.co/93qGb4mB/Juno-2.jpg" alt="Juno-2">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                        <div class="product-info">
                            <h4>Juno 2</h4>
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

                    <div class="product-card" data-product-id="40">
                        <div class="product-badge">-50%</div>
<div class="product-image-watermark"> 
                        <img src="https://i.ibb.co/bgcCBd1g/Twilight.jpg" alt="Twilight">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                        <h4>Twilight Saga</h4>
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
            </div>
        </section>

        <section class="posters4">
            <div class="container">
                <div class="products-grid">
                    <div class="product-card" data-product-id="41">
                        <div class="product-badge">-60%</div>
<div class="product-image-watermark"> 
                        <img src="https://i.ibb.co/pj4FKwdd/Lady-Bird.jpg" alt="Lady-Bird">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                        <div class="product-info">
                            <h4>Lady Bird</h4>
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

                    <div class="product-card" data-product-id="42">
                        <div class="product-badge">-40%</div>
<div class="product-image-watermark"> 
                        <img src="https://i.ibb.co/99pdcqjg/The-Beatles.jpg" alt="The-Beatles">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                        <div class="product-info">
                            <h4>The Beatles</h4>
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

                    <div class="product-card" data-product-id="43">
                        <div class="product-badge">-60%</div>
<div class="product-image-watermark"> 
                        <img src="https://i.ibb.co/KcWsL8cN/Sabrina.jpg" alt="Sabrina">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                        <div class="product-info">
                            <h4>Sabrina Karpintero</h4>
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

                    <div class="product-card" data-product-id="44">
                        <div class="product-badge">-60%</div>
<div class="product-image-watermark"> 
                        <img src="https://i.ibb.co/Z1XvzpnP/Take-A-Bite.jpg" alt="Take-A-Bite">
     <img src="/images/watermark30.png" class="watermark-image">
                        </div>

                        <div class="product-info">
                            <h4>Take A Bite</h4>
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
            </div>
        </section>
    </main>
	<?php include 'includes/footer.php'; ?>
    <script src="js/sort.js"></script>
    <script src="js/main.js"></script>
    <script src="js/products.js>"></script>
    <script src="js/product.js"></script>
    <script src="js/security.js"></script>
	<script src="js/auth-modal.js"></script>
    <script>
        document.querySelectorAll('.product-card').forEach(card => {
            card.style.cursor = 'pointer';
            card.addEventListener('click', (e) => {
                // Don't redirect if clicking buttons/links inside the card
                if (e.target.tagName === 'BUTTON' || e.target.closest('a')) return;

                const productId = card.dataset.productId;
                window.location.href = `product.php?id=${productId}`;
            });
        });
    </script>
</body>

</html>