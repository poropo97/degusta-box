<?php

namespace App\Domain\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/*
* Representa una tarea que un usuario puede realizar.
*/
class Task
{
    private ?int $id = null;
    private string $name;
    private User $user; // El usuario al que pertenece la tarea
    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $updatedAt;
    /**
     * @var Collection|TimeEntry[]
     */
    private Collection $timeEntries;

    public function __construct(string $name, User $user)
    {
        $this->name = $name;
        $this->user = $user;
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();
        $this->timeEntries = new ArrayCollection();
    }

    // Getters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * @return Collection|TimeEntry[]
     */
    public function getTimeEntries(): Collection
    {
        return $this->timeEntries;
    }

    // Setters

    public function setName(string $name): self
    {
        $this->name = $name;
        $this->updateTimestamp();
        return $this;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        $this->updateTimestamp();
        return $this;
    }

    // Métodos 

    private function updateTimestamp(): void
    {
        $this->updatedAt = new DateTimeImmutable();
    }

    public function addTimeEntry(TimeEntry $timeEntry): self
    {
        if (!$this->timeEntries->contains($timeEntry)) {
            $this->timeEntries[] = $timeEntry;
            $timeEntry->setTask($this);
            $this->updateTimestamp();
        }

        return $this;
    }

    public function removeTimeEntry(TimeEntry $timeEntry): self
    {
        if ($this->timeEntries->removeElement($timeEntry)) {
            // Set the owning side to null (unless already changed)
            if ($timeEntry->getTask() === $this) {
                $timeEntry->setTask(null);
                $this->updateTimestamp();
            }
        }

        return $this;
    }
}
