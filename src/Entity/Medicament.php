<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MedicamentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MedicamentRepository::class)
 */
class Medicament
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("medicament:all")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     * @Groups("medicament:all")
     */
    private $ref;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups("medicament:all")
     */
    private $designation;

    /**
     * @ORM\Column(type="text")
     * @Groups("medicament:all")
     */
    private $description;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups("medicament:all")
     */
    private $datefab;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datexp;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDatefab(): ?\DateTimeInterface
    {
        return $this->datefab;
    }

    public function setDatefab(?\DateTimeInterface $datefab): self
    {
        $this->datefab = $datefab;

        return $this;
    }

    public function getDatexp(): ?\DateTimeInterface
    {
        return $this->datexp;
    }

    public function setDatexp(?\DateTimeInterface $datexp): self
    {
        $this->datexp = $datexp;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
