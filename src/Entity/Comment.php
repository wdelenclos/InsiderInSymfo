<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $timestamp;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Backlog", inversedBy="comments")
     */
    private $backlog;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Status", inversedBy="comments")
     */
    private $bug;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeInterface $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getBacklog(): ?Backlog
    {
        return $this->backlog;
    }

    public function setBacklog(?Backlog $backlog): self
    {
        $this->backlog = $backlog;

        return $this;
    }

    public function getBug(): ?Bug
    {
        return $this->bug;
    }

    public function setBug(?Bug $bug): self
    {
        $this->bug = $bug;

        return $this;
    }
}
