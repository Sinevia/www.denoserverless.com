<?php

function resources()
{
    $dataFile = __DIR__ . '/data/resources.csv';
    $reader = \League\Csv\Reader::createFromPath($dataFile, 'r');
    $reader->setHeaderOffset(0);
    $data = [];
    foreach ($reader as $offset => $record) {
        $data[] = $record;
    }
    return $data;
}

return [
    'production' => false,
    'baseUrl' => '',
    'collections' => [
        'resources' => [
            'extends' => '_views.guest.resource',
            'path' => 'resources/resource/{id}',
            'items' => function () {
                return resources();
            }
        ],
    ],

];
