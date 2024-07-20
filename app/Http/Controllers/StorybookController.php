<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorybookController extends Controller
{
    public function appBar()
    {
        return view('storybook.app-bar');
    }

    public function button()
    {
        return view('storybook.button');
    }

    public function card()
    {
        return view('storybook.card');
    }

    public function textField()
    {
        return view('storybook.text-field');
    }
}
