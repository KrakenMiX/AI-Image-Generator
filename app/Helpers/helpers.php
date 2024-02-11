<?php

use GuzzleHttp\Client;
use Ramsey\Uuid\Uuid;

if (!function_exists('generateRandomID')) {
    function generateRandomID($word_length = 28)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $random_word = '';

        for ($i = 0; $i < $word_length; $i++) {
            $random_word .= $characters[rand(0, $charactersLength - 1)];
        }

        return $random_word;
    }
}

if (!function_exists('extractScale')) {
    function extractScale($scale = '')
    {
        $result = new stdClass();
        $result->width = 512;
        $result->height = 512;

        if ($scale == '9:16') {
            $result->width = 512;
            $result->height = 1024;
        } else if ($scale == '16:9') {
            $result->width = 1024;
            $result->height = 512;
        } else if ($scale == '2:3') {
            $result->width = 512;
            $result->height = 768;
        } else if ($scale == '3:2') {
            $result->width = 768;
            $result->height = 512;
        }

        return $result;
    }
}

if (!function_exists('registerUser')) {
    function registerUser(string $userID)
    {
        $baseurl = 'https://kawaii-ai-image-generator.herokuapp.com/user/createUser';
        $client = new Client();
        $res = $client->request("POST", $baseurl, [
            "headers" => [
                "User-Agent" => "okhttp/4.9.2",
                "Content-Type" => "application/json"
            ],
            "body" => json_encode([
                "id" => $userID,
            ])
        ]);
        $result = json_decode($res->getBody());
        return $result;
    }
}

if (!function_exists('getToken')) {
    function getToken(string $userID)
    {
        $baseurl = 'https://kawaii-ai-image-generator.herokuapp.com/user/refund';
        $client = new Client();
        $res = $client->request("POST", $baseurl, [
            "headers" => [
                "User-Agent" => "okhttp/4.9.2",
                "Content-Type" => "application/json"
            ],
            "body" => json_encode([
                "userId" => $userID,
                "tokens" => 10
            ])
        ]);
        $result = json_decode($res->getBody());
        return $result;
    }
}

if (!function_exists('saveImage')) {
    function saveImage(string $apiID, string $image, string $prompt, $negPrompt = "", $scale = "", $isSafe = true)
    {
        $uuid = Uuid::uuid4();
        $baseurl = "https://kawaii-ai-image-generator.herokuapp.com/user/save/$apiID/$uuid";
        $client = new Client();
        $payload = json_encode([
            "image" => $image,
            "prompt" => $prompt,
            "negativePrompt" => $negPrompt,
            "isSafe" => $isSafe,
            "aspectRatio" => $scale,
            "timeStamp" => time()
        ]);
        $client->request("PATCH", $baseurl, [
            "headers" => [
                "User-Agent" => "okhttp/4.9.2",
                "Content-Type" => "application/json"
            ],
            "body" => $payload
        ]);
        return $uuid;
    }
}

if (!function_exists('getImage')) {
    function getImage(string $uuid)
    {
        $baseurl = "https://kawaii-ai-image-generator.herokuapp.com/image/get/$uuid";
        $client = new Client();
        $res = $client->request("GET", $baseurl, [
            "headers" => [
                "User-Agent" => "okhttp/4.9.2",
                "Content-Type" => "application/json"
            ]
        ]);
        $result = json_decode($res->getBody());
        return $result;
    }
}

if (!function_exists('generateAnime')) {
    function generateAnime(string $prompt, $negPrompt = "", $scale = "")
    {
        $scale_result = extractScale($scale);
        $baseurl = 'http://kawaii-ai-image-generator.herokuapp.com/image/';
        $client = new Client();
        $payload = json_encode([
            "prompt" => $prompt,
            "negativePrompt" => $negPrompt,
            "width" => $scale_result->width,
            "height" => $scale_result->height
        ]);
        $res = $client->request("POST", $baseurl, [
            "headers" => [
                "User-Agent" => "okhttp/4.9.2",
                "Content-Type" => "application/json"
            ],
            "body" => $payload
        ]);
        $result = json_decode($res->getBody());
        return $result;
    }
}

if (!function_exists('generatePastel')) {
    function generatePastel(string $apiId, string $prompt, $negPrompt = "", $scale = "")
    {
        $scale_result = extractScale($scale);

        $baseurl = "https://kawaii-ai-image-generator.herokuapp.com/image/pastel";
        $client = new Client();
        $res = $client->request("POST", $baseurl, [
            "headers" => [
                "User-Agent" => "okhttp/4.9.2",
                "Content-Type" => "application/json"
            ],
            "body" => json_encode([
                "userId" => $apiId,
                "prompt" => $prompt,
                "negativePrompt" => $negPrompt,
                "width" => $scale_result->width,
                "height" => $scale_result->height
            ])
        ]);
        $result = json_decode($res->getBody());
        return $result;
    }
}

if (!function_exists('generateReal')) {
    function generateReal(string $apiId, string $prompt, $negPrompt = "", $scale = "")
    {
        $scale_result = extractScale($scale);

        $baseurl = "https://kawaii-ai-image-generator.herokuapp.com/image/real";
        $client = new Client();
        $res = $client->request("POST", $baseurl, [
            "headers" => [
                "User-Agent" => "okhttp/4.9.2",
                "Content-Type" => "application/json"
            ],
            "body" => json_encode([
                "userId" => $apiId,
                "prompt" => ", " . $prompt,
                "negativePrompt" => $negPrompt,
                "width" => $scale_result->width,
                "height" => $scale_result->height
            ])
        ]);
        $result = json_decode($res->getBody());
        return $result;
    }
}

if (!function_exists('checkSafety')) {
    function checkSafety(string $image)
    {

        $baseurl = "https://kawaii-ai-image-generator.herokuapp.com/image/safety";
        $client = new Client();
        $res = $client->request("POST", $baseurl, [
            "headers" => [
                "User-Agent" => "okhttp/4.9.2",
                "Content-Type" => "application/json"
            ],
            "body" => json_encode([
                "imageURL" => $image,
            ])
        ]);
        $result = json_decode($res->getBody());
        return $result;
    }
}
