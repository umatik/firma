<?php
declare(strict_types = 1);

namespace App\Invoice\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="invoice")
 * @ORM\Entity(repositoryClass="App\Invoice\Domain\Repository\InvoiceRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Invoice
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="invoice_number", type="string", length=32)
     */
    private $invoiceNumber;

    /**
     * @ORM\Column(name="client_type", type="smallint", length=1)
     */
    private $clientType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Invoice\Domain\Entity\Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="App\Contractor\Domain\Entity\Contractor")
     * @ORM\JoinColumn(name="contractor_id", referencedColumnName="id")
     */
    private $contractor;

    /**
     * @ORM\Column(name="payment_day", type="datetime")
     */
    private $paymentDay;

    /**
     * @ORM\Column(name="total_brutto_worth", type="float")
     */
    private $totalBruttoWorth;

    /**
     * @ORM\Column(name="to_pay", type="float")
     */
    private $toPay;

    /**
     * @ORM\Column(name="paid", type="float")
     */
    private $paid;

    /**
     * @ORM\Column(name="payment_type", type="smallint", length=1)
     */
    private $paymentType;

    /**
     * @ORM\Column(name="issued_date", type="datetime")
     */
    private $issuedDate;

    /**
     * @ORM\Column(name="sale_date", type="datetime")
     */
    private $saleDate;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate()
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    public function getClientType()
    {
        return $this->clientType;
    }

    public function setClientType($clientType)
    {
        $this->clientType = $clientType;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setClient($client)
    {
        $this->client = $client;
    }

    public function getContractor()
    {
        return $this->contractor;
    }

    public function setContractor($contractor)
    {
        $this->contractor = $contractor;
    }

    public function getPaymentDay()
    {
        return $this->paymentDay;
    }

    public function setPaymentDay($paymentDay)
    {
        $this->paymentDay = $paymentDay;
    }

    public function getTotalBruttoWorth()
    {
        return $this->totalBruttoWorth;
    }

    public function setTotalBruttoWorth($totalBruttoWorth)
    {
        $this->totalBruttoWorth = $totalBruttoWorth;
    }

    public function getToPay()
    {
        return $this->toPay;
    }

    public function setToPay($toPay)
    {
        $this->toPay = $toPay;
    }

    public function getPaid()
    {
        return $this->paid;
    }

    public function setPaid($paid)
    {
        $this->paid = $paid;
    }

    public function getPaymentType()
    {
        return $this->paymentType;
    }

    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
    }

    public function getIssuedDate()
    {
        return $this->issuedDate;
    }

    public function setIssuedDate($issuedDate)
    {
        $this->issuedDate = $issuedDate;
    }

    public function getSaleDate()
    {
        return $this->saleDate;
    }

    public function setSaleDate($saleDate)
    {
        $this->saleDate = $saleDate;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
