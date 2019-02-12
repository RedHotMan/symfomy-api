<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\BorrowRepository")
 */
class Borrow
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $BorrowingDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ReturnDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $state;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="App\Entity\CopyBook", inversedBy="borrows")
     */
    private $CopyBook;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Borrower", inversedBy="borrows")
     */
    private $borrower;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorrowingDate(): ?\DateTimeInterface
    {
        return $this->BorrowingDate;
    }

    public function setBorrowingDate(\DateTimeInterface $BorrowingDate): self
    {
        $this->BorrowingDate = $BorrowingDate;

        return $this;
    }

    public function getReturnDate(): ?\DateTimeInterface
    {
        return $this->ReturnDate;
    }

    public function setReturnDate(\DateTimeInterface $ReturnDate): self
    {
        $this->ReturnDate = $ReturnDate;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getCopyBook(): ?CopyBook
    {
        return $this->CopyBook;
    }

    public function setCopyBook(?CopyBook $CopyBook): self
    {
        $this->CopyBook = $CopyBook;

        return $this;
    }

    public function getBorrower(): ?Borrower
    {
        return $this->borrower;
    }

    public function setBorrower(?Borrower $borrower): self
    {
        $this->borrower = $borrower;

        return $this;
    }
}
