<?php
// Function to authenticate a user
function authenticate(string $username, string $password, array $users): bool {
    // Check if the username exists in the users array
    if (array_key_exists($username, $users)) {
        // Verify if the provided password matches the stored password
        if ($users[$username] === $password) {
            return true; // Authentication successful
        }
    }
    return false; // Authentication failed
}

// Test data
$users = [
    'shamim' => 'password123',
    'ahamad' => 'securePassword!',
    'dewan'    => 'adminPass'
];

// Sample usage
$username = 'shamim';
$password = 'password123';

// Authenticate user
if (authenticate($username, $password, $users)) {
    echo "Authentication successful!";
} else {
    echo "Authentication failed!";
}