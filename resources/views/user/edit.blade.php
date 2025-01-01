<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Candidate | KSA Form Print Solution</title>
    @include('layout.head')
</head>
<body>
    <main>
      @include('layout.navbar')
                {{-- <h1 class="text-danger fw-bold text-center my-5">Edi</h1> --}}
                <form class="row m-0" id="addcandidate"  method="post">
                    @csrf
                    @foreach ($candidates as $candidate)
                    
                    




               @php
  // dd($candidate);
               @endphp
                <div class="w-[60%] mx-auto">
                          
                  <div class="bg-white container shadow-2xl py-3 my-3 rounded-lg">
                    <div class="flex text-[#082F2C] bg-[#ADCCC8] rounded-lg p-3 text-xl  font-semibold justify-between items-center"><h2 class="">Edit Candidate Information</h2>
                    </div> 
                    <form  class="bg-[#DBF4F1] pb-4" id="addcandidate"  method="post">
                      <div class="px-10 gap-x-10 grid md:grid-cols-2">
                        <div class="py-1">
                        <div class="font-bold text-lg">Candidate Name</div>
                        <input type="text" class="p-2 rounded-lg w-full uppercase form-control" name="pname" id="pname" value="{{$candidate->name}}"/>
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Passport Number</div>
                        <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control bg-secondary text-white" minlength="0" maxlength="9" id="pnumber" name="pnumber" value="{{$candidate->passport_number}}" required  />
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Passport Issue Date</div>
                        <input type="text" class="p-2 rounded-lg w-full uppercase form-control" name="pass_issue_date" id="pass_issue_date" value="<?php
                        $inputDate = $candidate->passport_issue_date;
        
                        // Convert the date format
                        $formattedDate = date('d-m-Y', strtotime($inputDate));
        
                        // Output the formatted date
                        echo $formattedDate;
                        ?>" />
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Passport Expire Date</div>
                        <input type="text" class="p-2 rounded-lg w-full uppercase form-control"  name="pass_expire_date" id="pass_expire_date" value="<?php
                        $inputDate = $candidate->passport_expire_date;
        
                        // Convert the date format
                        $formattedDate = date('d-m-Y', strtotime($inputDate));
        
                        // Output the formatted date
                        echo $formattedDate;
                        ?>" />
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Date Of Birth</div>
                        <input type="text" class="p-2 rounded-lg w-full uppercase form-control" name="date_of_birth" id="date_of_birth" value="<?php
                        $inputDate = $candidate->date_of_birth;
        
                        // Convert the date format
                        $formattedDate = date('d-m-Y', strtotime($inputDate));
        
                        // Output the formatted date
                        echo $formattedDate;
                        ?> "/>
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Place Of Birth</div>
                        <input type="text" class="p-2 rounded-lg w-full uppercase form-control" name="place_of_birth" list="districts" id="place_of_birth" value="{{$candidate->place_of_birth}}" />
                        <datalist id="districts">
                          <option value="Bagerhat">
                          <option value="Barishal">
                          <option value="Jashore">
                          <option value="Chattogram">
                          <option value="Cumilla">
                          <option value="Bogura">
                          <option value="Bandarban">
                          <option value="Barguna">
                          <option value="Barisal">
                          <option value="Bhola">
                          <option value="Bogra">
                          <option value="Brahmanbaria">
                          <option value="Chandpur">
                          <option value="Chapainawabganj">
                          <option value="Chittagong">
                          <option value="Chuadanga">
                          <option value="Comilla">
                          <option value="Cox's Bazar">
                          <option value="Dhaka">
                          <option value="Dinajpur">
                          <option value="Faridpur">
                          <option value="Feni">
                          <option value="Gaibandha">
                          <option value="Gazipur">
                          <option value="Gopalganj">
                          <option value="Habiganj">
                          <option value="Jamalpur">
                          <option value="Jessore">
                          <option value="Jhalokati">
                          <option value="Jhalakati">
                          <option value="Jhalakathi">
                          <option value="Jhenaidah">
                          <option value="Joypurhat">
                          <option value="Khagrachhari">
                          <option value="Khulna">
                          <option value="Kishoreganj">
                          <option value="Kurigram">
                          <option value="Kushtia">
                          <option value="Lakshmipur">
                          <option value="Lalmonirhat">
                          <option value="Madaripur">
                          <option value="Magura">
                          <option value="Manikganj">
                          <option value="Meherpur">
                          <option value="Moulvibazar">
                          <option value="Munshiganj">
                          <option value="Mymensingh">
                          <option value="Naogaon">
                          <option value="Narail">
                          <option value="Narayanganj">
                          <option value="Narsingdi">
                          <option value="Natore">
                          <option value="Netrokona">
                          <option value="Nilphamari">
                          <option value="Noakhali">
                          <option value="Pabna">
                          <option value="Panchagarh">
                          <option value="Patuakhali">
                          <option value="Pirojpur">
                          <option value="Rajbari">
                          <option value="Rajshahi">
                          <option value="Rangamati">
                          <option value="Rangpur">
                          <option value="Satkhira">
                          <option value="Shariatpur">
                          <option value="Sherpur">
                          <option value="Sirajganj">
                          <option value="Sunamganj">
                          <option value="Sylhet">
                          <option value="Tangail">
                          <option value="Thakurgaon">
                        </datalist>
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Father's Name</div>
                        <input type="text" class="p-2 rounded-lg w-full uppercase form-control"  name="father" id="father" value="{{$candidate->father}}" />
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Mother's Name</div>
                        <input type="text" class="p-2 rounded-lg w-full uppercase form-control"  name="mother" id="mother" value="{{$candidate->mother}}" />
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Religion</div>
                        <select class="form-control p-2 rounded-lg w-full" name="religion" id="religion" size="large">
                          <option value="MUSLIM" <?php echo $candidate->religion === 'MUSLIM' ? 'selected' : ''; ?>>MUSLIM</option>
                          <option value="NON MUSLIM" <?php echo $candidate->religion === 'NON MUSLIM' ? 'selected' : ''; ?>>NON MUSLIM</option>
                        </select>
                      </div>

                      <div class="py-1">
                        <div class="font-bold text-lg">Gender</div>
                        <select class="form-control p-2 rounded-lg w-full" size="large" placeholder="Select a person" name="gender">
                          <option value="MALE" <?php echo $candidate->gender === 'MALE' ? 'selected' : ''; ?>>MALE</option>
                          <option value="FEMALE" <?php echo $candidate->gender === 'FEMALE' ? 'selected' : ''; ?>>FEMALE</option>
                        </select>
                      </div>
                      
                      <div class="py-1">
                        <div class="font-bold text-lg">Marital Status</div>
                        <select class="form-control w-full p-2 rounded-lg" size="large" name="married" id="married">
                          <option value="MARRIED" <?php echo $candidate->married === 'MARRIED' ? 'selected' : ''; ?>>MARRIED</option>
                          <option value="UNMARRIED" <?php echo $candidate->married === 'UNMARRIED' ? 'selected' : ''; ?>>UNMARRIED</option>
                        </select>
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Address</div>
                        <input type="text" class="p-2 rounded-lg w-full uppercase form-control"  name="address" id="address" value="{{$candidate->address}}" />
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Medical Center Name</div>
                        <input type="text" class="p-2 rounded-lg w-full uppercase form-control" id="medical_center_name" name="medical_center_name"  value="{{$candidate->medical_center}}"  >
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Medical Issue Date</div>
                        <input type="text" class="p-2 rounded-lg w-full uppercase form-control" id="medical_issue_date" name="medical_issue_date" value=" <?php
                        $inputDate = $candidate->medical_issue_date;
                        
                        // Check if $inputDate is not null
                        if ($inputDate !== null) {
                            // Convert the date format
                            $formattedDate = date('d-m-Y', strtotime($inputDate));
                        
                            // Output the formatted date
                            echo $formattedDate;
                        } else {
                            // If $inputDate is null, return an empty string
                            echo '';
                        }
                        ?>"  >
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Medical Expire Date</div>
                        <input type="text" name="medical_expire_date" id="medical_expire_date" value="<?php
                        $inputDate = $candidate->medical_expire_date;
                        
                        // Check if $inputDate is not null
                        if ($inputDate !== null) {
                            // Convert the date format
                            $formattedDate = date('d-m-Y', strtotime($inputDate));
                        
                            // Output the formatted date
                            echo $formattedDate;
                        } else {
                            // If $inputDate is null, return an empty string
                            echo '';
                        }
                        ?>" class="p-2 rounded-lg w-full form-control uppercase" >
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Driver Licence Number</div>
                        <input type="text" class="p-2 rounded-lg w-full form-control uppercase" id="driving_licence" name="driving_licence" value="{{$candidate->driving_licence}}" >
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Police Clearence No</div>
                        <div class="input-group">
                          <input type="text" class="p-2 rounded-lg w-full form-control uppercase" id="police_licence" name="police_licence" value="{{$candidate->police}}"  >
                          <button type="button" class="rounded-lg bg-indigo-500 text-white p-2 text-md font-semibold" onclick="SearchPC()">Search</button></div>
                       
                        </div>
                        </div>
                    </div>
                      {{-- <div class=" px-10 my-2">
                        <div class="font-bold text-lg">Address</div>
                        <input type="text" class="form-control p-2 rounded-lg w-full uppercase" placeholder="Address" name="address" placeholder="Apartment, studio, or floor" id="address" value={{$candidate->address}}>
                      </div> --}}
                      
                    
                      <div class="text-center my-3">
                        <button
                          type="submit"
                          id="btn1"
                          class="bg-[#289788] hover:bg-[#074f56] p-3 rounded text-white font-semibold"
                        >
                          Edit Candidate Passport
                        </button>
                      </div>
                    
                  </div>
            
                </form>
                  
                             
                    <div class="bg-white container shadow-2xl py-3 my-3 rounded-lg w-[60%] mx-auto mt-5">
                      <div class="flex text-[#082F2C] bg-[#ADCCC8] p-3 rounded-lg text-xl  font-semibold justify-between items-center"><h2 class="">Edit Candidate Visa Information</h2>
                      </div>
                      <form  class="bg-white pb-4" action="" id="visaedit" method="post">
                        @csrf
                          <input type="hidden" name="uid" id="candidate_id" value="{{$id}}" />
                          <div class="px-10 gap-x-10 grid md:grid-cols-2">
                            <div class="py-1">
                            <div class="font-bold text-lg">Visa No</div>
                            <input type="text" class="p-2 rounded-lg w-full uppercase form-control" id="visa_no" name="visa_no"  value="{{$candidate->visa_no}}" >
                          </div>
                          <div class="py-1">
                            <div class="font-bold text-lg">Sponsor ID</div>
                            <input type="text" name="spon_id" id="spon_id" value="{{$candidate->spon_id}}" class="p-2 rounded-lg w-full uppercase form-control" required >
                          </div>
                          <div class="py-1">
                            <div class="font-bold text-lg">Visa Date (Hijri)</div>
                            <input type="text" name="visa_date" id="visa_date" value="{{$candidate->visa_date2}}" class="p-2 rounded-lg w-full uppercase form-control" >
                          </div>
                          <div class="py-1">
                            <div class="font-bold text-lg">Salary</div>
                            <input type="text" class="p-2 rounded-lg w-full uppercase form-control" id="salary" name="salary" value="{{$candidate->salary}}">
                          </div>
                          <div class="py-1">
                            <div class="font-bold text-lg">Sponsor Name (Arabic)</div>
                            <input type="text" class="p-2 rounded-lg w-full uppercase form-control" id="spon_name_arabic" name="spon_name_arabic" value="{{$candidate->spon_name_arabic}}">
                          </div>
                          {{-- <div class="py-1">
                            <div class="font-bold text-lg">Sponsor Name (English)</div>
                            <input type="text" class="p-2 rounded-lg w-full uppercase form-control" id="spon_name_english" name="spon_name_english" value="{{$candidate->spon_name_english}}" placeholder="Sponsor Name in (English)" />
                          </div> --}}
                          <div class="py-1">
                            <div class="font-bold text-lg">Profession (Arabic)</div>
                            <input type="text" name="prof_name_arabic" id="prof_name_arabic" value="{{$candidate->prof_name_arabic}}" class="p-2 rounded-lg w-full uppercase form-control" >
                          </div>
                          <div class="py-1">
                            <div class="font-bold text-lg">Profession (English)</div>
                            <input type="text" name="prof_name_english" id="prof_name_english" value="{{$candidate->prof_name_english}}" class="p-2 rounded-lg w-full uppercase form-control" >
                          </div>
                          <div class="py-1">
                            <div class="font-bold text-lg">Application (Mofa) No</div>
                            <input type="text" class="p-2 rounded-lg w-full uppercase form-control" id="mofa_no" name="mofa_no" value="{{$candidate->mofa_no}}">
                          </div>
                          {{-- <div class="py-1">
                            <div class="font-bold text-lg">Application (Mofa) Date</div>
                            <input type="text" name="mofa_date" value="{{$candidate->mofa_date}}" id="mofa_date" class="p-2 rounded-lg w-full uppercase form-control">
                          </div> --}}
                          <div class="py-1">
                            <div class="font-bold text-lg">Okala No</div>
                            <input type="text" class="p-2 rounded-lg w-full uppercase form-control" id="okala_no" name="okala_no" value="{{$candidate->okala_no}}">
                          </div>
                          <div class="py-1">
                            <div class="font-bold text-lg">Musaned No</div>
                            <input type="text" class="p-2 rounded-lg w-full uppercase form-control" id="musaned_no" name="musaned_no" value="{{$candidate->musaned_no}}">
                          </div>
                      
                        </div>
                        
                        
                          <div class="text-center pt-3">
                            <button
                              type="submit"
                              class="bg-[#289788] hover:bg-[#074f56] p-3 rounded text-white font-semibold " id="btn2"
                            >
                              Edit Candidate Visa
                            </button>
                          </div>
                      </form>
                    </div>
              
                  
            
                </div>



                @endforeach
                {{-- <button type="submit" style="padding:10px; background-color: cornflowerblue; border:none; border-radius:5px" class="" id="btn2">Save</button> --}}

                </form>

                @if($manpower)
                  <div class="w-[60%] mx-auto mt-5">
                    <div class="bg-white container shadow-2xl py-3 my-3 rounded-lg">
                      <div class="flex text-[#082F2C] bg-[#ADCCC8] rounded-lg p-3 text-xl  font-semibold justify-between items-center"><h2 class="">Edit Candidate Manpower Information</h2>
                      </div> 
                      <form id="manpowerinput" class="pt-4">
                        @csrf
                        <div class="row">
                            {{-- <input type="hidden" name="candidate_id" id="candidate_id" value="{{ $candidate->id }}" /> --}}
                            @if($manpower)
                                <input type="hidden" name="manpower_id" id="manpower_id" value="{{ $manpower->id }}" />
                            @endif
                                            
                            <div class="px-10 gap-x-10 grid md:grid-cols-2">
                                <div class="py-2 flex flex-col gap-2">
                                    <div class="font-bold text-lg">Passenger Number <span class="text-red-500">*</span></div>
                                    <input type="text" id="passenger_no" name="passenger_no" class="form-control p-2 rounded-lg w-full uppercase" 
                                        required placeholder="" value="{{ old('passenger_no', $manpower->passenger_no ?? '') }}" />
                                </div>
                    
                                <div class="py-2 flex flex-col gap-2">
                                    <div class="font-bold text-lg">Company Name <span class="text-red-500">*</span></div>
                                    <input type="text" id="company_name" name="company_name" class="form-control p-2 rounded-lg w-full uppercase" 
                                        required placeholder="" value="{{ old('company_name', $manpower->company_name ?? '') }}" />
                                </div>
                    
                                <div class="py-2 flex flex-col gap-2">
                                    <div class="font-bold text-lg">Certificate No <span class="text-red-500">*</span></div>
                                    <input type="text" id="certificate_no" name="certificate_no" class="form-control p-2 rounded-lg w-full uppercase" 
                                        required placeholder="" value="{{ old('certificate_no', $manpower->certificate_no ?? '') }}" />
                                </div>
                    
                                <div class="py-2 flex flex-col gap-2">
                                    <div class="font-bold text-lg">FFC Name <span class="text-red-500">*</span></div>
                                    <input type="text" id="ffc_name" name="ffc_name" class="form-control p-2 rounded-lg w-full uppercase" 
                                        required placeholder="" value="{{ old('ffc_name', $manpower->ffc_name ?? '') }}" />
                                </div>
                    
                                <div class="py-2 flex flex-col gap-2">
                                    <div class="font-bold text-lg">Registration ID <span class="text-red-500">*</span></div>
                                    <input type="text" id="reg_id" name="reg_id" class="form-control p-2 rounded-lg w-full uppercase" 
                                        required placeholder="" value="{{ old('reg_id', $manpower->reg_id ?? '') }}" />
                                </div>
                    
                                <div class="py-2 flex flex-col gap-2">
                                    <div class="font-bold text-lg">Visa No <span class="text-red-500">*</span></div>
                                    <input type="text" id="visa_no" name="visa_no" class="form-control p-2 rounded-lg w-full uppercase" 
                                        required placeholder="" value="{{ old('visa_no', $manpower->visa_no ?? '') }}" />
                                </div>
                    
                                <div class="py-2 flex flex-col gap-2">
                                    <div class="font-bold text-lg">Visa Issued Date <span class="text-red-500">*</span></div>
                                    <input type="text" id="visa_issued_date" name="visa_issued_date" class="form-control p-2 rounded-lg w-full uppercase" 
                                        required placeholder="DD-MM-YYYY" value="{{ old('visa_issued_date', $manpower->visa_issued_date ?? '') }}" />
                                </div>
                    
                                <div class="py-2 flex flex-col gap-2">
                                    <div class="font-bold text-lg">Visa Expiration Date <span class="text-red-500">*</span></div>
                                    <input type="text" id="visa_exp_date" name="visa_exp_date" class="form-control p-2 rounded-lg w-full uppercase" 
                                        required placeholder="DD-MM-YYYY" value="{{ old('visa_exp_date', $manpower->visa_exp_date ?? '') }}" />
                                </div>
                            </div>
                    
                            <div class="text-center pt-3">
                                <button type="submit" class="bg-[#289788] mb-2 hover:bg-[#074f56] p-3 rounded text-white font-semibold">
                                    Edit Candidate Manpower
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    </div>
                  </div>
                  @else
                    <div class="w-[60%] mx-auto m-5">
                      <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded-lg shadow-lg" role="alert">
                          <strong class="font-bold">Notice:</strong>
                          <span class="block sm:inline">No manpower information found for this candidate.</span>
                      </div>
                    </div>
                @endif
               

          
    </main>
    @include('layout.script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
<script>

  
  function SearchPC() {
    var PCInput = document.getElementById("police_licence").value.toUpperCase();
    var url = `https://pcc.police.gov.bd/ords/f?p=500:50::::RP:P50_TOKEN_ID:${PCInput}`;
    
    // Open the link in a new tab
    window.open(url, "_blank");
  }
  
    $(document).ready(function() {

      $('#pnumber').on('change', function () {
          var inputValue = $(this).val();
          var foundObject = dataObject[inputValue];
        
          if (foundObject) {
              // var email = Object.keys(foundObject)[0];
              var email = foundObject.candidate;
              // var licenceName = foundObject[email].user ? foundObject[email].user.licence_name : "Not available";
              var licenceName = foundObject.user.licence_name ? foundObject.user.licence_name : "Not available";
              alert(inputValue + " exists in database under: " + licenceName+'('+ foundObject.user.rl_no +')'+' Contact here: '+ email);
              
              $('#pnumber').val("");
          } else {
              
          }
      });


      $('#medical_issue_date').datepicker({
          dateFormat: 'dd/mm/yy',
          onSelect: function(selectedDate) {
                var issueDate = $(this).datepicker('getDate');
                issueDate.setMonth(issueDate.getMonth() + 2);
                issueDate.setDate(issueDate.getDate() - 1);
                var formattedDate = $.datepicker.formatDate('dd/mm/yy', issueDate);
                $('#medical_expire_date').val(formattedDate);
          }
      });

      $('#pass_issue_date').datepicker({
        dateFormat: 'dd/mm/yy',
        onSelect: function(selectedDate) {
              var issueDate = $(this).datepicker('getDate');
              issueDate.setFullYear(issueDate.getFullYear() + 10);
              issueDate.setDate(issueDate.getDate() - 1);
              var formattedDate = $.datepicker.formatDate('dd/mm/yy', issueDate);
              $('#pass_expire_date').val(formattedDate);
        }
      });

      $('#date_of_birth').datepicker({
        dateFormat: 'dd/mm/yy',
        onSelect: function(selectedDate) {
              var dateOfBirth = $(this).datepicker('getDate');
              
              var formattedDate = $.datepicker.formatDate('dd/mm/yy',dateOfBirth);
              $('#date_of_birth').val(formattedDate);
        }
      });

      $('#mofa_date').datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function(selectedDate) {
              var dateOfBirth = $(this).datepicker('getDate');
              
              var formattedDate = $.datepicker.formatDate('yy-mm-dd',dateOfBirth);
              $('#mofa_date').val(formattedDate);
        }
      });

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

      $('#addcandidate').submit(function(event) {
            event.preventDefault(); 
            var formData = $(this).serialize();
            var candidateId = document.getElementById('candidate_id').value;
            var route = "{{ route('user/personal_edit', ['id' => ':id']) }}";
            route = route.replace(':id', candidateId);

            // console.log(route, formData);
            // Send the AJAX request
            $.ajax({
                url: route,
                type: 'POST',
                data: formData,
                success: function(response) {
                    document.getElementById('btn1').disabled = true;
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
                    }
                                            
                },
                error: function(response) {
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
                }
            });
        });

        $('#visaedit').submit(function(event) {
            event.preventDefault(); 
            var formData = $(this).serialize();
            var candidateId = document.getElementById('candidate_id').value;
            var route = "{{ route('user/visa_edit', ['id' => ':id']) }}";
            route = route.replace(':id', candidateId);

            console.log(route, formData);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Send the AJAX request
            $.ajax({
                url: route,
                type: 'POST',
                data: formData,
                success: function(response) {
                    document.getElementById('btn1').disabled = true;
                    Swal.fire({
                        title: response.title,
                        text: response.message,
                        icon: response.icon,
                        
                    });
                    if (response.redirect_url) {
                        setTimeout(function() {
                          var redirectUrl = window.location.origin +'/'+ response.redirect_url;
                          // console.log(redirectUrl);
                          window.location.href = redirectUrl;
                        }, 2000);
                    }
                                            
                },
                error: function(response) {
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
                    }
                }
            });
        });

       

        if ($('#manpowerinput').length > 0) {
            $('#manpowerinput').submit(function(e) {
                e.preventDefault();

                var id = $('#manpower_id').val();

                if (!id) {
                    alert("No manpower information found.");
                    return;
                }

                var formData = $(this).serialize();

                // Proceed with AJAX or other actions
                $.ajax({
                  url: "{{ url('user/manpoweredit') }}/" + id,
                  type: "POST",
                  data: formData,
                  success: function(response) {
                      Swal.fire({
                          title: response.title,
                          text: response.message,
                          icon: response.icon,
                      });
                      
                      if (response.redirect_url) {
                          setTimeout(function() {
                              var redirectUrl = window.location.origin + '/' + response.redirect_url;
                              window.location.href = redirectUrl;
                          }, 2000);
                      }
                  },
                  error: function(response) {
                      Swal.fire({
                          title: "Error",
                          text: "Cannot edit manpower\n 1: Ensure all required fields are completed\n 2: Check for duplicate IDs",
                          icon: 'error',
                      });

                      if (response.responseJSON && response.responseJSON.redirect_url) {
                          setTimeout(function() {
                              var redirectUrl = window.location.origin + '/' + response.responseJSON.redirect_url;
                              window.location.href = redirectUrl;
                          }, 2000);
                      }
                  } 
              });
            });
        }



    });

    


   
</script>
</body>
</html>