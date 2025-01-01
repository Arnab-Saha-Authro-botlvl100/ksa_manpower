<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Candidate | KSA Form Print Solution</title>
    @include('layout.head')
</head>
<body>
    <main>
      @include('layout.navbar')
        <div class="">
                {{-- <h1 class="text-danger fw-bold text-center my-5">Edi</h1> --}}
                
                   
                    @foreach ($candidates as $candidate)
                    
                 




               @php
  // dd($candidate);
               @endphp
                <div class="w-[60%] mx-auto">
                          
                  <div class="bg-white container shadow-2xl py-3 my-3 rounded-lg">
                    <div class="flex text-[#082F2C] bg-[#ADCCC8] rounded-lg p-3 text-xl  font-semibold justify-between items-center"><h2 class="">Candidate Information</h2>
                    </div> 
                    <div  class=" pb-4" id="addcandidate">
                      <div class="px-10 gap-x-10 grid md:grid-cols-2">
                        <div class="py-1">
                        <div class="font-bold text-lg">Candidate Name</div>
                        <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control" name="pname" id="pname" value="{{$candidate->name}}"/>
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Passport Number</div>
                        <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control" minlength="0" maxlength="9" id="pnumber" name="pnumber" value="{{$candidate->passport_number}}" required  />
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Passport Issue Date</div>
                        <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control" name="pass_issue_date" id="pass_issue_date" value="<?php
                        $inputDate = $candidate->passport_issue_date;
        
                        // Convert the date format
                        $formattedDate = date('d-m-Y', strtotime($inputDate));
        
                        // Output the formatted date
                        echo $formattedDate;
                        ?>" />
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Passport Expire Date</div>
                        <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control"  name="pass_expire_date" id="pass_expire_date" value="<?php
                        $inputDate = $candidate->passport_expire_date;
        
                        // Convert the date format
                        $formattedDate = date('d-m-Y', strtotime($inputDate));
        
                        // Output the formatted date
                        echo $formattedDate;
                        ?>" />
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Date Of Birth</div>
                        <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control" name="date_of_birth" id="date_of_birth" value="<?php
                        $inputDate = $candidate->date_of_birth;
        
                        // Convert the date format
                        $formattedDate = date('d-m-Y', strtotime($inputDate));
        
                        // Output the formatted date
                        echo $formattedDate;
                        ?> "/>
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Place Of Birth</div>
                        <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control" name="place_of_birth" id="place_of_birth" value="{{$candidate->place_of_birth}}" />
                        
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Father's Name</div>
                        <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control"  name="father" id="father" value="{{$candidate->father}}" />
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Mother's Name</div>
                        <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control"  name="mother" id="mother" value="{{$candidate->mother}}" />
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Religion</div>
                        <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control"  name="religion" id="religion" value="{{$candidate->religion}}" />
                      </div>

                      <div class="py-1">
                        <div class="font-bold text-lg">Gender</div>
                        <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control"  name="gender" id="gender" value="{{$candidate->gender}}" />
                      </div>
                      
                      <div class="py-1">
                        <div class="font-bold text-lg">Marital Status</div>
                        <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control"  name="mother" id="mother" value="{{$candidate->married}}" />
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Medical Center Name</div>
                        <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control" id="medical_center_name" name="medical_center_name"  value="{{$candidate->medical_center}}"  >
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Medical Issue Date</div>
                        <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control" id="medical_issue_date" name="medical_issue_date" value=" <?php
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
                        <input type="text" readonly name="medical_expire_date" id="medical_expire_date" value="<?php
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
                        <input type="text" readonly class="p-2 rounded-lg w-full form-control uppercase" id="driving_licence" name="driving_licence" value="{{$candidate->driving_licence}}" >
                      </div>
                      <div class="py-1">
                        <div class="font-bold text-lg">Police Clearence No</div>
                        <input type="text" readonly class="p-2 rounded-lg w-full form-control uppercase" id="police_licence" name="police_licence" value="{{$candidate->police}}"  >
                      </div>
                    </div>
                      {{-- <div class=" px-10 my-2">
                        <div class="font-bold text-lg">Address</div>
                        <input type="text" class="form-control p-2 rounded-lg w-full uppercase" placeholder="Address" name="address" placeholder="Apartment, studio, or floor" id="address" value={{$candidate->address}}>
                      </div> --}}
                      
                    
                      
                    
                  </div>
            
                </div>
                  
                             
                    <div class="bg-white container shadow-2xl py-3 my-3 rounded-lg">
                      <div class="flex text-[#082F2C] bg-[#ADCCC8] p-3 rounded-lg text-xl  font-semibold justify-between items-center"><h2 class="">Candidate Visa Information</h2>
                      </div>
                      <div  class="bg-white pb-4" id="visaedit">
                        
                          <input type="hidden" name="uid" id="candidate_id" value="{{$id}}" />
                          <div class="px-10 gap-x-10 grid md:grid-cols-2">
                            <div class="py-1">
                            <div class="font-bold text-lg">Visa No</div>
                            <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control" id="visa_no" name="visa_no"  value="{{$candidate->visa_no}}" >
                          </div>
                          <div class="py-1">
                            <div class="font-bold text-lg">Sponsor ID</div>
                            <input type="text" readonly name="spon_id" id="spon_id" value="{{$candidate->spon_id}}" class="p-2 rounded-lg w-full uppercase form-control" required >
                          </div>
                          <div class="py-1">
                            <div class="font-bold text-lg">Visa Date (Hijri)</div>
                            <input type="text" readonly name="visa_date" id="visa_date" value="{{$candidate->visa_date2}}" class="p-2 rounded-lg w-full uppercase form-control" >
                          </div>
                          <div class="py-1">
                            <div class="font-bold text-lg">Salary</div>
                            <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control" id="salary" name="salary" value="{{$candidate->salary}}">
                          </div>
                          <div class="py-1">
                            <div class="font-bold text-lg">Sponsor Name (Arabic)</div>
                            <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control" id="spon_name_arabic" name="spon_name_arabic" value="{{$candidate->spon_name_arabic}}">
                          </div>
                          
                          <div class="py-1">
                            <div class="font-bold text-lg">Profession (Arabic)</div>
                            <input type="text" readonly name="prof_name_arabic" id="prof_name_arabic" value="{{$candidate->prof_name_arabic}}" class="p-2 rounded-lg w-full uppercase form-control" >
                          </div>
                          <div class="py-1">
                            <div class="font-bold text-lg">Profession (English)</div>
                            <input type="text" readonly name="prof_name_english" id="prof_name_english" value="{{$candidate->prof_name_english}}" class="p-2 rounded-lg w-full uppercase form-control" >
                          </div>
                          <div class="py-1">
                            <div class="font-bold text-lg">Application (Mofa) No</div>
                            <input type="text" class="p-2 rounded-lg w-full uppercase form-control" id="mofa_no" name="mofa_no" value="{{$candidate->mofa_no}}">
                          </div>
                          <div class="py-1">
                            <div class="font-bold text-lg">Application (Mofa) Date</div>
                            <input type="text" readonly name="mofa_date" value="{{$candidate->mofa_date}}" id="mofa_date" class="p-2 rounded-lg w-full uppercase form-control">
                          </div>
                          <div class="py-1">
                            <div class="font-bold text-lg">Okala No</div>
                            <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control" id="okala_no" name="okala_no" value="{{$candidate->okala_no}}">
                          </div>
                          <div class="py-1">
                            <div class="font-bold text-lg">Musaned No</div>
                            <input type="text" readonly class="p-2 rounded-lg w-full uppercase form-control" id="musaned_no" name="musaned_no" value="{{$candidate->musaned_no}}">
                          </div>
                      
                        </div>
                        
                        
                         
                    </div>
                    </div>
              
                  
            
                </div>



                @endforeach
                {{-- <button type="submit" style="padding:10px; background-color: cornflowerblue; border:none; border-radius:5px" class="" id="btn2">Save</button> --}}


          
        </div>
    </main>
    @include('layout.script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
<script>
    $(document).ready(function() {

//       var apiUrl = window.location.origin + '/user/get';
//     var method = "GET";
//     var data = {
       
//     };
//     var headers = {
       
//     };
    
//     callApi(apiUrl, method, data, headers);
   
// });
// var dataObject = {};
// function callApi(apiUrl, method, data, headers) {
//             $.ajax({
//                 url: apiUrl,
//                 type: method,
//                 data: data,
//                 headers: headers,
//                 dataType: "json",
               
//                 success: function (response) {
//                         console.log(response);
                        
//                         for (var key in response.candidates) {
//                             var candidateValue = response.candidates[key];
//                             var userEmail = key;
//                             var combinedValue = {
//                                 candidate: candidateValue,
//                                 user: response.users[candidateValue] || null 
//                             };
//                             dataObject[userEmail] = combinedValue;
//                         }
//                         console.log(dataObject);
//                     },   
//                     error: function (error) {
//                     console.error("Error calling API:", error);
//                 }
//             });
// }
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

// 


      
    });
</script>
</body>
</html>