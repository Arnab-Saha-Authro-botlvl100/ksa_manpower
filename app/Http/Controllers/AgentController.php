<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class AgentController extends Controller
{
    public function agent_add(Request $request){

        if(Session::get('user')){
            if($request->isMethod('GET')){
               
                
                $query = DB::table('candidates')
                ->leftJoin('visas', 'candidates.id', '=', 'visas.candidate_id')
                ->select('candidates.*', 'visas.visa_no', 'visas.mofa_no', 'visas.spon_id')
                ->where('candidates.agency', '=', Session::get('user'));
    
                // Add search functionality
                if ($request->has('search')) {
                    $searchTerm = $request->input('search');
                    $query->where(function ($query) use ($searchTerm) {
                        $query->where('candidates.name', 'like', '%' . $searchTerm . '%')
                            ->orWhere('candidates.id', 'like', '%' . $searchTerm . '%')
                            ->orWhere('candidates.passport_number', 'like', '%' . $searchTerm . '%');
                    });
                }
        
                $query->orderBy('candidates.created_at', 'desc');
        
                $candidates = $query->paginate(10);
                $user = DB::table('user')->select('*')->where('email', '=', Session::get('user'))->first();
        
                return view('user.index', compact('candidates', 'user'));
            }
        
            else {
                DB::beginTransaction();
                $response = [
                    'redirect_url' => 'user/index',
                ];
            
                try {
                    $agent = new Agents();
                    // dd($request->all(), $request->file('agent_picture'));
                    $agent->agent_name = strtoupper($request->input('agent_name'));
                    $agent->agent_phone = strtoupper($request->input('agent_phone'));
                    $agent->agent_email = $request->input('agent_email');
                    $agent->agent_address = strtoupper($request->input('agent_address'));
                    $agent->agent_e_phone = strtoupper($request->input('agent_e_phone'));
                    $agent->user = Session::get('user');
                    if ($request->hasFile('agent_picture')) {
                        $logo = $request->file('agent_picture');
                        $filename = time() . '_' . $logo->getClientOriginalName();
                        $logo->move(public_path('agent_picture'), $filename);
                        $agent->agent_picture = 'agent_picture/' . $filename;
                    }
                    // dd($request->all(), $agent);
                    // Save the candidate
                    if ($agent->save()) {
                        DB::commit();
                        $response['title'] = 'Success';
                        $response['success'] = true;
                        $response['icon'] = 'success';
                        $response['message'] = 'Successfully created';
                    } else {
                        $response['title'] = 'Error';
                        $response['success'] = false;
                        $response['icon'] = 'error';
                        $response['message'] = 'Cannot add Agent';
                    }
                } catch (\Exception $e) {
                    DB::rollback();
                    $response['title'] = 'Error';
                    $response['success'] = false;
                    $response['icon'] = 'error';
                    $response['message'] = $e->getMessage(); // Get the actual error message
                }
            
                return response()->json($response);
            }
            
        }
        else{
            // return view('welcome');
            return redirect(url('/'));
        }
           
    }

    
    public function edit($id)
    {
        if (Session::get('user')) {
            // Fetch the agent details
            $agent = Agents::find($id);
            
            // Check if the agent exists
            if (!$agent) {
                return redirect()->route('user/index')->with('error', 'Agent not found');
            }

            // Return the edit view with agent data
            return view('agent.edit', compact('agent'));
        } else {
            return redirect()->route('login');  // Redirect to the login route
        }
    }

    public function update(Request $request){
        if(Session::get('user')){
           
            // dd($request->all());
            $validatedData = $request->validate([
                'agent_name' => 'required|string|max:255',
                'agent_phone' => 'required|string|max:255',
                'agent_email' => 'required|string|email|max:255',
                'agent_address' => 'sometimes|string|max:255',
                'agent_e_phone' => 'sometimes|string|max:255',
                'agent_picture' => 'sometimes|file|image|max:1024', // Ensure it's an image and limit size to 1MB
            ]);
        
            // Find the agent or fail with a 404 error
            $agent = Agents::findOrFail($request->id);
        
            // Update the agent's details
            $agent->agent_name = strtoupper($validatedData['agent_name']);
            $agent->agent_phone = strtoupper($validatedData['agent_phone']);
            $agent->agent_email = $validatedData['agent_email'];
            $agent->agent_address = strtoupper($validatedData['agent_address']);
            $agent->agent_e_phone = strtoupper($validatedData['agent_e_phone']);
            $agent->user = Session::get('user');
        
            // Handle the file upload
            if ($request->hasFile('agent_picture')) {
                $logo = $request->file('agent_picture');
                $filename = time() . '_' . $logo->getClientOriginalName();
                $logo->move(public_path('agent_picture'), $filename);
                $agent->agent_picture = 'agent_picture/' . $filename;
            }
        
            $response = [
                'redirect_url' => 'user/index',
            ];
            // Save the updated agent
            if ($agent->save()) {
                $response = [
                    'title' => 'Success',
                    'success' => true,
                    'icon' => 'success',
                    'message' => 'Successfully updated the agent',
                    'agent' => $agent
                ];
            } else {
                $response = [
                    'title' => 'Error',
                    'success' => false,
                    'icon' => 'error',
                    'message' => 'Failed to update the agent'
                ];
            }
        
            return response()->json($response, 200);
        
        }
        else{
            return redirect()->route('login');  // Redirect to the login route
        }
    }
    public function view($id){
        if (Session::get('user')) {
            // Fetch the agent details
            $agent = Agents::find($id);
            
            // Check if the agent exists
            if (!$agent) {
                return redirect()->route('user/index')->with('error', 'Agent not found');
            }
            $html = view('agent.card', compact('agent'))->render();
            // Return the edit view with agent data
            return response()->json([
                'html' => $html,
                
            ], 200);
        } else {
            return redirect()->route('login');  // Redirect to the login route
        }
    }

    // public function destroy($id) {
    //     try {
    //         $agent = Agents::findOrFail($id);
    //     } catch (ModelNotFoundException $e) {
    //         return response()->json([
    //             'title' => 'Error',
    //             'success' => false,
    //             'icon' => 'error',
    //             'message' => 'Agent not found',
    //             'redirect_url' => route('user/index'),
    //         ], 404);
    //     }
    
    //     $response = [
    //         'redirect_url' => route('user/index'),
    //     ];
    
    //     $agent->is_delete = 1;
    //     if ($agent->save()) {
    //         $response = [
    //             'title' => 'Success',
    //             'success' => true,
    //             'icon' => 'success',
    //             'message' => 'Successfully deleted the agent',
    //             'redirect_url' => route('user/index'),
    //         ];
    //     } else {
    //         $response = [
    //             'title' => 'Error',
    //             'success' => false,
    //             'icon' => 'error',
    //             'message' => 'Failed to delete the agent',
    //             'redirect_url' => route('user/index'),
    //         ];
    //     }
    
    //     return response()->json($response, 200);
    // }
    


    public function destroy($id) {
        if (Session::get('user')) {
            try {
                $agent = Agents::findOrFail($id);
            } catch (ModelNotFoundException $e) {
                Session::flash('error', 'Agent not found');
                return redirect()->route('user.index');
            }
    
            $agent->is_delete = 1;
            if ($agent->save()) {
                Session::flash('success', 'Successfully deleted the agent');
            } else {
                Session::flash('error', 'Failed to delete the agent');
            }
            return redirect()->route('user/index');
        } else {
            return redirect()->route('login');  // Redirect to the login route
        }
       
        
    }
}
