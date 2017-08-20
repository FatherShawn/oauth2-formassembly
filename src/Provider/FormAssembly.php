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

namespace Fathershawn\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;

class FormAssembly extends AbstractProvider
{
    /**
     * The path on the formassebly side to request authorization.
     */
    const AUTH_PATH = '/oauth/login';

    /**
     * The path on the formassembly side to initiate authorization tokens.
     */
    const  TOKEN_PATH = '/oauth/access_token';

    /**
     * @var string
     *   The url to the instance of FormAssembly
     */
    protected $baseUrl;

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
        foreach ($requiredOptions as $option) {
            if (!array_key_exists($option, $options)) {
                throw new \InvalidArgumentException("Missing required option: $option");
            }
        }
        parent::__construct($options, $collaborators);
    }


    /**
     * @inheritDoc
     */
    public function getBaseAuthorizationUrl()
    {
        return $this->baseUrl . self::AUTH_PATH;
    }

    /**
     * Returns authorization parameters based on provided options.
     *
     * @param  array $options
     * @return array Authorization parameters
     */
    protected function getAuthorizationParameters(array $options)
    {
        if (!isset($options['type']) || empty($options['type'])) {
            $options['type'] = 'web';
        }
        return parent::getAuthorizationParameters($options);
    }


    /**
     * @inheritDoc
     */
    public function getBaseAccessTokenUrl(array $params)
    {
        return $this->baseUrl . self::TOKEN_PATH;
    }


    /**
     * @inheritDoc
     */
    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        //  The FormAssembly access_token response does not contain a resource owner.
        return '';
    }

    /**
     * @inheritDoc
     */
    protected function getDefaultScopes()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    protected function checkResponse(ResponseInterface $response, $data)
    {
        if ($response->getStatusCode() >= 400) {
            throw FormAssemblyIdentityProviderException::clientException($response, $data);
        }
    }

    /**
     * @inheritDoc
     */
    protected function createResourceOwner(array $response, AccessToken $token)
    {
        return new ResourceOwnerUnsupported();
    }

}