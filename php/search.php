<?php
$q = $_GET['q'] ?? '';
$suggestions = [];
if ($q !== '') {
    // Example: search in an array, or query your database
    $items = ['Digital Painting', 'Drawing', 'Photography', 'Design'];
    foreach ($items as $item) {
        if (stripos($item, $q) !== false) {
            $suggestions[] = $item;
        }
    }
}
header('Content-Type: application/json');
echo json_encode($suggestions);
