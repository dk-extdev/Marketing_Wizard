<?php

use Aws\Laravel\AwsServiceProvider;
return [
		'credentials' => [
			'key'    => $_ENV['AWS_ACCESS_KEY_ID'],
			'secret' => $_ENV['AWS_SECRET_ACCESS_KEY'],
		],
		'region' => $_ENV['AWS_REGION'],
		'version' => 'latest',
];
/*return [
    'region' => env('AWS_REGION', 'us-east-1'),
    'version' => 'latest',
    'ua_append' => [
        'L5MOD/' . AwsServiceProvider::VERSION,
    ],
];*/