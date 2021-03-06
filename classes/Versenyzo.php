<?php

class Versenyzo
{
    private string $nev;
    private DateTime $szuletesiDatum;
    private string $email;
    private int $versenyzoAzonosito;
    private string $nem;
    private bool $hozEkontrollert;
    private bool $vettEmarResztVersenyen;
    private string $bemutatkozas;

    public function __construct(string $nev, DateTime $szuletesiDatum, string $email, int $versenyzoAzonosito, string $nem="egyéb",
                                bool $hozEkontrollert=false, bool $vettEmarResztVersenyen=false, string $bemutatkozas="")
    {
        $this->nev = $nev;
        $this->szuletesiDatum = $szuletesiDatum;
        $this->email = $email;
        $this->versenyzoAzonosito = $versenyzoAzonosito;
        $this->nem = $nem;
        $this->hozEkontrollert = $hozEkontrollert;
        $this->vettEmarResztVersenyen = $vettEmarResztVersenyen;
        $this->bemutatkozas = $bemutatkozas;
    }


    public function getNev(): string
    {
        return $this->nev;
    }

    public function setNev(string $nev): void
    {
        $this->nev = $nev;
    }

    public function getSzuletesiDatum(): DateTime
    {
        return $this->szuletesiDatum;
    }

    public function setSzuletesiDatum(DateTime $szuletesiDatum): void
    {
        $this->szuletesiDatum = $szuletesiDatum;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
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

    public function getBemutatkozas(): string
    {
        return $this->bemutatkozas;
    }

    public function setBemutatkozas(string $bemutatkozas): void
    {
        $this->bemutatkozas = $bemutatkozas;
    }

    public function __toString(): string
    {
        return 'valami';
    }

}