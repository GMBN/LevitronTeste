<?php

return [
    'route'=>[
        '/event-manager'=> 'Event:manager'
    ],
    'public'=>true,
    'public_dir'=>[
        '/event-manager/assets'=> __DIR__.'/View/assets'
    ]
];