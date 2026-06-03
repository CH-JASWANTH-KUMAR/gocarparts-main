<?php
header('Content-Type: application/json; charset=utf-8');
require_once dirname(__DIR__) . '/includes/db_connect.php';

$rawCategory = isset($_GET['category']) ? trim($_GET['category']) : '';
$year = isset($_GET['year']) ? intval($_GET['year']) : 0;
$make = isset($_GET['make']) ? trim($_GET['make']) : '';

if (empty($rawCategory) || $year <= 0 || empty($make)) {
    http_response_code(400);
    echo json_encode(['error' => 'Category, year, and make parameters are required']);
    exit;
}

$categories = [];
$rawLower = strtolower($rawCategory);
if ($rawLower === 'engines' || $rawLower === 'engine' || $rawLower === 'used engines') {
    $categories = ['USED ENGINES', 'Engine'];
} elseif ($rawLower === 'transmissions' || $rawLower === 'transmission' || $rawLower === 'trans' || $rawLower === 'used transmissions') {
    $categories = ['USED TRANSMISSIONS', 'USED TRANSMISSIONS, downloadable'];
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid category specified']);
    exit;
}

$sql = "SELECT DISTINCT model FROM products WHERE category IN (?, ?) AND year = ? AND make = ? AND model IS NOT NULL AND model != '' ORDER BY model ASC";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['error' => 'Database query preparation failed']);
    exit;
}

$stmt->bind_param("ssis", $categories[0], $categories[1], $year, $make);
$stmt->execute();
$result = $stmt->get_result();

$models = [];
while ($row = $result->fetch_assoc()) {
    $models[] = $row['model'];
}

$stmt->close();
$conn->close();

echo json_encode($models);
?>
