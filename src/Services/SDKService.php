<?php

namespace App\Services;

use AmazonPHP\SellingPartner\AccessToken;
use AmazonPHP\SellingPartner\Configuration;
use AmazonPHP\SellingPartner\SellingPartnerSDK;
use Buzz\Client\Curl;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;
use Nyholm\Psr7\Factory\Psr17Factory;

class SDKService
{
    public Psr17Factory $factory;
    public Curl $client;
    public Configuration $configuration;
    public Logger $logger;
    public SellingPartnerSDK $sdk;
    public AccessToken $accessToken;

    public function __construct()
    {
        $this->factory = new Psr17Factory();
        $this->client = new Curl($this->factory);

        $this->configuration = Configuration::forIAMUser(
            'aaaaaa',
            'aAAaaa',
            'aaaaaaa',
            'aaaaaa'
        );
        $this->configuration->setSandbox();

        $this->logger = new Logger('name');
        $this->logger->pushHandler(new StreamHandler(__DIR__ . '/sp-api-php.log', Level::Debug));

        $this->sdk = SellingPartnerSDK::create($this->client, $this->factory, $this->factory, $this->configuration, $this->logger);

        $this->accessToken = $this->sdk->oAuth()->exchangeRefreshToken('aaaaaaaaaaa');
        /*new AccessToken('aaa', 'aaa', 'aaa', 10000, 'aaa')*/
    }
}