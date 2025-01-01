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

  <div class="mt-5" id="printable-section">
    <div class="container mx-auto">
        <div
        class="p-[50px] pl-[150px] w-full bg-white mb-10 text-[12px] "
        contentEditable="true"
      >
        <p class=" font-bangla  text-[13px]">
          <span contentEditable="true">।</span> রিক্রুটিং এজেন্সী 
          সাল্লু এজেন্সী (লাইসেন্স নম্বরঃ ২০২২) এর ব্যবস্থাপনা
          পরিচালক সৌদিআরব গামি ২ জন 
          পুরুষ/মহিলা কর্মীর অনুকুলে একক বহির্গমন ছাড়পত্র
          গ্রহনের জন্য আবেদনপত্রসহ নিম্নে বর্ণিত কাগজপত্রাদি দাখিল করেছেন।
        </p>
        <ol class=" text-[12px] leading-5 font-bangla">
          <li class="">
            ক) রিক্রুটিং এজেন্সী আবেদনপত্র (পতাকা &quot;ক&quot;)
          </li>
          <li class="">
            খ) আয়কর চালান, কল্যান, ও বীমা ফি এবং স্মার্টকার্ড ফি বাবদ প্রাপ্ত
            পে-অর্ডারের ফটোকপি (পতাকা &quot;খ&quot;)
          </li>
          <li class="">গ)কর্মীর পুটআপ লিস্ট (পতাকা &quot;গ&quot;)</li>
          <li class="">
            ঘ) রিক্রুটিং এজেন্সী কর্তৃক দাখিলকৃত ৩০০/- টাকার নন-জুডিশিয়াল
            স্টাম্পে অঙ্গিকারনামা (পতাকা &quot;ঘ&quot;)
          </li>
          <li class="">
            ঙ) কর্মীর পাসপোর্ট ফটোকপি এবং স্ট্যাফিংকৃত ভিসার ফটোকপি (পতাকা
            &quot;ঙ&quot;)
          </li>
          <li class="">চ) ইনজাজ কপি (পতাকা &quot;চ&quot;)</li>
          <li class="">ছ) চুক্তিপত্রের ফটোকপি (পতাকা &quot;ছ&quot;)</li>

          <li class="">জ) কর্মীর প্রশিক্ষণ সনদ। (পতাকা &quot;ঝ&quot;)</li>
          <li class="">
            ঝ) কর্মীর ডাটা এন্ট্রি শিট। (পতাকা &quot;ঞ&quot;)
          </li>
          <li class="">
            ঞ) ড্রাইভিং লাইসেন্স সংযুক্ত। (পতাকা &quot;ট&quot;)
          </li>
        </ol>
        <h1 class="text-[14px] font-semibold font-bangla">
          <span contentEditable="true">।</span> কর্মীর বিবরণঃ
        </h1>
        <table class="w-full ">
          <thead>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:py-1  text-[11px] font-semibold text-center font-bangla">
              <td>ক্র/নং</td>
              <td>কর্মীর নাম</td>
              <td>পাসপোর্ট নম্বর</td>
              <td>ভিসা/আইডি নম্বর</td>

              <td>নিয়োগকারীর নাম</td>
              <td>পেশা</td>
            </tr>
          </thead>
          <tbody id="first_table_notesheet">

          </tbody>
        </table>
        <h1 class="text-[14px] font-semibold pb- font-bangla mt-2">
          <span contentEditable="true">।</span> প্রশিক্ষণ সনদের বিবরণঃ-
        </h1>
        <table class="w-full ">
          <thead>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:py-1 text-[12px] font-semibold text-center font-bangla">
              <td>ক্র/নং</td>
              <td>কর্মীর নাম</td>
              <td>পাসপোর্ট নম্বর</td>
              <td>সনদ নং</td>
              <td>ব্যাংকের নাম ও আকাউন্ট নং</td>
              <td>মেডিকেল সেন্টার</td>
              <td>টিটিসির নাম</td>
            </tr>
          </thead>
          <tbody id="second_table_notesheet">
          
          </tbody>
        </table>
        <h1 class="text-[14px] font-semibold pb-1 font-bangla mt-2">
          <span contentEditable="true">।</span>আয়কর চালান, কল্যান ও বীমা ফি এবং
          স্মার্টকার্ড এর বিবরনীঃ-
        </h1>

        <table class="w-full ">
          <thead>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:py-1 text-[12px] font-bangla text-center">
              <td>ফি সমূহ</td>
              <td>জন প্রতি হার</td>
              <td>কর্মীর সংখ্যা</td>
              <td>মোট টাকা</td>
              <td>পে অর্ডার নম্বর</td>
              <td>তারিখ</td>
              <td>ব্যাংকের নাম ও শাখা</td>
            </tr>
          </thead>
          <tbody>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p- text-[12px] text-center relative group">
              <td>কল্যান ও বীমা ফি</td>
              <td>
                <p>(৩৫০০+১০০০)= ৪৫০০</p>
              </td>
              <td rowspan='3'>
                <p>
                    <!-- {toBengaliNumber(passengers?.length)} -->
                    12
                </p>
              </td>
              <td>
                <!-- {toBengaliNumber(passengers?.length * 4500)} -->
                4500
            </td>
              <td>0</td>
              <td class="" rowspan='3'>
                <p contentEditable="true">
                  12/30/2020
                </p>
              </td>
              <td class="">ইসলামী ব্যাংক লিঃ, ভি. আই. পি. রোড, ঢাকা।</td>
            </tr>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:p- text-[12px] text-center relative group">
              <td>স্মার্ট কার্ড ফি</td>
              <td>
                <p>২৫০/--</p>
              </td>
              <!-- {/* <td rowspan='4'>
              <p>12</p>
            </td> */} -->
              <td>2300</td>
              <td>0</td>
              <!-- {/* <td class="text-end">
              <p contentEditable="true">
                তাং-১২/১২/২০২৩
              </p>
            </td> */} -->
              <td class="">ইসলামী ব্যাংক লিঃ, ভি. আই. পি. রোড, ঢাকা।</td>
            </tr>
            <tr class="[&>td]:border [&>td]:border-black [&>td]:py-1 text-[12px] text-center relative group">
              <td>আয়কর চালান</td>
              <td>৫০০/--</td>

              <td>২৮৩৮</td>
              <td contentEditable="true">0</td>

              <td class="">ইসলামী ব্যাংক লিঃ, ভি. আই. পি. রোড, ঢাকা।</td>
            </tr>
          </tbody>
        </table>
        <h1 class="text-sm font-semibold font-bangla mt-2">
          <span contentEditable="true">।</span>.ভিসার সঠিকতা, ধরন, পেশা, নিষিদ্ধ
          কোম্পানীর ভিসা ও এনজাজ কপির
          <span class="font-sans"> Advice/Lot</span> এ ভিসার সংখ্যা ২৪ এর
          অধিক ভিসা আছে কি না এ বিষয়ে মতামতের জন্য অনুবাদক শাখায় প্রেরন করা হলো।
        </h1>
        <div class="text-center w-[1100px] mt-[20px] font-semibold text-md font-bangla">
          <p>অনুবাদক</p>
        </div>
      </div>
    </div>
  </div>
  @include('layout.script')
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

        // function getdata() {
        //     var id = document.getElementById('candidate').value;

        //     fetch('/user/embassy/' + id, {
        //             method: 'GET',
        //             headers: {
        //                 'Content-Type': 'application/json'
        //             },
        //         })
        //         .then(response => response.json())
        //         .then(data => {
        //             // console.log(data);
        //             addRowToTable(data[0]);
        //             document.getElementById('candidate').value = null;
        //             updateTotalCount();
        //         })
        //         .catch(error => {
        //             console.error(error);
        //     });
        // }

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
            var tbody = document.getElementById('first_table_notesheet');
            var tr = document.createElement('tr');
            tr.classList.add('[&>td]:border', '[&>td]:border-black', '[&>td]:py-', 'text-[11px]', 'text-center', 'relative', 'group');

            var td1 = document.createElement('td');
            var td2 = document.createElement('td');
            var td3 = document.createElement('td');
            var td4 = document.createElement('td');
            var td5 = document.createElement('td');
            var td6 = document.createElement('td');

            td1.innerHTML = sl;
            td1.setAttribute('contentEditable', 'true');
            sl++;

            // Check if the properties exist before accessing them
            td2.innerHTML = (data.name || '') + '<br>' + (data.passenger_no || '');
            td3.innerHTML = data.passport_number || '';
            td4.innerHTML = (data.visa_no || '') + '<br>' + (data.spon_id || '');
            td5.innerHTML = data.spon_name_english || '';
            td6.innerHTML = data.prof_name_english || '';

            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);
            tr.appendChild(td6);

            tbody.appendChild(tr);

            var tbody2 = document.getElementById('second_table_notesheet');
            var tr = document.createElement('tr');
            tr.classList.add('[&>td]:border', '[&>td]:border-black', '[&>td]:py-', 'text-[11px]', 'text-center', 'relative', 'group');

            var td1 = document.createElement('td');
            var td2 = document.createElement('td');
            var td3 = document.createElement('td');
            var td4 = document.createElement('td');
            var td5 = document.createElement('td');
            var td6 = document.createElement('td');
            var td7 = document.createElement('td');

            td1.innerHTML = sl-1;
            td1.setAttribute('contentEditable', 'true');
            

            // Check if the properties exist before accessing them
            td2.innerHTML = (data.name || '');
            td3.innerHTML = data.passport_number || '';
            td4.innerHTML = data.certificate_no || '';
            td6.innerHTML = data.medical_center || '';
            td7.innerHTML = data.ffc_name || '';

            // Create an input field for td5
            var input = document.createElement('input');
            input.type = 'text';
            input.classList.add('form-input', 'text-center', 'w-full'); // Add custom classes if needed
            input.value = data.someValue || ''; // Replace `someValue` with the data field for the input, if any

            td5.appendChild(input); // Append the input field to td5


            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);
            tr.appendChild(td6);
            tr.appendChild(td7);

            tbody2.appendChild(tr);
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

  </script>
</body>
</html>