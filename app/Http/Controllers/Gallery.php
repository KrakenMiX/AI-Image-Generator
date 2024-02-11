<?php

namespace App\Http\Controllers;

use App\Models\ImageGen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Gallery extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $images = ImageGen::where('id_user', $user->id_user)->get();
            $imagesPos = $images->map(function ($image, $index) {
                $image['pos'] = ($index + 1) % 4;
                return $image;
            });

            $data = [
                'images' => $imagesPos
            ];
            return view('gallery', $data);
        } else {
            session()->flash('error', 'Anda harus login terlebih dahulu.');
            return redirect()->route('login');
        }
    }

    public function detail(Request $request)
    {
        if (Auth::check()) {
            $image = ImageGen::where('id_image', $request->query('id'))->first();
            $data = [
                'image' => $image
            ];
            return view('gallery_detail', $data);
        } else {
            session()->flash('error', 'Anda harus login terlebih dahulu.');
            return redirect()->route('login');
        }
    }

    public function post(Request $request)
    {
        if (Auth::check()) {
            $id = $request->query('id');
            $is_post = $request->query('is_post') == 'true' ? 1 : 0;
            $image = ImageGen::find($id);
            $image->is_post = $is_post;
            $image->save();
            return redirect()->route('gallerydetail', ['id' => $id]);
        } else {
            session()->flash('error', 'Anda harus login terlebih dahulu.');
            return redirect()->route('login');
        }
    }

    public function delete(Request $request)
    {
        if (Auth::check()) {
            ImageGen::where('id_image', $request->query('id'))->delete();
            return redirect()->route('gallery');
        } else {
            session()->flash('error', 'Anda harus login terlebih dahulu.');
            return redirect()->route('login');
        }
    }
}
