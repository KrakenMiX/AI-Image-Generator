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

        // $request->validate([
        //     'type' => 'required',
        //     'prompt' => 'required',
        // ]);

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
        }
    }

    public function download(Request $request)
    {
        $filename = $request->query('filename');
        $url = $request->query('url');
        header("Content-disposition:attachment; filename=$filename");
        return readfile($url);
    }

    public function image()
    {
        return view('airesult');
    }
}
