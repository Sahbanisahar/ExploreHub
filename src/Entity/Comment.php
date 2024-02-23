<?php

namespace App\Entity;

use Doctrine\ORM\Tools\DisconnectedClassMetadataFactory;
use Doctrine\Bundle\DoctrineBundle\Mapping\DisconnectedMetadataFactory;
use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
#[ORM\Table(name:"comments")]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "bigint")]
    private ?int $commentid = null;

    #[ORM\Column(type: "text")]
    private ?string $content = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "authorid", referencedColumnName: "userid")]
    private ?User $author = null;

    #[ORM\Column(type: "integer")]
    private ?int $react = null;

    public function getCommentid(): ?int
    {
        return $this->commentid;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getReact(): ?int
    {
        return $this->react;
    }

    public function setReact(?int $react): self
    {
        $this->react = $react;

        return $this;
    }
}
