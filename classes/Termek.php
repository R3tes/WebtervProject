<?php

class Termek
{
    private string $termekNev;
    private int $ar;
    private array $mennyiseg;

    public function __construct(string $termekNev, int $ar, array $mennyiseg)
    {
        $this->termekNev = $termekNev;
        $this->ar = $ar;
        $this->mennyiseg = $mennyiseg;
    }

    public function getTermekNev(): string
    {
        return $this->termekNev;
    }

    public function setTermekNev(string $termekNev): void
    {
        $this->termekNev = $termekNev;
    }

    public function getAr(): int
    {
        return $this->ar;
    }

    public function setAr(int $ar): void
    {
        $this->ar = $ar;
    }

    public function getMennyiseg(): array
    {
        return $this->mennyiseg;
    }

    public function setMennyiseg(array $mennyiseg): void
    {
        $this->mennyiseg = $mennyiseg;
    }

    public function __toString(): string
    {
        return $this->termekNev . ", ára: " . $this->ar;
    }

}