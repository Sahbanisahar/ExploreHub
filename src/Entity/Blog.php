<?php

namespace App\Entity;

use Doctrine\ORM\Tools\DisconnectedClassMetadataFactory;
use Doctrine\Bundle\DoctrineBundle\Mapping\DisconnectedMetadataFactory;
use App\Repository\BlogRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

#[ORM\Entity(repositoryClass: BlogRepository::class)]
#[ORM\Table(name:"blogs")]
class Blog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "bigint")]
    private ?int $blogid = null;

    #[ORM\Column(type: "text")]
    private ?string $title = null;

    #[ORM\Column(type: "text")]
    private ?string $content = null;

    #[ORM\Column(type: "text")]
    private ?string $author = null;

    #[ORM\Column(type: "blob")]
    private ?string $image = null;

    public function getBlogid(): ?int
    {
        return $this->blogid;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
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

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
