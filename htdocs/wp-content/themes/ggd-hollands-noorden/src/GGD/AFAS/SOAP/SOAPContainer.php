<?php

declare(strict_types=1);

namespace GGD\AFAS\SOAP;

use \SoapClient;

class SOAPContainer
{
    /**
     * @var \DI\Container
     */
    protected $container;

    /**
     * @var SOAPContainer
     */
    protected static $instance;

    public function __construct()
    {
        $this->buildContainer();
    }

    /**
     * @return \DI\Container
     */
    protected function buildContainer()
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions([
            'SOAPGetRequest' => function () {
                $soapClient = new SoapClient($_ENV['AFAS_URL_GET'], [
                    'trace' => true,
                    'exception' => 1,
                    'Content-Type' => 'text/xml',
                    'use' => SOAP_LITERAL,
                ]);

                return new SOAPGetRequest($soapClient);
            },
            'SOAPPostRequest' => function () {
                $soapClient = new SoapClient($_ENV['AFAS_URL_POST'], [
                    'trace' => true,
                    'exception' => 1,
                    'Content-Type' => 'text/xml',
                    'use' => SOAP_LITERAL,
                ]);

                return new SOAPPostRequest($soapClient);
            },
            'TokenAFAS' => $_ENV['AFAS_TOKEN_SOAP'],
            'teams' => function () {
                $logger = new \Monolog\Logger('microsoft-teams-logger');

                if (true === env('GGD_TEAMS_WEBHOOK_DISABLE_LOGGING', false)) {
                    return $logger->pushHandler(new \Monolog\Handler\NullHandler());
                }

                return $logger->pushHandler(new \CMDISP\MonologMicrosoftTeams\TeamsLogHandler(
                    $_ENV['GGD_TEAMS_WEBHOOK'],
                    \Monolog\Logger::INFO
                ));
            },
        ]);
        $this->container = $builder->build();
    }

    /**
     * Return the instance
     */
    public static function getInstance(): self
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Return container
     *
     * @return \DI\Container
     */
    public function getContainer(): \DI\Container
    {
        return $this->container;
    }
}
