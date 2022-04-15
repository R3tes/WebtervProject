<?php

class Termek
{
    private string $termekNev;
    private int $ar;
    private int $mennyiseg;

    public function __construct(string $termekNev, int $ar, int $mennyiseg)
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

    public function getMennyiseg(): int
    {
        return $this->mennyiseg;
    }

    public function setMennyiseg(int $mennyiseg): void
    {
        $this->mennyiseg = $mennyiseg;
    }

    public function __toString(): string
    {
        return $this->termekNev . ", ára: " . $this->ar;
    }

}