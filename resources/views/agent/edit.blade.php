
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
  </style> 
  
  @include('layout.head')
</head>

<body>
  
  {{-- @include('layout.navbar') --}}
  <div class="container-fluid">
    <form class="row g-3" id="addagent" action="{{route('agent.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="">
            <div class="px-10 gap-x-10 grid md:grid-cols-2">
                <div class="py-1">
                    <div class="font-semibold text-lg">Agent's Name</div>
                    <input type="text" class="form-control uppercase" required id="agent_name" name="agent_name" placeholder="" value="{{$agent->agent_name}}">
                    <input type="hidden" class="form-control uppercase" required id="id" name="id" placeholder="" value="{{$agent->id}}">
                </div>
                <div class="py-1">
                    <div class="font-semibold text-lg">Agent's Phone Number</div>
                    <input type="number" class="form-control uppercase" required id="agent_phone" name="agent_phone" placeholder="" value="{{$agent->agent_phone}}">
                </div>
                <div class="py-1">
                    <div class="font-semibold text-lg">Agent's Email</div>
                    <input type="email" class="form-control" required id="agent_email" name="agent_email" placeholder="" value="{{$agent->agent_email}}">
                </div>
                <div class="py-1">
                    <div class="font-semibold text-lg">Agent's Address</div>
                    <input type="text" class="form-control uppercase" id="agent_address" name="agent_address" placeholder="" value="{!!$agent->agent_address!!}">
                </div>
                <div class="py-1">
                    <div class="font-semibold text-lg">Agent's Emergency Phone No</div>
                    <input type="text" class="form-control uppercase" id="agent_e_phone" name="agent_e_phone" placeholder="" value="{{$agent->agent_e_phone}}">
                </div>
                <div class="py-1">
                    <div class="font-semibold text-lg">Agent's Picture</div>
                    <input type="file" class="form-control" id="agent_picture" name="agent_picture">
                    <img id="current-picture" src="{{ asset($agent->agent_picture) }}" alt="Agent's Picture" class="mt-2 w-32 h-32 object-cover">
                    <img id="preview-picture" src="#" alt="New Picture Preview" class="mt-2 w-32 h-32 object-cover hidden">
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-[#289788] hover:bg-[#074f56] p-3 rounded text-white font-semibold">
                Update Agent
            </button>
        </div>
    </form>
  </div>

   
@include('layout.script')
<script type="text/javascript">
      $(document).ready(function () {
        $('.select2').select2();
        $('#addagent').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('agent.update') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: response.icon,
                               
                        });
                        setTimeout(function() {
                            window.location.href = response.redirect_url;
                        }, 3000);
                    } else {
                        Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.icon,
                            
                        });
                        setTimeout(function() {
                            window.location.href = response.redirect_url;
                        }, 3000);
                    }
                },
                error: function (xhr) {
                    alert('An error occurred. Please try again.');
                }
            });
        });

        $('#agent_picture').change(function () {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#preview-picture').attr('src', e.target.result).removeClass('hidden');
                }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
    });

</script>
  