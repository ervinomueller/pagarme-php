<?php

namespace PagarMe\Sdk\Customer\Request;

use PagarMe\Sdk\Customer\Address;
use PagarMe\Sdk\Customer\Phone;
use PagarMe\Sdk\RequestInterface;

class CustomerCreate implements RequestInterface
{
    /**
     * @var string |Identificador do cliente na loja
     */
    private $externalId;

    /**
     * @var string | Nome ou razão social do comprador
     */
    private $name;

    /**
     * @var string | E-mail do comprador
     */
    private $email;

    /**
     * @var int | Número do CPF ou CNPJ do cliente
     */
    private $documentNumber;

    /**
     * @var Address | Endereço do comprador
     */
    private $address;

    /**
     * @var Phone | Telefone do comprador
     */
    private $phone;

    /**
     * @var string | Tipo de documento
     */
    private $type;

    /**
     * @var string | Data de nascimento ex: '13121988'
     */
    private $bornAt;

    /**
     * @var string | Gênero
     */
    private $gender;

    /**
     * @param $externalId
     * @param string $name
     * @param string $email
     * @param int $documentNumber
     * @param Address $address
     * @param Phone $phone
     * @param $type
     * @param string $bornAt
     * @param string $gender
     */
    public function __construct(
        $externalId,
        $name,
        $email,
        $documentNumber,
        Address $address,
        Phone $phone,
        $type,
        $bornAt,
        $gender
    )
    {
        $this->externalId     = $externalId;
        $this->name           = $name;
        $this->email          = $email;
        $this->documentNumber = $documentNumber;
        $this->address        = $address;
        $this->phone          = $phone;
        $this->type           = $type;
        $this->bornAt         = $bornAt;
        $this->gender         = $gender;
    }

    /**
     * @return array
     */
    public function getPayload()
    {
        return [
            'external_id'     => $this->externalId,
            'name'            => $this->name,
            'email'           => $this->email,
            'document_number' => $this->documentNumber,
            'address'         => $this->getAddresssData(),
            'phone'           => $this->getPhoneData(),
            'type'            => $this->type,
            'born_at'         => $this->bornAt,
            'gender'          => $this->gender,
        ];
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return 'customers';
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return self::HTTP_POST;
    }

    /**
     * @return array
     */
    private function getAddresssData()
    {
        $addressData = [
            'street'        => $this->address->getStreet(),
            'street_number' => $this->address->getStreetNumber(),
            'neighborhood'  => $this->address->getNeighborhood(),
            'zipcode'       => $this->address->getZipcode(),
        ];

        if (!is_null($this->address->getComplementary())) {
            $addressData['complementary'] = $this->address->getComplementary();
        }

        if (!is_null($this->address->getCity())) {
            $addressData['city'] = $this->address->getCity();
        }

        if (!is_null($this->address->getState())) {
            $addressData['state'] = $this->address->getState();
        }

        if (!is_null($this->address->getCountry())) {
            $addressData['country'] = $this->address->getCountry();
        }

        return $addressData;
    }

    /**
     * @return array
     */
    private function getPhoneData()
    {
        $phoneData = [
            'ddd'    => $this->phone->getDdd(),
            'number' => $this->phone->getNumber(),
        ];

        if (!is_null($this->phone->getDdi())) {
            $phoneData['ddi'] = $this->phone->getDdi();
        }

        return $phoneData;
    }
}
