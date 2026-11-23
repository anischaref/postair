<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index($name)
    {
       $clr = Color::select('hex-code')->first()->value('hex-code') ?? '#ffffff';
    return view('bonjour',
    [
        'name' => $name,
        'color' => $clr
    ]);
    }
}
