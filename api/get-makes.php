<?php
header('Content-Type: application/json; charset=utf-8');
require_once dirname(__DIR__) . '/includes/db_connect.php';

$rawCategory = isset($_GET['category']) ? trim($_GET['category']) : '';
$year = isset($_GET['year']) ? intval($_GET['year']) : 0;

if (empty($rawCategory) || $year <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'Category and valid year parameters are required']);
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

$sql = "SELECT DISTINCT make FROM products WHERE category IN (?, ?) AND year = ? AND make IS NOT NULL AND make != '' ORDER BY make ASC";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['error' => 'Database query preparation failed']);
    exit;
}

$stmt->bind_param("ssi", $categories[0], $categories[1], $year);
$stmt->execute();
$result = $stmt->get_result();

$makes = [];
while ($row = $result->fetch_assoc()) {
    $makes[] = $row['make'];
}

$stmt->close();
$conn->close();

echo json_encode($makes);
?>
