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
            //   dd($actualpass, $pass);2629746
               $actualemail = $user->email;
               if($actualemail == $email && $actualpass == $pass){

                session_start();
                session(['user_id' => $user->id]);
                $prev = $user->previous_month;
               
                $diffInSeconds = Carbon::parse($prev)->diffInSeconds(Carbon::now());
                if($diffInSeconds<2629746){
                    $user->is_paid = 0;
                    $user->save();
                    session(['user' => $actualemail, 'role' => $user->role, 'lname'=>$user->licence_name, 'rl_no'=>$user->rl_no, 'arabic_name'=>$user->arabic_name]);	
                    if($user->role == 'user'){
                        $secondsInMonth = 2629746;
                        $daysUntilNextMonth = Carbon::parse($prev)->addSeconds($secondsInMonth)->diffInDays(Carbon::now());

                        if($daysUntilNextMonth <= 10){
                            return response()->json([
                                'title'=> 'Payment Reminder',
                                'success' => true,
                                'icon' => 'info',
                                'message' => 'Your subscription is about to expire in ' . $daysUntilNextMonth . ' days. Please prepare to renew.',
                                'redirect_url' => 'user/index'
                            ]);
                        }
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
                    $user->is_paid = 1;
                    $user->save();
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

    public function forgetPassword(Request $request){
        if($request->isMethod('GET')){
            return view('resetpass/index');
        }
       
    }

    public function getemail(Request $request){
        // dd($request->all());
    }

    public function setnewpassword(Request $request)
    {
        $errormsg = [
            'text' => '',
            'type' => 'danger'
        ];
    
        session_start();
        $code = $request->code;
        
        if ($_SESSION['random_code'] == $code) {
            $password = $request->password;
            $password2 = $request->password2;
    
            if ($password == $password2) {
                $user = User::where('email', $_SESSION['requested_email'])->first(); // Use first() instead of get()
                
                if ($user) {
                    $user->password = encrypt($password); // Hash the password before saving
                    $user->save();
    
                    $errormsg['text'] = "Password changed";
                    $errormsg['type'] = 'success';
                } else {
                    $errormsg['text'] = "No such user found with this email";
                }
            } else {
                $errormsg['text'] = "Passwords don't match";
            }
        } else {
            $errormsg['text'] = "Code doesn't match or may be expired";
        }
    
        return view('welcome')->with('errormsg', $errormsg);
    }
    

    public function checkEmail(Request $request)
    {
        $email = $request->get('email');

        $user = User::where('email', $email)->first();

        return response()->json(['exists' => $user !== null]);
    }

    public function signup(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('user.signup');
        }
        else{
            $rname = request('licence_name');
            $arabic_name = request('arabic_name');
            $rno = request('rl_no');
            $email = request('email');
           
            $address = request('address');
            $pass = request('pass');
            $pass1 = request('pass1');
            // dd(1, $pass == $pass1, 2, request('pass'),3, request('pass1'));

            $user = User::where('email', $email)->first();
            if(!$user){
            if($pass == $pass1){
                $user = new User();
                $pass = encrypt($pass);
                $user->licence_name = $rname;
                $user->arabic_name = $arabic_name;
                $user->rl_no = $rno;
                $user->email = $email;
                $user->phone = "";
                $user->office_address = $address;
                $user->password = $pass;
                $user->embassy_man_name = "";
                $user->embassy_man_phone = "";
                $user->is_delete = 0;
                $user->role = 'user';
                $currentDateTime = Carbon::now();
                $user->previous_month = $currentDateTime->format('Y-m-d H:i:s');
                $user->is_paid = 1;
                // dd($user);
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
            }}else{
                return response()->json([
                    'title'=> 'Error',
                    'success' => false,
                    'icon' => 'error',
                    'message' => 'Your Email Allready Exists! Please Try With an another Email',
                    'redirect_url' => '/'
                ]);
            }
        }
    }
}