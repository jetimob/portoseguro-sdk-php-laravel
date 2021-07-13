<?php

namespace Jetimob\PortoSeguro\Api\Authorization;

use GuzzleHttp\RequestOptions;
use Jetimob\Http\Authorization\OAuth\AccessToken;
use Jetimob\Http\Authorization\OAuth\OAuthClient;
use Jetimob\Http\Authorization\OAuth\TokenResolvers\OAuthClientCredentialsTokenResolver as HttpOAuthClientCredentialsTokenResolver;
use Jetimob\Http\Request;

class OauthClientCredentialsTokenResolver extends HttpOAuthClientCredentialsTokenResolver
{
    public function issueAccessTokenRequest(OAuthClient $client, string $grantType, ?string $credentials = null): AccessToken
    {
        $response = $this->http->send(new Request('post', $client->getTokenEndpoint()), [
            RequestOptions::FORM_PARAMS => [
                'grant_type' => $grantType,
            ],
            RequestOptions::HEADERS => [
                'Authorization' => 'Basic ' . base64_encode(sprintf('%s:%s', $client->getClientId(), $client->getClientSecret())),
            ],
        ]);

        return new AccessToken(
            json_decode(
                $response->getBody()->getContents(),
                true,
                512,
                JSON_THROW_ON_ERROR
            ),
        );
    }
}
