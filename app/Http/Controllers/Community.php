<?php

namespace App\Http\Controllers;

use App\Models\ImageGen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Community extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $images = DB::table('image_generation')
            ->select('image_generation.*', DB::raw('UPPER(users.username) as owner'))
            ->leftJoin('users', 'users.id_user', '=', 'image_generation.id_user')
            ->where('is_post', 1)
            ->get();
            $imagesPos = $images->map(function ($image, $index) {
                $image->pos = ($index + 1) % 4;
                return $image;
            });

            $data = [
                'images' => $imagesPos
            ];
            return view('community', $data);
        } else {
            session()->flash('error', 'Anda harus login terlebih dahulu.');
            return redirect()->route('login');
        }
    }

    public function detail(Request $request)
    {
        if (Auth::check()) {
            $id = $request->query('id');
            $image = DB::table('image_generation')
            ->select('image_generation.*', DB::raw('UPPER(users.username) as owner'))
            ->leftJoin('users', 'users.id_user', '=', 'image_generation.id_user')
            ->where('id_image', $id)
            ->first();
            $data = [
                'image' => $image
            ];
            return view('community_detail', $data);
        } else {
            session()->flash('error', 'Anda harus login terlebih dahulu.');
            return redirect()->route('login');
        }
    }
}
