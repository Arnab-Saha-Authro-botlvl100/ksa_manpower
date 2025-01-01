<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Candidates;
use App\Models\Visa;

class AdminController extends Controller
{
    public function index(Request $request){
        if($request->ismethod('GET')) {
            $users = User::where('role', 'user')
             ->where('is_delete', 0)
             ->get();
            // dd($users);
            return view('admin.index', compact('users'));
        }
    }

    public function view($id){
        $id = decrypt($id);
        $user = User::find($id);
        $candidates = Candidates::where('agency', $user->email)->get();
        // dd($candidates);
        return view('admin.view', compact('candidates'));
    }
    public function delete($id){
        $id = decrypt($id);
        $user = Candidates::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
    
        // Delete the user
        Visa::where('candidate_id', $id)->delete();
        Candidates::where('id', $id)->delete();
    
        return response()->json(['message' => 'User deleted successfully']);
    }
}
