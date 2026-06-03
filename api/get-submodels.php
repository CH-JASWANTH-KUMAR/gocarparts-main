<?php
header('Content-Type: application/json; charset=utf-8');
require_once dirname(__DIR__) . '/includes/db_connect.php';

$rawCategory = isset($_GET['category']) ? trim($_GET['category']) : '';
$year = isset($_GET['year']) ? intval($_GET['year']) : 0;
$make = isset($_GET['make']) ? trim($_GET['make']) : '';
$model = isset($_GET['model']) ? trim($_GET['model']) : '';

if (empty($rawCategory) || $year <= 0 || empty($make) || empty($model)) {
    http_response_code(400);
    echo json_encode(['error' => 'Category, year, make, and model parameters are required']);
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

$sql = "SELECT DISTINCT submodel FROM products WHERE category IN (?, ?) AND year = ? AND make = ? AND model = ? AND submodel IS NOT NULL AND submodel != '' ORDER BY submodel ASC";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['error' => 'Database query preparation failed']);
    exit;
}

$stmt->bind_param("ssiss", $categories[0], $categories[1], $year, $make, $model);
$stmt->execute();
$result = $stmt->get_result();

$submodels = [];
while ($row = $result->fetch_assoc()) {
    $submodels[] = $row['submodel'];
}

$stmt->close();
$conn->close();

echo json_encode($submodels);
?>
