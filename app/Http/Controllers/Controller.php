<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public $roles = ['admin', 'manager', 'user'];
    public $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light'];

    public function adminka ()
    {
        return view('/dashboard.dashStart');
    }

    public function home ()
    {
        return view('publicsite.home');
    }
    /**
     * Return 'About' page
     */
    public function aboutMe (): View
    {
        return view('publicsite.aboutme');
    }













}   // ends class Controller

