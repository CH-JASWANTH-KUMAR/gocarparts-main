<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * Product Listing API
 * Returns paginated products with optional category, year, make, model, and submodel filters.
 * Uses prepared statements for search parameters.
 */
require_once __DIR__ . '/includes/db_connect.php';

$rawCategory = isset($_GET['category']) ? trim($_GET['category']) : '';
$year        = isset($_GET['year']) ? intval($_GET['year']) : 0;
$make        = isset($_GET['make']) ? trim($_GET['make']) : '';
$model       = isset($_GET['model']) ? trim($_GET['model']) : '';
$submodel    = isset($_GET['submodel']) ? trim($_GET['submodel']) : '';

$page   = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$limit  = 12;
$offset = ($page - 1) * $limit;

// Categories mapping
$categories = [];
if (!empty($rawCategory)) {
    $rawLower = strtolower($rawCategory);
    if ($rawLower === 'engines' || $rawLower === 'engine' || $rawLower === 'used engines') {
        $categories = ['USED ENGINES', 'Engine'];
    } elseif ($rawLower === 'transmissions' || $rawLower === 'transmission' || $rawLower === 'trans' || $rawLower === 'used transmissions') {
        $categories = ['USED TRANSMISSIONS', 'USED TRANSMISSIONS, downloadable'];
    }
}

// Build WHERE clauses
$whereClauses = ["year > 0"]; // Ignore year = 0 records
$params = [];
$types = "";

if (!empty($categories)) {
    $whereClauses[] = "category IN (?, ?)";
    $params[] = $categories[0];
    $params[] = $categories[1];
    $types .= "ss";
}

if ($year > 0) {
    $whereClauses[] = "year = ?";
    $params[] = $year;
    $types .= "i";
}

if (!empty($make)) {
    $whereClauses[] = "make = ?";
    $params[] = $make;
    $types .= "s";
}

if (!empty($model)) {
    $whereClauses[] = "model = ?";
    $params[] = $model;
    $types .= "s";
}

if (!empty($submodel)) {
    $whereClauses[] = "submodel = ?";
    $params[] = $submodel;
    $types .= "s";
}

$whereSql = "";
if (!empty($whereClauses)) {
    $whereSql = "WHERE " . implode(" AND ", $whereClauses);
}

// 1. Get total count
$countSql = "SELECT COUNT(*) as total FROM products $whereSql";
$countStmt = $conn->prepare($countSql);
if (!$countStmt) {
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(500);
    echo json_encode(['error' => 'Database query preparation failed for count']);
    exit;
}

if (!empty($params)) {
    $countStmt->bind_param($types, ...$params);
}
$countStmt->execute();
$countResult = $countStmt->get_result();
$totalRows = $countResult ? $countResult->fetch_assoc()['total'] : 0;
$countStmt->close();

// 2. Get paginated products
$selectSql = "
    SELECT id, make, model, year, submodel, image, price, category, sku, mileage
    FROM products 
    $whereSql
    ORDER BY id DESC
    LIMIT ? OFFSET ?
";

$stmt = $conn->prepare($selectSql);
if (!$stmt) {
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(500);
    echo json_encode(['error' => 'Database query preparation failed for select']);
    exit;
}

$selectParams = array_merge($params, [$limit, $offset]);
$selectTypes = $types . "ii";

$stmt->bind_param($selectTypes, ...$selectParams);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(500);
    echo json_encode(['error' => 'Query failed']);
    exit;
}

$out = [];
while ($row = $result->fetch_assoc()) {
    $title = trim(
        ($row['year'] ?? '') . ' ' .
        ($row['make'] ?? '') . ' ' .
        ($row['model'] ?? '')
    );

    if (!empty($row['submodel'])) {
        $title .= ' - ' . $row['submodel'];
    }

    // Format images. If there are multiple comma-separated image URLs, get the first one.
    $image = $row['image'] ?? '';
    if (strpos($image, ',') !== false) {
        $parts = explode(',', $image);
        $image = trim($parts[0]);
    }
    // Fallback image url if empty
    if (empty($image)) {
        $image = 'assets/img/product/product-placeholder.png'; // A local placeholder
    }

    $out[] = [
        'id' => (int)$row['id'],
        'title' => $title,
        'price' => number_format((float)$row['price'], 2),
        'image' => $image,
        'sku' => $row['sku'] ?? '',
        'mileage' => $row['mileage'] ?? '',
        'category' => $row['category'] ?? '',
        'engine_type' => ($row['category'] === 'Engine' || $row['category'] === 'USED ENGINES') ? 'Engine' : 'N/A',
        'transmission_type' => ($row['category'] === 'Transmission' || $row['category'] === 'USED TRANSMISSIONS') ? 'Transmission' : 'N/A',
        'in_stock' => 1
    ];
}

$stmt->close();
$conn->close();

header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    'products' => $out,
    'total'    => (int)$totalRows,
    'page'     => $page,
    'limit'    => $limit
]);
?>
