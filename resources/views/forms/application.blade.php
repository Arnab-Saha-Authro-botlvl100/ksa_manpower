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

  <div id="printable-section">
    <div class="container mx-auto">
        <div class="px-[50px] pt-[200px] text-13 leading-5 font-bangla" contenteditable="true" ref={componentRef}>
            <p>
                বরাবর
                <br />
                <br />
                মহা-পরিচালক <br />
                জনশক্তি কর্মসংস্থান ও প্রশিক্ষণ ব্যুরো,
                <br />
                ৮৯/২ কাকরাইল, ঢাকা-১০০০।
                <br />
                <br />
                দৃষ্টি আকর্ষনঃ পরিচালক (বহির্গমন)
                <br />
                <br />
                <span class="underline pb-40">
                    বিষয়: সৌদিআরবগামী 
                    <span id="footer_Dynamic_count"></span>
                    জন পুরুস/মহিলা কর্মীর একক বহির্গমন ছাড়পত্র প্রদানের জন্য আবেদন।
                </span>
            </p>
            <br />
            <p class="text-justify">
                জনাব, <br />
                বিনীত নিবেদন এই যে, নিম্নে বর্ণিত
                <div class="overflow-x-auto mb-4">
                    <table class="w-full text-sm border-collapse border border-gray-300" id="application_table">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-1 text-center">ক্রমিক নং</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">কর্মীর নাম</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">পাসপোর্ট নম্বর</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
                
                সৌদিআরব গমনেচ্ছু 
                <span id="counting"></span>
                জন পুরুস/মহিলা কর্মী তাদের স্ব-স্ব
                উদ্যোগে সংগৃহীত ভিসা, মূলপাসপোর্ট ও চুক্তিপত্রসহ অন্যান্য কাগজপত্রাদি
                আমার রিক্রুটিং এজেন্সী <span class="">সাল্লু এয়ার সার্ভিসেস</span> (আর এল-
                <span class=""> ১২১ </span>
                )এর মাধ্যমে বহির্গমন ছাড়পত্র গ্রহনের জন্য জমা দিয়েছে। কর্মীদের নিকট
                হতে প্রাপ্ত ভিসাসহ নিম্নেবর্ণিত কাগজপত্রাদি এমবস্থায় দাখিল করলাম।
                ভিসাগুলো আমার অফিসে পরীক্ষান্তে সঠিক পাওয়া গিয়েছে এবং কর্মীদের ভিসা ও
                চুক্তিপত্রে বর্ণিত কোম্পানী,পেশা,বেতন,ভাতাদিসহ অন্যান্য সুযোগ সুবিধা
                যাচাই করে সঠিক পাওয়া গিয়েছে। উল্লেখ্য যে, ভিসাগুলো ২৫ এর অধিক বা গ্রুপ
                ভিসা নহে এবং কর্মীদের সকল দায়-দায়িত্ব রিক্রুটিং এজেন্সী বহন করবে ।
                <br />
                <br />
                উপস্থাপিত কর্মীগণের ভিসাগুলো 
                <span class="font-sans">EMPLOYMENT</span> ভিসা। যার মেয়াদ ০২
                (দুই) বছর এবং পরবর্তীতে নবায়নযোগ্য। কর্মীগণের বেতন ভাতাদি,থাকা খাওয়া,
                সামাজিক নিরাপত্তা বা অন্য কোন কারণে চাকুরীতে অসুবিধা হলে তাহার সকল
                দায়-দায়িত্ব আমার রি/এজেন্সী বহন করিতে বাধ্য থাকিবে।
                <br />
                <br />
                অতএব মহোদয়ের সমীপে বিনীত আরজ সৌদিআরব গমনচ্ছেু 
                <span id="footer_Dynamic_count2">
                   
                </span>
                জন পুরুস/মহিলা কর্মীর অনূকুলে একক
                বহির্গমন ছাড়পত্র প্রদানের বিষয়ে সদয় মর্জি হয়।
            </p>
            <br />
            <p class="text-md leading-1"> সংযুক্তি:</p>
        
            <div class="flex mb-5" style="flex: 1;">
                <div class="w-1/2 pr-8 pl-5">
                    <ul>
                        <li>০১। ৩০০ টাকার নন-জুডিশিয়াল স্ট্যাম্পে অঙ্গীকারনামা</li>
                        <li>০২। পাসপোর্ট ও ভিসার ফটোকপি।</li>
                        <li>০৩। চালান ও পে-অর্ডার এর মূলকপি।</li>
                        <li>০৪। প্রশিক্ষন সনদের মূলকপি।</li>
                        <li>০৫। উপস্থাপিত (Put Up) তালিকা।</li>
                        <li>০৬। কর্মীর ডাটা শীট।</li>
                    </ul>
                </div>
                <div class="w-1/2 mt-14">
                    <ul>
                        <li>
                            রিক্রুটিং এজেন্সির নামঃ 
                            <span class="">
                                সাল্লু এয়ার সার্ভিসেস (১২১)
                            </span>
                        </li>
                        <li>মালিকের নামঃ- সালাউদ্দিন</li>
                        <li class="">মালিকের স্বাক্ষর ও সীলঃ</li>
                        <li>তারিখঃ---------------</li>
                        <li>মোবাইল নম্বরঃ ০১২৮৩৮৪৭৬৭</li>
                    </ul>
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

            //   console.log(mergedData);
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
          var tbody = document.getElementById('application_table');
          var tr = document.createElement('tr');
          tr.classList.add('[&>td]:border', '[&>td]:border-black', '[&>td]:py-', 'text-[11px]', 'text-center', 'relative', 'group');

          // Create the table cells
          var td1 = document.createElement('td'); // ক্র/নং
          var td2 = document.createElement('td'); // কর্মীর নাম
          var td3 = document.createElement('td'); // পাসপোর্ট নম্বর
          
          // Populate the cells with data
          td1.innerHTML = sl; // Serial number
          td1.setAttribute('contentEditable', 'true'); // Allow editing for serial number
          sl++;

          td2.innerHTML = (data.name || ''); // Worker name
          td2.classList.add('uppercase'); // Add uppercase styling

          td3.innerHTML = data.passport_number || ''; // Passport number
          td3.classList.add('uppercase'); // Add uppercase styling

          
          // Append the cells to the row
          tr.appendChild(td1);
          tr.appendChild(td2);
          tr.appendChild(td3);
          

          // Append the row to the table body
          tbody.appendChild(tr);
      }


      function printtable() {
          // Get the content of the printable section
          var printableContent = document.getElementById('printable-section').innerHTML;
      
          // Create a new window
          var printWindow = window.open('', '', 'width=600,height=400');
      
          // Write the content to the new window
          printWindow.document.write(`
            <html>
                <head>
                    <title>Print Table</title>
                    <style>
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
          const countElement3 = document.getElementById('footer_Dynamic_count2'); // Element where the count is shown
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
          countElement3.innerHTML = `${newBanglaCount} (${banglaNumberToWord(newCount)})`; // Example: ৩ (তিন)
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