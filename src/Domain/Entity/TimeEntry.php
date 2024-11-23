<?php
// src/Domain/Entity/TimeEntry.php

namespace App\Domain\Entity;

use DateTimeImmutable;

/*
 * Representa un registro de tiempo para una tarea.
 */
class TimeEntry
{
    private ?int $id = null;
    private Task $task; // La tarea a la que pertenece este registro de tiempo
    private DateTimeImmutable $startTime; // Hora de inicio
    private ?DateTimeImmutable $finishedAt; // Hora de finalización (puede ser null si está en progreso)
    private DateTimeImmutable $createdAt;

    public function __construct(Task $task, DateTimeImmutable $startTime)
    {
        $this->task = $task;
        $this->startTime = $startTime;
        $this->finishedAt = null;
        $this->createdAt = new DateTimeImmutable();
    }

    // Getters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTask(): Task
    {
        return $this->task;
    }

    public function getStartTime(): DateTimeImmutable
    {
        return $this->startTime;
    }

    public function getFinishedAt(): ?DateTimeImmutable
    {
        return $this->finishedAt;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    // Setters

    public function setTask(Task $task): self
    {
        $this->task = $task;
        return $this;
    }

    public function setStartTime(DateTimeImmutable $startTime): self
    {
        $this->startTime = $startTime;
        return $this;
    }

    public function setFinishedAt(?DateTimeImmutable $finishedAt): self
    {
        $this->finishedAt = $finishedAt;
        return $this;
    }

    // Métodos adicionales

    /**
     * Verifica si el registro de tiempo está activo (sin finalizar).
     */
    public function isActive(): bool
    {
        return $this->finishedAt === null;
    }

    /**
     * Calcula la duración total en segundos.
     * Retorna null si el registro está activo.
     */
    public function getDuration(): ?int
    {
        if ($this->finishedAt === null) {
            return null;
        }

        return $this->finishedAt->getTimestamp() - $this->startTime->getTimestamp();
    }
}
