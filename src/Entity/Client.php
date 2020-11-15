<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank(message="nom d'entreprise invalide")
     */
    private $nomEntreprise;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="nom du contact invalide")
     */
    private $nomContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emailContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min = 10, max = 10, exactMessage="Vous devez avoir 10 chiffres")
     * @Assert\Regex(pattern="/^[0-9]*$/", message="Vous ne pouvez pas avoir autre chose que des chiffres")
     */
    private $numTelephoneContact;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): self
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(string $nomContact): self
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(?string $emailContact): self
    {
        $this->emailContact = $emailContact;

        return $this;
    }

    public function getNumTelephoneContact(): ?string
    {
        return $this->numTelephoneContact;
    }

    public function setNumTelephoneContact(?string $numTelephoneContact): self
    {
        $this->numTelephoneContact = $numTelephoneContact;

        return $this;
    }
}
