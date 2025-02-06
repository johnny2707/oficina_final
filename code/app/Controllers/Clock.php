<?php namespace App\Controllers;

class Clock extends BaseController
{
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('html/clock/index');
    }
}