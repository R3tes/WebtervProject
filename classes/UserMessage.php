<?php

class UserMessage {

    private string $kuldo;
    private string $fogado;
    private string $uzenet;
    private DateTime $uzenetDatuma;

    public function __construct(string $kuldo, string $fogado, string $uzenet)
    {
        $this->kuldo = $kuldo;
        $this->fogado = $fogado;
        $this->uzenetDatuma = new DateTime();
        $this->uzenetDatuma->setTimezone(new DateTimeZone("Europe/Budapest"));
        $this->uzenet = $uzenet;

    }


    public function getKuldo(): string
    {
        return $this->kuldo;
    }


    public function setKuldo(string $kuldo): void
    {
        $this->kuldo = $kuldo;
    }


    public function getFogado(): string
    {
        return $this->fogado;
    }


    public function setFogado(string $fogado): void
    {
        $this->fogado = $fogado;
    }

    public function getUzenetDatuma(): DateTime
    {
        return $this->uzenetDatuma;
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