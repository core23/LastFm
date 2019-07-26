<?php

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\LastFm\Client;

use Core23\LastFm\Exception\ApiException;
use Core23\LastFm\Session\SessionInterface;

interface ApiClientInterface
{
    /**
     * Calls the API with signed session.
     *
     * @param string $requestMethod
     *
     * @throws ApiException
     */
    public function signedCall(string $method, array $params = [], SessionInterface $session = null, $requestMethod = 'GET'): array;

    /**
     * Calls the API unsigned.
     *
     * @throws ApiException
     */
    public function unsignedCall(string $method, array $params = [], string $requestMethod = 'GET'): array;

    /**
     * Get the api key.
     */
    public function getApiKey(): string;

    /**
     * Get the shared secret.
     */
    public function getSharedSecret(): string;
}
