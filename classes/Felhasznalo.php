<?php

class Felhasznalo
{
    private string $felhasznalonev;
    private string $jelszo;
    private string $email;
    private int $szuletesiDatum;
    private int $versenyzoAzonosito;
    private string $nem;
    private bool $hozEkontrollert;
    private bool $vettEmarResztVersenyen;
    private array $bemutatkozas;
    private array $kosar;

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

    public function getSzuletesiDatum(): int
    {
        return $this->szuletesiDatum;
    }

    public function setSzuletesiDatum(int $szuletesiDatum): void
    {
        $this->szuletesiDatum = $szuletesiDatum;
    }

    public function getVersenyzoAzonosito(): int
    {
        return $this->versenyzoAzonosito;
    }

    public function setVersenyzoAzonosito(int $versenyzoAzonosito): void
    {
        $this->versenyzoAzonosito = $versenyzoAzonosito;
    }

    public function getNem(): string
    {
        return $this->nem;
    }

    public function setNem(string $nem): void
    {
        $this->nem = $nem;
    }

    public function isHozEkontrollert(): bool
    {
        return $this->hozEkontrollert;
    }

    public function setHozEkontrollert(bool $hozEkontrollert): void
    {
        $this->hozEkontrollert = $hozEkontrollert;
    }

    public function isVettEmarResztVersenyen(): bool
    {
        return $this->vettEmarResztVersenyen;
    }


    public function setVettEmarResztVersenyen(bool $vettEmarResztVersenyen): void
    {
        $this->vettEmarResztVersenyen = $vettEmarResztVersenyen;
    }

    public function getBemutatkozas(): array
    {
        return $this->bemutatkozas;
    }

    public function setBemutatkozas(array $bemutatkozas): void
    {
        $this->bemutatkozas = $bemutatkozas;
    }

    public function getKosar(): array
    {
        return $this->kosar;
    }

    public function setKosar(array $kosar): void
    {
        $this->kosar = $kosar;
    }

    public function __toString(): string
    {
        return $this->felhasznalonev . ", születési év: " . $this->szuletesiDatum . ", e-mail cím: " .
            $this->email . ", neme: " . $this->nem;
    }

}