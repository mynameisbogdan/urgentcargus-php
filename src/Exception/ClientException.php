<?php

declare(strict_types=1);

namespace MNIB\UrgentCargus\Exception;

use GuzzleHttp\Exception\GuzzleException;
use RuntimeException;
use function json_decode;
use function is_string;
use function sprintf;

class ClientException extends RuntimeException
{
    public static function fromException(GuzzleException $exception): self
    {
        $message = $exception->getMessage();

        if (!method_exists($exception, 'getResponse')) {
            return new self(sprintf(
                '[%s] Something went wrong, the request does not have a response: %s',
                get_class($exception),
                $message
            ));
        }

        $code = $exception->getResponse() !== null ? $exception->getResponse()->getStatusCode() : 0;
        $contents = $exception->hasResponse() ? (string)$exception->getResponse()->getBody() : '';

        if ($contents === '') {
            return new self(sprintf(
                '[%s] Something went wrong: %s',
                get_class($exception),
                $message
            ));
        }

        $data = json_decode($contents, true);

        if (isset($data['message']) && $data['message'] !== '') {
            $message = $data['message'];
        } elseif (isset($data['Error']) && $data['Error'] !== '') {
            $message = $data['Error'];
        } elseif (is_string($data)) {
            $message = $data;
        }

        return new self($message, $code);
    }
}
