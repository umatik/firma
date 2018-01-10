<?php
declare(strict_types = 1);

namespace App\Product\Domain\Entity;

use App\Common\Domain\Dictionary\Price;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="App\Product\Domain\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="unit", type="string", length=32)
     */
    private $unit;

    /**
     * @ORM\Column(name="pkwiu", type="string", length=10, nullable=true)
     */
    private $pkwiu;

    /**
     * @ORM\Column(name="amount_discount", type="float")
     */
    private $amountDiscount;

    /**
     * @ORM\Column(name="percentage_discount", type="float")
     */
    private $percentageDiscount;

    /**
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @ORM\Column(name="price_type", type="smallint", length=1)
     */
    private $priceType;

    /**
     * @ORM\Column(name="wholesale_price", type="float", nullable=true)
     */
    private $wholesalePrice;

    /**
     * @ORM\Column(name="vat_rate", type="float")
     */
    private $vatRate;

    public function __construct()
    {
        $this->amountDiscount = 0;
        $this->percentageDiscount = 0;
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

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): void
    {
        $this->unit = $unit;
    }

    public function getPkwiu(): ?string
    {
        return $this->pkwiu;
    }

    public function setPkwiu(string $pkwiu): void
    {
        $this->pkwiu = $pkwiu;
    }

    public function getAmountDiscount(): float
    {
        return $this->amountDiscount;
    }

    public function setAmountDiscount(float $amountDiscount): void
    {
        $this->amountDiscount = $amountDiscount;
    }

    public function getPercentageDiscount(): float
    {
        return $this->percentageDiscount;
    }

    public function setPercentageDiscount(float $percentageDiscount): void
    {
        $this->percentageDiscount = $percentageDiscount;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getPriceType(): ?int
    {
        return $this->priceType;
    }

    public function getPriceTypeText(): ?string
    {
        if (isset(Price::PRICE_TYPE[$this->priceType])) {
            return Price::PRICE_TYPE[$this->priceType];
        }
    }

    public function setPriceType(int $priceType): void
    {
        $this->priceType = $priceType;
    }

    public function getWholesalePrice(): ?float
    {
        return $this->wholesalePrice;
    }

    public function setWholesalePrice(float $wholesalePrice): void
    {
        $this->wholesalePrice = $wholesalePrice;
    }

    public function getVatRate(): ?float
    {
        return $this->vatRate;
    }

    public function setVatRate(float $vatRate): void
    {
        $this->vatRate = $vatRate;
    }
}
