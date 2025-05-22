<?php
$q = $_GET['q'] ?? '';
$suggestions = [];
if ($q !== '') {
    $items = [
        $products = [
    ['id' => 1, 'name' => 'Elegant Cat'],
    ['id' => 2, 'name' => 'Sophisticated Tom'],
    ['id' => 3, 'name' => "Lech's Favorite"],
    ['id' => 4, 'name' => 'C0te Cat'],
    ['id' => 5, 'name' => 'Lizard Hunter'],
    ['id' => 6, 'name' => 'Simba'],
    ['id' => 7, 'name' => 'Manyak na posa'],
    ['id' => 8, 'name' => 'Banal na aso'],
    ['id' => 9, 'name' => 'Smittenbadoobee'],
    ['id' => 10, 'name' => 'No Pressure (LP)'],
    ['id' => 11, 'name' => 'No Pressure (EP)'],
    ['id' => 12, 'name' => 'Hot Mulligan'],
    ['id' => 13, 'name' => 'Smitten (Black)'],
    ['id' => 14, 'name' => 'Finding Beauty in Negative Spaces'],
    ['id' => 15, 'name' => 'Isolate and Medicate'],
    ['id' => 16, 'name' => 'Cat Milf'],
    ['id' => 17, 'name' => 'Shit Eater'],
    ['id' => 18, 'name' => 'Cat and Criminal'],
    ['id' => 19, 'name' => 'Single Braincell Car'],
    ['id' => 20, 'name' => 'Slipper Muncher'],
    ['id' => 21, 'name' => 'Posang Mabantot'],
    ['id' => 22, 'name' => 'Ma Ano Ulam?'],
    ['id' => 23, 'name' => 'Kung Fu Mulutan'],
    ['id' => 24, 'name' => 'BulSU Sarmiento Branch'],
    ['id' => 25, 'name' => 'Bea Baduday 1'],
    ['id' => 26, 'name' => 'Bea Baduday 2'],
    ['id' => 27, 'name' => 'Bea Baduday 3'],
    ['id' => 28, 'name' => 'Apple ni Bea'],
    ['id' => 29, 'name' => 'TV Girl 1'],
    ['id' => 30, 'name' => 'TV Girl 2'],
    ['id' => 31, 'name' => 'Perks of being a Wallflower'],
    ['id' => 32, 'name' => 'The End of the F***king World'],
    ['id' => 33, 'name' => 'Clairo'],
    ['id' => 34, 'name' => 'Chappell Roan 1'],
    ['id' => 35, 'name' => 'Chappell Roan 2'],
    ['id' => 36, 'name' => 'Mitski'],
    ['id' => 37, 'name' => '500 Days of Summer'],
    ['id' => 38, 'name' => 'Juno 1'],
    ['id' => 39, 'name' => 'Juno 2'],
    ['id' => 40, 'name' => 'Twilight Saga'],
    ['id' => 41, 'name' => 'Lady Bird'],
    ['id' => 42, 'name' => 'The Beatles'],
    ['id' => 43, 'name' => 'Sabrina Karpintero'],
    ['id' => 44, 'name' => 'Take a Bite'],
    ];
    foreach ($items as $item) {
        if (stripos($item['name'], $q) !== false) {
            $suggestions[] = $item;
        }
    }
}
header('Content-Type: application/json');
echo json_encode($suggestions);
