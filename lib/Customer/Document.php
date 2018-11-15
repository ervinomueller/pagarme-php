<?php

namespace PagarMe\Sdk\Customer;


class Document
{
    use \PagarMe\Sdk\Fillable, \PagarMe\Sdk\Arrayable;

    /**
     * @var string $type
     */
    private $type;

    /**
     * @var string $number
     */
    private $number;

    /**
     * @param array $documentData
     */
    public function __construct($documentData)
    {
        $this->fill($documentData);
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getType()
    {
        return (string)$this->type;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getNumber()
    {
        return (string)$this->number;
    }
}
