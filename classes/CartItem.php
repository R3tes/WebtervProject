<?php

class CartItem
{
    private string $nev;
    private int $kosarMennyiseg;
    private int $ar;

    public function __construct(Termek $termek, int $kosarMennyiseg=1) {
        $this->nev = $termek->getTermekNev();
        $this->kosarMennyiseg = $kosarMennyiseg;
        $this->ar = $this->kosarMennyiseg * $termek->getAr();
    }


    public function getNev(): string {
        return $this->nev;
    }

    public function setNev(string $nev): void {
        $this->nev = $nev;
    }

    public function getKosarMennyiseg(): int {
        return $this->kosarMennyiseg;
    }

    public function setKosarMennyiseg(int $kosarMennyiseg): void {
        $this->kosarMennyiseg = $kosarMennyiseg;
    }

    public function getAr(): int {
        return $this->ar;
    }

    public function setAr(int $ar): void {
        $this->ar = $ar;
    }

    public function __toString(): string {
        return $this->kosarMennyiseg . " " . strtolower($this->nev) . " (Össz ár: " . $this->ar . " Ft)";
    }
}