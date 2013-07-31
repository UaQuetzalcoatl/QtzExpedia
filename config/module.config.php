<?php
return array(
    'expedia' => array(
        'api_key' => 'your_api_key',
        'secret' => 'your_secret',
        'cid' => '55505', // Beta Access
        'minorRev' => 25,
        'locale' => 'en_US',
        'currencyCode' => 'USD',
        'use_signature_authentication' => true, // use it when IP authentication is not possible
        /**
         * Cache configuration
         */
        'cache' => array(
            'adapter'   => array(
                'name' => 'filesystem',
                'options' => array(
                    'cache_dir' => realpath('./data/cache'),
                    'writable' => false,
                ),
            ),
            'plugins' => array(
                'exception_handler' => array('throw_exceptions' => true),
                'serializer'
            )
        ),
        'cache_key' => 'github_api',
    ),
    'service_manager' => array(
        'invokables' => array(
            'QtzExpedia\Api\Hotels' => 'QtzExpedia\Api\Hotels',
        ),
    ),
);
