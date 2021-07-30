<?PHP
try {
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=health_care', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
