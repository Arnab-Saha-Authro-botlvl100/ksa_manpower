<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
</head>
<body>
  @include('layout.navbar')
    <div class="w-[60%] mx-auto shadow-lg rounded-lg pb-2 mt-4">
  
      @foreach ($candidates as $candidate)@endforeach
      <div class="py-2 px-4 text-xl font-semibold w-full rounded-lg shadow-md text-[#082F2C] bg-[#ADCCC8]">Enter Visa For <span class="font-bold px-2 rounded-lg py-1  text-2xl">{{$candidate->name}}</span></div>
      
        <form id="visainput" class="pt-4">
          @csrf
          <div class="row">
              <input type="hidden" name="" id="candidate_id" value="{{$id}}" />
              <div class="px-10 gap-x-10 grid md:grid-cols-2">
                <div class="py-2 flex flex-col gap-2">
                <div class="font-bold text-lg">Visa No <span class="text-red-500">*</span></div>
                <input type="text" id="visa_no" name="visa_no" class="form-control p-2 rounded-lg w-full uppercase" required placeholder="" />
              </div>
              <div class="py-2 flex flex-col gap-2">
                <div class="font-bold text-lg">Sponsor ID <span class="text-red-500">*</span></div>
                <input type="text" id="spon_id" name="spon_id" class="form-control p-2 rounded-lg w-full uppercase" required placeholder="" />
              </div>
              <div class="py-2 flex flex-col gap-2">
                <div class="font-bold text-lg">Visa Date (Hijri)</div>
                <input type="text" id="visa_date" name="visa_date" class="form-control p-2 rounded-lg w-full uppercase" placeholder="Ex- 1444/09/30" />
              </div>
            
              <div class="py-2 flex flex-col gap-2">
                <div class="font-bold text-lg">Sponsor Name (Arabic)</div>
                <input type="text" id="spon_name_arabic" name="spon_name_arabic" class="form-control p-2 rounded-lg w-full uppercase" placeholder="" />
              </div>
              <div class="py-2 flex flex-col gap-2">
                <div class="font-bold text-lg">Sponsor Name (English)</div>
                <input type="text" id="spon_name_english" name="spon_name_english" class="form-control p-2 rounded-lg w-full uppercase" placeholder="" />
              </div>
              <div class="py-2 flex flex-col gap-2">
                <div class="font-bold text-lg">Profession (Arabic)</div>
                <input type="text" id="prof_name_arabic" name="prof_name_arabic" class="form-control p-2 rounded-lg w-full uppercase" placeholder="" />
              </div>
              <div class="py-2 flex flex-col gap-2">
                <div class="font-bold text-lg">Profession (English)</div>
                <input type="text" id="prof_name_english" name="prof_name_english" class="form-control p-2 rounded-lg w-full uppercase" placeholder="" />
              </div>
              <div class="py-2 flex flex-col gap-2">
                <div class="font-bold text-lg">Application (MOFA) NO</div>
                <input type="text" id="mofa_no" name="mofa_no" value="E" class="form-control p-2 rounded-lg w-full uppercase" placeholder="" />
              </div>
              <div class="py-2 flex flex-col gap-2 hidden">
                <div class="font-bold text-lg">Application (MOFA) Date</div>
                <input type="text" id="mofa_date" name="mofa_date" class="form-control p-2 rounded-lg w-full uppercase" placeholder="" />
              </div>
              <div class="py-2 flex flex-col gap-2">
                <div class="font-bold text-lg">Salary</div>
                <input type="text" id="salary" name="salary" class="form-control p-2 rounded-lg w-full uppercase" placeholder="" />
              </div>
              <div class="py-2 flex flex-col gap-2">
                <div class="font-bold text-lg">Wakala No</div>
                <input type="text" id="okala_no" name="okala_no" class="form-control p-2 rounded-lg w-full uppercase" placeholder="" />
              </div>
              <div class="py-2 flex flex-col gap-2">
                <div class="font-bold text-lg">Musaned No</div>
                <input type="text" id="musaned_no" name="musaned_no" class="form-control p-2 rounded-lg w-full uppercase" placeholder="" />
              </div>
          </div>
          <div class="text-center pt-3">
            <button
              type="submit"
              class="bg-[#289788] mb-2 hover:bg-[#074f56] p-3 rounded text-white font-semibold"
            >
              Add Candidate Visa
            </button>
          </div>
      </form>
    </div>

    @include('layout.script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            
         $('#visa_no').change(function() {
              var visa = $(this).val();
              $.ajax({
                url: '/user/visasearch/' + visa,
                type: 'GET',
                success: function(response) {
                console.log(response)
                    // Handle the response from the server
                    $('#prof_name_english').val(response.prof_name_english);
                    $('#spon_id').val(response.spon_id);
                    $('#visa_date').val(response.visa_date2);
                    $('#spon_name_arabic').val(response.spon_name_arabic);
                    $('#prof_name_arabic').val(response.prof_name_arabic);
                    $('#salary').val(response.salary);
                    $('#okala_no').val(response.okala_no);
                },
                error: function(error) {
                    // Handle any errors that occurred during the request
                   

                }
            });
          });

          $('#mofa_date').datepicker({
      dateFormat: 'yy-mm-dd',
      onSelect: function(selectedDate) {
            var dateOfBirth = $(this).datepicker('getDate');
            
            var formattedDate = $.datepicker.formatDate('yy-mm-dd',dateOfBirth);
            $('#mofa_date').val(formattedDate);
      }
    });
            $('#visainput').submit(function(e) {
                e.preventDefault(); // Prevent the default form submission

                var formData = $(this).serialize(); // Serialize the form data
                // console.log(formData);
                var id = (document.getElementById('candidate_id').value);
                // console.log(id);
                $.ajax({
                    url: "{{ url('user/visaadd') }}/" + id,
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        
                        console.log(response);
                        
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