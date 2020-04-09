<?php

use Elasticsearch\ClientBuilder;

function run_application(): void
{
    $client = ClientBuilder::create()
        ->setHosts(['elasticsearch:9200'])
        ->build();

//    $results = $client->indices()->create([
//        'index' => 'my-index-name',
//    ]);
//    print_r($results);

    $results = $client->search([
        'index' => 'my-index-name',
    ]);

    print_r($results);
}
