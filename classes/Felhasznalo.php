<?php

class Felhasznalo
{
    private string $felhasznalonev;
    private string $jelszo;
    private string $email;
    private string $nem;
    private array $kosar;
    private bool $admin;
    private bool $blocked;

    public function __construct(string $felhasznalonev, string $jelszo, string $email, string $nem)
    {
        $this->felhasznalonev = $felhasznalonev;
        $this->jelszo = $jelszo;
        $this->email = $email;
        $this->szuletesiDatum = 0;
        $this->versenyzoAzonosito = -1;
        $this->nem = $nem;
        $this->hozEkontrollert = false;
        $this->vettEmarResztVersenyen = false;
        $this->bemutatkozas = [];
        $this->kosar = [];
        $this->admin = false;
        $this->blocked = false;
    }

    public function getFelhasznalonev(): string
    {
        return $this->felhasznalonev;
    }

    public function setFelhasznalonev(string $felhasznalonev): void
    {
        $this->felhasznalonev = $felhasznalonev;
    }

    public function getJelszo(): string
    {
        return $this->jelszo;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getNem(): string
    {
        return $this->nem;
    }

    public function setNem(string $nem): void
    {
        $this->nem = $nem;
    }

    public function getKosar(): array
    {
        return $this->kosar;
    }

    public function setKosar(array $kosar): void
    {
        $this->kosar = $kosar;
    }

    public function isAdmin() : bool
    {
        return $this->admin;
    }

    public function setAdmin(bool $admin) : void
    {
        $this->admin = $admin;
    }

    public function __toString(): string
    {
        return $this->felhasznalonev . ", születési év: " . $this->szuletesiDatum . ", e-mail cím: " .
            $this->email . ", neme: " . $this->nem;
    }


    public function isBlocked(): bool
    {
        return $this->blocked;
    }


    public function setBlocked(bool $blocked): void
    {
        $this->blocked = $blocked;
    }


    public function kosarbaTesz(CartItem $newItem): void {

        foreach ($this->kosar as $item) {

            if ($item->getNev() === $newItem->getNev()) {
                $item->setKosarMennyiseg($item->getKosarMennyiseg() + 1);
                $item->setAr($item->getAr() + $newItem->getAr());
                return;
            }
        }

        $this->kosar[] = $newItem;
    }

}