<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>KSA Form Print Solution</title>
        <link rel="icon" type="image/x-icon" href="{{asset('assets/images/fav.png')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        @include('layout.head')
       
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        important:true,
        theme: {
          extend: {
            colors: {
              clifford: "#da373d",
            },
            backgroundImage:{
                'hero-pattern': "url('./img/hero2.jpg')",
            }
          },
        },
      };
    </script>
    <style>
     .banner{ 
      background-image: url('./assets/images/sa4.jpg');
      height:90vh;
      background-size:70% 50%;
      background-position:center;
      width:100%;
    }
    
    </style>
     <!-- tailwind css cdn -->
  </head>
  <body>
    <div
      class="flex justify-between items-center text-primary h-[11vh] md:px-7 px-2 font-semibold md:text-xl text-md py-15 shadow-2xl border-b-2 border-black"
    >
      <div class="flex gap-3 ">
        <div class="md:text-2xl text-md p-2 border-primary rounded-xl border-r-4 flex flex-col ">
          <span class="text-center" >  حل الملف   </span>File Solution
        </div>
        <div class="flex items-center md:text-2xl text-lg">Visa Application Form Platform</div>
      </div>
      <div class="flex gap-4  items-center">
    
        {{-- https://drive.google.com/file/d/1aYGbaODafFUDw2fVQ9O2TPGyQ0dwgrtp/view?usp=sharing --}}
            <!-- Button trigger modal -->
        <a class="" href="./assets/images/final.pdf" target="_blank">Help</a>
<button  class="focus:border-none md:text-[22px] text-[16px] border-primary p-2 rounded-xl border-l-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Register
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Register Account</h5>
            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> --}}
          </div>
          <div class="modal-body ">
              <div class="container mt-5">
                <form id="signupform" action="{{route('signup')}}" method="post">
                  @csrf
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row mb-4">
                      <div class="col">
                        <div class="form-outline">
                          <label class="form-label" for="form6Example1">Recruiting Licence Name</label>
                          <input type="text" id="form6Example1" placeholder="Recruiting Licence Name" class="form-control" required name="licence_name"/>
                          
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-outline">
                          <label class="form-label" for="form6Example1">Recruiting Licence Name (Arabic)</label>
                          <input type="text" id="form6Example1" placeholder="Recruiting Licence Name" class="form-control" required name="arabic_name"/>
                          
                        </div>
                      </div>
                     
                    </div>

                    <div class="row mb-4">
                      <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">Recruiting Licence Number (RL)</label>
                          <input type="text" id="form6Example2" class="form-control" placeholder="Recruiting Licence Number (123)" required name="rl_no"/>
                          
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-outline ">
                            <label class="form-label" for="form6Example3">Email</label>
                          <input type="email" id="form6Example3" required placeholder="abc@gmail.com" class="form-control" name="email"/>
                          
                        </div>
                      </div>
                      
                    </div>
                  
                    <!-- Text input -->
                    
                  
                    <!-- Text input -->
                    
                  
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form6Example5">Office Address </label>
                        <textarea class="form-control" id="form6Example7" required placeholder="Type Your Office Address" name="address" rows="3"></textarea>
                      
                    </div>
                  
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline ">
                                <label class="form-label" for="form6Example6" >Password</label>
                              <input type="password" id="form6Example6" required placeholder="Enter Password" class="form-control" name="pass" />
                            
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example7" >Confirm Password</label>
                                <input type="password" id="form6Example6" required placeholder="Enter Confirm Password"  class="form-control" name="pass1" />
                              
                            </div>
                        </div>
                      </div>



                   
                  
                    <!-- Message input -->
                    
                  
                    <!-- Checkbox -->
                    <div class="form-check flex items-center mb-4">
                      <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" /> <label class="form-check-label" for="form6Example8"> I agree, with the terms and condition of the company </label>
                      
                    
                    </div>
                  
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4 text-blue-800 hover:text-white text-xl">Sign Up</button>
                
              </form>
              </div>
          </div>
          
        </div>
      </div>
  </div>

    
         
          
      </div>
    </div>
    <div class="bg-gray-100 banner h-[89vh] bg-cover w-full flex items-center md:px-[200px] md:justify-end justify-center hero-pattern" >
        <div class="mt-3 bg-white shadow-2xl border-2 border-black rounded-2xl py-9 px-7 md:mr-14 mr-1">
            <form class="" id="loginform" action="{{ route('login') }}" method="post">
                <!-- Email input -->
                @csrf
                <h2 class="text-center  pb-10 font-semibold text-2xl">Login</h2>
                <div> <div class="flex flex-col gap-1 mb-4">
                    <label class=" text-xl font-semibold" for="form2Example1">Email Address</label>
                    <input type="email" id="form2Example1" placeholder="abc@gmail.com" class="border-2 focus:outline-none border-green-700 w-full p-3 rounded-lg" name="email"/>
                    </div>
        
                    <!-- Password input -->
                    <div class="">
                    <label class=" text-xl font-semibold" for="form2Example2">Password</label>
                    <input
                        type="password"
                        placeholder="Enter Password"
                        id="form2Example2"
                        class="w-full p-3 rounded-lg border-2 focus:outline-none border-green-700"
                        name="pass"
                    />
                    </div>
                </div>
                <!-- 2 column grid layout for inline styling -->
        
                <div class="flex justify-center  ">
                  <button type="submit" class="text-white text-xl rounded-lg py-2 border-white text-center flex justify-center bg-[#04352f] px-14 hover:bg-blue-500 font-semibold mt-4 transition ease-in-out delay-250">
                    Login
                  </button>
                </div>
            </form>
               
            <div class="flex justify-between pt-4">
                <a href="" class=" hover:text-blue-600 text-md">Forgot password?</a>
            </div>
            <div class="pt-2 flex justify-between ">
                <span class="">Dont have any account?</span>

                <button  class="focus:border-none text-base bg-white rounded-lg px-2 p-1 font-semibold" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    signup
                </button>
            
            </div>
        </div>
    </div>


   <!-- bootstrap scripts -->
   @include('layout.script')
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
   <script type="text/javascript">
    $(document).ready(function() {
        $('#loginform').on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
            var formData = form.serialize();

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: formData,

                success: function(response){
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

       
        $('#signupform').on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
            var formData = form.serialize();

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: formData,

                success: function(response){
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

    });
</script>
  </body>
</html>
