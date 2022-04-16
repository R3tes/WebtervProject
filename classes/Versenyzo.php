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
    private array $bemutatkozas;

    public function __construct(string $nev, int $szuletesiDatum, string $email, int $versenyzoAzonosito, string $nem,
                                bool $hozEkontrollert, bool $vettEmarResztVersenyen, array $bemutatkozas)
    {
        $this->nev = $nev;

        $this->szuletesiDatum = new DateTime();

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

    public function getBemutatkozas(): array
    {
        return $this->bemutatkozas;
    }

    public function setBemutatkozas(array $bemutatkozas): void
    {
        $this->bemutatkozas = $bemutatkozas;
    }

}