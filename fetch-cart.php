<?php
/**
 * Fetch Cart API
 * Provides fetch, update, and delete operations for cart items.
 * Requires user authentication.
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db_connect.php';

requireLoginApi();

header('Content-Type: application/json');

$user_id = getUserId();
$action = $_GET['action'] ?? 'fetch';

switch ($action) {
    case 'fetch':
        $sql = "
            SELECT 
                cart.id AS cart_id,
                cart.product_id,
                cart.quantity,
                p.year,
                p.make,
                p.model,
                p.submodel,
                p.price,
                p.image
            FROM cart
            JOIN products p ON cart.product_id = p.id
            WHERE cart.user_id = ?
        ";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $items = [];
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

            $items[] = [
                'cart_id' => intval($row['cart_id']),
                'product_id' => intval($row['product_id']),
                'quantity' => intval($row['quantity']),
                'title' => $title,
                'price' => $row['price'],
                'image' => $image
            ];
        }

        echo json_encode($items);
        $stmt->close();
        break;

    case 'update':
        $cart_id = isset($_POST['cart_id']) ? intval($_POST['cart_id']) : 0;
        $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;

        if (!$cart_id || !$quantity || $quantity < 1) {
            http_response_code(400);
            echo json_encode(["error" => "Invalid update request"]);
            exit;
        }

        $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ? AND user_id = ?");
        $stmt->bind_param("iii", $quantity, $cart_id, $user_id);

        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Update failed"]);
        }
        $stmt->close();
        break;

    case 'delete':
        $cart_id = isset($_POST['cart_id']) ? intval($_POST['cart_id']) : 0;

        if (!$cart_id) {
            http_response_code(400);
            echo json_encode(["error" => "Invalid delete request"]);
            exit;
        }

        $stmt = $conn->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $cart_id, $user_id);

        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Delete failed"]);
        }
        $stmt->close();
        break;

    default:
        http_response_code(400);
        echo json_encode(["error" => "Invalid action"]);
}

$conn->close();
