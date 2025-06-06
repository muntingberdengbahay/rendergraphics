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
                <h1>Digital Arts</h1>
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
                <div class="product-card" data-product-id="1">
                    <div class="product-badge">-15%</div>
                    <div class="product-image-watermark">
                        <img src="https://i.ibb.co/0pjgtrjr/494825075-1100023805358988-7869408859538142053-n.jpg"
                            alt="Elegant Cat">
                        <img src="/images/watermark30.png" class="watermark-image">
                    </div>
                    <div class="product-info">
                        <h4>Elegant Cat</h4>
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

                <div class="product-card" data-product-id="2">
                    <div class="product-badge">-20%</div>
                    <div class="product-image-watermark">
                                    <img src="https://i.ibb.co/DPZsnMjn/494818465-1210702057134480-4556401831919401196-n.jpg"
                                        alt="Sophisticated Tom">
                                    <img src="/images/watermark30.png" class="watermark-image">
                                </div>
                <div class="product-info">
                    <h4>Sophisticated Tom</h4>
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

            <div class="product-card" data-product-id="3">
                <div class="product-badge">-10%</div>
                <div class="product-image-watermark">
                    <img src="https://i.ibb.co/svDZSgC7/494359212-1221382426332389-7029884708858703133-n.jpg"
                        alt="Lech's Favorite">
                    <img src="/images/watermark30.png" class="watermark-image">
                </div>
                <div class="product-info">
                    <h4>Lech's Favorite</h4>
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

            <div class="product-card" data-product-id="4">
                <div class="product-badge">-25%</div>
                <div class="product-image-watermark">
                    <img src="https://i.ibb.co/NgcbFcT9/494815821-1388651155503317-4690645572417082193-n.png"
                        alt="C0te Cat">
                    <img src="/images/watermark30.png" class="watermark-image">
                </div>
                <div class="product-info">
                    <h4>C0te Cat</h4>
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
                <div class="product-card" data-product-id="5">
                    <div class="product-badge">-15%</div>
                    <div class="product-image-watermark">
                        <img src="https://i.ibb.co/2QcvwCm/494360146-1400362487890440-597695839766592943-n.png"
                            alt="Lizard Hunter">
                        <img src="/images/watermark30.png" class="watermark-image">
                    </div>
                    <div class="product-info">
                        <h4>Lizard Hunter</h4>
                        <div class="product-rating">
                            <div class="stars">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>`
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

                <div class="product-card" data-product-id="6">
                    <div class="product-badge">-20%</div>
                    <div class="product-image-watermark">
                        <img src="https://i.ibb.co/d4NmfWJG/494362025-1408138887005682-7169189609504204508-n.jpg"
                            alt="Simba">
                        <img src="/images/watermark30.png" class="watermark-image">
                    </div>
                    <div class="product-info">
                        <h4>Simba</h4>
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

                <div class="product-card" data-product-id="7">
                    <div class="product-badge">-10%</div>
                    <div class="product-image-watermark">
                        <img src="https://i.ibb.co/ccrcWj4q/494819403-1875332939988552-5442490914021247960-n.jpg"
                            alt="Manyak na posa">
                        <img src="/images/watermark30.png" class="watermark-image">
                    </div>
                    <div class="product-info">
                        <h4>Manyak na posa</h4>
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

                <div class="product-card" data-product-id="8">
                    <div class="product-badge">-25%</div>
                    <div class="product-image-watermark">
                        <img src="https://i.ibb.co/Q3C9mMn3/494858168-1946943209382697-6665512090529875013-n.jpg"
                            alt="Banal na aso">
                        <img src="/images/watermark30.png" class="watermark-image">
                    </div>
                    <div class="product-info">
                        <h4>Banal na aso</h4>
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
            </div>
        </section>

        <section class="posters2">
            <div class="container">
                <div class="products-grid">
                    <div class="product-card" data-product-id="17">
                        <div class="product-badge">-15%</div>
                        <div class="product-image-watermark">
                            <img src="https://i.ibb.co/pvt33FyH/shit-eater.jpg" alt="Shit Eater">
                            <img src="/images/watermark30.png" class="watermark-image">
                        </div>
                        <div class="product-info">
                            <h4>Shit Eater</h4>
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

                    <div class="product-card" data-product-id="18">
                        <div class="product-badge">-20%</div>
                        <div class="product-image-watermark">
                            <img src="https://i.ibb.co/twWFWYq4/cat-and-criminal.jpg" alt="Cat and Criminal">
                            <img src="/images/watermark30.png" class="watermark-image">
                        </div>
                        <div class="product-info">
                            <h4>Cat and Criminal</h4>
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

                    <div class="product-card" data-product-id="19">
                        <div class="product-badge">-10%</div>
                        <div class="product-image-watermark">
                            <img src="https://i.ibb.co/4nGr2Ztf/1-braincell-car.jpg" alt="1 Braincell Car">
                            <img src="/images/watermark30.png" class="watermark-image">
                        </div>
                        <div class="product-info">
                            <h4>Single Braincell Car</h4>
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

                    <div class="product-card" data-product-id="20">
                        <div class="product-badge">-25%</div>
                        <div class="product-image-watermark">
                            <img src="https://i.ibb.co/5WBk9FF1/slipper-muncher.jpg" alt="Slipper Muncher">
                            <img src="/images/watermark30.png" class="watermark-image">
                        </div>
                        <div class="product-info">
                            <h4>Slipper Muncher</h4>
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
                    <div class="product-card" data-product-id="21">
                        <div class="product-badge">-15%</div>
                        <div class="product-image-watermark">
                            <img src="https://i.ibb.co/v6fCp2N7/posang-mabantot.jpg" alt="Posang Mabantot">
                            <img src="/images/watermark30.png" class="watermark-image">
                        </div>
                        <div class="product-info">
                            <h4>Posang Mabantot</h4>
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

                    <div class="product-card" data-product-id="22">
                        <div class="product-badge">-20%</div>
                        <div class="product-image-watermark">
                            <img src="https://i.ibb.co/nsnP4M8Q/ma-ano-ulam.png" alt="Ma Ano Ulam?">
                            <img src="/images/watermark30.png" class="watermark-image">
                        </div>
                        <div class="product-info">
                            <h4>Ma Ano Ulam?</h4>
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

                    <div class="product-card" data-product-id="23">
                        <div class="product-badge">-10%</div>
                        <div class="product-image-watermark">
                            <img src="https://i.ibb.co/DPZwfj34/kung-portrait.png" alt="Kung Fu Mulutan">
                            <img src="/images/watermark30.png" class="watermark-image">
                        </div>
                        <div class="product-info">
                            <h4>Kung Fu Mulutan</h4>
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

                    <div class="product-card" data-product-id="24">
                        <div class="product-badge">-25%</div>
                        <div class="product-image-watermark">
                            <img src="https://i.ibb.co/MxfjbGRR/sarming-portrait-try.png" alt="BulSU Sarmiento Branch">
                            <img src="/images/watermark30.png" class="watermark-image">
                        </div>
                        <div class="product-info">
                            <h4>BulSU Sarmiento Branch</h4>
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