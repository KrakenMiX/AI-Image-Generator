<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;

class AipromptController extends Controller
{
    public function index()
    {
        return view('aiprompt');
    }

    public function image()
    {
        return view('airesult');
    }
}