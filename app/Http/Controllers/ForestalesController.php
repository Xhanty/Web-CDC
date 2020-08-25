<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class ForestalesController extends Controller
{
    
    public function __construct(){

    }


    public function index(){
        return view('forestales/index');
    }
}
