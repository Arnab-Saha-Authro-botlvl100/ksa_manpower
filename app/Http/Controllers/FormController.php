<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FormController extends Controller
{
    //
      // Method for Note Sheet
      public function noteSheet()
      {
        if(Session::get('user')){
          $candidates = DB::table('candidates')
                    ->leftJoin('manpower', 'candidates.id', '=', 'manpower.candidate_id')
                    ->select('candidates.*', 'manpower.*')
                    ->where('candidates.agency', '=', Session::get('user'))
                    ->get();
        // dd($candidates);
          $user = DB::table('user')->select('*')->where('email', '=', Session::get('user'))->first();
          // dd($user);
          return view('forms/note-sheet', compact('user', 'candidates'));  // Return a view named 'note-sheet.blade.php'
        }
        else{
          return view('welcome');
        }
        
      }
  
      // Method for Putup List
      public function putupList()
      {
        if(Session::get('user')){
          $candidates = DB::table('candidates')
                    ->leftJoin('manpower', 'candidates.id', '=', 'manpower.candidate_id')
                    ->select('candidates.*', 'manpower.*')
                    ->where('candidates.agency', '=', Session::get('user'))
                    ->get();
        // dd($candidates);
          $user = DB::table('user')->select('*')->where('email', '=', Session::get('user'))->first();
          // dd($user);
          return view('forms/putup-list', compact('user', 'candidates'));  // Return a view named 'note-sheet.blade.php'
        }
        else{
          return view('welcome');
        }
      }
  
      // Method for Contract
      public function contract()
      {
        if(Session::get('user')){
          $candidates = DB::table('candidates')
                    ->leftJoin('manpower', 'candidates.id', '=', 'manpower.candidate_id')
                    ->select('candidates.*', 'manpower.*')
                    ->where('candidates.agency', '=', Session::get('user'))
                    ->get();
        // dd($candidates);
          $user = DB::table('user')->select('*')->where('email', '=', Session::get('user'))->first();
          // dd($user);
          return view('forms/employementcontract', compact('user', 'candidates'));  // Return a view named 'note-sheet.blade.php'
        }
        else{
          return view('welcome');
        }
      }
      
  
      // Method for stemp_paper
      public function stemp_paper()
      {
        if(Session::get('user')){
          $candidates = DB::table('candidates')
                    ->leftJoin('manpower', 'candidates.id', '=', 'manpower.candidate_id')
                    ->select('candidates.*', 'manpower.*')
                    ->where('candidates.agency', '=', Session::get('user'))
                    ->get();
        // dd($candidates);
          $user = DB::table('user')->select('*')->where('email', '=', Session::get('user'))->first();
          // dd($user);
          return view('forms/stemp_paper', compact('user', 'candidates'));  // Return a view named 'note-sheet.blade.php'
        }
        else{
          return view('welcome');
        }
      }
      
  
      // Method for application
      public function application()
      {
        if(Session::get('user')){
          $candidates = DB::table('candidates')
                    ->leftJoin('manpower', 'candidates.id', '=', 'manpower.candidate_id')
                    ->select('candidates.*', 'manpower.*')
                    ->where('candidates.agency', '=', Session::get('user'))
                    ->get();
        // dd($candidates);
          $user = DB::table('user')->select('*')->where('email', '=', Session::get('user'))->first();
          // dd($user);
          return view('forms/application', compact('user', 'candidates'));  // Return a view named 'note-sheet.blade.php'
        }
        else{
          return view('welcome');
        }
      }
}
