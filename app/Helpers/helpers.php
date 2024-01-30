<?php

use GuzzleHttp\Client;

if (!function_exists('generateAnime')) {
    function generateAnime(string $prompt, $negPrompt = "", $scale = "")
    {
        $width = '512';
        $height = '512';

        if ($scale == '9:16') {
            $width = '512';
            $height = '1024';
        } else if ($scale == '16:9') {
            $width = '1024';
            $height = '512';
        } else if ($scale == '2:3') {
            $width = '512';
            $height = '768';
        } else if ($scale == '3:2') {
            $width = '768';
            $height = '512';
        }

        $baseurl = 'http://kawaii-ai-image-generator.herokuapp.com/image/';
        $client = new Client();
        $res = $client->request("POST", $baseurl, [
            "headers" => [
                "User-Agent" => "okhttp/4.9.2",
                "Content-Type" => "application/json"
            ],
            "body" => json_encode([
                "prompt" => $prompt,
                "negativePrompt" => $negPrompt,
                "width" => $width,
                "height" => $height
            ])
        ]);
        $result = json_decode($res->getBody());
        return $result;
    }
}
