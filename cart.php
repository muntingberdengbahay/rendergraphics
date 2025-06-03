<?php
session_start();


// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Function to calculate total price
function calculateTotal($items)
{
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

// Check if a product is being added to the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = (float) $_POST['product_price'];
    $productImage = $_POST['product_image'];
    $productQuantity = (int) $_POST['product_quantity'];

    // Check if the product is already in the cart by ID or Name
    $alreadyExists = false;
    foreach ($_SESSION['cart'] as $item) {
        if ($item['id'] === $productId || $item['name'] === $productName) {
            $alreadyExists = true;
            break;
        }
    }

    // Only add if the product doesn't already exist
    if (!$alreadyExists) {
        $_SESSION['cart'][] = [
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'image' => $productImage,
            'quantity' => $productQuantity,
        ];
    }
}

// Handle product removal
if (isset($_GET['remove_id'])) {
    $removeId = $_GET['remove_id'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $removeId) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}


// Calculate total price
$totalPrice = calculateTotal($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Lora:wght@400;500;600&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <main class="cart-main container">

        </div>
        </div>
        <?php if (empty($_SESSION['cart'])): ?>
            <p class="empty-cart">Your cart is empty.</p>

        <?php else: ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                        <tr>
                            <td><img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" style="width: 50px; height: auto;"></td>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td>₱<?php echo number_format($item['price'], 2); ?></td>
                            <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                            <td>₱<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                            <td><a href="cart.php?remove_id=<?php echo $item['id']; ?>" class="remove-button">X</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="cart-total">
                <strong>Total Price: ₱<?php echo number_format($totalPrice, 2); ?></strong>
            </div>
        <?php endif; ?>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
    <script src="js/render-products.js"></script>
    <script src="js/products.js"></script>
    <script src="js/product.js"></script>
    <script src="js/security.js"></script>
    <script src="js/auth-modal.js"></script>
    <script src="js/main.js"></script>
</body>

</html>