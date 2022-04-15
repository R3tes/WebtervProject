<?php

class Order
{
    private string $customer;
    private array $orderedItems;
    private DateTime $orderDate;
    private bool $shipped;

    public function __construct(string $felhasznalonev, array $orderedItems) {
        $this->customer = $felhasznalonev;
        $this->orderedItems = $orderedItems;
        $this->shipped = false;

        $this->orderDate = new DateTime();
        $this->orderDate->setTimezone(new DateTimeZone("Europe/Budapest"));
    }

    public function getCustomer(): string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): void
    {
        $this->customer = $customer;
    }

    public function getOrderedItems(): array
    {
        return $this->orderedItems;
    }

    public function setOrderedItems(array $orderedItems): void
    {
        $this->orderedItems = $orderedItems;
    }

    public function getOrderDate(): DateTime
    {
        return $this->orderDate;
    }

    public function setOrderDate(DateTime $orderDate): void
    {
        $this->orderDate = $orderDate;
    }

    public function isShipped(): bool
    {
        return $this->shipped;
    }

    public function setShipped(bool $shipped): void
    {
        $this->shipped = $shipped;
    }


}