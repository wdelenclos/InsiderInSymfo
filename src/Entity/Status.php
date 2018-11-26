<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatusRepository")
 */
class Status
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Backlog", mappedBy="status")
     */
    private $backlogs;

    public function __construct()
    {
        $this->backlogs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return Collection|Backlog[]
     */
    public function getBacklogs(): Collection
    {
        return $this->backlogs;
    }

    public function addBacklog(Backlog $backlog): self
    {
        if (!$this->backlogs->contains($backlog)) {
            $this->backlogs[] = $backlog;
            $backlog->setStatus($this);
        }

        return $this;
    }

    public function removeBacklog(Backlog $backlog): self
    {
        if ($this->backlogs->contains($backlog)) {
            $this->backlogs->removeElement($backlog);
            // set the owning side to null (unless already changed)
            if ($backlog->getStatus() === $this) {
                $backlog->setStatus(null);
            }
        }

        return $this;
    }
}
