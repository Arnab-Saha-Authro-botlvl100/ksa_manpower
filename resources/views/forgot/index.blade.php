<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <title>Reset Password</title>
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

  <!-- JavaScript -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.5.0/css/bootstrap.min.css" integrity="sha512-5XTXkeX5pIqy5gtLzB5SZve0z0J4t0omS+qDf/YP5AvI1GhG6OPqv2ba3b5WJopWbVm9G/VM5C/4HVqpV1HRA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Bootstrap JavaScript (requires jQuery) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.5.0/js/bootstrap.bundle.min.js" integrity="sha512-Y4MnzLv3cRv68bpECDOYp0SCA5tBR+PIMKtZFs9vN0zBtJ9eqeDz+q4d+qZ00nA/olmp1MxRWdfZ1F/EJtnQQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
  <script>
    tailwind.config = {
      important:true,
      theme: {
        extend: {
          colors: {
            clifford: "#da373d",
          },
          backgroundImage:{
              'hero-pattern': "url('/asset/image/hero1.jpg')",
          }
        },
      },
    };
  </script>
  @include('layout.head')
</head>

<body>
  
  @include('layout.navbar')
  <div>
    @if(session('success'))
    <script>
        alert("{{ session('success') }}");
        {!! session()->forget('success') !!}
    </script>
  @endif
    bangladesh

  </div>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <script src="{{asset('assets/js/main.js')}}"></script>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
 
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 @include('layout.script')

 <script>
 
</script>


</body>

</html>