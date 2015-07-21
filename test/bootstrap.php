<?php

use ConoHa\ConoHa;
use ConoHa\Identity\Resource\Secret;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/constants.php';

define('ROOT_TEST_DIR', __DIR__ . '/ConoHa/');

function __get_test_secret()
{
    $secret = new Secret();
    $secret->setUsername(TEST_API_USERNAME);
    $secret->setPassword(TEST_API_PASSWORD);
    $secret->setTenantName(TEST_API_TENANT_NAME);
    $secret->setTenantId(TEST_API_TENANT_ID);
    $secret->setAuthUrl(TEST_IDENTITY_ENDPOINT);

    return $secret;
}

function __get_test_access()
{
    static $access;

    if(!$access) {
        $secret = new Secret();
        $secret->setUsername(TEST_API_USERNAME);
        $secret->setPassword(TEST_API_PASSWORD);
        $secret->setTenantName(TEST_API_TENANT_NAME);
        $secret->setTenantId(TEST_API_TENANT_ID);
        $secret->setAuthUrl(TEST_IDENTITY_ENDPOINT);

        $c = new ConoHa();
        $access = $c->auth($secret);
    }

    return $access;
}
