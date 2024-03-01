<?php

namespace App\Controllers;

class Home extends BaseController
{
    // public function index(): string

    // {
    //     return view('welcome_message');
    // }
    
    public function index()
    {
        return view('layout/kasir');
    }

    public function login(){

        return view('layout/form-login');
    }

   
    
}
