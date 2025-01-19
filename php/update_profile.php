<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $profession = $_POST['profession'];
    $skills = implode(',', $_POST['skills'] ?? []);
    $interests = implode(',', $_POST['interests'] ?? []);
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];

    // 處理頭像上傳
    $avatar = null;
    if (!empty($_FILES['avatar']['tmp_name'])) {
        $avatarPath = 'uploads/' . basename($_FILES['avatar']['name']);
        move_uploaded_file($_FILES['avatar']['tmp_name'], $avatarPath);
        $avatar = $avatarPath;
    }

    try {
        $query = "UPDATE users SET profession = ?, skills = ?, interests = ?, birthday = ?, gender = ?" . ($avatar ? ", avatar = ?" : "") . " WHERE id = ?";
        $stmt = $mysqli->prepare($query);

        if ($avatar) {
            $stmt->bind_param('ssssssi', $profession, $skills, $interests, $birthday, $gender, $avatar, $userId);
        } else {
            $stmt->bind_param('sssssi', $profession, $skills, $interests, $birthday, $gender, $userId);
        }
        $stmt->execute();

        header('Location: member.php?success=1');
        exit;
    } catch (Exception $e) {
        die('錯誤: ' . $e->getMessage());
    }
}
?>
