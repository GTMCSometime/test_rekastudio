<?php

// Получение токена УЖЕ ЗАРЕГИСТРИРОВАННОГО пользователя
$loginData = [
    'email' => 'user@example.com',
    'password' => 'userUser123'
];

$ch = curl_init('http://localhost:8006/api/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($loginData));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$response = curl_exec($ch);
$data = json_decode($response, true);
$token = $data['token'] ?? null;

if (!$token) {
    die("Неавторизованное действие\n");
}

echo "Token: $token\n";

// Создание задачи
$taskData = [
    'title' => 'Задача',
    'text' => 'Эта задача создана через curl',
    'tags' => [1, 2] // ID существующих тегов (заполнить самостоятельно, либо через php artisan:db seed)
];

$ch = curl_init('http://localhost:8006/api/tasks');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($taskData));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token
]);

$response = curl_exec($ch);
$task = json_decode($response, true);

echo "Создание задачи:\n";
print_r($task);

// Получение списка задач
$ch = curl_init('http://localhost:8006/api/tasks');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $token
]);

$response = curl_exec($ch);
$tasks = json_decode($response, true);

echo "\nСписок задач:\n";
print_r($tasks);