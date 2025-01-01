<!DOCTYPE html>
<html lang="en">
<head>
   @include('layout/head')
</head>
<body>
    <div
    <form id="signupform" action="{{route('signup')}}" method="post">
            @csrf
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <label class="form-label" for="form6Example1">Recruiting Licence Name</label>
                  <input type="text" id="form6Example1" class="form-control" name="licence_name"/>
                  
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form6Example2">Recruiting Licence Number (RL)</label>
                  <input type="text" id="form6Example2" class="form-control" name="rl_no"/>
                  
                </div>
              </div>
            </div>
          
            <!-- Text input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example3">Email</label>
              <input type="email" id="form6Example3" class="form-control" name="email"/>
              
            </div>
          
            <!-- Text input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example4">Phone</label>
                <input type="text" id="form6Example4" class="form-control" name="phone"/>
              
            </div>
          
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example5">Office Address </label>
                <textarea class="form-control" id="form6Example7" name="address" rows="4"></textarea>
              
            </div>
          
            <!-- Number input -->
            <div class="form-outline mb-4">
              <input type="password" id="form6Example6" class="form-control" name="pass" />
              <label class="form-label" for="form6Example6" >Password</label>
            </div>
          
            <!-- Message input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form6Example7" >Confirm Password</label>
                <input type="password" id="form6Example6" class="form-control" name="pass1" />
              
            </div>
          
            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
                <label class="form-check-label" for="form6Example8"> Create an account? </label>
              <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" checked />
            
            </div>
          
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
        </form> class="container mt-5">
        
    </div>
    @include('layout/script')
    <script>
       
            $(document).ready(function() {
                $('#signupform').on('submit', function(e) {
                    e.preventDefault(); 

                    var form = $(this); 
                    var formData = form.serialize();
                    console.log(formData);
                    $.ajax({
                        url: form.attr('action'),
                        method: form.attr('method'),
                        data: form.serialize(),
                        success: function(response) {
                         
                            console.log(response);
                            
                            Swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: response.icon,
                               
                            });
                            setTimeout(function() {
                                window.location.href = response.redirect_url;
                            }, 3000);
                                                    
                        },
                        error: function(xhr) {
                          
                            console.log(xhr.responseText);
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