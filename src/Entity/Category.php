<?php

namespace App\Entity;

use Doctrine\ORM\Tools\DisconnectedClassMetadataFactory;
use Doctrine\Bundle\DoctrineBundle\Mapping\DisconnectedMetadataFactory;
use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ORM\Table(name:"categories")]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "bigint")]
    private ?int $categoryid = null;

    #[ORM\Column(type: "text")]
    private ?string $name = null;

    public function getCategoryid(): ?int
    {
        return $this->categoryid;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
