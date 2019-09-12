<?php

return [
    'production' => false,
    'baseUrl' => '',
    'collections' => [
        'resources' => [
            'extends' => '_views.guest.resources',
            'items' => [
                [
                    'title' => 'Title of my first post',
                    'content' => '## The first post content',
                ],
                [
                    'title' => 'Title of my second post',
                    'content' => '## The second post content',
                ],
            ],
        ],
    ],
];
