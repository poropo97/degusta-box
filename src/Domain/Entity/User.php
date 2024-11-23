<?php

namespace App\Domain\Entity;

use DateTimeImmutable;

class User
{
    private ?int $id = null;
    private string $username;
    private string $email;
    private string $password;
    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $updatedAt;

    public function __construct(string $username, string $email, string $hashedPassword)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $hashedPassword;
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();
    }

    // Getters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    // Setters

    public function setUsername(string $username): self
    {
        $this->username = $username;
        $this->updateTimestamp();
        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        $this->updateTimestamp();
        return $this;
    }

    public function setPassword(string $hashedPassword): self
    {
        $this->password = $hashedPassword;
        $this->updateTimestamp();
        return $this;
    }

    // Métodos adicionales

    private function updateTimestamp(): void
    {
        $this->updatedAt = new DateTimeImmutable();
    }
}
