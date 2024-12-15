<?php

// Get environment variables from Vercel
$supabaseUrl = getenv('https://rzfwwlwksszrkglkqwsc.supabase.co');  // Get your Supabase URL from the environment variables
$supabaseKey = getenv('SUPABASE_KEY');  // Get your Supabase API Key from the environment variables

// Set up the table name you want to interact with
$table = 'users';  // Example table name

// Set the API URL to query the Supabase REST API
$apiUrl = $supabaseUrl . '/rest/v1/' . $table;

// Set up headers
$headers = [
    'Authorization: Bearer ' . $supabaseKey,
    'Content-Type: application/json',
    'Accept: application/json'
];

// Initialize cURL
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute the cURL request and store the response
$response = curl_exec($ch);

// Check for cURL errors
if ($response === false) {
    // If there’s an error with the request
    echo 'Error fetching data from Supabase: ' . curl_error($ch);
} else {
    // If the request is successful, output the result
    echo 'Response from Supabase: ' . $response;
}

// Close the cURL session
curl_close($ch);
?>
