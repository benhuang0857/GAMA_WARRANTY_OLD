<?php

namespace App\Services;

use GuzzleHttp\Client;

class LineService
{
    public function getLoginBaseUrl()
    {
        // 組成 Line Login Url
        $url = config('line.authorize_base_url') . '?';
        $url .= 'response_type=code';
        //$url .= '&client_id=' . config('line.channel_id');
        $url .= '&client_id=1656801322';
        $url .= '&redirect_uri=' . config('app.url') . '/callback/login';
        $url .= '&state=test'; // 暫時固定方便測試
        $url .= '&scope=openid%20profile';

        return $url;
    }

    public function getLineToken($code)
    {
        $client = new Client();
        $response = $client->request('POST', config('line.get_token_url'), [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => config('app.url') . '/callback/login',
                'client_id' => '1656801322',
                'client_secret' => 'b39e5b6e8e7f88582c41c8d1034717a4'
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getUserProfile($token)
    {
        $client = new Client();
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ];
        $response = $client->request('GET', config('line.get_user_profile_url'), [
            'headers' => $headers
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}