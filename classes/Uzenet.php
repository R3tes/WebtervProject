<?php

class Uzenet {

    private string $kuldoNev;
    private string $kuldoEmail;
    private string $uzenet;

    public function __construct(string $kuldoNev, string $kuldoEmail, string $uzenet)
    {
        $this->kuldoNev = $kuldoNev;
        $this->kuldoEmail = $kuldoEmail;
        $this->uzenet = $uzenet;
    }


    public function getKuldoNev(): string
    {
        return $this->kuldoNev;
    }


    public function setKuldoNev(string $kuldoNev): void
    {
        $this->kuldoNev = $kuldoNev;
    }


    public function getKuldoEmail(): string
    {
        return $this->kuldoEmail;
    }


    public function setKuldoEmail(string $kuldoEmail): void
    {
        $this->kuldoEmail = $kuldoEmail;
    }


    public function getUzenet(): string
    {
        return $this->uzenet;
    }


    public function setUzenet(string $uzenet): void
    {
        $this->uzenet = $uzenet;
    }



}