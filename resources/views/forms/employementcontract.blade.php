<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
</head>
<body>
    @include('layout.navbar')

    <div class="container">
        <div class="d-flex max-w-[1050px] mx-auto mt-2 bg-gray-200 rounded-lg px-2 py-1 items-center"
            style="justify-content: space-between;">
            <div class="flex items-center gap-3">
                <div>
                    <label for="pass" class="form-label">Select by passport number/Name</label>
                    <input list="candidates" name="candidate" id="candidate" class="form-control" onchange="getdata()">
                    <input list="candidates" name="cancelInput" id="cancelInput" class="form-control hidden"
                        onchange="getCanceldata()">
                </div>
              
            </div>
    
    
            <datalist id="candidates">
                @foreach ($candidates as $candidate)
                    <option value="{{ $candidate->candidate_id }}">
                        <b class="text-danger">Passport no: {{ $candidate->passport_number }},</b>
                        Candidate Name: {{ $candidate->name }}
                    </option>
                @endforeach
            </datalist>
    
    
            <button class="btn btn-primary" onclick="printtable()">Print</button>
        </div>
    </div>

    <div class="container" >
        <div class="pt-[10rem] px-[3rem] bg-white">
        <div class="flex flex-row gap-7" id="printable-section">
          <div class="basis-1/2 ">
            <h1 class="text-2xl underline">Employment Contract</h1>
            <p class="pt-2 flex items-center ">
              <span class="text-xl font-semibold basis-1/4">1st Party</span>
              <span class="text-[18px] font-semibold basis-3/4">
                : <span  id="first-party"></span>
              </span>
            </p>
            <p class="pt-2 flex items-center ">
              <span class="text-xl font-semibold basis-1/4">2nd Party</span>
              <span class="text-[18px] basis-3/4 font-semibold">
                : <span  id="second-party"></span>
              </span>
            </p>
            <p class="pt-2 flex items-center gap-6">
              <span class="text-xl font-semibold">Passport No</span>
              <span class="text-[22px] font-semibold">
                : <span  id="passport_no"></span>
              </span>
            </p>
            <p class="pt-2 flex items-center gap-6">
              <span class="text-xl font-semibold">Profession</span>
              <span class="text-[22px] font-semibold">
                : <span  id="profession"></span>
              </span>
            </p>
            <p class="pt-2 flex items-center gap-6">
              <span class="text-xl font-semibold">Nationality</span>
              <span class="text-[20px] font-semibold">: BANGLADESHI</span>
            </p>
            <p class="font-semibold text-xl pt-3">
              1. That the 1st party shall pay to the 2nd party a monthly salary
              of SR. <span contentEditable="true">1200</span>
            </p>
            <p class="font-semibold text-xl pt-3">
              2. The 1st party should provide 2nd party free medical,
              foodingfacilities during the period of contract in the kingdom of
              Saudi Arabia.
            </p>
            <p class="font-semibold text-xl pt-3">
              3. That the 1st party shall provide free transportation from
              resident to the worksite.
            </p>
            <p class="font-semibold text-xl pt-3">
              4. The period of contract is two years.
            </p>
            <p class="font-semibold text-xl pt-3">
              5. That the 1st party shall bear the Air passage cost from Dhaka
              to KSA and back to Dhaka for joining the service and the return
              ticket would provide after completion of this agreement.
            </p>
            <p class="font-semibold text-xl pt-3">
              6. Daily working hours shall be eight hours.
            </p>
            <p class="font-semibold text-xl pt-3">
              7. That this agreement shall come in effect from the date of
              arrival of the 2nd party in the KSA.
            </p>
            <p class="font-semibold text-xl pt-3">
              8. That the 2nd party should undertake to abide by the instruction
              and rules enforced in the kingdom of Saudi Arabia.
            </p>
            <p class="font-semibold text-xl pt-3">
              9. That the any other terms and conditions not mentioned in the
              demand letter shall be following as per Saudi Labour Laws.
            </p>
            <p class="leading-10 text-xl pt-2">
              Signature of the 1st party
              <br /> Name:………………………… <br />
              Sign:……………………………
              <br />
              Signature of the 2nd party
              <br /> Name:………………………….
              <br /> Sign:………………………
              <br />
            </p>
          </div>
          <div class="basis-1/2 text-end">
            <h1 class="text-2xl underline">: عقد العمل </h1>
            <p class="font-bold text-lg pt-2">: الطرف الاول </p>
            <p class="font-bold text-lg pt-2">: الطرف الثاني </p>
            <p class="font-bold text-lg pt-2">: جواز السفر رقم </p>
            <p class="font-bold text-lg pt-2">: لمهنة </p>
            <p class="font-bold text-lg pt-2">: الجنسية : بنغلادشي </p>
            <p class="font-bold text-lg pt-3">
              ان الطرف الاول يدفع للطرف الثاني راتب شهري ريال سعودي بالاضافة حسب
              القنون العامل المملكة العربية السعودية –
            </p>
            <p class="font-bold text-lg pt-3">
              يلتزم الطرف الاوال الطب والسكن و الطعام للطرف الثاني مجانا خلال
              مدة المملكة العربية السعودية-
            </p>
            <p class="font-bold text-lg pt-3">
              يلتزم الطرف الاول النقل للطرف الثاني من السكن الي محل العمل مجانا-
            </p>
            <p class="font-bold text-lg pt-3"> ان مدة العقدسنتان - </p>
            <p class="font-bold text-lg pt-3">
              حيث ان الطرف الاول يلتزم لتذكرة الخطرط الجوية للطرف الثاني من دكا
              الى المملكة لمباشرة العمل و تذكرة العودة الى بعد انتهاء مدة هذه
              العقد-
            </p>

            <p class="font-bold text-lg pt-3">
              
              ساعات العمل يكون ساعات يوميا-
            </p>
            <p class="font-bold text-lg pt-3">
              حيث ان هذا لعقد يعتبر بعد وصول الطرف الثاني في المملكة العربية
              السعودية-
            </p>
            <p class="font-bold text-lg pt-3">
              حيث ان هذا لعقد يعتبر بعد وصول الطرف الثاني في المملكة العربية
              السعودية-
            </p>
            <p class="font-bold text-lg pt-3">
              حيث ان الطرف الثاني ليتبع جميع التعليمات و القرات الساري المفعول
              في المملكة العربية السعودية-
            </p>
            <p class="font-bold text-lg pt-3">
              حيث ان اى شرط لم يذكر في ورقة الطلب يعمل حسب القنون العامل المملكة
              العربية السعودية-
            </p>
            <p class="font-bold text-lg pt-3">توقيع الطرف الاول</p>
            <p class="font-bold text-lg pt-8">توقيع الط</p>
          </div>
        </div>
    </div>
           
       
    
  
    </div>




    @include('layout.script')
  <script>

       
        
        var sl = 1;
        var rowsData = [];


        function getdata() {
            var id = document.getElementById('candidate').value;

            // Define the routes to fetch
            const embassyRoute = '/user/embassy/' + id;
            const manpowerRoute = '/user/manpower/' + id;

            // Fetch both routes concurrently
            Promise.all([
                fetch(embassyRoute, {
                    method: 'GET',
                    headers: { 'Content-Type': 'application/json' }
                }),
                fetch(manpowerRoute, {
                    method: 'GET',
                    headers: { 'Content-Type': 'application/json' }
                })
            ])
            .then(responses => Promise.all(responses.map(response => response.json())))
            .then(data => {
                // Handle the data from both responses
                const embassyData = data[0];
                const manpowerData = data[1];

                 // Merge the two objects
                const mergedData = { ...embassyData[0], ...manpowerData[0] };
                // console.log(mergedData);
                $('#first-party').html(mergedData.spon_name_arabic);
                $('#second-party').html(mergedData.name);
                $('#passport_no').html(mergedData.passport_number);
                $('#profession').html(mergedData.prof_name_arabic);

                // Clear the input field
                document.getElementById('candidate').value = null;

            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        }

      

        function printtable() {
            // Get the content of the printable section
            var printableContent = document.getElementById('printable-section').innerHTML;

            // Create a new window
            var printWindow = window.open('', '', 'width=800,height=600');

            // Write the content to the new window
            printWindow.document.write(`
                <html>
                    <head>
                        <title>Print Table</title>
                        <style>
                            /* Add global styles or link to external CSS */
                           
                            .flex {
                                display: flex;
                            }
                            .flex-row {
                                flex-direction: row;
                            }
                            .gap-7 {
                                gap: 1.75rem; /* Adjust this value based on your original CSS */
                            }
                        </style>
                    </head>
                    <body>
                        <div class="flex flex-row gap-7">
                            ${printableContent}
                        </div>
                    </body>
                </html>
            `);

            // Close the document to finish rendering
            printWindow.document.close();

            // Trigger the print dialog
            printWindow.print();



            // Close the document and trigger print
            printWindow.document.close();
            printWindow.print();
        }

  </script>
</body>
</html>
