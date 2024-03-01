<?php
require("./predis-2.x/src/autoload");
    // Create a new Predis client instance
$redis = new Predis\Client();

// Test the connection
try {
    $redis->ping();
    echo "Connected to Redis server\n";
} catch (Exception $e) {
    echo "Could not connect to Redis server: " . $e->getMessage() . "\n";
}
