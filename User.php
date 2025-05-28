<?php

/**
 * Класс пользователя.
 */
class User {
    private string $name;
    private string $email;

    public function __construct(string $name, string $email) {
        if (empty(trim($name))) {
            throw new InvalidArgumentException("Имя не может быть пустым");
        }

        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Получить имя пользователя.
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Получить email пользователя.
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Проверить, является ли email допустимым.
     */
    public function isEmailValid(): bool {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Получить логин (имя пользователя) из email.
     * Например: для "john@example.com" вернёт "john"
     */
    public function getUsername(): string {
        return strstr($this->email, '@', true);
    }
}

