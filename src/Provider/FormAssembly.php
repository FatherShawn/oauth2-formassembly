<?php
/**
 * @author Shawn P. Duncan <code@sd.shawnduncan.org>
 * @date   7/29/17,  7:55 AM
 *
 * @brief
 *
 * Copyright 2017 by Shawn P. Duncan.  This code is
 * released under the GNU General Public License.
 * Which means that it is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 * http://www.gnu.org/licenses/gpl.html
 */

namespace League\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;

class FormAssembly extends AbstractProvider
{

    /**
     * Constructs an OAuth 2.0 service provider.
     *
     * @param array $options
     *    An array of options to set on this provider.
     *
     *    Options include `clientId`, `clientSecret`, `redirectUri`, and
     *   `state`, `baseUrl`. Options `clientId`, `clientSecret`, `redirectUri`,
     *    and `baseUrl` are required.
     * @param array $collaborators An array of collaborators that may be used
     *   to
     *     override this provider's default behavior. Collaborators include
     *     `grantFactory`, `requestFactory`, and `httpClient`.
     *     Individual providers may introduce more collaborators, as needed.
     */
    public function __construct(array $options = [], array $collaborators = [])
    {
        $requiredOptions = [
          'clientId',
          'clientSecret',
          'redirectUri',
          'baseUrl',
        ];
        foreach $requiredOptions as $option{
              !array_key_exists($option, $options)
        }
        {parent::__construct($options, $collaborators);
    }
    }


    /**
     * @inheritDoc
     */
    public function getBaseAuthorizationUrl()
    {
        // TODO: Implement getBaseAuthorizationUrl() method.
    }

    /**
     * @inheritDoc
     */
    public function getBaseAccessTokenUrl(array $params)
    {
        // TODO: Implement getBaseAccessTokenUrl() method.
    }

    /**
     * @inheritDoc
     */
    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        // TODO: Implement getResourceOwnerDetailsUrl() method.
    }

    /**
     * @inheritDoc
     */
    protected function getDefaultScopes()
    {
        // TODO: Implement getDefaultScopes() method.
    }

    /**
     * @inheritDoc
     */
    protected function checkResponse(ResponseInterface $response, $data)
    {
        // TODO: Implement checkResponse() method.
    }

    /**
     * @inheritDoc
     */
    protected function createResourceOwner(array $response, AccessToken $token)
    {
        // TODO: Implement createResourceOwner() method.
    }

}