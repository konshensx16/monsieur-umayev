<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LoginHistoryRepository")
 */
class LoginHistory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $last_visit;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="history")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastVisit(): ?\DateTimeInterface
    {
        return $this->last_visit;
    }

    public function setLastVisit(?\DateTimeInterface $last_visit): self
    {
        $this->last_visit = $last_visit;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        // set (or unset) the owning side of the relation if necessary
        $newHistory = $user === null ? null : $this;
        if ($newHistory !== $user->getHistory()) {
            $user->setHistory($newHistory);
        }

        return $this;
    }
}
