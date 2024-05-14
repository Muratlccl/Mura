<?php

// Database configuration
$host = 'localhost';
$dbname = 'video_db';
$username = 'your_username';
$password = 'your_password';

// Create database connection
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Retrieve video data based on video ID
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['video_id'])) {
        $video_id = $_GET['video_id'];
        $stmt = $db->prepare("SELECT * FROM videos WHERE id = :video_id");
        $stmt->bindParam(':video_id', $video_id);
        $stmt->execute();
        $video = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($video) {
            header('Content-Type: application/json');
            echo json_encode($video);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "Video not found."));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Missing video_id parameter."));
    }
} else {
    http_response_code(405);
    echo json_encode(array("message" => "Method not allowed."));
}
