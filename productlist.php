<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
/**
 * Product List API (Cached, Category-aware)
 * Returns a cached set of random products filtered by category.
 */
require_once __DIR__ . '/includes/db_connect.php';

// ini_set('display_errors', 0);
// error_reporting(0);
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Get and standardize the category parameter
// $rawCategory = isset($_GET['category']) ? trim($_GET['category']) : 'engines';
// $category = 'Engine'; // Default fallback
// $cacheSuffix = 'engines';

// if (strcasecmp($rawCategory, 'transmissions') === 0 || strcasecmp($rawCategory, 'trans') === 0) {
//     $category = 'Transmission';
//     $cacheSuffix = 'transmissions';
// } elseif (strcasecmp($rawCategory, 'brakes') === 0) {
//     $category = 'Brakes';
//     $cacheSuffix = 'brakes';
// } elseif (strcasecmp($rawCategory, 'electrical') === 0) {
//     $category = 'Electrical';
//     $cacheSuffix = 'electrical';
// }

$rawCategory = isset($_GET['category']) ? trim($_GET['category']) : 'engines';

$category = 'USED ENGINES';
$cacheSuffix = 'engines';

if (
    strcasecmp($rawCategory, 'transmissions') === 0 ||
    strcasecmp($rawCategory, 'trans') === 0
) {
    $category = 'USED TRANSMISSIONS';
    $cacheSuffix = 'transmissions';
}

$cacheFile = __DIR__ . "/product_cache_{$cacheSuffix}.json";

// Load cached IDs if valid
$cachedIds = [];
if (file_exists($cacheFile)) {
    $cached = json_decode(file_get_contents($cacheFile), true);
    if (is_array($cached) && count($cached) > 0) {
        $cachedIds = $cached;
    }
}

// If no valid cache, fetch random product IDs for the specific category
if (empty($cachedIds)) {
    // We filter by the specific category in the database and ensure they have valid images
    $stmt = $conn->prepare("SELECT id FROM products WHERE price > 0 AND image IS NOT NULL AND TRIM(image) != '' AND category = ? ORDER BY RAND() LIMIT 8");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $idResult = $stmt->get_result();
    
    if ($idResult && $idResult->num_rows > 0) {
        while ($row = $idResult->fetch_assoc()) {
            $cachedIds[] = (int)$row['id'];
        }
        if (count($cachedIds) > 0) {
            @file_put_contents($cacheFile, json_encode($cachedIds));
        }
    }
    $stmt->close();
}

$data = [];

if (!empty($cachedIds)) {
    // Safely build IN clause with intval
    $ids = implode(',', array_map('intval', $cachedIds));
    
    // $query = "SELECT id, name, price, category, image_url FROM products WHERE id IN ($ids) ORDER BY FIELD(id, $ids)";
    $query = "SELECT id, make, model, year, submodel,
                 price, category, image, mileage, sku
                FROM products
                WHERE id IN ($ids)
                ORDER BY FIELD(id, $ids)";
    $result = $conn->query($query);
    
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // $data[] = [
            //     'id' => intval($row['id']),
            //     'title' => htmlspecialchars($row['name']),
            //     'category' => htmlspecialchars($row['category'] ?: 'General'),
            //     'price' => number_format((float)$row['price'], 2),
            //     'image' => !empty($row['image_url']) ? $row['image_url'] : 'https://via.placeholder.com/300x200?text=No+Image'
            // ];
            $title = trim(
                            ($row['year'] ?? '') . ' ' .
                            ($row['make'] ?? '') . ' ' .
                            ($row['model'] ?? '')
            );

            if (!empty($row['submodel'])) {
                $title .= ' - ' . $row['submodel'];
            }

            // Handle comma-separated image URLs or empty images
            $image = $row['image'] ?? '';
            if (strpos($image, ',') !== false) {
                $parts = explode(',', $image);
                $image = trim($parts[0]);
            }
            if (empty($image)) {
                $image = 'https://via.placeholder.com/300x200?text=No+Image';
            }

            $data[] = [
                    'id' => intval($row['id']),
                    'title' => htmlspecialchars($title),
                    'category' => htmlspecialchars($row['category'] ?: 'General'),
                    'price' => number_format((float)$row['price'], 2),
                    'image' => $image,
                    'sku' => $row['sku'] ?? '',
                    'mileage' => $row['mileage'] ?? ''
            ];
        }
    }
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
$conn->close();

