<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KSA Form Print Solution</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/fav.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="path/to/bootstrap.min.css" rel="stylesheet">
    <script src="path/to/bootstrap.min.js"></script>
    @include('layout.head')


    <style>
        .banner {
            background-image: url('./assets/images/sa4.jpg');
            height: 90vh;
            background-size: 70% 50%;
            background-position: center;
            width: 100%;
        }
    </style>
    <style>
        /* Styling for the alert box */
        .alert {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #f2f2f2;
            color: #333;
            font-size: 16px;
            text-align: center;
            max-width: 80%;
        }

        /* Styling for success alert */
        .alert-success {
            background-color: #c3e6cb;
            color: #155724;
        }

        /* Styling for danger alert */
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
    <!-- tailwind css cdn -->
</head>

<body>
    <div class="flex justify-between items-center h-[10vh] px-8 font-semibold md:text-xl text-md py-5 shadow-2xl">
        <div class="flex gap-3 ">
           
            <div class="flex items-center xl:text-2xl md:text-xl text-md px-3 py-3 rounded-lg  duration-300 text-[#00959F] font-extrabold">KSA Visa Application Form Platform</div>
        </div>
        <div class="flex gap-3 items-center">
            <!-- Button trigger modal -->


            <a class="text-[#00959F] hover:text-gray-100 dark:text-gray-400 hover:no-underline hover:bg-[#00959F] dark:hover:text-white border-2 border-[#00959F] duration-300 font-semibold py-2 rounded-md px-4" href="./assets/images/final.pdf"
                target="_blank">Help</a>
            <button
                class="py-2 rounded-md font-medium px-3 hover:text-[#00959F] text-gray-50 bg-[#00959F] border-2 hover:bg-white hover:border-2 border-[#00959F] duration-300"
                data-bs-toggle="modal" data-bs-target="#exampleModal"
                >
                Register
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content mx-10 my-8 md:m-0">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Register Account</h5>
                            <button type="button" class="close text-2xl" data-bs-dismiss="modal" id="closeModal"
                                aria-label="Close">
                                <span aria-hidden="true" class="text-xl">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <div class="container mt-2">
                                <form id="signupform" action="{{ route('signup') }}" method="post" class="">
                                    @csrf
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="grid md:grid-cols-2 grid-cols-1 gap-3 w-full ">
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="form6Example1">Recruiting Licence
                                                Name</label>
                                            <input type="text" id="form6Example1"
                                                placeholder="Recruiting Licence Name" class="form-control" required
                                                name="licence_name" />

                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="form6Example1">Recruiting Licence Name
                                                (Arabic)</label>
                                            <input type="text" id="form6Example1"
                                                placeholder="Recruiting Licence Name" class="form-control" required
                                                name="arabic_name" />

                                        </div>



                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="form6Example2">Recruiting Licence Number
                                                (RL)</label>
                                            <input type="text" id="form6Example2" class="form-control"
                                                placeholder="Recruiting Licence Number (123)" required name="rl_no" />
                                        </div>

                                        <div class="form-outline mb-3 ">
                                            <label class="form-label" for="form6Example3">Email</label>
                                            <input type="email" id="form6Example3" required
                                                placeholder="abc@gmail.com" class="form-control" name="email" />

                                        </div>
                                    </div>
                                    <div class="form-outline mb-3 mb-4 w-full">
                                        <label class="form-label" for="form6Example5">Office Address </label>
                                        <textarea class="form-control" id="form6Example7" required placeholder="Type Your Office Address" name="address"
                                            rows="3"></textarea>

                                    </div>
                                    <div class=" grid md:grid-cols-2 grid-cols-1 gap-3 w-full ">
                                        <div class="form-outline mb-3 ">
                                            <label class="form-label" for="form6Example6">Password</label>
                                            <input type="password" id="form6Example6" required
                                                placeholder="Enter Password" class="form-control" name="pass" />

                                        </div>


                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="form6Example7">Confirm Password</label>
                                            <input type="password" id="form6Example6" required
                                                placeholder="Enter Confirm Password" class="form-control"
                                                name="pass1" />

                                        </div>
                                    </div>






                                    <!-- Message input -->


                                    <!-- Checkbox -->
                                    <div class="form-check flex items-center mb-4">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="form6Example8" /> <label class="form-check-label"
                                            for="form6Example8"> I agree, with the terms and condition of the company
                                        </label>


                                    </div>

                                    <!-- Submit button -->

                                    <button type="submit"
                                        class="btn btn-primary btn-block mb-4 text-blue-800 hover:text-white text-xl text-center">Sign
                                        Up</button>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- modal for contact --}}
            <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content mx-10 my-8 md:m-0">
                        
                        <div class="modal-body ">
                            <span class="block mb-4 text-base font-semibold text-primary">
                                Contact Us
                                </span>
                                <h2
                                   class="text-dark dark:text-white mb-6 text-[32px] font-bold uppercase sm:text-[40px] lg:text-[36px] xl:text-[40px]"
                                   >
                                   GET IN TOUCH WITH US
                                </h2>
                                <p
                                   class="text-base leading-relaxed text-body-color dark:text-dark-6 mb-9"
                                   >
                                   If You Need More Information about this Application, Feel free to contact us on bellow Details. If you Need Website for your Business or agency, we also do that for you.
                                </p>
                                <div class="mb-8 flex w-full max-w-[370px]">
                                   <div
                                      class="bg-primary/5 text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded sm:h-[70px] sm:max-w-[70px]"
                                      >
                                      <svg
                                         width="32"
                                         height="32"
                                         viewBox="0 0 32 32"
                                         fill="none"
                                         xmlns="http://www.w3.org/2000/svg"
                                         >
                                         <path
                                            d="M30.6 11.8002L17.7 3.5002C16.65 2.8502 15.3 2.8502 14.3 3.5002L1.39998 11.8002C0.899983 12.1502 0.749983 12.8502 1.04998 13.3502C1.39998 13.8502 2.09998 14.0002 2.59998 13.7002L3.44998 13.1502V25.8002C3.44998 27.5502 4.84998 28.9502 6.59998 28.9502H25.4C27.15 28.9502 28.55 27.5502 28.55 25.8002V13.1502L29.4 13.7002C29.6 13.8002 29.8 13.9002 30 13.9002C30.35 13.9002 30.75 13.7002 30.95 13.4002C31.3 12.8502 31.15 12.1502 30.6 11.8002ZM13.35 26.7502V18.5002C13.35 18.0002 13.75 17.6002 14.25 17.6002H17.75C18.25 17.6002 18.65 18.0002 18.65 18.5002V26.7502H13.35ZM26.3 25.8002C26.3 26.3002 25.9 26.7002 25.4 26.7002H20.9V18.5002C20.9 16.8002 19.5 15.4002 17.8 15.4002H14.3C12.6 15.4002 11.2 16.8002 11.2 18.5002V26.7502H6.69998C6.19998 26.7502 5.79998 26.3502 5.79998 25.8502V11.7002L15.5 5.4002C15.8 5.2002 16.2 5.2002 16.5 5.4002L26.3 11.7002V25.8002Z"
                                            fill="currentColor"
                                            />
                                      </svg>
                                   </div>
                                   <div class="w-full">
                                      <h4 class="mb-1 text-xl font-bold text-dark dark:text-white">
                                         Our Location
                                      </h4>
                                      <p class="text-base text-body-color dark:text-dark-6">
                                         291, Jomidar Palace, Fakirapool, Motijheel, Dhaka-1000
                                      </p>
                                   </div>
                                </div>
                                <div class="mb-8 flex w-full max-w-[370px]">
                                   <div
                                      class="bg-primary/5 text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded sm:h-[70px] sm:max-w-[70px]"
                                      >
                                      <svg
                                         width="32"
                                         height="32"
                                         viewBox="0 0 32 32"
                                         fill="none"
                                         xmlns="http://www.w3.org/2000/svg"
                                         >
                                         <g clip-path="url(#clip0_941_17577)">
                                            <path
                                               d="M24.3 31.1499C22.95 31.1499 21.4 30.7999 19.7 30.1499C16.3 28.7999 12.55 26.1999 9.19997 22.8499C5.84997 19.4999 3.24997 15.7499 1.89997 12.2999C0.39997 8.59994 0.54997 5.54994 2.29997 3.84994C2.34997 3.79994 2.44997 3.74994 2.49997 3.69994L6.69997 1.19994C7.74997 0.599942 9.09997 0.899942 9.79997 1.89994L12.75 6.29994C13.45 7.34994 13.15 8.74994 12.15 9.44994L10.35 10.6999C11.65 12.7999 15.35 17.9499 21.25 21.6499L22.35 20.0499C23.2 18.8499 24.55 18.4999 25.65 19.2499L30.05 22.1999C31.05 22.8999 31.35 24.2499 30.75 25.2999L28.25 29.4999C28.2 29.5999 28.15 29.6499 28.1 29.6999C27.2 30.6499 25.9 31.1499 24.3 31.1499ZM3.79997 5.54994C2.84997 6.59994 2.89997 8.74994 3.99997 11.4999C5.24997 14.6499 7.64997 18.0999 10.8 21.2499C13.9 24.3499 17.4 26.7499 20.5 27.9999C23.2 29.0999 25.35 29.1499 26.45 28.1999L28.85 24.0999C28.85 24.0499 28.85 24.0499 28.85 23.9999L24.45 21.0499C24.45 21.0499 24.35 21.0999 24.25 21.2499L23.15 22.8499C22.45 23.8499 21.1 24.1499 20.1 23.4999C13.8 19.5999 9.89997 14.1499 8.49997 11.9499C7.84997 10.8999 8.09997 9.54994 9.09997 8.84994L10.9 7.59994V7.54994L7.94997 3.14994C7.94997 3.09994 7.89997 3.09994 7.84997 3.14994L3.79997 5.54994Z"
                                               fill="currentColor"
                                               />
                                            <path
                                               d="M29.3 14.25C28.7 14.25 28.25 13.8 28.2 13.2C27.8 8.15003 23.65 4.10003 18.55 3.75003C17.95 3.70003 17.45 3.20003 17.5 2.55003C17.55 1.95003 18.05 1.45003 18.7 1.50003C24.9 1.90003 29.95 6.80003 30.45 13C30.5 13.6 30.05 14.15 29.4 14.2C29.4 14.25 29.35 14.25 29.3 14.25Z"
                                               fill="currentColor"
                                               />
                                            <path
                                               d="M24.35 14.7002C23.8 14.7002 23.3 14.3002 23.25 13.7002C22.95 11.0002 20.85 8.90018 18.15 8.55018C17.55 8.50018 17.1 7.90018 17.15 7.30018C17.2 6.70018 17.8 6.25018 18.4 6.30018C22.15 6.75018 25.05 9.65018 25.5 13.4002C25.55 14.0002 25.15 14.5502 24.5 14.6502C24.4 14.7002 24.35 14.7002 24.35 14.7002Z"
                                               fill="currentColor"
                                               />
                                         </g>
                                         <defs>
                                            <clipPath id="clip0_941_17577">
                                               <rect width="32" height="32" fill="white" />
                                            </clipPath>
                                         </defs>
                                      </svg>
                                   </div>
                                   <div class="w-full">
                                      <h4 class="mb-1 text-xl font-bold text-dark dark:text-white">
                                         Phone Number
                                      </h4>
                                      <p class="text-base text-body-color dark:text-dark-6">
                                         (+88)01776105863 , (+88)01609317035
                                      </p>
                                   </div>
                                </div>
                                <div class="mb-8 flex w-full max-w-[370px]">
                                   <div
                                      class="bg-primary/5 text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded sm:h-[70px] sm:max-w-[70px]"
                                      >
                                      <svg
                                         width="32"
                                         height="32"
                                         viewBox="0 0 32 32"
                                         fill="none"
                                         xmlns="http://www.w3.org/2000/svg"
                                         >
                                         <path
                                            d="M28 4.7998H3.99998C2.29998 4.7998 0.849976 6.1998 0.849976 7.9498V24.1498C0.849976 25.8498 2.24998 27.2998 3.99998 27.2998H28C29.7 27.2998 31.15 25.8998 31.15 24.1498V7.8998C31.15 6.1998 29.7 4.7998 28 4.7998ZM28 7.0498C28.05 7.0498 28.1 7.0498 28.15 7.0498L16 14.8498L3.84998 7.0498C3.89998 7.0498 3.94998 7.0498 3.99998 7.0498H28ZM28 24.9498H3.99998C3.49998 24.9498 3.09998 24.5498 3.09998 24.0498V9.2498L14.8 16.7498C15.15 16.9998 15.55 17.0998 15.95 17.0998C16.35 17.0998 16.75 16.9998 17.1 16.7498L28.8 9.2498V24.0998C28.9 24.5998 28.5 24.9498 28 24.9498Z"
                                            fill="currentColor"
                                            />
                                      </svg>
                                   </div>
                                   <div class="w-full">
                                      <h4 class="mb-1 text-xl font-bold text-dark dark:text-white">
                                         Email Address
                                      </h4>
                                      <p class="text-base text-body-color dark:text-dark-6">
                                         contact.sallusoft166@gmail.com
                                      </p>
                                   </div>
                                </div>
                             </div>
                          </div>
                        </div>

                    </div>
                </div>
            </div>

            @if (isset($errormsg['text']) && !empty($errormsg['type']))
                <div class="alert alert-{{ $errormsg['type'] }}" id="alertBox">{{ $errormsg['text'] }}</div>

                <script>
                    $(document).ready(function() {
                        var alertBox = $('#alertBox');

                        // Show the alert as a pop-up
                        alertBox.fadeIn('slow', function() {
                            // Hide the alert after a few seconds
                            setTimeout(function() {
                                alertBox.fadeOut('slow', function() {
                                    $(this).remove(); // Remove the alert from the DOM
                                });
                            }, 3000); // Adjust the time as needed
                        });
                    });
                </script>
            @endif


        </div>
    </div>



    <div class="selection:bg-red-500 selection:text-white hero-pattern banner bg-center bg-cover h-full">
      <div class=" h-full inset-0 bg-black bg-opacity-75">
        <div class="min-h-[90vh] md:gap-x-14 sm:flex md:justify-between items-center w-[95%] mx-auto md:w-[75%] md:items-center py-8 md:py-0">
          <div class="md:w-[48%] w-[90%] mx-auto md:mx-0 md:py-0 py-8 hidden md:block">
              <h2 class='font-extrabold text-white md:text-5xl text-3xl'>KSA 4 Page Form Download Software Solution</h2>
              <p class="font-semibold mt-3 md:text-xl text-lg text-gray-50">Introducing simple and easy to use software specially designed for KSA 4 Page Form Download</p>
              <button class="border-2 border-white text-gray-50 py-2 px-5 hover:bg-white duration-300 hover:text-black font-semibold text-lg mt-3 rounded-lg w-fit" data-bs-toggle="modal" data-bs-target="#contactModal">Contact</button>
          </div>
          <div class=" md:w-[48%] w-[100%] flex items-center md:justify-end justify-center">
            <div class="mt-3 bg-white shadow-2xl border-2 border-black rounded-2xl py-9 px-7">
              <form class="" id="loginform" action="{{ route('login') }}" method="post">
                  <!-- Email input -->
                  @csrf
                  <h2 class="text-center  pb-10 font-semibold text-2xl">Login</h2>
                  <div>
                      <div class="flex flex-col gap-1 mb-4">
                          <label class=" text-xl font-semibold" for="form2Example1">Email Address</label>
                          <input type="email" id="form2Example1" placeholder="abc@gmail.com"
                              class="border-2 focus:outline-none border-green-700 w-full p-3 rounded-lg"
                              name="email" />
                      </div>
  
                      <!-- Password input -->
                      <div class="">
                          <label class=" text-xl font-semibold" for="form2Example2">Password</label>
                          <input type="password" placeholder="Enter Password" id="form2Example2"
                              class="w-full p-3 rounded-lg border-2 focus:outline-none border-green-700"
                              name="pass" />
                      </div>
                  </div>
                  <!-- 2 column grid layout for inline styling -->
  
                  <div class="flex justify-center  ">
                      <button type="submit"
                          class="text-white text-xl rounded-lg py-2 border-white text-center flex justify-center bg-[#04352f] px-14 hover:bg-blue-500 font-semibold mt-4 transition ease-in-out delay-250">
                          Login
                      </button>
                  </div>
              </form>
  
              <div class="flex justify-between pt-4">
                  <a href="{{ route('forget-password') }}" class=" hover:text-blue-600 text-md">Forgot password?</a>
              </div>
              <div class="pt-2 flex justify-between ">
                  <span class="">Dont have any account?</span>
  
                  <button class="focus:border-none text-base bg-white rounded-lg px-2 p-1 font-semibold"
                      data-bs-toggle="modal" data-bs-target="#exampleModal">
                      signup
                  </button>
  
              </div>
          </div>
          </div>
        </div>
      </div>
  </div>


    <!-- bootstrap scripts -->
    @include('layout.script')

    <script type="text/javascript">
        $(document).ready(function() {
            // $('#loginform').on('submit', function(e) {
            //     e.preventDefault();

            //     var form = $(this);
            //     var formData = form.serialize();

            //     $.ajax({
            //         url: form.attr('action'),
            //         method: 'POST',
            //         data: formData,

            //         success: function(response) {
            //             Swal.fire({
            //                 title: response.title,
            //                 text: response.message,
            //                 icon: response.icon,

            //             });
            //             setTimeout(function() {
            //                 window.location.href = response.redirect_url;
            //             }, 500);
            //         },
            //         error: function(xhr) {
            //             Swal.fire({
            //                 title: response.title,
            //                 text: response.message,
            //                 icon: response.icon,

            //             });
            //             setTimeout(function() {
            //                 window.location.href = response.redirect_url;
            //             }, 3000);
            //         }
            //     });
            // });

            $('#loginform').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                var formData = form.serialize();

                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: formData,

                    success: function(response) {
                        Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.icon,
                        }).then(() => {
                            // Redirect only if redirect_url is provided
                            if (response.redirect_url) {
                                window.location.href = response.redirect_url;
                            }
                        });
                    },
                    error: function(xhr) {
                        const response = xhr.responseJSON;
                        Swal.fire({
                            title: response.title || 'Error',
                            text: response.message || 'An error occurred.',
                            icon: response.icon || 'error',
                        }).then(() => {
                            // Redirect only if redirect_url is provided
                            if (response && response.redirect_url) {
                                window.location.href = response.redirect_url;
                            }
                        });
                    }
                });
            });



            $('#signupform').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                var formData = form.serialize();

                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: formData,

                    success: function(response) {
                        Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.icon,

                        });
                        setTimeout(function() {
                            window.location.href = response.redirect_url;
                        }, 500);
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.icon,

                        });
                        setTimeout(function() {
                            window.location.href = response.redirect_url;
                        }, 3000);
                    }
                });
            });

        })
    </script>
</body>

</html>
