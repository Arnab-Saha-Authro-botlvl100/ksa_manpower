<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                clifford: "#da373d",
              },
            },
          },
        };
      </script>
    @include('layout.head');
</head>
<body>
    <body class="flex justify-center items-center h-screen">
        <div class="shadow-xl rounded-lg p-5 ">
          <p id="emailExists"></p>
          <form method="post" action="{{ route('send-mail') }}" class="input-group mb-3">
            @csrf
            <input
              type="email" name="email" id="email" 
              class="form-control"
              placeholder="Enter Email Address"
              aria-label="Recipient's username"
              aria-describedby="basic-addon2"
            />
           
            
            <button
              class="input-group-text bg-red-900 text-white focus:outline-none"
              id="basic-addon2 "
            >
              Send Email
            </button>
         
            
          </form>
          
          {{-- <div class="input-group mb-3">
            <input
              type="text"
              class="form-control"
              placeholder="Enter OTP"
              aria-label="Recipient's username"
              aria-describedby="basic-addon2"
            />
            <button
              class="input-group-text bg-green-900 text-white focus:outline-none"
              id="basic-addon2 "
            >
              Verify OTP
            </button>
          </div> --}}
        </div>
    
    
        <div class="shadow-xl rounded-lg p-5 text-center" id="right_div">
          <h2 class="font-bold text-2xl pb-4">Set New Password</h2>
          <form>
          <div class="input-group mb-3">
            
            <input
              type="password"
              class="form-control w-full"
              placeholder="Enter New Passport"
              aria-label="Recipient's username"
              aria-describedby="basic-addon2"
            />
           
          </div>
          <div class="input-group mb-3">
       
            <input
              type="password"
              class="form-control w-full"
              placeholder="Confirm New Passport"
              aria-label="Recipient's username"
              aria-describedby="basic-addon2"
            />
          
          </div>
          <button
          class="input-group-text bg-green-900 text-white focus:outline-none text-center"
          id="basic-addon2 "
        >
          Reset Password
        </button>
      </form>
        </div>


    @include('layout.script');
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#right_div').hide();
            $('#email').on('input', function() {
                var email = $(this).val(); 
                $.ajax({
                    method: 'GET',
                    url: '{{ route('checkEmail') }}', // Replace with your actual route
                    data: { email: email },
                    success: function(response) {
                        if (response.exists) {
                            $('#emailExists').text('This email exists in the database.');
                        } else {
                            $('#emailExists').text("This email doesn't exists in the database.");
                            // $('#email').val('');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>