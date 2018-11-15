<?php

namespace PagarMe\Sdk\Customer\Request;

use PagarMe\Sdk\Customer\Document;
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
     * @var array
     */
    private $phoneNumbers;

    /**
     * @var string | País
     */
    private $country;

    /**
     * @var array
     */
    private $documents;

    /**
     * @var string
     */
    private $type;

    /**
     * @param $externalId
     * @param string $name
     * @param string $email
     * @param Document $document
     * @param $phones
     * @param $country
     * @param $type
     */
    public function __construct(
        $externalId,
        $name,
        $email,
        Document $document,
        $phones,
        $country,
        $type
    )
    {
        $this->externalId     = $externalId;
        $this->name           = $name;
        $this->email          = $email;
        $this->documents[]    = $document->toArray();
        $this->phoneNumbers[] = $phones;
        $this->country        = strtolower($country);
        $this->type           = $type;
    }

    /**
     * @return array
     */
    public function getPayload()
    {
        return [
            'name'          => $this->name,
            'email'         => $this->email,
            'external_id'   => $this->externalId,
            'type'          => $this->type,
            'country'       => $this->country,
            'phone_numbers' => $this->phoneNumbers,
            'documents'     => $this->documents,
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
}
