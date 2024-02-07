<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AipromptController extends Controller
{
    public function index()
    {
        return view('aiprompt');
    }

    public function generateImage(Request $request)
    {
        $type = $request->input('radio-type');
        $prompt = $request->input('prompt');
        $negPrompt = $request->input('negative-prompt');
        $scale = $request->input('radio-ratio');

        if ($type == 'anime') {
            $result = generateAnime($prompt, $negPrompt, $scale);
            $data = [
                'type' => $type,
                'prompt' => $prompt,
                'negPrompt' => $negPrompt,
                'scale' => $scale,
                'success' => $result->success,
                'image' => $result->image,
                'isSafe' => $result->isSafe,
                'rating' => $result->rating
            ];
            return view('airesult', $data);
        } else if ($type == 'pastel') {
            $result = generatePastel($prompt, $negPrompt, $scale);
            $data = [
                'type' => $type,
                'prompt' => $prompt,
                'negPrompt' => $negPrompt,
                'scale' => $scale,
                'processUrl' => $result->urls->get,
            ];
            return view('loading_gen', $data);
        } else if ($type == 'realistic') {
            $result = generateReal($prompt, $negPrompt, $scale);
            $data = [
                'type' => $type,
                'prompt' => $prompt,
                'negPrompt' => $negPrompt,
                'scale' => $scale,
                'processUrl' => $result->urls->get,
            ];
            return view('loading_gen', $data);
        }
    }

    public function download(Request $request)
    {
        $filename = $request->query('filename');
        $filename = explode(",", $filename)[0];
        $url = $request->query('url');
        header("Content-disposition:attachment; filename=$filename");
        return readfile($url);
    }

    public function image()
    {
        return view('airesult');
    }

    public function post_result(Request $request)
    {
        $type = $request->query('type');
        $prompt = $request->query('prompt');
        $negPrompt = $request->query('negPrompt');
        $scale = $request->query('scale');
        $image = $request->query('image');
        $safety = checkSafety($image);

        $data = [
            'type' => $type,
            'prompt' => $prompt,
            'negPrompt' => $negPrompt,
            'scale' => $scale,
            'image' => $image,
            'isSafe' => $safety->isSafe,
            'rating' => $safety->rating
        ];
        return view('airesult', $data);
    }
}
