<?php

class User {
    private string $name;
    private string $email;

    public function __construct(string $name, string $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function isEmailValid(): bool {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
