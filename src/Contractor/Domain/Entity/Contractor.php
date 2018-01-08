<?php
declare(strict_types = 1);

namespace App\Contractor\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="contractor")
 * @ORM\Entity(repositoryClass="App\Contractor\Domain\Repository\ContractorRepository")
 */
class Contractor
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(name="nip", type="string", length=10)
     */
    private $nip;

    /**
     * @ORM\Column(name="regon", type="string", length=14)
     */
    private $regon;

    /**
     * @ORM\Column(name="address", type="string", length=150)
     */
    private $address;

    /**
     * @ORM\Column(name="postal_code", type="string", length=6)
     */
    private $postalCode;

    /**
     * @ORM\Column(name="city", type="string", length=100)
     */
    private $city;

    /**
     * @ORM\Column(name="phone_number", type="string", length=12)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(name="discount", type="float")
     */
    private $discount;

    public function __construct()
    {
        $this->discount = 0.00;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getNip(): ?string
    {
        return $this->nip;
    }

    public function setNip(string $nip): void
    {
        $this->nip = $nip;
    }
    
    public function getRegon(): ?string
    {
        return $this->regon;
    }

    public function setRegon(string $regon): void
    {
        $this->regon = $regon;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }
    
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
    }
}
