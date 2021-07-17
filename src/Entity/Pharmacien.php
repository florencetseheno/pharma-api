<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PharmacienRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PharmacienRepository::class)
 */
class Pharmacien
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom_pharmacien;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $prenom_pharmacien;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPharmacien(): ?string
    {
        return $this->nom_pharmacien;
    }

    public function setNomPharmacien(string $nom_pharmacien): self
    {
        $this->nom_pharmacien = $nom_pharmacien;

        return $this;
    }

    public function getPrenomPharmacien(): ?string
    {
        return $this->prenom_pharmacien;
    }

    public function setPrenomPharmacien(string $prenom_pharmacien): self
    {
        $this->prenom_pharmacien = $prenom_pharmacien;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(?string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }
}
