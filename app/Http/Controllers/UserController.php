<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use App\Models\Candidates;
use App\Models\Visa;
use App\Models\Manpower;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
   public function index(Request $request){

    if(Session::get('user')){
        if($request->isMethod('GET')){
       
            $query = DB::table('candidates')
            ->leftJoin('visas', 'candidates.id', '=', 'visas.candidate_id')
            ->select('candidates.*', 'visas.visa_no', 'visas.mofa_no', 'visas.spon_id','visas.prof_name_english')
            ->where('candidates.agency', '=', Session::get('user'));

            $agents = DB::table('agents')
                ->select('*')
                ->where('user', '=', Session::get('user'))
                ->where('is_delete', '=', 0)
                ->paginate(10);
            
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

        return view('user.index', compact('candidates', 'user', 'agents'));
        }
    
        else {
            // dd($request->all());
            DB::beginTransaction();
            $response = [
                'redirect_url' => 'user/index',
            ];
        
            try {
                $candidate = new Candidates();
                $candidate->agent = $request->agent_id;
                $candidate->name = strtoupper($request->pname);
                $candidate->passport_number = strtoupper($request->pnumber);
                // $candidate->passport_issue_date = date('Y-m-d', strtotime($request->pass_issue_date));
                // $candidate->passport_expire_date = date('Y-m-d', strtotime($request->pass_expire_date));
                $issueDate = \DateTime::createFromFormat('d/m/Y', $request->pass_issue_date);
                // dd($request->all(), $issueDate);
                if ($issueDate !== false) {
                    $candidate->passport_issue_date = $issueDate->format('Y-m-d');
                } else {
                  
                }

               
                $expireDate = \DateTime::createFromFormat('d/m/Y', $request->pass_expire_date);
                if ($expireDate !== false) {
                    $candidate->passport_expire_date = $expireDate->format('Y-m-d');
                } else {
                   
                }
                $birthDate = \DateTime::createFromFormat('d/m/Y', $request->date_of_birth);
                if ($birthDate !== false) {
                    $candidate->date_of_birth = $birthDate->format('Y-m-d');
                } else {
                   
                }
                // $candidate->date_of_birth = $request->date_of_birth;
                $candidate->place_of_birth = strtoupper($request->place_of_birth);
                $candidate->address = strtoupper($request->address);
                $candidate->father = strtoupper($request->father);
                $candidate->mother = strtoupper($request->mother);
                $candidate->religion = strtoupper($request->religion);
                $candidate->married = $request->married;
                $candidate->medical_center = strtoupper($request->medical_center_name);
                // $candidate->medical_issue_date = date('Y-m-d', strtotime($request->medical_issue_date));
                // $candidate->medical_expire_date = date('Y-m-d', strtotime($request->medical_expire_date));
                $issueDate = \DateTime::createFromFormat('d/m/Y', $request->medical_issue_date);
                if ($issueDate !== false) {
                    $candidate->medical_issue_date = $issueDate->format('Y-m-d');
                } else {
                 
                }

           
                $expireDate = \DateTime::createFromFormat('d/m/Y', $request->medical_expire_date);
                if ($expireDate !== false) {
                    $candidate->medical_expire_date = $expireDate->format('Y-m-d');
                } else {
               
                }
                $candidate->police = strtoupper($request->police_licence);
                $candidate->driving_licence = strtoupper($request->driving_licence);
                $candidate->is_delete = 0;
                $candidate->gender = strtoupper($request->gender);
                $candidate->address = strtoupper($request->address);
                
                $candidate->agency = Session::get('user');
                // dd($request->all(), $candidate);
                // Save the candidate
                if ($candidate->save()) {
                    DB::commit();
                    $response['title'] = 'Success';
                    $response['success'] = true;
                    $response['icon'] = 'success';
                    $response['message'] = 'Successfully created';
                } else {
                    $response['title'] = 'Error';
                    $response['success'] = false;
                    $response['icon'] = 'error';
                    $response['message'] = 'Cannot add';
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
   
   
   public function logout(){
        session()->flush();
        return redirect(url('/'));
   }

   public function visa_add(Request $request, $id){
        if(Session::get('user')){
            if($request->isMethod('GET')){
                
                $candidates = DB::table('candidates')
                ->leftJoin('visas', 'candidates.id', '=', 'visas.candidate_id')
                ->select('candidates.*', 'visas.*')->where('candidates.id', '=', $id)
                ->get();
        // dd($candidates);        
        // return view('user.addvisa', compact('id', 'candidates'));

        $user = DB::table('user')->select('*')->where('email', '=', Session::get('user'))->first();
                return view('user.addvisa', ['id' => $id], compact('id', 'candidates','user'));
                }
                else{
            
                $visa = new Visa();
        
                $visa->visa_no = strtoupper($request->input('visa_no'));
                $visa->candidate_id = $id;
                $visa->visa_date2 = strtoupper($request->input('visa_date'));
                $visa->spon_id = strtoupper($request->input('spon_id'));
                $visa->spon_name_arabic = strtoupper($request->input('spon_name_arabic'));
                $visa->salary = strtoupper($request->input('salary'));
                $visa->spon_name_english = strtoupper($request->input('spon_name_english'));
                $visa->prof_name_arabic = strtoupper($request->input('prof_name_arabic'));
                $visa->prof_name_english = strtoupper($request->input('prof_name_english'));
                $visa->mofa_no = strtoupper($request->input('mofa_no'));

                $mofaDate = \DateTime::createFromFormat('Y-m-d', $request->mofa_date);
                if ($mofaDate !== false) {
                    $visa->mofa_date = $mofaDate->format('Y-m-d');
                } else {
            
                }
                // $visa->mofa_date = strtoupper($request->input('mofa_date'));
                $visa->okala_no = strtoupper($request->input('okala_no'));
                $visa->musaned_no = strtoupper($request->input('musaned_no'));
                $visa->user = Session::get('user');
                $candidate = Candidates::find($id);
                $flag = Visa::where('candidate_id', $id)->exists();
                // dd(1,$request->all(), 2, $id, 3, $flag);
                if ($flag == false){
                    if($visa->save()){
                        return response()->json([
                            'title'=> 'Success',
                            'success' => true,
                            'icon' => 'success',
                            'message' => 'added succesfully',
                            'redirect_url' => 'user/index'
                        ]);
                    }
                    else{
                        return response()->json([
                            'title'=> 'Error',
                            'success' => false,
                            'icon' => 'error',
                            'message' => 'Cannot add',
                            'redirect_url' => 'user/index'
                        ]);
                    }
                }
                else{
                    return response()->json([
                        'title'=> 'Error',
                        'success' => false,
                        'icon' => 'error',
                        'message' => 'This candidate have a visa',
                        'redirect_url' => 'user/index'
                    ]);
                }
            }
    
        }
        else{
            return redirect(url('/'));
        }
    }  
    

    // public function manpower_add(Request $request, $id){
    //     if(Session::get('user')){
    //         if($request->isMethod('GET')){
                
    //             $candidate = DB::table('candidates')
    //             ->where('candidates.id', '=', $id)
    //             ->first();
      
    //             $user = DB::table('user')->select('*')->where('email', '=', Session::get('user'))->first();
    //                 return view('user.manpoweradd', ['id' => $id], compact('id', 'candidate','user'));
    //         }
    //         else{
    //                         // Wrap in a transaction
    //             DB::beginTransaction();
                
    //             try {
    //                 // Check if a manpower record for the candidate already exists
    //                 $flag = Manpower::where('candidate_id', $candidateId)->exists();

    //                 if ($flag) {
    //                     return response()->json([
    //                         'title' => 'Error',
    //                         'success' => false,
    //                         'icon' => 'error',
    //                         'message' => 'This candidate already has a manpower record',
    //                         'redirect_url' => 'user/index'
    //                     ]);
    //                 }

    //                 // Create new manpower entry
    //                 $manpower = new Manpower();
    //                 $manpower->passenger_no = strtoupper($request->input('passenger_no'));
    //                 $manpower->company_name = strtoupper($request->input('company_name'));
    //                 $manpower->certificate_no = strtoupper($request->input('certificate_no'));
    //                 $manpower->ffc_name = strtoupper($request->input('ffc_name'));
    //                 $manpower->reg_id = strtoupper($request->input('reg_id'));
    //                 $manpower->visa_no = strtoupper($request->input('visa_no'));

    //                 $visaIssuedDate = \DateTime::createFromFormat('Y-m-d', $request->visa_issued_date);
    //                 if ($visaIssuedDate !== false) {
    //                     $manpower->visa_issued_date = $visaIssuedDate->format('Y-m-d');
    //                 }

    //                 $visaExpDate = \DateTime::createFromFormat('Y-m-d', $request->visa_exp_date);
    //                 if ($visaExpDate !== false) {
    //                     $manpower->visa_exp_date = $visaExpDate->format('Y-m-d');
    //                 }

    //                 // Set is_delete default to 0 if not provided
    //                 $manpower->is_delete = $request->input('is_delete', 0);

    //                 // Save manpower record
    //                 $manpower->save();

    //                 // Update the candidate with the new manpower_id
    //                 $candidate = Candidate::find($candidateId);
    //                 if ($candidate) {
    //                     $candidate->manpower_id = $manpower->id;
    //                     $candidate->save();
    //                 } else {
    //                     // If the candidate was not found, throw an exception to trigger a rollback
    //                     throw new \Exception("Candidate not found");
    //                 }

    //                 // Commit transaction
    //                 DB::commit();

    //                 return response()->json([
    //                     'title' => 'Success',
    //                     'success' => true,
    //                     'icon' => 'success',
    //                     'message' => 'Manpower added successfully',
    //                     'redirect_url' => 'user/index'
    //                 ]);

    //             } catch (\Exception $e) {
    //                 // Rollback the transaction if something went wrong
    //                 DB::rollBack();

    //                 return response()->json([
    //                     'title' => 'Error',
    //                     'success' => false,
    //                     'icon' => 'error',
    //                     'message' => 'Failed to add manpower record: ' . $e->getMessage(),
    //                     'redirect_url' => 'user/index'
    //                 ]);
    //             }
    //         }
    //     else{
    //         return redirect(url('/'));
    //     }
    // }  

    public function manpower_add(Request $request, $id) {
        if (Session::get('user')) {
            if ($request->isMethod('GET')) {
                $candidate = DB::table('candidates')
                    ->where('candidates.id', '=', $id)
                    ->first();
      
                $user = DB::table('user')->select('*')
                    ->where('email', '=', Session::get('user'))
                    ->first();
                    
                return view('user.manpoweradd', ['id' => $id], compact('id', 'candidate', 'user'));
            } else {
                // Wrap in a transaction
                DB::beginTransaction();
                
                try {
                    // dd($request->all());
                    // Check if a manpower record for the candidate already exists
                    $flag = Manpower::where('candidate_id', $id)->exists();
    
                    if ($flag) {
                        return response()->json([
                            'title' => 'Error',
                            'success' => false,
                            'icon' => 'error',
                            'message' => 'This candidate already has a manpower record',
                            'redirect_url' => 'user/index'
                        ]);
                    }
    
                    // Create new manpower entry
                    $manpower = new Manpower();
                    $manpower->passenger_no = strtoupper($request->input('passenger_no'));
                    $manpower->company_name = strtoupper($request->input('company_name'));
                    $manpower->certificate_no = strtoupper($request->input('certificate_no'));
                    $manpower->ffc_name = strtoupper($request->input('ffc_name'));
                    $manpower->reg_id = strtoupper($request->input('reg_id'));
                    $manpower->visa_no = strtoupper($request->input('visa_no'));
                    $manpower->candidate_id = $id;
    
                    // Check if visa_issued_date is provided and valid
                    if ($request->has('visa_issued_date') && $request->input('visa_issued_date')) {
                        $visaIssuedDate = (new DateTime($request->input('visa_issued_date')))->format('Y-m-d');
                        $manpower->visa_issued_date = $visaIssuedDate;

                        // Calculate visa_exp_date as 90 days after visa_issued_date
                        $visaExpDate = (new DateTime($visaIssuedDate))->modify('+90 days')->format('Y-m-d');
                        $manpower->visa_exp_date = $visaExpDate;
                    } else {
                        // If visa_issued_date is missing, set both dates to defaults
                        $visaIssuedDate = now()->format('Y-m-d'); // Default to current date
                        $manpower->visa_issued_date = $visaIssuedDate;
                        
                        // Default visa_exp_date to 90 days from now
                        $visaExpDate = (new DateTime($visaIssuedDate))->modify('+90 days')->format('Y-m-d');
                        $manpower->visa_exp_date = $visaExpDate;
                    }


    
                    // Set is_delete default to 0 if not provided
                    $manpower->is_delete = $request->input('is_delete', 0);
    
                    // Save manpower record
                    $manpower->save();
    
                    // Update the candidate with the new manpower_id
                    $candidate = Candidates::find($id);
                    if ($candidate) {
                        $candidate->manpower_id = $manpower->id;
                        $candidate->save();
                    } else {
                        // If the candidate was not found, throw an exception to trigger a rollback
                        throw new \Exception("Candidate not found");
                    }
    
                    // Commit transaction
                    DB::commit();
    
                    return response()->json([
                        'title' => 'Success',
                        'success' => true,
                        'icon' => 'success',
                        'message' => 'Manpower added successfully',
                        'redirect_url' => 'user/index'
                    ]);
    
                } catch (\Exception $e) {
                    // Rollback the transaction if something went wrong
                    DB::rollBack();
    
                    return response()->json([
                        'title' => 'Error',
                        'success' => false,
                        'icon' => 'error',
                        'message' => 'Failed to add manpower record: ' . $e->getMessage(),
                        'redirect_url' => 'user/index'
                    ]);
                }
            }
        } else {
            return redirect(url('/'));
        }
    }

    public function manpower_edit(Request $request, $id)
    {
        try {
            // Find the manpower record by ID
            $manpower = Manpower::findOrFail($id);

            // Update fields directly from the request
            $manpower->passenger_no = strtoupper($request->input('passenger_no'));
            $manpower->company_name = strtoupper($request->input('company_name'));
            $manpower->certificate_no = strtoupper($request->input('certificate_no'));
            $manpower->ffc_name = strtoupper($request->input('ffc_name'));
            $manpower->reg_id = strtoupper($request->input('reg_id'));
            $manpower->visa_no = strtoupper($request->input('visa_no'));

            // Update dates if provided
            if ($request->input('visa_issued_date')) {
                $manpower->visa_issued_date = (new DateTime($request->input('visa_issued_date')))->format('Y-m-d');
            }

            if ($request->input('visa_exp_date')) {
                $manpower->visa_exp_date = (new DateTime($request->input('visa_exp_date')))->format('Y-m-d');
            }

            // Save the updated manpower record
            $manpower->save();

            return response()->json([
                'title' => 'Success',
                'success' => true,
                'icon' => 'success',
                'message' => 'Manpower record updated successfully',
                'redirect_url' => 'user/index'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'title' => 'Error',
                'success' => false,
                'icon' => 'error',
                'message' => 'Failed to update manpower record: ' . $e->getMessage(),
                'redirect_url' => 'user/index'
            ]);
        }
    }

    
    public function embassy_list(){
        if(Session::get('user')){
            $candidates = DB::table('candidates')
                    ->leftJoin('visas', 'candidates.id', '=', 'visas.candidate_id')
                    ->select('candidates.*', 'visas.*')
                    ->where('candidates.agency', '=', Session::get('user'))
                    ->get();
        // dd($candidates);
            $user = DB::table('user')->select('*')->where('email', '=', Session::get('user'))->first();
            return view('user.embassy_list', compact('candidates','user'));
        }
        else{
            return redirect(url('/'));
        }
        
    }



public function edit($id, Request $request){
    if (Session::get('user')) {
        if ($request->isMethod('GET')) {
            $candidates = DB::table('candidates')
                ->leftJoin('visas', 'candidates.id', '=', 'visas.candidate_id')
                ->select('candidates.*', 'visas.*')
                ->where('candidates.id', '=', $id)
                ->get();

            $manpower = DB::table('manpower')
                ->where('candidate_id', $id)
                ->first();  

            Log::info('Retrieved manpower:', ['manpower' => $manpower]);

            $user = DB::table('user')
                ->select('*')
                ->where('email', '=', Session::get('user'))
                ->first();     

            return view('user.edit', compact('id', 'candidates', 'user', 'manpower'));
        }
    } else {
        return redirect(url('/'));
    }
}


    public function view($id, Request $request){
        if(Session::get('user')){
            if($request->isMethod('GET')){
                $candidates = DB::table('candidates')
                        ->leftJoin('visas', 'candidates.id', '=', 'visas.candidate_id')
                        ->select('candidates.*', 'visas.*')->where('candidates.id', '=', $id)
                        ->get();
                // dd($candidates);  
                $user = DB::table('user')->select('*')->where('email', '=', Session::get('user'))->first();      
                return view('user.view', compact('id', 'candidates','user'));
            }
        } else{
            return redirect(url('/'));
        }
        
        
    }
    public function delete($id, Request $request) {
        if(Session::get('user')){
            $candidate = Candidates::find($id);
            if ($candidate) {
                $target = (Visa::where('candidate_id', $id)->delete());
                $flag = ($candidate->delete());
                if($flag){
                    if($target = 1){
                        return response()->json(['message'=>'Visa And Candidate Deleted', 'success'=>true]);
                    }
                    else{
                        return response()->json(['message'=>'Candidate Deleted', 'success'=>true]);
                    }
                }
                else{
                    return response()->json(['message'=>'Something went wrong', 'success'=>false]);
                }
            }
            
            else {
                return response()->json([
                
                    'message' => 'Contact to the support team, candidate not found',
                    'success' => false
                ]);
            }
        }else{
            return redirect(url('/'));
        }
    }
    public function addisa($id, Request $request){
        if(Session::get('user')){
            if($request->isMethod('GET')){
                $candidates = DB::table('candidates')
                        ->leftJoin('visas', 'candidates.id', '=', 'visas.candidate_id')
                        ->select('candidates.*')->where('candidates.id', '=', $id)
                        ->get();
                // dd($candidates);     
                $user = DB::table('user')->select('*')->where('email', '=', Session::get('user'))->first();   
                return view('user.addvisa', compact('id', 'candidates','user'));
            }
        }
        else{
            return redirect(url('/'));
        }
        
    }

    public function personal_edit($id, Request $request){
        // dd(1, $id, 2, $request->all());
        if(Session::get('user')){
            $candidate = Candidates::where('id', $id)->first();
            if($candidate){
            $candidate->name = strtoupper($request->pname);
            $candidate->passport_number = strtoupper($request->pnumber);
            $issueDate = \DateTime::createFromFormat('d/m/Y', $request->pass_issue_date);
            if ($issueDate !== false) {
                $candidate->passport_issue_date = $issueDate->format('Y-m-d');
            } else {
              
            }

           
            $expireDate = \DateTime::createFromFormat('d/m/Y', $request->pass_expire_date);
            if ($expireDate !== false) {
                $candidate->passport_expire_date = $expireDate->format('Y-m-d');
            } else {
               
            }
            $birthDate = \DateTime::createFromFormat('d/m/Y', $request->date_of_birth);
                if ($birthDate !== false) {
                    $candidate->date_of_birth = $birthDate->format('Y-m-d');
                } else {
                   
                }
            // $candidate->date_of_birth = $request->date_of_birth;
            $candidate->place_of_birth = strtoupper($request->place_of_birth);
            $candidate->address = strtoupper($request->address);
            $candidate->father = strtoupper($request->father);
            $candidate->mother = strtoupper($request->mother);
            $candidate->religion = strtoupper($request->religion);
            $candidate->address = strtoupper($request->address);
            $candidate->married = $request->married;
            $candidate->medical_center = strtoupper($request->medical_center_name);
            $issueDate = !empty($request->medical_issue_date) ? \DateTime::createFromFormat('d/m/Y', $request->medical_issue_date) : null;

            if ($issueDate !== false && $issueDate !== null) {
                $candidate->medical_issue_date = $issueDate->format('Y-m-d');
            } else {
                // Handle the case when the date format is invalid or empty
                $candidate->medical_issue_date = null; // Assigning null in case of empty or invalid date
            }

            $expireDate = !empty($request->medical_expire_date) ? \DateTime::createFromFormat('d/m/Y', $request->medical_expire_date) : null;

            if ($expireDate !== false && $expireDate !== null) {
                $candidate->medical_expire_date = $expireDate->format('Y-m-d');
            } else {
                // Handle the case when the date format is invalid or empty
                $candidate->medical_expire_date = null; // Assigning null in case of empty or invalid date
            }
            $candidate->police = strtoupper($request->police_licence);
            $candidate->driving_licence = strtoupper($request->driving_licence);
            $candidate->is_delete = 0;
            $candidate->gender = strtoupper($request->gender);
            // dd($candidate->save());
            if($candidate->save()){
                return response()->json([
                    'title'=> 'Success',
                    'success' => true,
                    'icon' => 'success',
                    'message' => 'Edited succesfully',
                    'redirect_url' => 'user/index'
                ]);
            }
            else{
                return response()->json([
                    'title'=> 'Error',
                    'success' => false,
                    'icon' => 'error',
                    'message' => 'Cannot edit',
                    'redirect_url' => 'user/index'
                    
                ]);
            }
        }
            else{
                return response()->json([
                    'title'=> 'Error',
                    'success' => false,
                    'icon' => 'error',
                    'message' => 'Candidate does not exist',
                    'redirect_url' => 'user/index'
                ]);
            }
        }
        else{
            return redirect(url('/'));
        }
        
    }

    public function visa_edit($id, Request $request){
        if(Session::get('user')){
            $visa = Visa::where('candidate_id', $id)->first();
            // dd($visa,2, $id);
            if($visa){
                $visa->visa_no = $request->input('visa_no');
                $visa->candidate_id = $id;
                $visa->visa_date2 = $request->input('visa_date');
                $visa->spon_id = $request->input('spon_id');
                $visa->spon_name_arabic = $request->input('spon_name_arabic');
                $visa->salary = $request->input('salary');
                // $visa->spon_name_english = $request->input('spon_name_english');
                $visa->prof_name_arabic = $request->input('prof_name_arabic');
                $visa->prof_name_english = $request->input('prof_name_english');
                $visa->mofa_no = $request->input('mofa_no');

                $mofaDate = \DateTime::createFromFormat('Y-m-d', $request->mofa_date);
            if ($mofaDate !== false) {
                $visa->mofa_date = $mofaDate->format('Y-m-d');
            } else {
           
            }

                // $visa->mofa_date = $request->input('mofa_date');
                $visa->okala_no = $request->input('okala_no');
                $visa->musaned_no = $request->input('musaned_no');
                // dd($visa->save());
                if($visa->save()){
                    return response()->json([
                        'title'=> 'Success',
                        'success' => true,
                        'icon' => 'success',
                        'message' => 'Successfully Updated Visa',
                        'redirect_url' => 'user/index'
                    ]);
                }
                else{
                    return response()->json([
                        'title'=> 'Error',
                        'success' => false,
                        'icon' => 'error',
                        'message' => 'Cannot edit',
                        'redirect_url' => 'user/index'
                    ]);
                }
            }
            else{
               
                    return response()->json([
                        'title'=> 'Error',
                        'success' => false,
                        'icon' => 'error',
                        'message' => 'Visa Not Found ',
                        'redirect_url' => 'user/index'
                    ]);
               
            }
        }
        else{
            return redirect(url('/'));
        }
        
    }

    public function update(Request $request){
        if(Session::get('user')){
            $name = request('uname');
            $phn = request('wsphn');
            // $arabic_name = request('arabic_name');
            $agphn = request('phone');
            $email = session('user');
            $user = User::where('email', $email)->first();
            if($user){

                if(!empty($agphn)){
                    $user->embassy_man_name = $name;
                    $user->embassy_man_phone = $phn;
                    $user->phone = $agphn;
                    // $user->arabic_name = $arabic_name;
                }
                else{
                    $user->embassy_man_name = $name;
                    $user->embassy_man_phone = $phn;
                }
                
                if($user->save()){
                    return redirect()->route('user/index')->with('success', 'User created successfully');
    
                }
                else{
                    return response()->json([
                        'title'=> 'Error',
                        'success' => false,
                        'icon' => 'error',
                        'message' => 'Internal error',
                        
                    ]);
                }
            }
            else{
                return response()->json([
                    'title'=> 'Error',
                    'success' => false,
                    'icon' => 'error',
                    'message' => 'User Not Found ',
                    
                ]);
            }
        }
        else{
            return redirect(url('/'));
        }
        // dd($request->all());
        
    }  

    public function printer($id){
        if(Session::get('user')){
            $candidates = DB::table('candidates')
            ->leftJoin('visas', 'candidates.id', '=', 'visas.candidate_id')
            ->select('candidates.*', 'visas.*')->where('candidates.id', '=', $id)
            ->get();
    
    
            $agencyemail = Session::get('user');
            $agency = User::select('*')->where('email', '=', $agencyemail)->get();
            // dd(1,$candidates, $agency);        
            return view('user.print', compact('id', 'candidates', 'agency'));
        }
        else{
            return redirect(url('/'));
        }
        
    }

    public function get(){
        if(Session::get('user')){
        $candidates = DB::table('candidates')
            ->where('is_delete', '=', 0)
            ->pluck('agency', 'passport_number');
        
        $users = DB::table('user')
            ->where('is_delete', '=', 0)
            ->select('licence_name', 'rl_no', 'email')
            ->get();
        
        $userData = [];
        
        foreach ($users as $user) {
            $userData[$user->email] = [
                'licence_name' => $user->licence_name,
                'rl_no' => $user->rl_no,
            ];
        }
        // dd($candidates);
        $data = [
            'candidates' => $candidates,
            'users' => $userData
        ];

        // Return the combined data as a JSON response
        return response()->json($data);
    }else{
        return redirect(url('/'));
    }
    }

    public function visa_search($visa_no){
        if(Session::get('user')){
        $visa = Visa::where('visa_no', $visa_no)
            ->where('user', '=', Session::get('user'))
            ->first();

        if ($visa) {
            return response()->json($visa);
        } else {
            return response()->json(['message' => 'Visa not found']);
        }
    }else{
        return redirect(url('/'));
    }
    }
}
