<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ViewController extends Controller
{

    public function login(Request $request){
       if($request->isMethod('GET')){
            return view('welcome');
       }
       else{
           $email = request('email');
           $pass = request('pass');
           $flag = $user = User::where('email', $email)->exists();
        //    dd($flag);
           if($flag){
               $user = User::where('email', $email)->first();
               $actualpass = decrypt($user->password);
            //   dd($actualpass, $pass);
               $actualemail = $user->email;
               if($actualemail == $email && $actualpass == $pass){
                    $prev = $user->previous_month;
                   
                    $diffInSeconds = Carbon::parse($prev)->diffInSeconds(Carbon::now());
                    if($diffInSeconds<60){
                        session_start();
                        session(['user' => $actualemail, 'role' => $user->role, 'lname'=>$user->licence_name, 'rl_no'=>$user->rl_no, 'arabic_name'=>$user->arabic_name]);	
                        if($user->role == 'user'){
                            return response()->json([
                                'title'=> 'Success',
                                'success' => true,
                                'icon' => 'success',
                                'message' => 'Successfully logged in',
                                'redirect_url' => 'user/index'
                            ]);
                        }
                        else{
                            return response()->json([
                                'title'=> 'Success',
                                'success' => true,
                                'icon' => 'success',
                                'message' => 'Successfully logged in',
                                'redirect_url' => 'admin/index'
                            ]);
                        }
                    }
                    else{
                        return response()->json([
                            'title'=> 'Subscription Required',
                            'success' => false,
                            'icon' => 'warning',
                            'message' => 'Subscription Required, You will redirect to the payment',
                            'redirect_url' => 'payment/index'
                        ]);
                    }
                   
               }
               else{
                return response()->json([
                    'title'=> 'Error',
                    'success' => false,
                    'icon' => 'error',
                    'message' => 'Wrong Password',
                    'redirect_url' => '/'
                 ]);
               }
           }
           else{
            return response()->json([
                'title'=> 'Error',
                'success' => false,
                'icon' => 'error',
                'message' => 'Email Not Found!',
                'redirect_url' => '/'
             ]);
           }
       }
    }

    public function signup(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('user.signup');
        }
        else{
            $rname = request('licence_name');
            $rno = request('rl_no');
            $email = request('email');
           
            $address = request('address');
            $pass = request('pass');
            $pass1 = request('pass1');
            // dd(1, $pass == $pass1, 2, request('pass'),3, request('pass1'));
            if($pass == $pass1){
                $user = new User();
                $pass = encrypt($pass);
                $user->licence_name = $rname;
                $user->rl_no = $rno;
                $user->email = $email;
               
                $user->office_address = $address;
                $user->password = $pass;
                $user->embassy_man_name = "";
                $user->embassy_man_phone = "";
                $user->is_delete = 0;
                $user->role = 'user';
                $currentDateTime = Carbon::now();
                $user->previous_month = $currentDateTime->format('Y-m-d H:i:s');
                $user->is_paid = 0;
                if($user->save()){
                    return response()->json([
                        'title'=> 'Success',
                        'success' => true,
                        'icon' => 'success',
                        'message' => 'Successfully created',
                        'redirect_url' => '/'
                    ]);
                }
                else{
                   
                    return response()->json([
                       'title'=> 'Error',
                       'success' => false,
                       'icon' => 'error',
                       'message' => 'Something went wrong!',
                       'redirect_url' => '/'
                    ]);
                }    
            }
            else{
                // dd($pass == $pass1);
                return response()->json([
                    'title'=> 'Error',
                    'success' => false,
                    'icon' => 'error',
                    'message' => 'Password does not match!',
                    'redirect_url' => '/'
                ]);
            }
        }
    }
}