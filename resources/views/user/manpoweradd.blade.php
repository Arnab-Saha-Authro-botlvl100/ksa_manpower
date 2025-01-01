<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
</head>
<body>
  @include('layout.navbar')
    <div class="w-[60%] mx-auto shadow-lg rounded-lg pb-2 mt-4">
  
      {{-- @foreach ($candidates as $candidate)@endforeach --}}
      <div class="py-2 px-4 text-xl font-semibold w-full rounded-lg shadow-md text-[#082F2C] bg-[#ADCCC8]">Enter Manpower For <span class="font-bold px-2 rounded-lg py-1  text-2xl">{{$candidate->name}}</span></div>
      
      <form id="manpowerinput" class="pt-4">
        @csrf
        <div class="row">
            <input type="hidden" name="" id="candidate_id" value="{{$id}}" />
            <div class="px-10 gap-x-10 grid md:grid-cols-2">
                <div class="py-2 flex flex-col gap-2">
                    <div class="font-bold text-lg">Phone Number <span class="text-red-500">*</span></div>
                    <input type="text" id="passenger_no" name="passenger_no" class="form-control p-2 rounded-lg w-full uppercase" required placeholder="" />
                </div>
                <div class="py-2 flex flex-col gap-2">
                    <div class="font-bold text-lg">Company Name <span class="text-red-500">*</span></div>
                    <input type="text" id="company_name" name="company_name" class="form-control p-2 rounded-lg w-full uppercase" required placeholder="" />
                </div>
                <div class="py-2 flex flex-col gap-2">
                    <div class="font-bold text-lg">Certificate No <span class="text-red-500">*</span></div>
                    <input type="text" id="certificate_no" name="certificate_no" class="form-control p-2 rounded-lg w-full uppercase" required placeholder="" />
                </div>
                <div class="py-2 flex flex-col gap-2">
                    <div class="font-bold text-lg">TTC Name <span class="text-red-500">*</span></div>
                    <input type="text" id="ffc_name" name="ffc_name" class="form-control p-2 rounded-lg w-full uppercase" required placeholder="" />
                </div>
                <div class="py-2 flex flex-col gap-2">
                    <div class="font-bold text-lg">Registration ID <span class="text-red-500">*</span></div>
                    <input type="text" id="reg_id" name="reg_id" class="form-control p-2 rounded-lg w-full uppercase" required placeholder="" />
                </div>
                <div class="py-2 flex flex-col gap-2">
                    <div class="font-bold text-lg">Visa No <span class="text-red-500">*</span></div>
                    <input type="text" id="visa_no" name="visa_no" class="form-control p-2 rounded-lg w-full uppercase" required placeholder="" />
                </div>
                <div class="py-2 flex flex-col gap-2">
                    <div class="font-bold text-lg">Visa Issued Date <span class="text-red-500">*</span></div>
                    <input type="text" id="visa_issued_date" name="visa_issued_date" class="form-control p-2 rounded-lg w-full uppercase" required placeholder="DD-MM-YYYY" />
                </div>
                <div class="py-2 flex flex-col gap-2">
                    <div class="font-bold text-lg">Visa Expiration Date <span class="text-red-500">*</span></div>
                    <input type="text" id="visa_exp_date" name="visa_exp_date" class="form-control p-2 rounded-lg w-full uppercase" required placeholder="DD-MM-YYYY" />
                </div>
            </div>
            <div class="text-center pt-3">
                <button
                    type="submit"
                    class="bg-[#289788] mb-2 hover:bg-[#074f56] p-3 rounded text-white font-semibold"
                >
                    Add Candidate Manpower
                </button>
            </div>
        </div>
      </form>
    
    </div>

    @include('layout.script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            
            $('#visa_issued_date').datepicker({
                dateFormat: 'dd-mm-yy',
                onSelect: function(selectedDate) {
                    // Get the selected visa issued date
                    var issuedDate = $(this).datepicker('getDate');
                    
                    // Calculate 90 days after the issued date
                    var expirationDate = new Date(issuedDate);
                    expirationDate.setDate(expirationDate.getDate() + 90);
                    
                    // Format the calculated expiration date and set it in visa_exp_date
                    var formattedExpirationDate = $.datepicker.formatDate('dd-mm-yy', expirationDate);
                    $('#visa_exp_date').val(formattedExpirationDate);
                }
            });

            $('#visa_exp_date').datepicker({
                dateFormat: 'dd-mm-yy',
            });


            $('#manpowerinput').submit(function(e) {
                e.preventDefault(); // Prevent the default form submission

                var formData = $(this).serialize(); // Serialize the form data
                // console.log(formData);
                var id = (document.getElementById('candidate_id').value);
                // console.log(id);
                $.ajax({
                    url: "{{ url('user/manpoweradd') }}/" + id,
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        
                        // console.log(response);
                        
                        Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.icon,
                            
                        });
                        if (response.redirect_url) {
                            setTimeout(function() {
                              var redirectUrl = window.location.origin + '/'+ response.redirect_url;
                              window.location.href = redirectUrl;
                            }, 2000);
                        }l
                                                                
                    },
                    error: function(response) {
                      
                        console.log(response.title);
                        Swal.fire({
                            title: "Error",
                            text: "Cannot add candidate\n 1: Complete all fields are required\n 2: Same ID check",
                            icon: 'error',
                          
                        });
                        if (response.redirect_url) {
                          setTimeout(function() {
                            var redirectUrl = window.location.origin + '/'+ response.redirect_url;
                            window.location.href = redirectUrl;
                          }, 2000);
                      }l

                        
                    } 
               
                });
            });
        });
    </script>
</body>
</html>