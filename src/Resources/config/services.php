<?php
declare(strict_types=1);

use Enzode\AdStatsConnector\Client\AdStatsClient;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return function(ContainerConfigurator $configurator): void {

    $parameters = $configurator->parameters();

    $parameters->set('enzode.adstats_connector.api_key', '');
    $parameters->set('enzode.adstats_connector.adtredo_url', 'https://adstats.adtredo.ch');

    $services = $configurator->services();

    $services
        ->set('enzode.adstats_connector.adstats_connector', AdStatsClient::class)
        ->factory([AdStatsClient::class, 'createDefault'])
        ->arg(0, 'https://adstats.adtredo.ch')
        ->arg(1, 'CQ3kXxMYqLJ2gVUtLADzY8aLLntqMu')
        ->private()
    ;

    $services->alias(AdStatsClient::class, 'enzode.adstats_connector.adstats_connector');
};
