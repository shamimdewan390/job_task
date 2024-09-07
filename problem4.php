<?php

// Function to search for a client and return their details including sub-clients
function searchClient(string $clientName, array $clients): ?array {
    // Iterate over each client in the array
    foreach ($clients as $client) {
        // Check if the current client's name matches the search term
        if ($client['name'] === $clientName) {
            return $client;
        }

        // If the client has sub-clients, search recursively in the sub-clients
        if (isset($client['sub_clients']) && is_array($client['sub_clients'])) {
            $result = searchClient($clientName, $client['sub_clients']);
            if ($result !== null) {
                return $result;
            }
        }
    }

    // If no matching client is found, return null
    return null;
}

// Sample hierarchical client data
$clients = [
    [
        'name' => 'Company A',
        'sub_clients' => [
            [
                'name' => 'SubClient A1',
                'sub_clients' => [
                    ['name' => 'SubClient A1.1'],
                    ['name' => 'SubClient A1.2']
                ]
            ],
            ['name' => 'SubClient A2']
        ]
    ],
    [
        'name' => 'Company B',
        'sub_clients' => [
            ['name' => 'SubClient B1'],
            ['name' => 'SubClient B2']
        ]
    ]
];

// Sample usage
$clientName = 'SubClient A1';
$clientDetails = searchClient($clientName, $clients);

// Output the client details if found
if ($clientDetails) {
    print_r($clientDetails);
} else {
    echo "Client not found.";
}
