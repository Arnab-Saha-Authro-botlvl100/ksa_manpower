<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pay With Bkash</title>
    @include('layout.head')
</head>
<body>
   
    <form method="get" action="
    {{ route('bkash-create-payment') }}
    " class="btn-image-primary h-screen flex justify-center items-center">
   
        
        <div class="btn-image p-4 pt-8 rounded-lg shadow-lg flex items-center justify-center flex-col gap-3 relative">
            <img src="{{ asset('./assets/images/logo.png') }}" width="100px" id="up" height="100" class="w-[140px] h-[140px] rounded-full shadow-xl bg-white object-contain p-2 border-2 border-gray-200 absolute top-[-21%] left-1/2 transform translate-x-[-50%]" />
            <p class="font-semibold text-xl text-pink-600 pt-14">Pay Through</p>
            <img src="{{ asset('./assets/images/bkash-logo.png') }}" class="w-[70%]  h-[40%]" width="300px" height="100" alt="bkash payment" class="btn-icon" />
            <button type='submit' class="bg-[#0b7f96] rounded-full w-full py-3 font-bold text-white">Pay 500.00 BDT</button>
        </div>
    </form>
    @include('layout.script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>