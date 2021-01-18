<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Psr\Http\Client\ClientInterface;

class BreweryService
{
    /**
     * API host data
     * @var string
     */
    const BREWERYDB_HOST = "https://api.openbrewerydb.org/breweries/";

    /**
     * Http client
     * @var ClientInterface
     */
    private $client;

    /**
     * [private description]
     * @var [type]
     */
    private $addresProcessor;

    /**
     * [__construct description]
     * @param ClientInterface $client          [description]
     * @param [type]          $addresProcessor [description]
     */
    public function __construct(ClientInterface $client, $addresProcessor)
    {
        $this->client = $client;

        $this->addresProcessor = $addresProcessor;
    }

    /**
     * [getBreweries description]
     * @return string [description]
     */
    public function getBreweries(): string
    {
        $request = $this->client->get(self::BREWERYDB_HOST);
        $response = $request->getBody()->getContents();

        if (\is_string($response)) {
            $response = $this->addresProcessor->separateAddreses($response);
        }

        return $response;
    }

    /**
     * [getBrewery description]
     * @param  int $id [description]
     * @return string     [description]
     */
    public function getBrewery(int $id): string
    {
        $request = $this->client->get(self::BREWERYDB_HOST . $id);
        $response = $request->getBody()->getContents();

        if (\is_string($response)) {
            $response = $this->addresProcessor->separateAddreses($response);
        }

        return $response;
    }
}
