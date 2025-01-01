<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <title>KSA Form Print Solution</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

<!--   JavaScript -->
<!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>-->
<!--   Bootstrap CSS -->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.5.0/css/bootstrap.min.css" integrity="sha512-5XTXkeX5pIqy5gtLzB5SZve0z0J4t0omS+qDf/YP5AvI1GhG6OPqv2ba3b5WJopWbVm9G/VM5C/4HVqpV1HRA==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->

<!-- Bootstrap JavaScript (requires jQuery) -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.5.0/js/bootstrap.bundle.min.js" integrity="sha512-Y4MnzLv3cRv68bpECDOYp0SCA5tBR+PIMKtZFs9vN0zBtJ9eqeDz+q4d+qZ00nA/olmp1MxRWdfZ1F/EJtnQQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
  <style>
      #candidatetable_filter{
        margin-bottom: 20px;
      }
      .tooltip {
      position: relative;
      display: inline-block;
    /* If you want dots under the hoverable text */
      }
    
    /* Tooltip text */
    .tooltip .tooltiptext {
      visibility: hidden;
      width: 200px;
      background-color: #92560c;
      color: #fff;
      border:1px solid white;
      text-align: center;
      padding: 3px 3px;
      font-size:14px;
      border-radius: 6px;
    
      /* Position the tooltip text - see examples below! */
      position: absolute;
      z-index: 1;
      right:10px;
      top:40px;
    }
    
    /* Show the tooltip text when you mouse over the tooltip container */
    .tooltip:hover .tooltiptext {
      visibility: visible;
    }
    table.table-bordered.dataTable thead tr:first-child th, table.table-bordered.dataTable thead tr:first-child td {
    border-top-width: 1px;
    background-color: lightgray;
}
.dropdown-menu.show {
    display: block;
}

.dropdown-item {
    padding: 8px 12px;
    cursor: pointer;
}

.dropdown-item:hover {
    background-color: #f1f1f1;
}

  </style> 
  
  @include('layout.head')
</head>

<body>
  
  @include('layout.navbar')
  <div class="container-fluid">
   
  </div>

   
    
    @if(session('success'))
      <script>
          alert("{{ session('success') }}");
          {!! session()->forget('success') !!}
      </script>
    @endif


    <div class="modal fade" id="user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog max-w-[900px]">
        <div class="modal-content max-w-[900px]">
          <div class="modal-header bg-indigo-300">
            <h5 class="modal-title text-black font-semibold" id="exampleModalLabel">Update User</h5>
            <button type="button" class="btn-close bg-red-800 flex justify-center items-center font-bold bg-white p-2" data-bs-dismiss="modal" aria-label="Close">X</button>
          </div>
          <div class="modal-body pt-0">
            {{-- <div class="text-center bg-white py-2 text-xl uppercase rounded-b-xl mb-2">{{$user->licence_name}}-(RL-{{$user->rl_no}})</div> --}}


              <div class="w-full flex flex-wrap py-3 gap-3">
                <div class="w-full rounded-lg md:w-[49%] text-xl font-semibold shadow-lg flex"><p class="w-1/4 flex items-center justify-center bg-indigo-400 rounded-l-lg text-white">RL Name</p> <p class="p-3 uppercase pl-2 w-3/4 text-center">{{$user->licence_name}}</p> </div>
                <div class="w-full rounded-lg md:w-[49%] text-xl font-semibold shadow-lg flex"><p class="w-1/4 flex items-center justify-center bg-indigo-400 rounded-l-lg pl-2 text-white">RL Name Arabic</p> <p class="p-3 uppercase w-3/4 flex items-center justify-center text-2xl">{{$user->arabic_name}}</p> </div>
               
              </div>

              <div class="w-full flex flex-wrap py-3 gap-3">
                <div class="w-full rounded-lg md:w-[49%] text-xl font-semibold shadow-lg flex"><p class="w-1/4 flex items-center justify-center bg-indigo-400 rounded-l-lg pl-2 text-white">RL NO</p> <p class="p-3 uppercase w-3/4 flex items-center justify-center text-2xl">{{$user->rl_no}}</p> </div>

                <div class="w-full rounded-lg md:w-[49%] text-xl font-semibold shadow-lg flex"><p class="w-1/4 flex items-center justify-center bg-indigo-400 rounded-l-lg text-white">Email</p> <p class="p-3 pl-2 w-3/4 text-center overflow-hidden">{{$user->email}}</p> </div>
              
               
              </div>

              <div class="w-full flex flex-wrap py-3 gap-3">
                <div class="w-full rounded-lg md:w-[49%] text-xl font-semibold shadow-lg flex"><p class="w-1/4 flex items-center justify-center bg-indigo-400 rounded-l-lg pl-2 text-white">Phone</p> <p class="p-3 uppercase pl-2 w-3/4 flex items-center justify-center text-2xl">{{$user->phone}}</p> </div>

                <div class="w-full rounded-lg md:w-[49%] text-xl font-semibold shadow-lg flex"><p class="w-1/4 flex items-center justify-center bg-indigo-400 rounded-l-lg text-white text-center">Office Address</p> <p class="p-3 pl-2 w-3/4 text-center overflow-hidden uppercase">{{$user->office_address}}</p> </div>
               
               
              </div>
              
             
             <form action="{{route('user/update')}}">
                @csrf
                <div class="row">
                  <div class="col">
                    <div class="form-outline ">

                      @php
                      // dd($user->phone);
                      if($user->phone){
                        echo '
                        
                        ';

                      }
                      else {
                        echo '<label class="form-label" for="form6Example4">Agency Owner Phone Number</label><input type="text" id="form6Example4" class="form-control" name="phone"/>';           
                      }
                    @endphp
                        {{-- <label class="form-label" for="form6Example4">Agency Owner Phone Number</label> --}}
                        {{-- @php
                        // dd($user->phone);
                        if($user->phone){
                          echo '
                       
                          ';

                        }
                        else {
                          echo '<input type="text" id="form6Example4" class="form-control" name="phone"/>';           
                        }
                      @endphp --}}
                    </div>
                  </div>
                </div>
                
                <div class="mb-3 mt-3">
                  <label for="exampleInputEmail1" class="form-label">Embassy Representative Name</label>
                  {{-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="uname"> --}}
                  @php
                  // dd($user->phone);
                  if($user->embassy_man_name){
                    echo '<input type="text" id="form6Example4" placeholder="'.$user->embassy_man_name.'" class="form-control " value="'.$user->embassy_man_name.'" name="uname"/>';

                  }
                  else {
                    echo '<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="uname">';           
                  }
                @endphp
                  
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Embassy Representative Number(What's App)</label>
                  @php
                  // <input type="text" class="form-control" id="exampleInputPassword1" name="wsphn">
                  if($user->embassy_man_phone){
                    echo '<input type="text" id="form6Example4" placeholder="'.$user->embassy_man_phone.'" class="form-control " value="'.$user->embassy_man_phone.'" name="wsphn" />';

                  }
                  else {
                    echo '<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="wsphn">';           
                  }
                @endphp
                </div>
                <div class="text-center"> <button
                  type="submit"
                  class="bg-[#289788] text-center hover:bg-[#074f56] px-4 py-1 rounded text-white font-semibold"
                >
                 Save
                </button></div>
               
             </form>
          </div>
          {{-- <div class="modal-footer">
            <button type="button" class="md:text-lg text-md cursor-pointer bg-green-700 p-1 px-2 rounded-lg text-white bg-indigo-600 text-white" data-bs-dismiss="modal">Close</button>
           
          </div> --}}
        </div>
      </div>
    </div>
   

    <div class="modal fade " id="agentModal" tabindex="-1" aria-labelledby="agentModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header bg-indigo-300">
            <h5 class="modal-title" id="agentModalLabel">Add New Agent</h5>
            {{-- <button type="button" class="btn-close btn text-red-700 font-bold" data-bs-dismiss="modal" aria-label="Close">X</button> --}}
          </div>

         
          <div class="modal-body">
            <form class="row g-3" id="addagent" action="{{route('agent/index')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="">
                  <div class="px-10 gap-x-10 grid md:grid-cols-2">
                      <div class="py-1">
                          <div class="font-semibold text-lg">Agent's Name</div>
                          <input type="text" class="form-control uppercase" required id="agent_name" name="agent_name" placeholder="">
                      </div>
                      <div class="py-1">
                          <div class="font-semibold text-lg">Agent's Phone Number</div>
                          <input type="number" class="form-control uppercase" required id="agent_phone" name="agent_phone" placeholder="">
                      </div>
                      <div class="py-1">
                          <div class="font-semibold text-lg">Agent's Email</div>
                          <input type="email" class="form-control" required id="agent_email" name="agent_email" placeholder="">
                      </div>
                      <div class="py-1">
                          <div class="font-semibold text-lg">Agent's Address</div>
                          <input type="text" class="form-control uppercase" id="agent_address" name="agent_address" placeholder="">
                      </div>
                      <div class="py-1">
                          <div class="font-semibold text-lg">Agent's Emergency Phone No</div>
                          <input type="text" class="form-control uppercase" id="agent_e_phone" name="agent_e_phone" placeholder="">
                      </div>
                      <div class="py-1">
                          <div class="font-semibold text-lg">Agent's Picture</div>
                          <input type="file" class="form-control" id="agent_picture" name="agent_picture">
                      </div>
                  </div>
              </div>
              <div class="text-center">
                  <button type="submit" class="bg-[#289788] hover:bg-[#074f56] p-3 rounded text-white font-semibold">
                      Add Agent
                  </button>
              </div>
          </form>
          
          </div>  
          <div class="modal-footer">
            <button type="button" class=" bg-[#074f56] p-3 rounded text-white font-semibold" data-bs-dismiss="modal">Close</button>
        
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header bg-[#289788] text-white">
            <h5 class="modal-title" id="exampleModalLabel">Add New Candidate</h5>
            <button type="button" class="btn-close btn text-white font-bold" data-bs-dismiss="modal" aria-label="Close">X</button>
          </div>

         
          <div class="modal-body">
              <form class="row g-3" id="addcandidate" action="{{route('user/index')}}" method="post">
                  @csrf
                      
                    <div class="">
                      <div class="px-10 gap-x-10 grid md:grid-cols-2">
                      <div class="py-1">
                      <div class="font-semibold text-lg" >Candidate Name <span class="text-red-500">*</span> </div>
                      <input type="text" class="form-control uppercase" id="pname" name="pname" placeholder="" required>
                    </div>
                    <div class="py-1">
                      <div class="form-group" style="position: relative;">
                        <div class="font-semibold text-lg" >Agent Name <span class="text-red-500"></span> </div>
                        <input type="text" class="form-control" id="agentSearch" placeholder="Select Agent" autocomplete="off">
                        <input type="hidden" name="agent_id" id="agent_id">
                        <div class="dropdown-menu" id="agentDropdown" style="width: 100%; max-height: 200px; overflow-y: auto;">
                            <!-- Options will be populated here -->
                        </div>
                    </div>
                    
                    </div>
                    
                    <div class="py-1">
                      <div class="font-semibold text-lg">Passport Number <span class="text-red-500">*</span></div>
                      <input type="text" class="form-control uppercase " id="pnumber" name="pnumber" minlength="0" maxlength="9" required placeholder="">
                    </div>
                   <div class="py-1">
                      <div class="items-center gap-3 flex">
                        <div class="text-lg font-semibold">Passport Issue Date </div>
                        <div class="text-md font-semibold">
                          <input type="radio" id="five" name="passDate" value="five" checked/>
                          <label for="five" class="mr-4">5 years</label>
                          <input type="radio" id="ten" name="passDate" value="ten"/>
                          <label for="ten">10 years</label>
                        </div>
                      </div>
                      <input type="text" class="form-control uppercase " id="pass_issue_date" placeholder="" name="pass_issue_date">
                    </div>
                    <div class="py-1">
                      <div class="font-semibold text-lg">Passport Expire Date</div>
                      <input type="text" class="form-control uppercase" id="pass_expire_date" name="pass_expire_date" placeholder="" >
                    </div>
                    <div class="py-1">
                      <div class="font-semibold text-lg">Date Of Birth <span class="text-red-500">*</span></div>
                      <input type="text" class="form-control uppercase" id="date_of_birth" required name="date_of_birth" placeholder="">
                    </div>
                    <div class="py-1">
                      <div class="font-semibold text-lg">Place Of Birth</div>
                      <input type="text" class="form-control uppercase" id="place_of_birth" name="place_of_birth" list="districts" placeholder="">
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
                    {{-- <div class="py-1">
                      <div class="font-semibold text-lg">Address</div>
                      <input type="text" class="form-control uppercase" id="address" name="address" placeholder="">
                    </div> --}}
                    <div class="py-1">
                      <div class="font-semibold text-lg">Father's Name</div>
                      <input type="text" class="form-control uppercase" id="father" name="father" placeholder="">
                    </div>
                    <div class="py-1">
                      <div class="font-semibold text-lg">Mother's Name</div>
                      <input type="text" class="form-control uppercase" id="mother" name="mother" placeholder="">
                    </div>
                    <div class="py-1">
                      <div class="font-semibold text-lg">Religion</div>
                      <select class="form-control p-2 rounded-lg w-full" size="large" placeholder="" id="religion" name="religion">
                        <option selected>Choose...</option>
                        <option value="MUSLIM">MUSLIM</option>
                        <option value="NON MUSLIM">NON MUSLIM</option>
                      </select>
                    </div>
                    <div class="py-1">
                      <div class="font-semibold text-lg">Gender</div>
                      <select class="form-control p-2 rounded-lg w-full" size="large" placeholder=""  name="gender" id="gender">
                        <option selected>Choose...</option>
                        <option value="MALE">MALE</option>
                        <option value="FEMALE">FEMALE</option>
                      </select>
                    </div>
                    <div class="py-1">
                      <div class="font-semibold text-lg">Marital Status</div>
                      <select id="inputState" class="form-select uppercase" name="married">
                        <option selected>Choose...</option>
                        <option value="MARRIED">MARRIED</option>
                        <option value="UNMARRIED">UNMARRIED</option>
                      </select>
                    </div>
                    <div class="py-1">
                      <div class="font-semibold text-lg">Address</div>
                      <div class="input-group">
                      <input type="text" class="form-control uppercase" id="address" placeholder="" name="address">
                      </div>
                    </div>
                  </div>
                    <div>
                    <h2 class='my-4 font-bold text-2xl ml-10'>Other Inoformaition</h2></div>
                   
                    <div class="px-10 gap-x-10 grid md:grid-cols-2">
                    
                    <div class="py-1">
                      <div class="font-semibold text-lg">Medical Center Name</div>
                      <input type="text" class="form-control uppercase" placeholder="" value="FIT" id="medical_center_name" name="medical_center_name">
                    </div>
                    <div class="py-1">
                      <div class="font-semibold text-lg">Medical Issue Date</div>
                      <input type="text" class="form-control uppercase" placeholder="" id="medical_issue_date" name="medical_issue_date">
                    </div>
                    <div class="py-1">
                      <div class="font-semibold text-lg">Medical Expiry Date</div>
                      <input type="text" class="form-control uppercase" placeholder="" id="medical_expire_date" name="medical_expire_date">
                    </div>
                    <div class="py-1">
                      <div class="font-semibold text-lg">Driver Licence Number</div>
                      <input type="text" class="form-control uppercase" id="driving_licence" placeholder="" name="driving_licence">
                    </div>
                    <div class="py-1">
                      <div class="font-semibold text-lg">Police Clearence No</div>
                      <div class="input-group">
                      <input type="text" class="form-control uppercase" id="police_licence" placeholder="" name="police_licence">
                      <button type="button" class="rounded-lg bg-indigo-500 text-white p-2 text-md font-semibold" onclick="SearchPC()">Search</button></div>
                    </div>
                    
                    <div class="text-start">
                   </div>
                  </div>
                </div>
                  <div class="text-center">
                    <button
                      type="submit"
                      class="bg-[#289788] hover:bg-[#074f56] p-3 rounded text-white font-semibold"
                    >
                      Add Candidate
                    </button>
                  </div>
            </form>
          </div>  
          <div class="modal-footer">
            <button type="button" class=" bg-[#074f56] p-3 rounded text-white font-semibold" data-bs-dismiss="modal">Close</button>
        
          </div>
        </div>
      </div>
    </div>
     
    
    <div class="modal fade" id="viewAgentModal" tabindex="-1" aria-labelledby="viewAgentModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewAgentModalLabel">Agent Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="agentDetails">
            
          </div>
        </div>
      </div>
    </div>
    

  
  <!-- End Hero -->
  <div class="container my-5 hello">
   
    <div class="flex justify-between">
      <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add Candidate's Passport" class="bg-indigo-500 text-white font-semibold text-xl px-14 py-2 rounded-md mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Candidate
      </button>
      <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add Agent" class="bg-green-500 text-white font-semibold text-xl px-14 py-2 rounded-md mb-2" data-bs-toggle="modal" data-bs-target="#agentModal">
        Add Agent
      </button>
      <a href="{{ route('agent_candidate') }}" data-toggle="tooltip" data-placement="bottom" title="Report">
        <button type="button" class="bg-yellow-500 text-white font-semibold text-xl px-14 py-2 rounded-md mb-2">
          Report
        </button>
      </a>
    
      <!-- Dropdown Button -->
      <div class="relative">
        <button class="bg-blue-500 text-white font-semibold text-xl px-14 py-2 rounded-md mb-2" id="dropdownButton" aria-expanded="false" data-toggle="tooltip" data-placement="bottom" title="More Actions">
          Manpower Forms
        </button>
        <!-- Dropdown Menu -->
        <ul id="dropdownMenu" class="absolute hidden bg-white shadow-md rounded-md w-48 mt-2 right-0 z-10">
          <li><a class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-200" href="{{ route('note-sheet') }}">Note Sheet</a></li>
          <li><a class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-200" href="{{ route('putup-list') }}">Putup List</a></li>
          <li><a class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-200" href="{{ route('contract') }}">Contract</a></li>
          <li><a class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-200" href="{{ route('stemp_paper') }}">Stemp Paper</a></li>
          <li><a class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-200" href="{{ route('application') }}">Application</a></li>
        </ul>
      </div>
    </div>

  </div>
    

    <div class="table-responsive main-datatable ">
        <form method="GET" action="{{ route('user/index') }}">
            <div class="flex w-[50%] mx-auto gap-4">
                <input type="text" class="form-control" name="search" placeholder="Search" value="{{ request('search') }}">
                <button type="submit" class="text-white px-4 rounded-lg bg-indigo-500">Search</button>
            </div>
        </form>
      <table class="table stripe no-footer dataTable passenger-table" id="candidatetable">
        <thead class="bg-[#f9f9f9] thed">
          <tr class="bg-[#f9f9f9]">
            <th scope="col">Serial <br/> Number</th>
            <th scope="col">Creation <br/> Date</th>
            <th scope="col">Name</th>
            <th scope="col">Passport <br/> Number</th>
            <th scope="col">DOB</th>
            <th scope="col" style="">VISA/Sponsor <br/> Number</th>
            <th scope="col" class="text-lg">Profession</th>

            <th scope="col">Application (MOFA) <br/> Number</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
       <tbody class="bg-gray-400">
        @foreach($candidates as $index=> $candidate)
          @php
            $dob = $candidate->date_of_birth;
            $birthdate = new DateTime($dob);
            $currentDate = new DateTime();
            $ageInterval = $birthdate->diff($currentDate);
            $years = $ageInterval->y;
            $age = "";
            if ($years > 0) {
                $age .= $years . " year" . ($years > 1 ? "s" : "");
            }
          @endphp

          <!-- Add Candidate Visa Modal -->
          <div class="modal fade" id="addVisaModal" tabindex="-1" aria-labelledby="addVisaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addVisaModalLabel">Add Candidate Visa</h5>
                  <button type="button" class="btn-close btn text-red-700 font-bold" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                  <form id="visainput" method="post" action class="mt-5">
                    @csrf
                    <input type="hidden" name="candidate_id" id="candidate_id" value="{{ $candidate->id }}" />
                    <div class="px-10 gap-x-10 grid md:grid-cols-2">
                      @foreach([
                        ['Visa No', 'visa_no', 'Ex- 1303044456'],
                        ['Sponsor ID', 'spon_id', 'Ex- 7097997442'],
                        ['Visa Date (Hijri)', 'visa_date', 'Ex- 1444/09/30'],
                        ['Salary', 'salary', 'Ex- 1000'],
                        ['Sponsor Name (Arabic)', 'spon_name_arabic', 'Ex- القوة العربية.'],
                        ['Sponsor Name (English)', 'spon_name_english', 'Ex- Arabic Power'],
                        ['Profession (Arabic)', 'prof_name_arabic', 'Ex- القوة العربية.'],
                        ['Profession (English)', 'prof_name_english', 'Ex- Electrian'],
                        ['Mofa No', 'mofa_no', 'Ex- 43780333'],
                        ['Mofa Date', 'mofa_date', ''],
                        ['Okala No', 'okala_no', 'Ex- 9430340'],
                        ['Musaned No', 'musaned_no', 'Ex- 039409230'],
                      ] as [$label, $id, $placeholder])
                        <div class="py-2 flex flex-col gap-2">
                          <div class="font-bold text-lg">{{ $label }}</div>
                          <input type="{{ $id === 'mofa_date' ? 'date' : 'text' }}" id="{{ $id }}" name="{{ $id }}" class="form-control p-2 rounded-lg w-full uppercase" placeholder="{{ $placeholder }}" />
                        </div>
                      @endforeach
                    </div>
                    <div class="text-center pt-3">
                      <button type="submit" class="bg-[#289788] mb-2 hover:bg-[#074f56] p-3 rounded text-white font-semibold">Add Candidate Visa</button>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="bg-[#074f56] p-3 rounded text-white font-semibold" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Candidate Table Row -->
          <tr class="bg-gray-700 td-bg my-auto">
            <th scope="col">{{ $index+1 }}</th>
            <td>
              {{ date('d-m-Y', strtotime($candidate->created_at)) }}<br/>
              {{ date('H:m', strtotime($candidate->created_at)) }}
            </td>
            <td><a href="{{ route('user/view', ['id' => $candidate->id]) }}" class="font-semibold hover:font-bold cursor-pointer hover:text-blue-400 ">{{ $candidate->name }}</a></td>
            <td>{{ $candidate->passport_number }}</td>
            <td>
              {{ date('d-m-Y', strtotime($candidate->date_of_birth)) }}
              <br/><span class="font-semibold">Age</span>: {{ $age }}
            </td>
            <td>
              <strong>Visa No:</strong> {{ $candidate->visa_no }} <br/>
              <strong>Sponsor ID:</strong> {{ $candidate->spon_id }}
            </td>
            <td>{{ $candidate->prof_name_english }}</td>
            <td>{{ $candidate->mofa_no }}</td>
            <td class="p-2">
              @if(!$candidate->visa_no)
                <div class="md:text-lg text-md cursor-pointer">
                  <a href="{{ route('user/visaadd', ['id' => $candidate->id]) }}" class="fw-semibold text-primary"><i class="bi bi-file-earmark-plus mr-1"></i>Visa</a>
                </div>
              @endif
              @if(!$candidate->manpower_id)
                <div class="md:text-lg text-md cursor-pointer">
                  <a href="{{ route('user/manpoweradd', ['id' => $candidate->id]) }}" class="fw-semibold text-primary"><i class="bi bi-file-earmark-plus mr-1"></i>Manpower</a>
                </div>
              @endif
              <div class="md:text-lg text-md">
                <a href="{{ route('user/edit', ['id' => $candidate->id]) }}" class="fw-semibold text-success"><i class="bi bi-pencil-square mr-1"></i>Edit</a>
              </div>
              <div class="md:text-lg text-md">
                <a href="#" onclick="return surity('{{ $candidate->id }}')" class="fw-semibold text-danger"><i class="bi bi-trash mr-1"></i>Delete</a>
              </div>
              @if (!$candidate->visa_no)
                <div class="md:text-lg text-md fw-semibold text-warning cursor-pointer" data-bs-toggle="modal" data-bs-target="#printModal">
                  <i class="bi bi-printer-fill mr-1"></i>Print
                </div>
                <!-- Print Warning Modal -->
                <div class="modal fade" id="printModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-indigo-300">
                        <h5 class="modal-title text-black font-semibold" id="exampleModalLabel">Print Warning</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body font-semibold text-indigo-800">
                        Please Enter Candidates Visa Information First and then Try to Print
                      </div>
                      <div class="modal-footer">
                        <div class="md:text-lg text-md cursor-pointer bg-green-700 p-1 px-2 rounded-lg text-white">
                          <a href="{{ route('user/visaadd', ['id' => $candidate->id]) }}" class="fw-semibold"><i class="bi bi-file-earmark-plus mr-1"></i>Visa</a>
                        </div>
                        <button type="button" class="md:text-lg text-md cursor-pointer bg-green-700 p-1 px-2 rounded-lg text-white bg-indigo-600 text-white" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              @else
                <div class="md:text-lg text-md">
                  <a href="{{ route('user/print', ['id' => $candidate->id]) }}" class="fw-semibold text-warning"><i class="bi bi-printer-fill mr-1"></i>Print</a>
                </div>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>

      </table>
      {{ $candidates->links() }}
    </div>
    

    <div class="table-responsive main-datatable mt-5">
        <form method="GET" action="{{ route('user/index') }}">
            <div class="flex w-[50%] mx-auto gap-4">
                <input type="text" class="form-control" name="search" placeholder="Search" value="{{ request('search') }}">
                <button type="submit" class="text-white px-4 rounded-lg bg-indigo-500">Search</button>
            </div>
        </form>
      <table class="table stripe no-footer dataTable passenger-table" id="candidatetable">
        <thead class="bg-green-500 thed">
          <tr class="bg-green-500">
            <th scope="col">Serial <br/> Number</th>
            {{-- <th scope="col">Creation <br/> Date</th> --}}
            <th scope="col">Name</th>
            <th scope="col">Phone <br/> Number</th>
            <th scope="col">Email <br/></th>
            <th scope="col">Address</th>
           
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($agents as $index => $agent)
              <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $agent->agent_name }}</td>
                  <td>{{ $agent->agent_phone }}</td>
                  <td>{{ $agent->agent_email }}</td>
                  <td>{{ $agent->agent_address }}</td>
                  <td class="flex gap-2">
                    <a href="{{ route('agent.edit', $agent->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square mr-1"></i></a>
                    <a href="#" class="btn btn-secondary view-agent-btn" data-agent-id="{{ $agent->id }}"><i class="bi bi-eye"></i></a>
                    <form action="{{ route('agent.delete', $agent->id) }}" method="POST" class="delete-form" data-confirm-message="Are you sure you want to delete this agent?">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash mr-1"></i></button>
                    </form>
                </td>
                
              </tr>
          @endforeach
        
        </tbody>
      </table>
      {{ $candidates->links() }}
    </div>
    
  </div>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
 <!-- <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>-->
 <!-- <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>-->
 <!-- <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>-->
 <!-- <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>-->
 <!-- <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>-->
 <!-- <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>-->
 <!-- <script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>-->
 <!-- <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>-->

 <!-- <script src="{{asset('assets/js/main.js')}}"></script>-->

 <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
 <!--<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>-->
 
 <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
 @include('layout.script')

 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

 <!-- JavaScript to toggle dropdown -->
  <script>
      const dropdownButton = document.getElementById('dropdownButton');
      const dropdownMenu = document.getElementById('dropdownMenu');

      dropdownButton.addEventListener('click', () => {
        const isExpanded = dropdownMenu.classList.contains('hidden');
        // Toggle the visibility of the dropdown
        dropdownMenu.classList.toggle('hidden', !isExpanded);
      });

      // Close the dropdown if clicked outside
      document.addEventListener('click', (event) => {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
          dropdownMenu.classList.add('hidden');
        }
      });
  </script>
 <script>

  function showAlert() {
    alert("Visa is not available! Please Enter Your Candidates Visa First for Print");
    // You can perform other actions here as needed.
  }
  function surity(id){
    let text = "Sure Want to delete!\nEither OK or Cancel.";
    if (confirm(text)) {
      let url  = 'delete/'+id;
      fetch(url, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
      })
      .then(response => response.json())
      .then(response => {
        if (response.success) {
          alert(response.message, "Deleted Successfully");
          location.reload();
        
        } else {
          alert(response.message, "Not Deleted");
          location.reload();
        }
      })
      .catch(error => {
        console.error("An error occurred:", error);
        // Handle any network or other errors here.
      });
    }else {
      console.log("You canceled!");
    }

    return false; // Prevent the link from being followed immediately
  
  }

  function SearchPC() {
    var PCInput = document.getElementById("police_licence").value.toUpperCase();
    var url = `https://pcc.police.gov.bd/ords/f?p=500:50::::RP:P50_TOKEN_ID:${PCInput}`;
    
    // Open the link in a new tab
    window.open(url, "_blank");
  }
  
  
  
</script>

<script>

document.addEventListener('DOMContentLoaded', function() {
    const agents = @json($agents->items());
    const agentInput = document.getElementById('agentSearch');
    const agentDropdown = document.getElementById('agentDropdown');
    const agentIdInput = document.getElementById('agent_id');

    function filterOptions(search) {
        agentDropdown.innerHTML = ''; // Clear previous options
        const filteredAgents = agents.filter(agent => 
            agent.agent_name.toLowerCase().includes(search.toLowerCase())
        );

        if (filteredAgents.length) {
            filteredAgents.forEach(agent => {
                const option = document.createElement('div');
                option.classList.add('dropdown-item');
                option.textContent = agent.agent_name;
                option.dataset.value = agent.id;
                option.addEventListener('click', () => {
                    agentInput.value = agent.agent_name;
                    agentIdInput.value = agent.id;
                    agentDropdown.classList.remove('show');
                });
                agentDropdown.appendChild(option);
            });
        } else {
            const noResult = document.createElement('div');
            noResult.classList.add('dropdown-item');
            noResult.textContent = 'No agents found';
            agentDropdown.appendChild(noResult);
        }
    }

    agentInput.addEventListener('input', function() {
        const search = agentInput.value;
        filterOptions(search);
        agentDropdown.classList.add('show');
    });

    document.addEventListener('click', function(e) {
        if (!agentDropdown.contains(e.target) && e.target !== agentInput) {
            agentDropdown.classList.remove('show');
        }
    });
});




    function deleteAgent(agentId) {
        $.ajax({
            url: `/agents/${agentId}`,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    window.location.href = response.redirect_url;
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr) {
                alert('An error occurred. Please try again.');
            }
        });
    }

    $(document).ready(function() {
        // $('#candidatetable').DataTable();
        // $('.select2').select2();
        //  $('#agent_id').select2();
        // $('#exampleModal').on('shown.bs.modal', function (e) {
        //     $('.select2').select2();
        // });

      
        // $('.delete-form').submit(function(e) {
        //   e.preventDefault();
        //   const form = this;
        //   const confirmMessage = $(this).data('confirm-message') || 'Are you sure you want to delete this agent?';
          
        //     if (confirm(confirmMessage)) {
        //         $.ajax({
        //             url: $(form).attr('action'),
        //             type: 'POST',
        //             data: $(form).serialize(),
        //             success: function (response) {
        //               console.log(response);
        //                 Swal.fire({
        //                     title: response.title,
        //                     text: response.message,
        //                     icon: response.icon,
        //                 });
        //                 setTimeout(function() {
        //                     window.location.href = response.redirect_url;
        //                 }, 3000);
        //             },
        //             error: function (xhr) {
        //                 alert('An error occurred. Please try again.');
        //             }
        //         });
        //     }
        // });

        $('.view-agent-btn').click(function(e) {
            e.preventDefault();
            var agentId = $(this).data('agent-id');

            $.ajax({
                url: '{{ route("agent.view", ":id") }}'.replace(':id', agentId),
                type: 'GET',
                success: function(response) {
                  console.log(response.html);
                    $('#agentDetails').html(response.html);
                    $('#viewAgentModal').modal('show');
                },
                error: function(xhr) {
                    console.error('Failed to fetch agent details');
                }
            });
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
                var radioSelection = document.querySelector('input[name="passDate"]:checked').value;
                console.log(radioSelection);
                if(radioSelection === "ten") {
                issueDate.setFullYear(issueDate.getFullYear() + 10);
                }else if(radioSelection === "five"){
                  issueDate.setFullYear(issueDate.getFullYear() + 5);
                }else{
                  issueDate.setFullYear(issueDate.getFullYear() + 5);
                }
                issueDate.setDate(issueDate.getDate() - 1);
                var formattedDate = $.datepicker.formatDate('dd/mm/yy', issueDate);
                $('#pass_expire_date').val(formattedDate);
          }
        });


        // $('#date_of_birth').datepicker({
        //   dateFormat: 'dd/mm/yy',
        //   onSelect: function(selectedDate) {
        //         var dateOfBirth = $(this).datepicker('getDate');
                
        //         var formattedDate = $.datepicker.formatDate('dd/mm/yy',dateOfBirth);
        //         $('#date_of_birth').val(formattedDate);
        //   }
        // });

        $('#date_of_birth').datepicker({
        dateFormat: 'dd/mm/yy',
        onSelect: function (selectedDate) {
          var selectedDateObject = $(this).datepicker('getDate');
          var currentDate = new Date();

          // Calculate the age difference in years
          var ageDifferenceYears = currentDate.getFullYear() - selectedDateObject.getFullYear();
        
        var ageDifference = currentDate - selectedDateObject;
        var ageDate = new Date(ageDifference);
        var years = ageDate.getUTCFullYear() - 1970;
        var months = ageDate.getUTCMonth();
        var days = ageDate.getUTCDate() - 1;

        
        // Check if the birthdate has occurred 21 or more years ago
        if (ageDifferenceYears > 21 || (ageDifferenceYears === 21 && (currentDate.getMonth() > selectedDateObject.getMonth() || (currentDate.getMonth() === selectedDateObject.getMonth() && currentDate.getDate() >= selectedDateObject.getDate())))) {
          var formattedDate = $.datepicker.formatDate('dd/mm/yy', selectedDateObject);
          $('#date_of_birth').val(formattedDate);
        } else {
          // Display an error message or take some other action
          var ageString = years + " years, " + months + " months, " + days + " days";
          alert("You must be at least 21 years old. Your Age is "+ ageString);
          $(this).val(''); // Clear the input field
        }
      }
    });


   
    $('#pass_expire_date').datepicker({
      dateFormat: 'd/m/y'
    });
    
    var apiUrl = window.location.origin + '/user/get';
    var method = "GET";
    var data = {
       
    };
    var headers = {
       
    };
    
    callApi(apiUrl, method, data, headers);
   
  });
  var dataObject = {};
  function callApi(apiUrl, method, data, headers) {
              $.ajax({
                  url: apiUrl,
                  type: method,
                  data: data,
                  headers: headers,
                  dataType: "json",
                
                  success: function (response) {
                          // console.log(response);
                          
                          for (var key in response.candidates) {
                              var candidateValue = response.candidates[key];
                              var userEmail = key;
                              var combinedValue = {
                                  candidate: candidateValue,
                                  user: response.users[candidateValue] || null 
                              };
                              dataObject[userEmail] = combinedValue;
                          }
                          // console.log(dataObject);
                      },   
                      error: function (error) {
                      console.error("Error calling API:", error);
                  }
              });
  }
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

  $('#visainput').submit(function(e) {
                  e.preventDefault(); // Prevent the default form submission
                  var form = $(this);
                  var formData = form.serialize(); // Serialize the form data
                  // console.log(formData);
                  var id = (document.getElementById('candidate_id').value);
                  // console.log(id);
                  $.ajax({
                    url: "{{ url('user/visaadd') }}/" + id,
                    
                method: form.attr('method'),
                      data: formData,
                      success: function(response) {
                          
                          console.log(response);
                          
                          Swal.fire({
                              title: response.title,
                              text: response.message,
                              icon: response.icon,
                              
                          });
                          // if (response.redirect_url) {
                          //     setTimeout(function() {
                          //       var redirectUrl = window.location.origin + '/'+ response.redirect_url;
                          //       window.location.href = redirectUrl;
                          //     }, 2000);
                          // }l
                                                                  
                      },
                      error: function(response) {
                        
                          console.log(response.title);
                          Swal.fire({
                              title: "Error",
                              text: "Cannot add candidate\n 1: Complete all fields are required\n 2: Same ID check",
                              icon: 'error',
                            
                          });
                        //   if (response.redirect_url) {
                        //     setTimeout(function() {
                        //       var redirectUrl = window.location.origin + '/'+ response.redirect_url;
                        //       window.location.href = redirectUrl;
                        //     }, 2000);
                        // }l

                          
                      } 
                
                  });
              });

  $('#addcandidate').on('submit', function(e) {
          e.preventDefault();

          var form = $(this);
          var formData = form.serialize();
          // console.log(formData);
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
                    if (response.redirect_url) {
                              setTimeout(function() {
                                var redirectUrl = window.location.origin + '/'+ response.redirect_url;
                                window.location.href = redirectUrl;
                              }, 3000);
                      }
                                            
                },
                error: function(response) {
                  
                    console.log(response);
                    var errorMessage = xhr.responseText;
                    var regex = /SQLSTATE\[23000\]:.*Duplicate entry.*'(.+)' for key '(.+)'/;
                    var matches = errorMessage.match(regex);
                    var duplicateEntryValue = matches ? matches[1] : null;
                    var duplicateEntryKey = matches ? matches[2] : null;

                    console.log("Duplicate Entry Value:", duplicateEntryValue);
                    console.log("Duplicate Entry Key:", duplicateEntryKey);
                    Swal.fire({
                        title: "Error",
                        text: "Cannot add candidate\n 1: Complete all fields are required\n 2: Same ID check",
                        icon: 'error',
                      
                    });
                    if (response.redirect_url) {
                              setTimeout(function() {
                                var redirectUrl = window.location.origin + '/'+ response.redirect_url;
                                window.location.href = redirectUrl;
                              }, 3000);
                      }
                    
                }
            });
        });
  $('#addagent').on('submit', function(e) {
          e.preventDefault();

          var form = $(this);
          var formData = form.serialize();
          // console.log(formData);
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
                    if (response.redirect_url) {
                              setTimeout(function() {
                                var redirectUrl = window.location.origin + '/'+ response.redirect_url;
                                window.location.href = redirectUrl;
                              }, 3000);
                      }
                                            
                },
                error: function(response) {
                  
                    console.log(response);
                    var errorMessage = xhr.responseText;
                    var regex = /SQLSTATE\[23000\]:.*Duplicate entry.*'(.+)' for key '(.+)'/;
                    var matches = errorMessage.match(regex);
                    var duplicateEntryValue = matches ? matches[1] : null;
                    var duplicateEntryKey = matches ? matches[2] : null;

                    console.log("Duplicate Entry Value:", duplicateEntryValue);
                    console.log("Duplicate Entry Key:", duplicateEntryKey);
                    Swal.fire({
                        title: "Error",
                        text: "Cannot add agent\n 1: Complete all fields are required\n 2: Same ID check",
                        icon: 'error',
                      
                    });
                    if (response.redirect_url) {
                              setTimeout(function() {
                                var redirectUrl = window.location.origin + '/'+ response.redirect_url;
                                window.location.href = redirectUrl;
                              }, 3000);
                      }
                    
                }
            });
        });
  document.getElementById('pass_issue_date').addEventListener('change', function() {
    var issueDate = new Date(this.value);
    var expireDate = new Date(issueDate.getFullYear() + 10, issueDate.getMonth(), issueDate.getDate());
    var formattedExpireDate = formatDate(expireDate);
    console.log(formattedExpireDate);
    document.getElementById('pass_expire_date').value = formattedExpireDate;
  });

  function formatDate(date) {
    date.setDate(date.getDate() - 1); // Subtract 1 day from the date

    var year = date.getFullYear();
    var month = ('0' + (date.getMonth() + 1)).slice(-2);
    var day = ('0' + date.getDate()).slice(-2);

    return year + '-' + month + '-' + day;
  }

</script>

</body>

</html>