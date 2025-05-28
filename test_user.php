<?php

require_once 'User.php';

/**
 * Простая функция для проверки результатов.
 */
function assertEqual($expected, $actual, $message = '') {
    if ($expected === $actual) {
        echo "✅ PASS: $message\n";
    } else {
        echo "❌ FAIL: $message\n";
        echo "   Expected: " . var_export($expected, true) . "\n";
        echo "   Actual:   " . var_export($actual, true) . "\n";
    }
}

// ✅ Тест с валидными данными
$user = new User("Alice", "alice@example.com");

assertEqual("Alice", $user->getName(), "Имя должно быть 'Alice'");
assertEqual("alice@example.com", $user->getEmail(), "Email должен быть 'alice@example.com'");
assertEqual(true, $user->isEmailValid(), "Email должен быть валидным");
assertEqual("alice", $user->getUsername(), "Username должен быть 'alice'");

// ❌ Тест с невалидным email
$invalidUser = new User("Bob", "неправильный_email");
assertEqual(false, $invalidUser->isEmailValid(), "Email должен быть невалидным");

// ❌ Тест: создание с пустым именем (должно выбросить исключение)
try {
    $brokenUser = new User(" ", "test@example.com");
    echo "❌ FAIL: Должно быть выброшено исключение для пустого имени\n";
} catch (InvalidArgumentException $e) {
    echo "✅ PASS: Исключение поймано при пустом имени: " . $e->getMessage() . "\n";
}

