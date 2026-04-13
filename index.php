<?php
// Allowed destinations (whitelist for safety)
$allowed = [
    "page1" => "https://ipfs.io/ipfs/bafybeiayw5cdvvpvxxjql2ag4hny4hjq3ek6cbgdet4cj2g3is3ow66z4m/",
    "home"  => "https://example.com"
];

// Get key
$key = $_GET['r'] ?? '';

// Validate
if (!array_key_exists($key, $allowed)) {
    http_response_code(404);
    echo "Invalid link";
    exit;
}

// (Optional) Log click
file_put_contents("clicks.log",
    date("Y-m-d H:i:s") . " | " . $_SERVER['REMOTE_ADDR'] . " | $key\n",
    FILE_APPEND
);

// Redirect
header("Location: " . $allowed[$key], true, 302);
exit;
