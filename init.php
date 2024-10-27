<?php
// Database connection
$host = '157.90.156.100:4535';  // Use the service name defined in docker-compose.yml
$db = 'pop';
$user = 'pop';
$pass = 'pop';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Check if the notes table exists
    $stmt = $pdo->query("SHOW TABLES LIKE 'notes'");
    if ($stmt->rowCount() == 0) {
        // Create the notes table if it doesn't exist
        $pdo->exec("CREATE TABLE notes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            content TEXT NOT NULL
        )");
        echo "Table 'notes' created successfully.";
    } else {
        echo "Table 'notes' already exists.";
    }
} catch (\PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit; // Exit if connection fails
}
