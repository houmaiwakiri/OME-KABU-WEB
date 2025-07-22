<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController
{
  public function index()
  {
    return view('main');
  }
}