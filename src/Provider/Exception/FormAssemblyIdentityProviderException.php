<?php

/**
 * @author Shawn P. Duncan <code@sd.shawnduncan.org>
 * @date   12/12/2022
 *
 * @brief
 *
 * Copyright 2017-2022 by Shawn P. Duncan.  This code is
 * released under the GNU General Public License.
 * Which means that it is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 * http://www.gnu.org/licenses/gpl.html
 */

namespace Fathershawn\OAuth2\Client\Provider\Exception;

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Psr\Http\Message\ResponseInterface;

final class FormAssemblyIdentityProviderException extends IdentityProviderException
{
    /**
     * Creates client exception from response.
     *
     * @param ResponseInterface $response
     * @param string[]|string   $data     Parsed response data
     *
     * @return IdentityProviderException
     */
    public static function clientException(ResponseInterface $response, $data)
    {
        return self::fromResponse(
            $response,
            $data['message'] ?? $response->getReasonPhrase()
        );
    }

    /**
     * Creates oauth exception from response.
     *
     * @param ResponseInterface $response
     * @param string[]|string   $data     Parsed response data
     *
     * @return IdentityProviderException
     */
    public static function oauthException(ResponseInterface $response, $data)
    {
        return self::fromResponse(
            $response,
            $data['error'] ?? $response->getReasonPhrase()
        );
    }

    /**
     * Creates identity exception from response.
     *
     * @param ResponseInterface $response
     * @param string            $message
     *
     * @return IdentityProviderException
     */
    protected static function fromResponse(
        ResponseInterface $response,
        $message = ''
    ) {
        return new self(
            $message,
            $response->getStatusCode(),
            (string)$response->getBody()
        );
    }
}
