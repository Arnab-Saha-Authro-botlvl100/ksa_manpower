<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    />
    <title>Profile - Embassy Solution</title>

    <link rel="stylesheet" href="../asset/css/profile.css" />

    <!-- bootstrap cdn -->

    <!-- bootstrap cdn -->

    <!-- tailwind css cdn -->
    <script src="https://cdn.tailwindcss.com"></script>
    @include('layout.script');
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Other script includes -->
  
    <!-- Additional scripts you mentioned -->
    <script>
      $(document).ready(function () {
        $('#email').on('input', function () {
          var email = $(this).val();
          $.ajax({
            method: 'GET',
            url: '{{ route('checkEmail') }}',
            data: { email: email },
            success: function (response) {
              if (response.exists) {
                $('#emailExists').text('This email exists in the database.');
              } else {
                $('#emailExists').text("This email doesn't exist in the database.");
              }
            },
            error: function () {
              $('#emailExists').text('An error occurred while checking the email.');
            }
          });
        });
      });
    </script>
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

    <!-- tailwind css cdn -->
  </head>
  <body class="flex justify-center items-center h-screen">
    <div class="shadow-xl rounded-lg p-5 ">
      <form method="post" action="{{ route('send-mail') }}" class="input-group mb-3">
        <input
          type="email" name="email" id="email" 
          class="form-control"
          placeholder="Enter Email Address"
          aria-label="Recipient's username"
          aria-describedby="basic-addon2"
        />
       
        <span id="emailExists"></span>
        <button
          class="input-group-text bg-red-900 text-white focus:outline-none"
          id="basic-addon2 "
        >
          Send Email
        </button>
      </form>
      <div class="input-group mb-3">
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
          Verrify OTP
        </button>
      </div>
    </div>


    <div class="shadow-xl rounded-lg p-5 text-center">
      <h2 class="font-bold text-2xl pb-4">Set New Password</h2>
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
    </div>
    @include('layout.script')
    <!-- bootstrap scripts -->
    <script>
      $(document).ready(function() {
          
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
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
   
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <script src="js/index.js" crossorigin="anonymous"></script>

    <!-- Tailwind Elements Script -->
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
  </body>
</html>
