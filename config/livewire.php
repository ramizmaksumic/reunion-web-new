<?php

return [
    'temporary_file_upload' => [
        'disk' => 'inquiry-temporary',
        'directory' => 'livewire-tmp',
        'middleware' => 'throttle:20,1',
        'max_upload_time' => 5,
        'cleanup' => true,
    ],
];
