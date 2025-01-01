<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
    <meta content="" name="description">
    <meta content="" name="keywords">
  
  
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
  
    <!-- JavaScript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
   
    @include('layout.head')
  </head>
<body>
    {{-- @include('layout.navbar') --}}
    <div class="container-fluid">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Passport NO</th>
                    <th>Paaport Issue</th>
                    <th>Passport Expires</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>
                @foreach ($candidates as $cn)
                <tr>
                    <td>{{$cn->name}}</td>
                    <td>{{$cn->passport_number}}</td>
                    <td>{{$cn->passport_issue_date}}</td>
                    <td>{{$cn->passport_expire_date}}</td>
                    <td><a href="{{ route('admin/delete', ['id' => encrypt($cn->id)]) }}" target="_blank" class="fw-bold text-danger"><i class="bi bi-trash-fill"></i></a></td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
</body>
</html>