<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function spin(): string
    {
        return view('spin');
    }

    public function gacha(): string
    {
        return view('gacha');
    }
}
