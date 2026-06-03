<?php
/**
 * Get Cart Items
 * Returns cart items joined with product data.
 * Requires user authentication.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

header('Content-Type: application/json');

if (!isLoggedIn()) {
    http_response_code(401);
    echo json_encode(["error" => "User not logged in"]);
    exit;
}

$userId = getUserId();

// Join cart and products tables — using correct database columns
$sql = "SELECT 
            c.quantity,
            p.year,
            p.make,
            p.model,
            p.submodel,
            p.price,
            p.image
        FROM cart c
        INNER JOIN products p ON c.product_id = p.id
        WHERE c.user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();

$result = $stmt->get_result();
$cartItems = [];

while ($row = $result->fetch_assoc()) {
    $title = trim(
        ($row['year'] ?? '') . ' ' .
        ($row['make'] ?? '') . ' ' .
        ($row['model'] ?? '')
    );
    if (!empty($row['submodel'])) {
        $title .= ' - ' . $row['submodel'];
    }
    
    $image = $row['image'] ?? '';
    if (strpos($image, ',') !== false) {
        $parts = explode(',', $image);
        $image = trim($parts[0]);
    }
    if (empty($image)) {
        $image = 'assets/img/product/product-placeholder.png';
    }

    $cartItems[] = [
        'quantity' => intval($row['quantity']),
        'title' => $title,
        'price' => $row['price'],
        'image' => $image
    ];
}

echo json_encode($cartItems);

$stmt->close();
$conn->close();
?>
