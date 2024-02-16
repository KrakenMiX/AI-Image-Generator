<?php

namespace App\Http\Controllers;

use App\Models\ImageGen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $blur = $request->input('blur');
        try {
    
            if (Auth::check()) {
                $user = Auth::user();
                $apiId = $user->id_api;
                if ($type == 'anime') {
                    $result = generateAnime($prompt, $negPrompt, $scale);
                    $saveUuid = saveImage($apiId, $result->image, $prompt, $negPrompt, $scale, $result->isSafe);
                    $image = getImage($saveUuid)->image;
                    $data = [
                        'type' => $type,
                        'prompt' => $prompt,
                        'negPrompt' => $negPrompt,
                        'scale' => $scale,
                        'success' => $result->success,
                        'image' => $image,
                        'isSafe' => $result->isSafe,
                        'blur' => $blur,
                        'rating' => $result->rating
                    ];
                    $scale_result = extractScale($scale);
                    ImageGen::create([
                        'id_user' => $user->id_user,
                        'type' => $type,
                        'url' => $image,
                        'prompt' => $prompt,
                        'negative_prompt' => $negPrompt,
                        'width' => $scale_result->width,
                        'height' => $scale_result->height,
                        'blur' => $blur,
                        'is_safe' => $result->isSafe ? 1 : 0,
                        'is_post' => 0
                    ]);
                    return view('airesult', $data);
                } else if ($type == 'pastel') {
                    getToken($apiId);
                    $result = generatePastel($apiId, $prompt, $negPrompt, $scale);
                    $data = [
                        'type' => $type,
                        'prompt' => $prompt,
                        'negPrompt' => $negPrompt,
                        'scale' => $scale,
                        'processUrl' => $result->urls->get,
                        'blur' => $blur,
                    ];
                    return view('loading', $data);
                } else if ($type == 'realistic') {
                    getToken($apiId);
                    $result = generateReal($apiId, $prompt, $negPrompt, $scale);
                    $data = [
                        'type' => $type,
                        'prompt' => $prompt,
                        'negPrompt' => $negPrompt,
                        'scale' => $scale,
                        'processUrl' => $result->urls->get,
                        'blur' => $blur,
                    ];
                    return view('loading', $data);
                }
            } else {
                session()->flash('error', 'Anda harus login terlebih dahulu.');
                return redirect()->route('login');
            }
        } catch (\Exception $e) {
            $err_data = [
                'type' => $type,
                'prompt' => $prompt,
                'negPrompt' => $negPrompt,
                'scale' => $scale,
                'blur' => $blur,
                'err' => str($e)
            ];
            return view('error', $err_data);
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
        $blur = $request->query('blur');
        $safety = checkSafety($image);

        if (Auth::check()) {
            $user = Auth::user();
            $scale_result = extractScale($scale);
            ImageGen::create([
                'id_user' => $user->id_user,
                'type' => $type,
                'url' => $image,
                'prompt' => $prompt,
                'negative_prompt' => $negPrompt,
                'width' => $scale_result->width,
                'height' => $scale_result->height,
                'is_safe' => $safety->isSafe ? 1 : 0,
                'is_post' => 0
            ]);

            $data = [
                'type' => $type,
                'prompt' => $prompt,
                'negPrompt' => $negPrompt,
                'scale' => $scale,
                'image' => $image,
                'isSafe' => $safety->isSafe,
                'blur' => $blur,
                'rating' => $safety->rating
            ];
            return view('airesult', $data);
        } else {
            session()->flash('error', 'Anda harus login terlebih dahulu.');
            return redirect()->route('login');
        }
    }
}
