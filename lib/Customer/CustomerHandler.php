<?php

namespace PagarMe\Sdk\Customer;

use PagarMe\Sdk\AbstractHandler;
use PagarMe\Sdk\Customer\Request\CustomerCreate;
use PagarMe\Sdk\Customer\Request\CustomerGet;
use PagarMe\Sdk\Customer\Request\CustomerList;

class CustomerHandler extends AbstractHandler
{
    use CustomerBuilder;

    /**
     * @param $externalId
     * @param string $name
     * @param string $email
     * @param Document $document
     * @param $phones
     * @param string $country
     * @param string $type
     * @return Customer
     * @throws \PagarMe\Sdk\ClientException
     */
    public function create(
        $externalId,
        $name,
        $email,
        Document $document,
        $phones,
        $country = 'br',
        $type = 'individual'
    )
    {
        $request = new CustomerCreate(
            $externalId,
            $name,
            $email,
            $document,
            $phones,
            $country,
            $type
        );

        $response = $this->client->send($request);

        return $this->buildCustomer($response);
    }

    /**
     * @param int $customerId
     * @return Customer
     * @throws \PagarMe\Sdk\ClientException
     */
    public function get($customerId)
    {
        $request  = new CustomerGet($customerId);
        $response = $this->client->send($request);

        return $this->buildCustomer($response);
    }

    /**
     * @param int $page
     * @param int $count
     * @return array
     * @throws \PagarMe\Sdk\ClientException
     */
    public function getList($page = null, $count = null)
    {
        $request  = new CustomerList($page, $count);
        $response = $this->client->send($request);

        $customers = [];
        foreach ($response as $customerResponse) {
            $customers[] = $this->buildCustomer($customerResponse);
        }

        return $customers;
    }
}
