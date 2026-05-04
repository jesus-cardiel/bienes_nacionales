<?php
try { 
    $db = new PDO('mysql:host=127.0.0.1;port=3306', 'root', ''); 
    $db->exec('CREATE DATABASE IF NOT EXISTS bienes_nacionales'); 
    echo 'Database created successfully'; 
} catch (PDOException $e) { 
    echo 'Error: ' . $e->getMessage(); 
}
