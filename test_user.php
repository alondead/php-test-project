<?php

require_once 'User.php';

function assertEqual($expected, $actual, $message = '') {
    if ($expected === $actual) {
        echo "✅ PASS: $message\n";
    } else {
        echo "❌ FAIL: $message\n";
        echo "   Expected: " . var_export($expected, true) . "\n";
        echo "   Actual:   " . var_export($actual, true) . "\n";
    }
}

// Тесты
$user = new User("Alice", "alice@example.com");

assertEqual("Alice", $user->getName(), "User name should be 'Alice'");
assertEqual("alice@example.com", $user->getEmail(), "User email should be 'alice@example.com'");
assertEqual(true, $user->isEmailValid(), "Email should be valid");

$invalidUser = new User("Bob", "not-an-email");
assertEqual(false, $invalidUser->isEmailValid(), "Email should be invalid");
