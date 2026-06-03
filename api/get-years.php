<?php
header('Content-Type: application/json; charset=utf-8');
require_once dirname(__DIR__) . '/includes/db_connect.php';

$rawCategory = isset($_GET['category']) ? trim($_GET['category']) : '';

if (empty($rawCategory)) {
    http_response_code(400);
    echo json_encode(['error' => 'Category parameter is required']);
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

$sql = "SELECT DISTINCT year FROM products WHERE category IN (?, ?) AND year > 0 ORDER BY year DESC";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['error' => 'Database query preparation failed']);
    exit;
}

$stmt->bind_param("ss", $categories[0], $categories[1]);
$stmt->execute();
$result = $stmt->get_result();

$years = [];
while ($row = $result->fetch_assoc()) {
    $years[] = (int)$row['year'];
}

$stmt->close();
$conn->close();

echo json_encode($years);
?>
