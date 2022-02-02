<?php

declare(strict_types=1);

namespace MNIB\UrgentCargus;

use MNIB\UrgentCargus\Exception\ClientException as UrgentCargusClientException;

interface ClientInterface
{
    /** Library version */
    public const VERSION = '0.9.12';

    /** Default API Uri */
    public const API_URI = 'https://urgentcargus.azure-api.net/api/';

    /**
     * Execute the request to the API.
     *
     * @param mixed[] $params
     *
     * @throws UrgentCargusClientException
     *
     * @return mixed
     */
    public function request(string $method, string $endpoint, array $params = [], ?string $token = null);

    /**
     * Shorthand for GET request.
     *
     * @param mixed[] $params
     *
     * @return mixed
     */
    public function get(string $endpoint, array $params = [], ?string $token = null);

    /**
     * Shorthand for POST request.
     *
     * @param mixed[] $params
     *
     * @return mixed
     */
    public function post(string $endpoint, array $params = [], ?string $token = null);

    /**
     * Shorthand for PUT request.
     *
     * @param mixed[] $params
     *
     * @return mixed
     */
    public function put(string $endpoint, array $params = [], ?string $token = null);

    /**
     * Shorthand for DELETE request.
     *
     * @param mixed[] $params
     *
     * @return mixed
     */
    public function delete(string $endpoint, array $params = [], ?string $token = null);

    public function getToken(string $username, string $password): string;

    public function setAccessToken(?string $accessToken): void;

    /**
     * Get token from service.
     */
    public function createAccessToken(string $username, string $password): void;
}
