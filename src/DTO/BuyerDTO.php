<?php

namespace App\DTO;

use App\Data\BuyerInterface;

class BuyerDTO implements BuyerInterface
{

    private int $country_id;
    private string $country_code;
    private string $country_code3;
    private string $shop_username;
    private string $email;
    private string $phone;
    private string $address;
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data['data'];
        $this->country_id = $data['country_id'];
        $this->country_code = $data['country_code'];
        $this->country_code3 = $data['country_code3'];
        $this->shop_username = $data['shop_username'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->address = $data['address'];
    }

    public function offsetExists(mixed $offset): bool
    {
        $value = $this->{"get$offset"}();
        return $value !== null;
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->{"get$offset"}();
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->{"set$offset"}($value);
    }

    public function offsetUnset(mixed $offset): void
    {
        $this->{"set$offset"}(null);
    }

    /**
     * @return int
     */
    public function getCountryId(): int
    {
        return $this->country_id;
    }

    /**
     * @param int $country_id
     */
    public function setCountryId(int $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->country_code;
    }

    /**
     * @param string $country_code
     */
    public function setCountryCode(string $country_code): void
    {
        $this->country_code = $country_code;
    }

    /**
     * @return string
     */
    public function getCountryCode3(): string
    {
        return $this->country_code3;
    }

    /**
     * @param string $country_code3
     */
    public function setCountryCode3(string $country_code3): void
    {
        $this->country_code3 = $country_code3;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getShopUsername(): string
    {
        return $this->shop_username;
    }

    /**
     * @param string $shop_username
     */
    public function setShopUsername(string $shop_username): void
    {
        $this->shop_username = $shop_username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }


}