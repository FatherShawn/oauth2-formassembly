# oauth2-formassembly

This package provides FormAssembly OAuth 2.0 support for the PHP League's [OAuth 2.0 Client](https://github.com/thephpleague/oauth2-client).

## Installation

To install, use composer:

```
composer require fathershawn/oauth2-formassembly
```

## Usage

### Request an authorization code

If you are working with FormAssembly, you may have another class by that name, so you can rename the provider:

```php
<?php
use Fathershawn\OAuth2\Client\Provider\FormAssembly as OauthProvider;

$provider = new OauthProvider([
      'clientId' => 'your-client-id',
      'clientSecret' => 'your-client-secret',
      'redirectUri' => 'url-to-capture-the-code',
      'baseUrl' => 'url-to-formassembly-instance',
]);
$url = $provider->getAuthorizationUrl();
// Redirect the user to $url.
```

When the user is redirected to the url to capture the code:

```php
<?php

use Fathershawn\OAuth2\Client\Provider\FormAssembly as OauthProvider;
// Capture the code with your framework or from $_GET['code'].
$code = $_GET['code'];
$provider = new OauthProvider([
      'clientId' => 'your-client-id',
      'clientSecret' => 'your-client-secret',
      'redirectUri' => 'url-to-capture-the-code',
      'baseUrl' => 'url-to-formassembly-instance',
]);
try {
    $accessToken = $provider->getAccessToken('authorization_code', [
        'code' => $code,
    ]);
    // Store $accessToken as appropriate for re-use.
} catch (Exception $e) {
    // Log the Exception?
    throw $e;
}
```
