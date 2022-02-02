<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestRepository::class)
 */
class Test
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gg;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGg(): ?string
    {
        return $this->gg;
    }

    public function setGg(string $gg): self
    {
        $this->gg = $gg;

        return $this;
    }
}
