<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Print Your Ksa 4 Page for">
    <title>Embassy Solution Print - KSA 4 Page</title>
    
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/fav.png')}}">
    <link rel="stylesheet" href="../asset/css/ksa.css">
    <style>
        @font-face {
            font-family: arbFont;
            src: url('path/to/font-file.woff');
          }
        @font-face {
            font-family: 'Times New Roman', Times, serif;
            src: url('../asset/css/times new roman.ttf');
          }
          .print{
            font-family:'Times New Roman', Times, serif;
          }
          .arb{
            font-family:arb Arial, sans-serif;
        }
        @media print {
            .noPrint{
              display:none;
            }
          }
    </style>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
     <!--tailwind css cdn -->
    <script src="https://cdn.tailwindcss.com"></script>
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
    <script>
        
        JsBarcode("#barcode", "hello")
    </script>
</head>
<body style="position: relative;">
    <!-- @php
        $dob = $candidates[0]->date_of_birth;
        $birthdate = new DateTime($dob);
        $currentDate = new DateTime();

        // Calculate the difference between the current date and the date of birth
        $ageInterval = $birthdate->diff($currentDate);

        // Extract the years, months, and days from the calculated interval
        $years = $ageInterval->y;
        $months = $ageInterval->m;
        $days = $ageInterval->d;

        // Format the age as "X years, Y months, Z days"
        $age = "";
        if ($years > 0) {
            $age .= $years . " year" . ($years > 1 ? "s" : "");
        }
        if ($months > 0) {
            $age .= ($age ? ", " : "") . $months . " month" . ($months > 1 ? "s" : "");
        }
        if ($days > 0) {
            $age .= ($age ? ", " : "") . $days . " day" . ($days > 1 ? "s" : "");
        }

    @endphp -->
     <div class="w-fit " style="position: sticky; top:50%; left:5px">
       <button onclick="window.print();" class="noPrint p-5 mb-2 bg-blue-500 text-white px-14 text-xl font-bold rounded-xl shadow-xl">
        Print
    </button><br/>
       <button onclick="window.history.back();" class="noPrint p-5 bg-green-500 text-white px-14 text-xl font-bold rounded-xl shadow-xl">
        Back
    </button>
  </div>
    <!-- ksa 1st page design starts -->
    <div class=" border-black  h-[100%]  w-[1050px]  mx-auto  ">
        <div class="flex justify-between  mb-[10px]">
            <div class="">
              <div class="h-[180px] w-[170px] border-1 border border-black " ></div>
            </div>
            <div class="flex flex-col justify-center items-center ml-[20px]">
                <svg id="barcode1" class="w-[300px] mb-2">
                    <!-- SVG content -->
                </svg>
                <img src="{{ asset('assets/images/tree.jpg') }}" alt="Tree" class="w-[20%]">
            </div>
          
            <div  class="w-[300px] text-end text-xl">
              {{-- <p class="font-bold text-4xl">
                {{$candidates[0]->mofa_no}}
              </p> --}}
  
              <p class="text-lg arb">
                
                سفارة المملكة العربية السعودية
                <br />
                القسم القنصلي
              </p>
              <p class="text-lg">
                EMBASSY OF SAUDI ARABIA
                <br />
                CONSULAR SECTION
              </p>
            </div>
        </div>

        <?php
        // dd($candidates[0])
      ?>
        <div class="border-b border-black pb-1 flex flex-wrap items-center " >
            <div class="basis-1/12"> 
              <p class="text-lg w-full">Full Name:</p>
            </div>
            <div  class="flex flex-row justify-center basis-10/12 ">
              <span class="text-2xl font-semibold pr-3 uppercase" contentEditable="true">
                {{$candidates[0]->name}} S/O  {{$candidates[0]->father}}
              </span>
              {{-- S/O
              <span class="text-2xl font-semibold">
                {{$candidates[0]->father}}
              </span> --}}
            </div>
            <div
             class="arb flex text-lg font-semibold text-end justify-end basis-1/12"
            >
              :اسم الكامل
            </div>
        </div>
        <div class="border-b border-black flex">
            <div class="border-r border-black basis-1/6">
              <p class="text-lg w-full">Mother&apos;s Name:</p>
            </div>
            <div class="basis-4/6">
              <p class="text-xl font-semibold pl-2" contentEditable="true">
                {{$candidates[0]->mother}}
              </p>
            </div>
            <div
              
              class="flex text-xl font-semibold text-end justify-end basis-1/6 arb"
            >
              : اسم الام
            </div>
        </div>
        @php
  
               @endphp
        <div class="border-b border-black flex" >
            <div class="border-r border-black basis-1/6">
              <p class="text-lg w-full">Date of Birth:</p>
            </div>
            <div class="border-r border-black basis-1/6">
              <p class="text-lg font-bold text-center" contentEditable="true">
                <?php
                $inputDate = $candidates[0]->date_of_birth;

                // Convert the date format
                $formattedDate = date('d-m-Y', strtotime($inputDate));

                // Output the formatted date
                echo $formattedDate;
                ?>
              </p>
            </div>
            <div
              
              class="flex text-lg font-semibold  justify-en border-r border-black text-center basis-1/6"
            >
              <p class="pl-3 arb"> : تاريخ الولادة </p>
            </div>
            <div class="border-r border-black basis-1/6">
              <p class="text-lg w-full pl-5">Place of Birth:</p>
            </div>
            <div class="border-r border-black basis-1/6">
              <p class="text-lg font-bold text-center">
                {{$candidates[0]->place_of_birth}}
              </p>
            </div>
            <div
              
              class="flex text-lg font-semibold text-end justify-end pl-3 basis-1/6"
            >
              <p class="pl-3 arb"> :محل الولادة </p>
            </div>
        </div>
        <div class="border-b border-black flex" >
            <div class="border-r border-black basis-1/6">
              <p class="text-lg w-full">Previous Nationality:</p>
            </div>
            <div class="border-r border-black basis-1/6">
              <p class="text-lg font-bold text-center">BANGLADESHI</p>
            </div>
            <div
              
              class="flex text-lg font-semibold text-end justify-en border-r border-black basis-1/6"
            >
              <p class="pl-3 arb"> :الجنسية السابقة </p>
            </div>
            <div  class="border-r border-black basis-1/6">
              <p class="text-lg w-full pl-2">Present Nationality:</p>
            </div>
            <div class="border-r border-black basis-1/6">
              <p class="text-lg font-bold text-center">BANGLADESHI</p>
            </div>
            <div
             
              class="flex text-lg font-semibold text-end justify-end basis-1/6 arb"
            >
              
              :الجنسية الحالية
            </div>
          </div>
  
          <div class="border-b border-black flex">
            <div  class="border-r border-black basis-1/6">
              <p class="text-lg w-full">Sex:</p>
            </div>
            <div  class="border-r border-black basis-1/6">
              <p class="text-xl font-bold text-center"> {{$candidates[0]->gender}}</p>
            </div>
            <div
              
              class="flex text-lg font-semibold text-end justify-en border-r border-black basis-1/6"
            >
              <p class="pl-3 arb"> :الجنس </p>
            </div>
            <div  class="border-r border-black basis-1/6">
              <p class="text-lg w-full ml-5">Marital Status:</p>
            </div>
            <div class="border-r border-black basis-1/6">
              <p class="text-xl font-bold text-center">
                {{$candidates[0]->married}}
              </p>
            </div>
            <div
              
              class="flex text-lg font-semibold text-end justify-end basis-1/6 arb"
            >
              
              :الحالة الاجتماعية
        </div>
          </div>
  
          <div class="border-b border-black flex" >
            <div  class="border-r border-black basis-1/6">
              <p class="text-lg w-full">Sect :</p>
            </div>
            <div  class="border-r border-black basis-1/6">
              <p class="text-xl font-bold" ></p>
            </div>
            <div
              
              class="flex text-lg font-semibold text-end justify-en border-r border-black basis-1/6"
            >
              <p class="pl-3 arb"> :المذهب </p>
            </div>
            <div  class="border-r border-black basis-1/6">
              <p class="text-lg w-full ml-5">Religion:</p>
            </div>
            <div class="border-r border-black basis-1/6">
              <p class="text-lg font-bold text-center">
                {{$candidates[0]->religion}}
              </p>
            </div>
            <div
              
              class="flex text-lg font-semibold text-end justify-end basis-1/6 arb"
            >
              
              :الديانة
            </div>
          </div>
  
          <div class="border-b border-black flex">
            <div  class="border-r border-black basis-1/6">
              <p class="text-lg w-full">Source:</p>
            </div>
            <div class="border-r border-black basis-1/6">
              <p class="text-xl font-bold" ></p>
            </div>
            <div
              
              class="flex basis-1/6 text-lg font-semibold text-end justify-en border-r border-black"
            >
            
              <p class="ml-3 arb"> :مصدره </p>
            </div>
            <div  class="border-r border-black basis-1/6">
              <p class="text-lg w-full pl-5">Qualification :</p>
            </div>
            <div class="border-r border-black basis-1/6" >
              <div
                class="text-lg text-center font-bold"
                contentEditable="true"
              >EIGHT
            </div>
            </div>
            <div
              
              class="flex text-lg font-semibold text-end justify-end basis-1/6 arb"
            >
              :المؤهل العلمي
            </div>
          </div>
  
          <div class="border-b border-black flex">
            <div class="basis-1/6">
              <p class="text-lg w-full mr-5" contentEditable="true"> Place of Issue :</p>
            </div>
            <div class="basis-1/6 border-black">
              <p class="text-lg ">
                DHAKA
              </p>
            </div>
            {{-- <div
              
              class="flex text-lg font-semibold text-end  border-black basis-1/6"
            >
              Profession :
            </div>
  
            <div  class=" border-black basis-1/6">
              <p class="text-xl font-bold">
                {{$candidates[0]->prof_name_english}}
              </p>
            </div> --}}
  
            <div  class=" border-black basis-3/6">
              <p class="text-xl font-bold text-end arb">
                {{$candidates[0]->prof_name_arabic}}
              </p>
            </div>
            <div
              
              class="flex text-lg font-semibold text-end justify-end basis-1/6"
            >
              <p class="text-lg font-semibold arb">: المهنة</p>
            </div>
          </div>
          <div class="border-b border-black flex">
            <div class="basis-1/6">
              <p class="text-lg w-full mr-5"> </p>
            </div>
            <div class="basis-1/6 border-black">
              <p class="text-lg ">
             
              </p>
            </div>
            <div
              
              class="flex text-lg font-semibold text-end  border-black basis-1/6"
            >
              Profession :
            </div>
  
            <div  class=" border-black basis-3/6">
              <p class="text-xl font-bold uppercase">
                {{$candidates[0]->prof_name_english}}
                
              </p>
            </div>
  
           
          </div>
          <div class="border-b border-black flex">
            <div class="border-r border-black basis-4/12">
              <p class="text-lg w-full"> Home Address and telephone No:</p>
            </div>
            <div  class="border-r border-black basis-6/12 flex items-center justify-center">
              <p class="text-lg text-center   uppercase">
                {{$candidates[0]->address}}
              </p>
            </div>
            <div
              
              class=" text-lg font-semibold text-end border-black basis-2/12"
            >
              <p class="text-end arb">: عنوان المنزل ورقم التلفون</p>
            </div>
          </div>
          <div class="border-b border-black flex" >
            <div  class="border-r border-black basis-2/12">
              <p class="text-lg w-full">
                Business Address and <br /> Telephone No :
              </p>
            </div>
            <div class="border-r border-black basis-8/12">
              <p class="text-xl text-center uppercase font-bold">
                {{$agency[0]->licence_name}} Rl - {{$agency[0]->rl_no}}
                <br />
                <span class="font-semibold text-lg">
                    {{$agency[0]->office_address}}
                </span>
              </p>
            </div>
            <div
              
              class="flex text-lg font-semibold text-end border-black basis-2/12 arb"
            >
              عنوان الشركة (المؤسسة)رقم التلفون
            </div>
          </div>
          <div class="border-b border-black flex">
            <div  class=" border-black flex items-center pr-1 basis-2/12">
              <p class="text-lg w-full">Purpose of Travel</p>
            </div>
            <div  class="border-r border-black flex basis-8/12">
              <div class=" border-l border-black flex justify-center items-center flex-col w-[100px] mr-3 p-">
                <p class="arb">عمل</p>
                <span>
                  Work <span class="text-xl">&#10003;</span>
                </span>
              </div>
              <div class="border-l border-black flex justify-center items-center flex-col w-[100px] mr-3">
                <p class="arb">مرور</p>Transit
              </div>
              <div class="border-l border-black flex justify-center items-center flex-col w-[100px] mr-3">
                <p class="arb">زيارة</p>Visit
              </div>
              <div class=" border-l border-black flex justify-center items-center flex-col w-[100px] mr-3">
                <p class="arb">عمرة</p>Umrah
              </div>
              <div class="border-l border-black flex justify-center items-center flex-col w-[100px] mr-3">
                <p class="arb">للاقامة</p>Residence
              </div>
              <div class="border-l border-black flex justify-center items-center flex-col w-[100px] mr-3">
                <p class="arb">حج</p>Hajj
              </div>
              <div class=" border-l border-black flex justify-center items-center flex-col w-[100px] mr-3">
                <p class="arb">دبلوماسية</p>Diplomacy
              </div>
            </div>
            <div
              
              class="flex text-lg font-semibold text-end justify-end border-black arb basis-2/12"
            >
              : الغرض من السفر
            </div>
          </div>
          <div class=" border-black flex">
            <div  class="border-r border-black flex justify-between basis-3/12 ">
              <!-- <p class="text-lg w-full flex justify-between"> -->
                <p>Place of Issue:</p> <p class="pr-1 arb">: محل الاصدار</p>
              <!-- </p> -->
            </div>
            <div  class="border-r border-black flex justify-between basis-3/12">
              <p class="text-lg  pr-1 flex justify-between">
                <p> Date of Issue:</p>
                <p class="arb">: تاريخ الاصدار</p>
              </p>
            </div>
            <div
             
              class="flex text-lg text-end  border-r border-black basis-4/12"
            >
              <p class="flex text-md justify-between">
                <p class="pl-1">Date of Expiry</p>
                <p class="pl-7 arb">: تاريخ انتهاء صلاحية الجواز</p>
              </p>
            </div>
            <div class=" border-black basis-3/12 flex justify-between pl-1">
              <!-- <p class="text-lg pl-2 w-full flex justify-between"> -->
               <p>Passport No: </p> <p class="arb">: رقم الجواز </p>
              <!-- </p> -->
            </div>
          </div>
          <div class="border-b border-black flex">
            <div class="border-r border-black flex basis-3/12">
              <p class="text-lg text-center w-full font-semibold py-1">
                DHAKA
              </p>
            </div>
            <div class="border-r border-black basis-3/12">
              <p class="text-2xl font-bold text-center  py-1" contentEditable="true">
                <?php
                $inputDate = $candidates[0]->passport_issue_date;

                // Convert the date format
                $formattedDate = date('d-m-Y', strtotime($inputDate));

                // Output the formatted date
                echo $formattedDate;
                ?>
              </p>
            </div>
            <div
              
              class="flex text-2xl font-bold   border-r border-black basis-4/12"
            >
              <p class="ml-[5rem]  py-1" contentEditable="true">
                <?php
                $inputDate = $candidates[0]->passport_expire_date;

                // Convert the date format
                $formattedDate = date('d-m-Y', strtotime($inputDate));

                // Output the formatted date
                echo $formattedDate;
                ?>
              </p>
            </div>
            <div  class="border-black basis-3/12">
              <p class="text-2xl font-bold w-full py-1 text-center">
                {{$candidates[0]->passport_number}}
              </p>
            </div>
          </div>
          <div class="border-b border-black flex">
            <div  class="border-r border-black basis-4/12">
              <p class="text-lg w-full">
                Duration of stay in the Kingdom: <span className="font-semibold">02 Years</span>
              </p>
            </div>
            <div  class="border-r border-black basis-4/12">
              <p class="text-lg pl-2"> Date of Arrival:</p>
            </div>
            <div  class="flex text-lg text-end border-black basis-4/12">
              <p class="pl-2"> Date of Departure : </p>
            </div>
          </div>
          <div class=" border-black text-xl flex w-full " >
            <div  class="border-r border-black basis-3/12">
              <p class="w-full text-xl arb"> تاريخ :</p>
            </div>
  
            <div  class="flex pl-2 text-lg text-end border-black arb basis-2/12">
             
              : ( ) ايصال رقم
            </div>
            <div  class="flex text-lg text-end border-black arb basis-2/12">
              
              : ( ) ايصال رقم
            </div>
            <div  class="flex text-lg text-end border-black arb basis-2/12">
              
              : بشيك رقم
            </div>
            <div  class="flex text-lg text-end border-black arb basis-2/12">
           
              : ( ) نقدم
            </div>
            <div  class="flex text-lg text-end border-black arb basis-2/12">
            
              : ( ) مجانا
            </div>
            <div class="flex text-lg text-end border-black arb basis-2/12">
          
              : طريقة الدفع
            </div>
          </div>
          <div class="border-b text-xl border-black flex">
            <div  class="border-r border-black basis-3/12">
              <p class="text-lg w-full"> Mode of Payment:</p>
            </div>
  
            <div class="basis-2/12 flex text-xl pl-2 text-end border-black">
              Free:
            </div>
            <div class="basis-2/12 flex text-xl text-end border-black">
             
              Cash:
            </div>
            <div class="basis-2/12 flex text-xl text-end border-black">
           
              Cheque No:
            </div>
            <div class="basis-2/12 flex text-xl text-end border-black">
         
              Date:
            </div>
            <div class="basis-2/12 flex text-xl text-end border-black">
              
              No:
            </div>
            <div class="basis-2/12 flex text-xl text-end border-black">
            
              Date:
            </div>
          </div>
          <div class="flex">
            <div  class="flex text-xl  text-end border-black arb basis-6/12">
              صلته :
            </div>
            <div class="flex text-xl text-end border-black arb basis-6/12">
           
              : اسم المحرم
            </div>
          </div>
          <div class="border-b border-black flex">
            <div class="flex text-xl  text-end border-black basis-6/12">
              Relationship:  <span class="font-semibold pl-12">EMPLOYER AND EMPLOYEE</span>
            </div>
            <div class="flex text-xl text-end border-black basis-6/12">
             
              Name of Mahram:
            </div>
          </div>
          <div class="border-b border-black text-xl flex">
            <div  class="flex text-xl  text-end border-black basis-2/12">
              Destination :
            </div>
            <div  class="flex text-xl font-bold text-end border-black basis-2/12">
              K.S.A
            </div>
            <div class="flex text-xl text-end border-black basis-2/12 arb">
              : جهة الوصول بالم
            </div>
            <div  class="flex text-xl text-end border-black basis-3/12">
              
              Carriers:
            </div>
            <div class="text-end text-xl border-black basis-3/12">
           
              <p class="text-end arb">: اسم الشركة النافلة </p>
            </div>
          </div>
          <div class="border-b border-black pb-1 text-xl flex justify-between"
         
        >
          <div class="text-xl border-black basis-6/12">
            Dependents traveling in the same passport :
          </div>
          <div
            class="text-end text-xl border-black w-full justify-start arb basis-6/12"
          >
            : ايضاحات تخص افراد العائلة ( المضافين) علي نفس جواز السفر
          </div>
        </div>
        <div class="border-b border-black flex">
            <div class="border-r border-black flex justify-between basis-3/12">
              <p class="text-xl ">
                
                Relationship : </p><p class="pr-1 arb">:نوع الصلة</p>
             
            </div>
            <div class="border-r flex justify-between border-black basis-3/12">
              
                <p class="pl-1"> Date of Birth :</p>
                <p class="pr-1 arb"> :تاريخ الميلاد</p>
            
            </div>
            <div class="text-xl text-end flex justify-between border-r border-black basis-3/12">
              
                <p class="pl-1">Sex :</p>
                <p class="pr-1 arb" >: الجنس </p>
            
            </div>
            <div class=" border-black flex justify-between basis-3/12">
              
                <p class="pl-1 " > Full Name :</p>
                <p class="pr-1 arb">: الاسم بالكامل</p>
              
            </div>
          </div>
      
        <div class="border-b border-black flex">
          <div  class="border-r border-black flex h-[25px] basis-3/12">
            <p class="text-lg w-full" ></p>
          </div>
          <div class="border-r border-black h-[25px] basis-3/12">
            <p class="text-xl font-semibold"> </p>
          </div>
          <div
            
            class="flex text-xl font-semibold text-end  border-r border-black basis-3/12"
          >
            <p></p>
          </div>
          <div class=" border-black basis-3/12">
            <p class="text-xl font-semibold w-full" ></p>
          </div>
        </div>
        <div class="border-b border-black flex">
          <div class="border-r border-black flex h-[25px] basis-3/12">
            <p class="text-xl w-full" ></p>
          </div>
          <div class="border-r border-black basis-3/12">
            <p class="text-xl font-semibold" ></p>
          </div>
          <div
           
            class="flex text-xl font-semibold text-end  border-r border-black basis-3/12"
          >
            <p ></p>
          </div>
          <div class=" border-black basis-3/12">
            <p class="text-xl font-semibold w-full" ></p>
          </div>
        </div>
        <div class="border-b border-black flex" >
          <div  class="border-r border-black flex h-[25px] basis-3/12">
            <p class="text-xl w-full"></p>
          </div>
          <div class="border-r border-black basis-3/12">
            <p class="text-xl font-semibold" ></p>
          </div>
          <div
            
            class="flex text-xl font-semibold text-end  border-r border-black basis-3/12">
            <p ></p>
          </div>
          <div class="basis-3/12">
            <p class="text-xl font-semibold w-full"></p>
          </div>
        </div>
        <div class="border-b border-black flex" >
          <div class="border-r basis-3/12 border-black flex h-[25px]">
            <p class="text-xl w-full"></p>
          </div>
          <div class="basis-3/12 border-r border-black">
            <p class="text-xl font-semibold" ></p>
          </div>
          <div
            
            class="flex text-xl font-semibold text-end  border-r border-black basis-3/12"
          >
            <p ></p>
          </div>
          <div class=" basis-3/12">
            <p class="text-xl font-semibold w-full " ></p>
          </div>
        </div>
        <div class="border-b border-black flex justify-between">
            <div class="text-xl border-black basis-7/12">
              Name and address of company or individual in the kingdom :
            </div>
            <div class=" text-xl  text-end border-black w-full basis-5/12 arb">
              : اسم و عنوان الشركة أو اسم الشخص و عنوانه بالمملكة
            </div>
          </div>
          <div class="border-b border-black flex justify-between">
            <div class="text-xl border-black basis-7/12">
              <b>{{$candidates[0]->spon_name_english}}</b>
            </div>
          </div>
          <div class="border-b border-black pb-1 flex" >
            <div class="flex text-xl border-black basis-8/12">
              I under signed hereby that all the information I have provided are
              correct
              <br />I will abide by laws of the kingdom during the period of my
              residence in it
            </div>
            <div
              
              class="flex text-[16px] text-end border-black w-full justify-end arb basis-4/12"
            >
              أنا الموقع أدناه أقربان كل المعلومات التي درنتها صحيحة <br />و ساكون
              ملنزما بقرانين المملكة اثناء فترة وجودي بها
            </div>
          </div>
          <div class="mb-3 border-black pb-1 flex">
            <div class="flex text-end text-[16px] border-black basis-3/12">
              Date : <span class="arb">التاريخ</span>
            </div>
            <div  class="flex text-[16px] text-end border-black basis-4/12">
              Signature :<span class="arb"> التوقيع </span>
            </div>
            <div
              
              class="flex text-[16px] text-end border-black w-full justify-start basis-5/12"
            >
              Name:
              <span class="mx-auto font-bold text-xl">
                {{$candidates[0]->name}}
              </span>
              : الاسم
            </div>
          </div>
          <div class=" border-black mx-auto  flex justify-between">
            <div  class="basis-6/12 text-xl font-semibold border-black">
              For Official use only :
            </div>
            <div
             
              class="basis-6/12 text-xl font-semibold text-end border-black w-full arb"
            >
             
              :للاستعمال الرسمي فقط
            </div>
          </div>
          <div class="border-b border-t border-black flex" >
            <div  class="border-r border-black flex justify-between basis-5/12">
              <p class="text-xl"> Date :</p>
           
              <p class="text-xl font-bold pl-2">
                {{$candidates[0]->visa_date2}}
              </p>
              <p class="mr-3 arb">: التاريخ </p>
            </div>
            <div
              class="flex text-xl pl-1 text-end  border-black basis-1/12"
            >
              <p class="flex justify-between">
                Authorization:
              </p>
            </div>
            <div class=" border-black basis-2/12">
              <p class="text-2xl text-center font-semibold ">
              
              </p>
            </div>
            <div class="basis-4/12">
              <p class="text-xl w-full text-end arb">
                : رقم الامر المعتمد عليه في أعطاء التاشيرة
              </p>
            </div>
          </div>
          <div class="border-black border-b flex">
            <div class="flex text-xl text-end border-black basis-2/12">
              Visit/Work :
            </div>
            <div
              
              class=" basis-8/12 text-2xl font-bold text-end border-black "
            >
              <p class="text-end px-1 arb pr-2">
                {{$candidates[0]->spon_name_arabic}}
              </p>
            </div>
            <div class="basis-2/12  text-xl  text-end arb">
            
              : لزيارة /العمل لدي
            </div>
          </div>
          <div class=" border-black border-b flex">
            <div
              
              class="flex text-xl font-semibold border-black text-center justify-between border-r basis-6/12"
            >
              <p>Date :</p>
  
              <p class="mr-5 arb">:التاريخ </p>
            </div>
            <div
              class="flex text-xl font-semibold text-end border-black w-full justify-between pl-3 basis-6/12"
            >
              Visa No : <p class="font-bold text-xl mr-10" >{{$candidates[0]->visa_no}}</p>
              <p class="arb"> :أشربرقم</p>
            </div>
          </div>
          <div  class="border-black border-b flex">
            <div
              
              class="flex text-xl font-semibold text-end border-black border-r justify-between basis-4/12"
            >
              <p>Fee Collected :</p>
              <p class="mr-5 arb">:المبلغ المحصل </p>
            </div>
            <div
              class="flex text-xl font-semibold text-end border-black border-r justify-between basis-4/12"
            >
              <p class="pl-1">Type :</p>
              
              <p class="mr-5 arb">:نوعها</p>
            </div>
            <div
              class="flex text-xl font-semibold text-end border-black justify-between basis-4/12"
            >
              <p class="pl-1">Duration :</p>
              <p class="arb">: مدتها</p>
            </div>
          </div>
          <div  class=""><div class="border-black mt-[30px] flex">
            <div class="flex text-xl font-semibold basis-3/12  flex-col">
              <p class="arb">رئيس القسم القنصلي</p>
              <p class="mr-5">Head of consular Section</p>
            </div>
            <div class="flex text-xl flex-col justify-center text-end basis-6/12">
              <div class="flex justify-center">
              <p class="mb-4 ml-4 font-semibold">
                {{$candidates[0]->spon_id}}
              </p>
              <p class="mb-4 ml-14 arb">رقم الكفيل</p>
            </div>
              <span class="flex justify-center">
               
                <svg id="passport_no" class="h-[110px] w-[340px]"></svg>
              </span>
            </div>
            <div
              
              class="flex text-xl font-semibold text-end  flex-col basis-3/12">
              <p class="arb"> مدقق البيانات </p>
              <p class="">Cheeked by</p>
            </div>
          </div>
           
          </div>
       
          
          
          
  
  
        
    </div>
     <!-- ksa 1st page design ends-->

     
     
     <!-- ksa 2nd page design starts -->
    
     <div class=" w-[1050px] bg-white p-5 text-2xl pl-[50px] m-5 py-[10rem] mx-auto">
     
     
        <p class="mb-10 pt-[120px]">
            TO
            <br />
            THE CHIEF OF CONSULATE SECTION
            <br />
            THE ROYEL EMBASSY OF SAUDI ARABIA
            <br />
            GULSHAN, DHAKA, BANGLADESH
            <br />
            <br />
            EXCELLENCY,
            <br />
            <br />
             WITH DUE RESPECT WE ARE SUBMITTING ONE PASSPORT FOR WORK
            VISA WITH ALL NECESSARY DOCUMENTS AND PARTICULARS MENTIONED AS BELOW ,
            KNOWING ALL INSTRUCTION AND REGULATION OF THE CONSULATE SECTION:
          </p>
          <ol class=" ">
            <li class=" flex p-1 bordered ">
              <h2 class="w-[30rem]">
                1. NAME OF THE EMPLOYMENT IN SAUDIA ARABIA
              </h2>
              :
              <span class="font-bold pl-2">
                {{$candidates[0]->spon_name_arabic}}
              </span>
            </li>
            <li class=" flex p-1 bordered ">
              <h2 class="w-[30rem]">2. VISA NUMBER & DATE </h2>:
              <span class="font-bold pl-2">
                {{$candidates[0]->visa_no}} DATE- {{$candidates[0]->visa_date2}}
               
              </span>
            </li>
            <li class=" flex p-1 bordered ">
              <h2 class="w-[30rem]">3. FULL NAME OF THE EMPLOYEE </h2>:
              <span class="font-bold pl-2">
                {{$candidates[0]->name}}
              </span>
            </li>
            <li class=" flex p-1 bordered ">
              <h2 class="w-[30rem]">4. PASSPORT NO. WITH DATE </h2>:
              <span class="font-bold pl-2">
                {{$candidates[0]->passport_number}} DATE   <?php
                $inputDate = $candidates[0]->passport_issue_date;

                // Convert the date format
                $formattedDate = date('d-m-Y', strtotime($inputDate));

                // Output the formatted date
                echo $formattedDate;
                ?>
              </span>
            </li>
            <li class=" flex p-1 bordered ">
              <h2 class="w-[30rem]">5. PROFESSION </h2>:
              <span class="font-bold pl-2">
                {{$candidates[0]->prof_name_arabic}}
              </span>
            </li>
            <li class=" flex p-1 bordered ">
              <h2 class="w-[30rem]">6. RELIGION </h2>:
              <span class="font-bold pl-2">{{$candidates[0]->religion}}</span>
            </li>
          </ol>
          <br />
          <p>
            I DO HEREBY CONFIRM AND DECLARE THAT THE RIGION STATED IN THE VISA FROM
            AND FORWARDING LETTER IS FULLY CORRECT. I ALSO UNDER TAKE WITH MY OWN
            RESPONSIBILITY TO CANCEL THE VISA AND TO STOP FUNCTIONING WITH MY
            OFFICE,IF THE STATEMENT IS FOUND INCORRECT.
          </p>
          <br />
          <p class="mb-[100px] ">
            WE THEREFORE, REQUEST YOUR EXELLENCY TO KINDLY ISSUE WORK VISA OUT OF
            <span contenteditable="true">1</span> VISAS AND OBLIGE THERE BY.
          </p>
          <div class=" w-[1000px] uppercase mx-auto ">
            
            <p>YOUR FAITHFULLY</p>
            <p>{{$agency[0]->licence_name}} Rl - {{$agency[0]->rl_no}}</p>
          </div>
     </div>

     <!-- ksa 2nd page design ends -->



     <!-- ksa 3rd page design Starts-->
     <div class="w-[1050px] bg-white pt-[50px] pb-[20px] mx-auto">
        <h1 class="font-bold text-4xl text-center underline underline-offset-8 py-10">
          EMPLOYMENT AGREEMENT
        </h1>
        <div class="px-[20px] flex flex-wrap mx-auto w-[800px] my-[10px]">
        
          <div  class="basis-6/12 flex text-2xl font-semibold p-1">
            
            First Party
          </div>
          <div class="basis-6/12 flex text-2xl font-semibold p-1">
           : {{$candidates[0]->spon_name_english}}
          </div>
       
          @php
            // dd($candidates[0])
          @endphp
          <div class="basis-6/12 flex text-2xl font-semibold p-1">
            Second Party
          </div>
          <div class="basis-6/12 flex text-2xl font-semibold p-1 uppercase">
           : {{$candidates[0]->name}}
         
        </div>
          <div class="basis-6/12 flex text-2xl font-semibold p-1">
            Passport No
          </div>
          <div class="basis-6/12 flex text-2xl font-semibold p-1 uppercase">
           : {{$candidates[0]->passport_number}}
          </div>
          <div class="basis-6/12 flex text-2xl font-semibold p-1">
            Profession
          </div>
          <div class="basis-6/12 flex text-2xl font-semibold p-1 uppercase">
          : {{$candidates[0]->prof_name_english}}
          </div>
          <div class="basis-6/12 flex text-2xl font-semibold p-1">
            Nationality
          </div>
          <div class="basis-6/12 flex text-2xl font-semibold p-1">
            : BANGLADESHI
          </div>
        </div>
        <ul class="px-[20px] mx-auto w-[900px] mt-[20px]">
          <li class="text-xl py-3">
            1. The 2nd party is employed by the first party as
            <strong class="text-2xl uppercase">
                {{$candidates[0]->prof_name_english}}
            </strong>
            with a monthly salary
            <strong contentEditable="true">
              SR{{$candidates[0]->salary}}
            </strong> 
            payable by the end of each month
          </li>
          <hr/>
          <li class="text-xl py-3">
            2. The 2nd party committed himself to tender his service within the
            kingdom country of the first party
          </li>
          <hr/>
          <li class="text-xl py-3">
            3. The 1st party provided free food, free residence, free medical
            assistance and insurance benefited etc. to the 2nd party.
          </li>
          <hr/>
          <li class="text-xl py-3">
            4. The 2nd party is subject to their months as probationary partied
            and the 1st party will have right to terminate his service without
            prior notice or compensation if he is found unfit for the job.
          </li>
          <hr/>
          <li class="text-xl py-3">
            5. The daily working our will be 8 (eight) ours and weekly 48&ldquo;
            (forty eight) ours. any extra ours the employee will be paid on
            overtime basis.
          </li>
          <hr/>
          <li class="text-xl py-3">
            6. In case 2nd party desires to go back to his country before the
            expiry of his agreement then the can&apos;t do so at his own expenses
            the consent of the 1st party.
          </li>
          <hr/>
          <li class="text-xl py-3">
            7. The 2nd party will bear the his joining air ticket and the 1st
            party will provide return ticket to the 2nd party.
          </li>
          <hr/>
          <li class="text-xl py-3">
            8. The 2nd party is entitled for 30 (thirty) days prepaid annual
            leave.
          </li>
          <hr/>
          <li class="text-xl py-3">
            9. The duration of his contact is 2 (two) years renewable on both
            parties consent.
          </li>
          <hr/>
          <li class="text-xl py-3">
            10. All other terms and conditions which are not mentioned here will
            be subject to saudi labour laws.
          </li>
          <hr/>
          <li class="text-xl py-3">
            11. The agreement is approved by the parties.
          </li>
          <hr/>
        </ul>
        <div class="px-[20px] mx-auto w-[900px] mt-[120px] flex justify-between text-xl font-bold ">
          <p class="border-t-2  border-black">
            Signature for the 1st party
          </p>
          <p class="border-t-2 border-black">
            Signature for the 2nd party
          </p>
        </div>
      </div>
     <!-- ksa 3rd page design ends-->



     <!-- ksa 4th page design starts-->

     <div class="flex justify-center flex-col bg-white items-center py-[200px]">
        <p class="text-center text-4xl font-semibold pt-[30px] arb">
          إرفاق الجدول التالي في كل معاملة
        </p>
  
        <table class="mx-[20px] my-4">
          <thead>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:py-1 text-base font-semibold text-center">
              <td>
                <p class="text-xl font-bold flex text-center flex-col px-3">
                  Remarks<span class="arb"> الملاحظات </span>
                </p>
              </td>
              <td>
                <p class="text-xl font-bold flex text-center flex-col px-3">
                  Executor<span class="arb"> المنفذ </span>
                </p>
              </td>
              <td>
                <p class="text-xl font-bold flex text-center flex-col bg-white px-2 ">
                  Agency<span class="arb"> المكتب </span>
                </p>
              </td>
              <td>
                <p class="text-xl font-bold flex text-center flex-col bg-white px-2">
                  Procedure<span class="arb"> الإجراء </span>
                </p>
              </td>
            </tr>
          </thead>
          <tbody>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p-2 text-base text-center relative group">
              <td class="uppercase"></td>
              <td class="uppercase"></td>
              <td class="uppercase font-bold text-xl ">
                {{$candidates[0]->mofa_no}}
              </td>
              <td class=" font-bold text-xl text-end">Mofa No./<span class="arb"> رقم إنجاز  </span></td>
            </tr>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p-2 text-base text-center relative group">
              <td class="uppercase"></td>
              <td class="uppercase"></td>
              <td class="uppercase font-bold text-xl">
                {{$candidates[0]->visa_no}}
              </td>
              <td class=" font-bold text-xl text-end">
                
                Visa No./ <span class="arb">رقم المستند
                </span></td>
            </tr>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p-2 text-base text-center relative group">
              <td class="uppercase"></td>
              <td class="uppercase"></td>
              <td class="uppercase font-bold text-xl">{{$candidates[0]->name}}</td>
              <td class=" font-bold text-xl text-end">
                
                Passport Name/ <span class="arb">  الاسم في الجواز
                </span></td>
            </tr>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p-2 text-base text-center relative group">
              <td class="uppercase"></td>
              <td class="uppercase"></td>
              <td class="uppercase font-bold text-xl">
                {{$candidates[0]->passport_number}}
              </td>
              <td class=" font-bold text-xl text-end">
              
                Passport No/ <span class="arb">رقم الجواز
                </span> </td>
            </tr>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p-2 text-base text-center relative group">
              <td class="uppercase"></td>
              <td class="uppercase"></td>
              <td class="uppercase font-bold text-xl">
                  <?php
                  $inputDate = $candidates[0]->passport_expire_date;

                  // Convert the date format
                  $formattedDate = date('d-m-Y', strtotime($inputDate));

                  // Output the formatted date
                  echo $formattedDate;
                  ?>
              </td>
              <td class=" font-bold text-xl text-end">
                
                Passport Validity/ <span class="arb">صلاحية الجواز
                </span></td>
            </tr>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p-2 text-base text-center relative group">
              <td class="uppercase"></td>
              <td class="uppercase"></td>
              <td class="uppercase font-bold text-xl">
                <p>
                  <?php
                  $inputDate = $candidates[0]->date_of_birth;

                  // Convert the date format
                  $formattedDate = date('d-m-Y', strtotime($inputDate));

                  // Output the formatted date
                  echo $formattedDate;
                  ?>
                  <br />
                  @php echo $age; @endphp
                </p>
              </td>
              <td class=" font-bold text-xl text-end"> Age/ <span class="arb">العمر </span></td>
            </tr>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p-2 text-base text-center relative group">
              <td class="uppercase"></td>
              <td class="uppercase"></td>
              <td class="uppercase font-bold text-xl">{{$candidates[0]->gender}}</td>
              <td class=" font-bold text-xl text-end"> Sex/ <span class="arb">الجنس </span></td>
            </tr>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p-2 text-base text-center relative group">
              <td class="uppercase"></td>
              <td class="uppercase"></td>
              <td class="uppercase font-bold text-xl">
                {{$candidates[0]->musaned_no}}
              </td>
              <td class=" font-bold text-xl text-end"> Musaned/<span class="arb"> مساند </span></td>
            </tr>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p-2 text-base text-center relative group">
              <td class="uppercase"></td>
              <td class="uppercase"></td>
              <td class="uppercase font-bold text-xl">
                {{$candidates[0]->okala_no}}
              </td>
              <td class=" font-bold text-xl text-end">Wakala/<span class="arb">  الوكالة </span></td>
            </tr>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p-2 text-base text-center relative group">
              <td class="uppercase"></td>
              <td class="uppercase"></td>
              <td class=" font-bold text-xl" contentEditable="true">{{$candidates[0]->medical_center}}  <p><?php
                $inputDate = $candidates[0]->medical_issue_date;
                
                // Check if $inputDate is not null
                if ($inputDate !== null) {
                    // Convert the date format
                    $formattedDate = date('d-m-Y', strtotime($inputDate));
                
                    // Output the formatted date
                    echo 'Issue Date:'. $formattedDate;
                } else {
                    // If $inputDate is null, return an empty string
                    echo '';
                }
                ?></p><p><?php
                        $inputDate = $candidates[0]->medical_expire_date;
                        
                        // Check if $inputDate is not null
                        if ($inputDate !== null) {
                            // Convert the date format
                            $formattedDate = date('d-m-Y', strtotime($inputDate));
                        
                            // Output the formatted date
                            echo 'Expire Date:' . $formattedDate;
                        } else {
                            // If $inputDate is null, return an empty string
                            echo '';
                        }
                        ?></td>
              <td class=" font-bold text-xl text-end"> Medical/ <span class="arb">المديكل </span></td>
            </tr>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p-2 text-base text-center relative group">
              <td class="uppercase"></td>
              <td class="uppercase"></td>
              <td class="uppercase font-bold text-xl">
                {{$candidates[0]->police}}
              </td>
              <td class=" font-bold text-xl text-end">
             
                Police Clearance/<span class="arb">ورقة الشرطة
                </span></td>
            </tr>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p-2 text-base text-center relative group">
              <td class="uppercase"></td>
              <td class="uppercase"></td>
              <td class="uppercase font-bold text-xl" contentEditable="true">
                {{$candidates[0]->driving_licence}}
              </td>
              <td class=" font-bold text-xl text-end">Driving License/<span class="arb">الرخصة </span></td>
            </tr>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p-2 text-base text-center relative group">
              <td class="uppercase"></td>
              <td class="uppercase"></td>
              <td class="uppercase font-bold text-xl arb" contentEditable="true">
                {{$candidates[0]->prof_name_english}}
              </td>
              <td class=" font-bold text-xl text-end"> Profession/<span class="arb">المهنة </span></td>
            </tr>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p-2 text-base text-center relative group">
              <td class="uppercase"></td>
              <td class="uppercase"></td>
              <td class="uppercase font-bold text-xl ">N/A</td>
              <td class="font-bold text-xl text-end">
             
                Certificate & Experience <br /> /<span class="arb"> المؤهل وشهادة الخبرة
                </span></td>
            </tr>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p-2 text-base text-center relative group">
              <td class="uppercase"></td>
              <td class="uppercase"></td>
              <td class="uppercase font-bold text-xl">Yes</td>
              <td class=" font-bold text-xl text-end"> Finger/<span class="arb"> البصمة </span></td>
            </tr>
          </tbody>
        </table>
        <div class="flex justify-end items-end pt-1 px-5 flex-col mx-auto w-[770px] text-2xl leading-8">
          <h2>
            <span class="uppercase font-bold"> {{$agency[0]->licence_name}} </span>:
            <span class="arb">  اسم المكتب
          </span></h2>
          <h2>
            
          <span class="font-bold">   {{$agency[0]->rl_no}} </span><span class="arb"> :رقم الرخصة</span>
          </h2>
          <h2 class="arb"> : التوقيع </h2>
          <h2 class="arb"> : الختم </h2>
        </div>
      </div>
     <!-- ksa 4th page design ends-->


    <script src="js/index.js"></script>
    @include('layout.script');
   <script>
        JsBarcode("#barcode1", "{{$candidates[0]->visa_no}}", {
            fontSize:25,
            height:50,
            width:3,
            format: "CODE128",
            textMargin:1,
            text:"Visa No: {{$candidates[0]->visa_no}}",
        });;
        JsBarcode("#passport_no", "{{$candidates[0]->passport_number}}", {
            fontSize:20,
            width: 3,
            height: 50,
            format: "CODE128",
            textMargin:1,
            text:"Passport No: {{$candidates[0]->passport_number}}"
        });;
    </script>
</body>
</html>


