<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
</head>
<body>
  @include('layout.navbar')

  <style>
    @font-face {
      font-family: arbFont;
      src: url("path/to/font-file.woff");
    }
    @font-face {
      font-family: "Times New Roman", Times, serif;
      src: url("../asset/css/times new roman.ttf");
    }
    .print {
      font-family: "Times New Roman", Times, serif;
    }
    .arb {
      font-family: arb Arial, sans-serif;
    }
    @media print {
      .noPrint {
        display: none;
      }
    }
  </style>

  <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
  <!-- tailwind css cdn -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      important: true,
      theme: {
        extend: {
          colors: {
            clifford: "#da373d",
          },
          backgroundImage: {
            "hero-pattern": "url('/asset/image/hero1.jpg')",
          },
        },
      },
    };
  </script>

  <div class="container">
    <div class="d-flex  mx-auto mt-2 bg-gray-200 rounded-lg px-2 py-1 items-center"
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

  <div class="container w-max" id="printable-section">
    <div class=" bg-white px-7  pb-10" contentEditable="true">
        <div class="h-[1300px] pt-[360px] relative">
          <p class="text-center text-lg px-7 underline font-bangla">
            নিম্নলিখিত সৌদিআরবগামী <span id="counting"></span> জন কর্মী প্রেরণ সংক্রান্ত
            রিক্রুটিং এজেন্সী সাল্লু এয়ার সার্ভিসেস (আরএল-২০২) এর
            অঙ্গীকারনামা।
          </p>

          <table class="w-full my-2" id="stemp_table">
            <thead>
              <tr class="[&>td]:border [&>td]:border-black font-bangla [&>td]:py-1 text-[12px] text-center">
                <td>ক্র/নং</td>
                <td>কর্মীর নাম</td>
                <td>পাসপোর্ট নম্বর</td>
                <td>ভিসা নম্বর</td>
                <td>নিয়োগকারীর নাম</td>
                <td>পদের নাম</td>
  
                <td>অভিবাসন ব্যয়</td>
              </tr>
            </thead>
            <tbody>
            
            </tbody>
          </table>
  
          <p class="text-[12px] text-justify w-[95%] pl-7 leading-5 font-bangla ">
            আমি {{ $user->licence_name }} (আরএল-{{ $user->rl_no }})
            স্বত্ত্বাধিকারী/ব্যবস্থাপনা অংশীদার /ব্যবস্থাপনা পরিচালক এই মর্মে
            অঙ্গীকার করছি যে, চাকুরীর উদ্দেশ্যে সৌদিআরব গামী দেশের বিভিন্ন
            নিয়োগকর্তার অধীনে বর্ণিত <span id="footer_Dynamic_count"></span> জন কর্মীর একক বহির্গমন ছাড়পত্র
            গ্রহণের নিমিত্তে কর্মীদের ভিসা, চুক্তিপত্রসহ অন্যান্য প্রয়োজনীয়
            কাগজপত্রাদি দাখিল করলাম, যা সঠিক আছে।
          </p>
          <h3 class="text-center text-xl absolute bottom-1 right-7">
            চলমান পাতা - ২
          </h3>
        </div>
        <div class="text-[16px] flex items-center leading-9 h-[1340px] relative">
            <div>
          <h3 class="text-center text-xl">পাতা নং - ২</h3>
          <br />
          <p class="text-justify px-7">
            উপর্যুক্ত কর্মীদের সৌদিআরব বিমানবন্দরে নিয়োগকর্তা বা নিয়োগ কর্তার
            প্রতিনিধি গ্রহণ করবেন এবং বর্ণিত কর্মীগণকে সৌদিআরবগামী দেশে প্রেরণর
            জন্য বহির্গমন ছাড়পত্র গ্রহনের পর উক্ত দেশ ব্যতিত অন্য কোনো দেশে প্রেরন
            করবনা মর্মে অঙ্গীকার করছি। আমি আরও অঙ্গীকার করছি যে, উপযুক্ত কর্মীদের
            ভিসা,নিয়োগপত্র এবং চুক্তিপত্র সঠিক আছে। বিদেশ গমণের পর কোন কারণে
            কর্মীদের বিমানবন্দর হতে নিয়োগকর্তা গ্রহণ না করে অথবা কর্মীদের ভিসা জাল
            বলে প্রমাণিত হয় অথবা অন্য কোনকারণে চাকুরীতে সমস্যার সৃষ্টি হয় তাহলে
            উক্ত কর্মীর/কর্মীদের সকল দায়- দায়িত্ব আমি বা আমার রিক্রুটিং এজেন্সী
            বহন করতে বাধ্য থাকব।
          </p>
          <br />
          <br />
          <h3 class="text-center text-xl absolute bottom-2 right-7">
            চলমান পাতা - ৩
          </h3>
        </div>
        </div>
        <div class="text-[16px] flex items-center leading-9 h-[1340px] relative">
            <div>
          <h3 class="text-center text-xl">পাতা নং - ৩</h3>
          <br />
          <p class="text-[16px] leading-8 ">
            উপর্যুক্ত অঙ্গীকার নামায় বর্ণিত বিষয়ের কোন ব্যত্যয় ঘটলে প্রবাসীকল্যাণ
            ও বৈদেশিক কর্মসংস্থান মন্ত্রণালয় অথবা জনশক্তি কর্মসংস্থান ও
            প্রশিক্ষণব্যুরো আমার বা আমার রিক্রুটিংএজেন্সীর বিরুদ্ধে{" "}
            <span class="font-semibold">
              {" "}
              বৈদেশিক কর্মসংসস্থান ও অভিবাসী আইন-২০১৩
            </span>{" "}
            অনুযায়ী যে কোনব্যবস্থা গ্রহণ করতে পারবে।
            <br />
            <br /> এই অঙ্গীকারনামা আমি সেচ্ছায়, স্বজ্ঞানে, সুস্থ্য মস্তিস্কে এবং
            কাহারো দ্বারা প্ররোচিত না হয়ে স্বাক্ষর করলাম।
          </p>
          <div class="flex flex-end justify-end mr-10">
            <p class="text-start px-10 text-lg pt-[2rem] font-bangla leading-10">
                রিক্রুটিং এজেন্সীর নাম : {{ $user->licence_name }}
                <br />
                মালিকের নাম : {{ $user->embassy_man_name }}
                <br />
                <span class="">মালিকের স্বাক্ষর ও সীল :</span>
                <br />
                <p class="text-start px-10 text-lg pt-[2rem] font-bangla leading-10">
                    তারিখ: <span id="bengali-date"></span>
                </p>
            </p>
            
          </div>
        </div>
        </div>      
      </div>
    </div>

    @include('layout.script')


    <script>
        function toBengaliNumber(number) {
            const bengaliDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
            return number.replace(/[0-9]/g, (digit) => bengaliDigits[digit]);
        }

        function getTodayInBengali() {
            const today = new Date();

            // Format the date as DD-MM-YYYY
            const day = String(today.getDate()).padStart(2, '0');
            const month = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            const year = String(today.getFullYear());

            const formattedDate = `${day}-${month}-${year}`;

            // Convert to Bengali numbers
            return toBengaliNumber(formattedDate);
        }



        // Get today's date in English format
        const todayInBengali = getTodayInBengali();

        // Set the Bengali date to the span
        document.getElementById('bengali-date').innerText = todayInBengali;
    </script>


    <script>

  
          
        function updateTotalCount() {
            var totalRows = rowsData.length + cancelRowsData.length;
            document.getElementById('totalCancel').innerHTML = totalRows;
        }

        function updateTable() {
            updateTableIndexes();
            updateTotalCount();
        }
          
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

                console.log(mergedData);
                // Add merged data to the table
                addRowToTable(mergedData);

                dynamicBanglaCount();
                // Clear the input field
                document.getElementById('candidate').value = null;

                // Update total count or any other UI updates
                updateTotalCount();
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        }
  
        function getCanceldata() {
            var id = document.getElementById('cancelInput').value;

            fetch('/user/embassy/' + id, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    addRowToTable(data[0], true); // Pass true to highlight row
                    document.getElementById('cancelInput').value = null;
                    updateTotalCount();
                })
                .catch(error => {
                    console.error(error);
                });
        }
          
        
        function addRowToTable(data, highlight = false) {
            var tbody = document.getElementById('stemp_table');
            var tr = document.createElement('tr');
            tr.classList.add('[&>td]:border', '[&>td]:border-black', '[&>td]:py-', 'text-[11px]', 'text-center', 'relative', 'group');

            // Create the table cells
            var td1 = document.createElement('td'); // ক্র/নং
            var td2 = document.createElement('td'); // কর্মীর নাম
            var td3 = document.createElement('td'); // পাসপোর্ট নম্বর
            var td4 = document.createElement('td'); // ভিসা নম্বর
            var td5 = document.createElement('td'); // নিয়োগকারীর নাম
            var td6 = document.createElement('td'); // পদের নাম
            var td7 = document.createElement('td'); // অভিবাসন ব্যয়

            // Populate the cells with data
            td1.innerHTML = sl; // Serial number
            td1.setAttribute('contentEditable', 'true'); // Allow editing for serial number
            sl++;

            td2.innerHTML = (data.name || ''); // Worker name
            td2.classList.add('uppercase'); // Add uppercase styling

            td3.innerHTML = data.passport_number || ''; // Passport number
            td3.classList.add('uppercase'); // Add uppercase styling

            td4.innerHTML = data.visa_no || ''; // Visa number

            td5.innerHTML = data.spon_name_english || ''; // Employer name
            td5.classList.add('uppercase'); // Add uppercase styling

            td6.innerHTML = data.prof_name_english || ''; // Job position
            td6.classList.add('uppercase'); // Add uppercase styling

            // Create an editable field for অভিবাসন ব্যয়
            td7.setAttribute('contentEditable', 'true');
            td7.innerHTML = data.migration_cost || '1,65,000'; // Default migration cost (if available)

            // Append the cells to the row
            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);
            tr.appendChild(td6);
            tr.appendChild(td7);

            // Append the row to the table body
            tbody.appendChild(tr);
        }

  
        function printtable() {
            // Get the content of the printable section
            var printableContent = document.getElementById('printable-section').innerHTML;
        
            // Create a new window
            var printWindow = window.open('', '', 'width=1600,height=1600');
        
            // Write the content to the new window
            printWindow.document.write(`
                <html>
                    <head>
                        <title>Print Table</title>
                        <style>
                            /* Add any custom styles here to match your layout */
                            body {
                                font-family: Arial, sans-serif;
                                margin: 20px;
                            }
                            table {
                                width: 100%;
                                border-collapse: collapse;
                            }
                            table, th, td {
                                border: 1px solid black;
                                text-align: center;
                                padding: 8px;
                            }
                        </style>
                    </head>
                    <body>
                        ${printableContent}
                    </body>
                </html>
            `);
            
            // Close the document and trigger print
            printWindow.document.close();
            printWindow.print();
                
        }


            // Function to convert English numbers to Bangla numbers
        function englishToBanglaNumber(number) {
            const banglaNumbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
            return number.toString().split('').map(digit => banglaNumbers[parseInt(digit)]).join('');
        }

        // Function to dynamically update the Bangla count
        function dynamicBanglaCount() {
            const countElement = document.getElementById('counting'); // Element where the count is shown
            const countElement2 = document.getElementById('footer_Dynamic_count'); // Element where the count is shown
            if (!countElement) return; // Exit if element not found

            // Extract the current number (in Bangla) from the element
            const currentCountText = countElement.innerText.split(' ')[0]; // Get the numeric part
            const banglaNumbersMap = { '০': 0, '১': 1, '২': 2, '৩': 3, '৪': 4, '৫': 5, '৬': 6, '৭': 7, '৮': 8, '৯': 9 };
            const currentCount = parseInt(currentCountText.split('').map(banglaDigit => banglaNumbersMap[banglaDigit]).join(''), 10) || 0;

            // Increment the count
            const newCount = currentCount + 1;

            // Convert the incremented count back to Bangla
            const newBanglaCount = englishToBanglaNumber(newCount);

            // Update the text content with the new count
            countElement.innerHTML = `${newBanglaCount} (${banglaNumberToWord(newCount)})`; // Example: ৩ (তিন)
            countElement2.innerHTML = `${newBanglaCount} (${banglaNumberToWord(newCount)})`; // Example: ৩ (তিন)
        }

        // Helper function to convert numbers to Bangla words
        function banglaNumberToWord(number) {
            const banglaWords = ['শূন্য', 'এক', 'দুই', 'তিন', 'চার', 'পাঁচ', 'ছয়', 'সাত', 'আট', 'নয়', 'দশ'];
            if (number <= 10) return banglaWords[number];
            // Add logic for larger numbers if necessary
            return banglaWords[number % 10]; // For simplicity, just mapping the last digit
        }
  
    </script>




</body>
</html>