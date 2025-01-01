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
    <div class="container-fluid mt-5">
        <table class="table table-success table-striped table-hover" id="usertable">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Recuiting Number</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Office</th>
                    <th>Embassy Man</th>
                    <th>WhatsApp Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->licence_name}}</td>
                        <td>{{$user->rl_no}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->office_address}}</td>
                        <td>{{$user->embassy_man_name}}</td>
                        <td>{{$user->embassy_man_phone}}</td>
                        <td class="text-center p-2">
                            <a href="{{ route('admin/view', ['id' => encrypt($user->id)]) }}" target="_blank" class="fw-bold text-primary"><i class="bi bi-eye-fill"></i></a>
                            <a href="{{ route('admin/edit', ['id' => encrypt($user->id)]) }}" target="_blank" class="fw-bold text-success"><i class="bi bi-pencil-square"></i></a>
                            {{-- <a href="{{ route('admin/delete', ['id' => encrypt($user->id)]) }}" target="_blank" class="fw-bold text-danger"><i class="bi bi-trash-fill">Delete</i></a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#usertable').DataTable();
        });
    </script>
</body>
</html>