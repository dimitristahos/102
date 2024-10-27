<?php
// Database connection
$host = 'db';  // Use the service name defined in docker-compose.yml
$db = 'notes_db';
$user = 'user';
$pass = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['note'])) {
    $stmt = $pdo->prepare('INSERT INTO notes (content) VALUES (?)');
    $stmt->execute([$_POST['note']]);
}

// Fetch notes
$stmt = $pdo->query('SELECT * FROM notes');
$notes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note App</title>
</head>

<body>
    <h1>Notes</h1>
    <form method="POST">
        <textarea name="note" required></textarea>
        <button type="submit">Add Note</button>
    </form>
    <ul>
        <?php foreach ($notes as $note): ?>
            <li><?php echo htmlspecialchars($note['content']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>