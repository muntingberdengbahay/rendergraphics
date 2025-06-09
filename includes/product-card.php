<?php
function renderProductCard($id, $badge, $imageUrl, $altText, $title, $currentPrice, $originalPrice) {
    echo "<div class='product-card' data-product-id='$id'>
            <div class='product-badge'>$badge</div>
            <div class='product-image-watermark'>
                <img src='$imageUrl' alt='$altText'>
                <img src='/render-graphics/images/watermark30.png' class='watermark-image'>
            </div>
            <div class='product-info'>
                <h4>$title</h4>
                <div class='product-rating'>
                    <div class='stars'>
                        <i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>
                    </div>
                    <span class='rating-count'>(0)</span>
                </div>
                <div class='product-pricing'>
                    <span class='current-price'>₱$currentPrice</span>
                    <span class='original-price'>₱$originalPrice</span>
                </div>
                <button class='add-to-cart'>Add to Cart</button>
            </div>
          </div>";
}
?>
