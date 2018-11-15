<?php

namespace PagarMe\Sdk\Customer;

class Customer
{
    use \PagarMe\Sdk\Fillable;

    /**
     * @var int
     */
    private $id;

    /**
     * @var PagarMe\Sdk\Customer\Address
     */
    private $address;

    /**
     * @var string
     */
    private $bornAt;

    /**
     * @var \DateTime
     */
    private $dateCreated;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $phoneNumbers;

    /**
     * @var PagarMe\Sdk\Customer\Document
     */
    private $documents;

    /**
     * @var string
     */
    private $externalId;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $country;

    /**
     * @param array $arrayData
     */
    public function __construct($arrayData)
    {
        $this->fill($arrayData);
    }

    /**
     * @codeCoverageIgnore
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getBornAt()
    {
        return $this->bornAt;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getPhoneNumbers()
    {
        return $this->phoneNumbers;
    }

    /**
     * @codeCoverageIgnore
     * @return object
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }
}
