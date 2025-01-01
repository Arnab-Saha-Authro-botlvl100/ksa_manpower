<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Session;
use App\Models\Agents;

class ReportController extends Controller
{
  

    public function agentCandidate()
    {
       $user = Session::get('user');
       if($user){   
            $agents = Agents::where('user',$user)->where('is_delete', 0)->get();
            return view('report.agent_candidate.index', compact('agents'));
       }
       else{
        return redirect()->route('login');
       }
    }

    public function agent_candidate_report(Request $request){
        $user = Session::get('user');
        if($user){
            $user = session('user');
            // dd($request->all());
            $query = DB::table('candidates')
                ->leftJoin('visas', 'candidates.id', '=', 'visas.candidate_id')
                ->select('candidates.*', 'visas.visa_no', 'visas.mofa_no', 'visas.spon_id', 'visas.prof_name_english')
                ->where('candidates.agency', '=', $user);
        
            // Check if user exists and if start and end dates are provided
            if ($user && (($request->start_date != null) || ($request->end_date != null))) {
                $start_date = $request->start_date;
                $end_date = $request->end_date;
        
                // Convert start and end dates to proper format
                if (!is_null($start_date)) {
                    $start_date = (new DateTime($start_date))->format('Y-m-d');
                }
                if (!is_null($end_date)) {
                    $end_date = (new DateTime($end_date))->format('Y-m-d');
                }
        
                // Add date range conditions if both start and end dates are provided
                if (!is_null($start_date) && !is_null($end_date)) {
                    $query->whereBetween('candidates.created_at', [$start_date, $end_date]);
                } elseif (!is_null($start_date)) {
                    // Add only start date condition if end date is not provided
                    $query->where('candidates.created_at', '>=', $start_date);
                } elseif (!is_null($end_date)) {
                    // Add only end date condition if start date is not provided
                    $query->where('candidates.created_at', '<=', $end_date);
                }
            }
        
            // Check if agent filter is provided
            if ($request->agent != null ) {
                $agent = $request->agent;
                $query->where('candidates.agent', $agent);
            }
        
            // Execute the query
            $candidates = $query->get();
            // dd($candidates);
            $html = view('report.agent_candidate.report', compact('candidates'))->render();
            // Return the edit view with agent data
            return response()->json([
                'html' => $html,
                
            ], 200);
        }
        else{
            return redirect()->route('login');
        }
    }
}
