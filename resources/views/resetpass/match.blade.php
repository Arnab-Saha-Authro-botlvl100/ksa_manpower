<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Password</title>
    @include('layout.head')
</head>
<body class="h-screen flex items-center justify-center">
    <form method="post" action="{{ route('password_reset') }}" class="shadow-xl w-[350px] md:w-[500px] flex flex-col gap-y-3 flex- rounded-lg p-5 text-center" >
        @csrf
        
            <h2 class="font-bold text-2xl pb-4">Set New Password</h2>
           
            
                <input
                  type="text"
                  name="code"
                  class="form-control"
                  placeholder="Enter OTP"
                  aria-label="Recipient's username"
                  aria-describedby="basic-addon2"
                />
                
              
              <input
                type="password"
                name="password"
                class="form-control w-full"
                placeholder="Enter New Passport"
                aria-label="Recipient's username"
                aria-describedby="basic-addon2"
              />
             
           
            
         
              <input
                type="password"
                name="password2"
                class="form-control w-full"
                placeholder="Confirm New Passport"
                aria-label="Recipient's username"
                aria-describedby="basic-addon2"
              />
            
          
            <button
            type="submit"
            class="input-group-text flex justify-center bg-green-900 text-white focus:outline-none text-center"
            id="basic-addon2 "
          >
            Reset Password
          </button>
        
  



        {{-- <input type="text" name="code" class="form-control" placeholder="type code">
        <input type="password" name="password" class="form-control" placeholder="new password">
        <input type="password" name="password2" class="form-control" placeholder="re type password">
        <button type="submit" class="btn btn-primary">Send</button> --}}
    </form>
    @include('layout.script')
</body>
</html>