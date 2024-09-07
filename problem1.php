<?php

// Function to return the total quantity of a product from the inventory
function totalQuantity(string $productName, array $products): int {
    foreach ($products as $product) {
        if ($product['product_name'] === $productName) {
            return $product['quantity'];
        }
    }
    return 0; // If product is not found, return 0
}

// Function to add stock to the inventory, or create a new product if it doesn't exist
function addStock(string $productName, int $quantity, array &$products): void {
    $found = false;
    
    // Iterate over the products to find if the product already exists
    foreach ($products as &$product) {
        if ($product['product_name'] === $productName) {
            // Product exists, update the quantity
            $product['quantity'] += $quantity;
            $found = true;
            break;
        }
    }
    
    // If the product does not exist, add it to the inventory
    if (!$found) {
        $products[] = [
            'product_name' => $productName,
            'quantity' => $quantity
        ];
    }
}

// Sample usage
$products = [
    ['product_name' => 'Mouse', 'quantity' => 25],
    ['product_name' => 'Laptop', 'quantity' => 10]
];

$productName = 'Laptop';

// Check the total quantity of "Mouse"
$totalQuantity=  totalQuantity($productName, $products);

echo "total quantity of $productName is: $totalQuantity \n";

// Add 5 more "Mouse" to the inventory
addStock($productName, 5, $products);

// Check again after adding stock
$afterAddedTotalQuantity = totalQuantity($productName, $products);

echo "after added total quantity is : $afterAddedTotalQuantity \n";
