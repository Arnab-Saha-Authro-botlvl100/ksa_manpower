<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class PaymentController extends Controller
{
   public function index(){
     
       return view('payment.index');
     
        
   }
}