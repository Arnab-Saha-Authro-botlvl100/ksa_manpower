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
  <style>
    .horizontalTable {
      border-collapse: collapse; /* Ensures border lines are not doubled */
      width: 100%; /* Optional: Adjust the table width */
    }
  
    .horizontalTable th,
    .horizontalTable td {
      border: 1px solid black; /* Adds a solid border to table cells */
      padding: 8px; /* Optional: Adds spacing inside cells */
      text-align: left; /* Optional: Aligns text to the left */
    }
  
    .horizontalTable th {
      background-color: #f2f2f2; /* Optional: Adds a light gray background to header cells */
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

  <div class="container" id="printable-section">
    <div class="bg-white p-6" contentEditable="true" id="dynamic-table">
        <span class="font-bangla text-center border-b-2 flex justify-center pb-1 px-3 text-md font-semibold">
          একক বহির্গমন ছাড়পত্রের পুটআপসীট ও ডাটাএন্ট্রি ফরম
        </span>
        <table class="w-full border-collapse" id="copy-table">
            <thead>
                <tr class="[&>td]:border [&>td]:border-black font-bangla [&>td]:py-1 text-base">
                    <td class="w-[20%] pl-3 font-bangla font-semibold">
                        নিয়োগকারী দেশের নামঃ
                    </td>
                    <td class="w-[20%] pl-3 text-center font-bold">সৌদি আরব</td>
                    <td class="w-[8%] pl-3">আর এল নং</td>
                    <td class="w-[15%] text-center" colspan="1">
                        ভিসার ধরন
                    </td>
                    <td class="w-[19%] text-sm pl-3 text-[17px] font-semibold">
                        উৎস আয়করের পরিমান জন প্রতিঃ
                    </td>
                    <td class="w-[18%] text-center text-[17px] font-semibold">
                        ৫০০/-
                    </td>
                </tr>
                <tr class="[&>td]:border [&>td]:border-black font-bangla [&>td]:py-0 text-sm">
                    <td class="w-[20%] pl-3 font-bold text-lg" rowspan="2">
                        রিক্রুটিং এজেন্সীর নামঃ
                    </td>
                    <td class="w-[20%] font-semibold text-center text-[16px]" rowspan="2">
                        সাল্লু এয়ার সার্ভিসেস
                    </td>
                    <td class="w-[8%] font-bold text-lg text-center" rowspan="3">
                        ১২১
                    </td>
                    <td class="w-[8%] text-center text-[17px] font-bold" rowspan="3">
                        সত্যায়িত
                    </td>
                    <td class="w-[19%] text-sm pl-3 text-[17px] font-semibold">
                        কল্যান ফি পরিমান জনপ্রতিঃ
                    </td>
                    <td class="w-[18%] pl-3 text-center text-[17px] font-bold">
                        ৪৫০০/-
                    </td>
                </tr>
                <tr class="[&>td]:border [&>td]:border-black font-bangla [&>td]:py-1 text-sm">
                    <td class="w-[19%] text-sm pl-3 text-[17px] font-semibold">
                        স্মার্ট কার্ড ফি
                    </td>
                    <td class="w-[18%] text-center text-[17px] font-bold">২৫০/-</td>
                </tr>
                <tr class="[&>td]:border [&>td]:border-black font-bangla [&>td]:py- text-sm">
                    <td class="w-[20%] pl-3 py-1 font-bold text-[16px]">
                        টাকা জমার পারমিট নং
                    </td>
                    <td>{""}</td>
                    <td class="w-[19%] text-sm pl-3 text-[17px] font-semibold">
                        তারিখ
                    </td>
                    <td class="w-[18%] text-center text-[17px] font-bold">
                        11/12/2000
                    </td>
                </tr>
            </thead>
        </table>

        {{-- <table class="w-full border-t-no" id="putup-table">
            <thead>
              <tr
                class="
               [&>td]:border [&>td]:border-black [&>td]:py- text-sm  text-center
              "
              >
                <td class="w-[10%] text-start pl-3">Employee No</td>
                <td class="w-[11%]">01</td>
                <td class="w-[11%]">02</td>
                <td class="w-[11%]">03</td>
                <td class="w-[11%]">04</td>
                <td class="w-[11%]">05</td>
                <td class="w-[11%]">06</td>
                <td class="w-[11%]">07</td>
                <td class="w-[11%]">08</td>
              </tr>
              <tr
                class="
               [&>td]:border [&>td]:border-black [&>td]:py-1 text-sm  text-center
              "
              >
                <td class="w-[11%] text-start pl-3">Worker SI No.</td>
                <td class="w-[11%]" />
                <td class="w-[11%]" />
                <td class="w-[11%]" />
                <td class="w-[11%]" />
                <td class="w-[11%]" />
                <td class="w-[11%]" />
                <td class="w-[11%]" />
                <td class="w-[11%]" />
              </tr>
    
              <tr
                class="
               [&>td]:border [&>td]:border-black [&>td]:py- text-sm  text-center
              "
              >
                <td class=" w-[10%] text-start pl-3">Company Name</td>
                <td class="font-semibold w-[11%]">
                  
                </td>
                <td class="font-semibold w-[11%]">
                  
                </td>
                <td class="font-semibold w-[11%]">
                  
                </td>
                <td class="font-semibold w-[11%]">
                  
                </td>
                <td class="font-semibold w-[11%]">
                  
                </td>
                <td class="font-semibold w-[11%]">
                  
                </td>
                <td class="font-semibold w-[11%]">
                  
                </td>
                <td class="font-semibold w-[11%]">
                  
                </td>
              </tr>
    
              <tr
                class="
               [&>td]:border [&>td]:border-black [&>td]:py- text-sm  text-center
              "
              >
                <td class="w-[12%] text-start pl-3">Employee Name</td>
                <td class="w-[11%]"></td>
                <td class="w-[11%]"></td>
                <td class="w-[11%]"></td>
                <td class="w-[11%]"></td>
                <td class="w-[11%]"></td>
                <td class="w-[11%]"></td>
                <td class="w-[11%]"></td>
                <td class="w-[11%]"></td>
              </tr>
              <tr
                class="
               [&>td]:border [&>td]:border-black [&>td]:py- text-sm  text-center
              "
              >
                <td class="w-[10%] text-start pl-3">Job Post</td>
                <td class="w-[11%]">
                  
                </td>
                <td class="w-[11%]">
                  
                </td>
                <td class="w-[11%]">
                  
                </td>
                <td class="w-[11%]">
                  
                </td>
                <td class="w-[11%]">
                  
                </td>
                <td class="w-[11%]">
                  
                </td>
                <td class="w-[11%]">
                  
                </td>
                <td class="w-[11%]">
                  
                </td>
              </tr>
              <tr
                class="
               [&>td]:border [&>td]:border-black [&>td]:py- text-sm  text-center
              "
              >
                <td class="w-[10%] text-start pl-3">Salary</td>
                <td class="w-[11%]">
                  
                </td>
                <td class="w-[11%]">
                  
                </td>
                <td class="w-[11%]">
                  
                </td>
                <td class="w-[11%]">
                  
                </td>
                <td class="w-[11%]">
                  
                </td>
                <td class="w-[11%]">
                  
                </td>
                <td class="w-[11%]">
                  
                </td>
                <td class="w-[11%]">
                  
                </td>
              </tr>
              <tr
                class="
               [&>td]:border [&>td]:border-black [&>td]:py-   text-center
              "
              >
                <td class="w-[10%] text-start pl-3">Reg ID</td>
                <td class="font-bold w-[11%] text-[20px]">
                </td>
                <td class="font-bold w-[11%] text-[20px]">
                  
                </td>
                <td class="font-bold w-[11%] text-[20px]">
                  
                </td>
                <td class="font-bold w-[11%] text-[20px]">
                  
                </td>
                <td class="font-bold w-[11%] text-[20px]">
                  
                </td>
                <td class="font-bold w-[11%] text-[20px]">
                  
                </td>
                <td class="font-bold w-[11%] text-[20px]">
                  
                </td>
                <td class="font-bold w-[11%] text-[20px]">
                  
                </td>
              </tr>
              <tr
                class="
               [&>td]:border [&>td]:border-black [&>td]:py text-sm  text-center
              "
              >
                <td class="  w-[10%] text-start pl-3">Visa No.</td>
                <td class="font-semibold text-[22px]  w-[11%]">
                </td>
                <td class="font-semibold text-[22px]  w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px]  w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px]  w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px]  w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px]  w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px]  w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px]  w-[11%]">
                  
                </td>
              </tr>
              <tr
                class="
               [&>td]:border [&>td]:border-black [&>td]:py- text-sm  text-center
              "
              >
                <td class="w-[10%] text-start pl-3">Visa Issue</td>
                <td class="text-[22px] w-[11%]">
                </td>
                <td class="text-[22px] w-[11%]">
                  
                </td>
                <td class="text-[22px] w-[11%]">
                  
                </td>
                <td class="text-[22px] w-[11%]">
                  
                </td>
                <td class="text-[22px] w-[11%]">
                  
                </td>
                <td class="text-[22px] w-[11%]">
                  
                </td>
                <td class="text-[22px] w-[11%]">
                  
                </td>
                <td class="text-[22px] w-[11%]">
                  
                </td>
              </tr>
              <tr
                class="
               [&>td]:border [&>td]:border-black [&>td]:py- text-sm  text-center
              "
              >
                <td class="w-[10%] text-start pl-3">Visa Expire</td>
                <td class="text-[22px] w-[11%]">
                </td>
                <td class="text-[22px] w-[11%]">
                    
                </td>
                <td class="text-[22px] w-[11%]">
                    
                </td>
                <td class="text-[22px] w-[11%]">
                    
                </td>
                <td class="text-[22px] w-[11%]">
                    
                </td>
                <td class="text-[22px] w-[11%]">
                    
                </td>
                <td class="text-[22px] w-[11%]">
                    
                </td>
                <td class="text-[22px] w-[11%]">
                    
                </td>
              </tr>
              
              <tr
                class="
               [&>td]:border [&>td]:border-black [&>td]:py text-sm  text-center
              "
              >
                <td class="  w-[10%] text-start pl-3">Passport No.</td>
                <td class="font-semibold text-[22px] w-[11%]">
                </td>
                <td class="font-semibold text-[22px] w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px] w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px] w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px] w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px] w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px] w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px] w-[11%]">
                  
                </td>
              </tr>
              <tr
                class="
               [&>td]:border [&>td]:border-black [&>td]:py- text-sm  text-center
              "
              >
                <td class=" w-[10%] text-start pl-3">Passport Issue</td>
                <td class="text-[22px] w-[11%]">
                      
                </td>
                <td class="text-[22px] w-[11%]">
                  
                </td>
                <td class="text-[22px] w-[11%]">
                  
                </td>
                <td class="text-[22px] w-[11%]">
                   
                </td>
                <td class="text-[22px] w-[11%]">
                   
                </td>
                <td class="text-[22px] w-[11%]">
                   
                </td>
                <td class="text-[22px] w-[11%]">
                     
                </td>
                <td class="text-[22px] w-[11%]">
                  
                </td>
              </tr>
              <tr
                class="
               [&>td]:border [&>td]:border-black  [&>td]:py- text-sm  text-center
              "
              >
                <td class=" w-[10%] text-start pl-3">Passport Expire</td>
                <td class="text-[22px] w-[11%]">
                </td>
                <td class="text-[22px] w-[11%]">
                      
                </td>
                <td class="text-[22px] w-[11%]">
                      
                </td>
                <td class="text-[22px] w-[11%]">
                      
                </td>
                <td class="text-[22px] w-[11%]">
                      
                </td>
                <td class="text-[22px] w-[11%]">
                      
                </td>
                <td class="text-[22px] w-[11%]">
                      
                </td>
                <td class="text-[22px] w-[11%]">
                      
                </td>
              </tr>
              <tr
                class="
               [&>td]:border [&>td]:border-black  [&>td]:py- text-sm  text-center
              "
              >
                <td class=" w-[10%] text-start pl-3">Date of Birth</td>
                <td class="font-semibold text-[22px] w-[11%]">
                </td>
                <td class="font-semibold text-[22px] w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px] w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px] w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px] w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px] w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px] w-[11%]">
                  
                </td>
                <td class="font-semibold text-[22px] w-[11%]">
                  
                </td>
              </tr>
            </thead>
        </table> --}}
      

        <table id="horizontalTable" class="w-full border-t-no horizontalTable">
          <thead>
              {{-- <tr>
                  <th>Attributes</th>
                  <th id="col1">01</th>
              </tr> --}}
          </thead>
          <tbody>
              <tr>
                  <td>Employee No.</td>
                  <td></td>
              </tr>
              <tr>
                  <td>Worker SI No.</td>
                  <td></td>
              </tr>
              <tr>
                  <td>Company Name</td>
                  <td></td>
              </tr>
              <tr>
                  <td>Employee Name</td>
                  <td></td>
              </tr>
              <tr>
                  <td>Job Post</td>
                  <td></td>
              </tr>
              <tr>
                  <td>Salary</td>
                  <td></td>
              </tr>
              <tr>
                  <td>Reg ID</td>
                  <td></td>
              </tr>
              <tr>
                  <td>Visa No.</td>
                  <td></td>
              </tr>
              <tr>
                  <td>Visa Issue</td>
                  <td></td>
              </tr>
              <tr>
                  <td>Visa Expire</td>
                  <td></td>
              </tr>
              <tr>
                  <td>Passport No.</td>
                  <td></td>
              </tr>
              <tr>
                  <td>Passport Issue</td>
                  <td></td>
              </tr>
              <tr>
                  <td>Passport Expire</td>
                  <td></td>
              </tr>
              <tr>
                  <td>Date of Birth</td>
                  <td></td>
              </tr>
          </tbody>
        </table>

        <div id="footerpartforallpage">
          
            
          <div class="py-1 text-[14px]  leading-6 font-bangla">
            বর্ণিত কর্মী গ্রুপ ভিসা অন্তর্ভুক্ত নয় । কর্মীদের
            পাসপোর্ট,ভিসা,চাকুরী,চুক্তিপত্রের বর্নিত বেতন ও শর্তাদি সঠিক আছে। উক্ত
            বিষয়ে ত্রুটির কারনে কর্মীদের কোনো প্রকার সমস্যা হইলে আমার এজেন্সী{" "}
            <span class="font-semibold">
              {agency_name?.bangla} (আর এল- {rl_no?.bangla})
            </span>{" "}
            সম্পূর্ন দায় দায়িত্বগ্রহন ও কর্মীদের ক্ষতিপূরন দিতে বাধ্য থাকিবে।
          </div>
          <table class=" w-full">
            <tr
              class="
               [&>td]:border [&>td]:border-black font-bangla [&>td]:pl-3 text-sm  pl-2
              "
            >
              <td>পে অর্ডার নং-</td>
              <td>তাং-</td>
              <td>টাকা-</td>
              <td>চালান নং-</td>
              <td>তাং-</td>
              <td>টাকা-</td>
            </tr>
          </table>
    
          <table class="text-[22px] w-full my-5">
            <tr
              class="
               [ [&>td]:border-black font-bangla [&>td]:py- text-sm text-center  
              "
            >
              <td class="">
                <p class="mb-[90px]"> এজেন্সী মালিক/প্রতিনিধির সাক্ষর</p>
                <p> </p>
              </td>
              <td class="">
                <p class="mb-14">পরিক্ষিত হয়েছে কাগজপত্র সঠিক আছে/নাই</p>
                <p>সহকারীর স্বাক্ষর</p>
              </td>
              <td class="">
                <p class="mb-14">বর্নীত তথ্যাদি সঠিক আছে/নাই</p>
                <p>সহকারী পরিচালকের স্বাক্ষর</p>
              </td>
              <td class="">
                <p class="mb-14">বহির্গমনের ছাড়পত্র দেয়া যায়/যায় না</p>
                <p>উপ-পরিচালকের স্বাক্ষর</p>
              </td>
              <td class="">
                <p class="mb-14">বহির্গমনের ছাড়পত্র দেয়া যায়/যায় না</p>
                <p>পরিচালকের স্বাক্ষর</p>
              </td>
            </tr>
          </table>
        </div>
      
      <br>
      


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
                const embassyData = data[0];
                const manpowerData = data[1];

                const mergedData = { ...embassyData[0], ...manpowerData[0] };
                addColumnToTable(mergedData);

                // Clear the input field
                document.getElementById('candidate').value = null;

                // Update total count or any other UI updates
                updateTotalCount();
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        }


        let columnCount = 0; // Tracks the number of added columns
        let tableIndex = '';  // Tracks the current table index

        function addColumnToTable(mergedData) {
            console.log(mergedData);
            let table = document.getElementById(`horizontalTable${tableIndex}`);

            // Ensure the current table exists, or create a new one
            if (!table) {
                table = createNewTable(tableIndex);
            }

            const rows = table.rows;

            // Define the mapping between row labels and `mergedData` keys
            const dataMapping = {
                "Employee No.": "id",
                "Worker SI No.": "certificate_no",
                "Company Name": "company_name",
                "Employee Name": "name",
                "Job Post": "prof_name_english",
                "Salary": "salary", // Use empty or undefined key if this doesn't exist
                "Reg ID": "reg_id",
                "Visa No.": "visa_no",
                "Visa Issue": "visa_issued_date",
                "Visa Expire": "visa_exp_date",
                "Passport No.": "passport_number",
                "Passport Issue": "passport_issue_date",
                "Passport Expire": "passport_expire_date",
                "Date of Birth": "date_of_birth"
            };

            // Add a new column dynamically for the data in `mergedData`
            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];

                // For the header row, we only need to label the new column
                if (i === 0) {
                    const headerCell = row.insertCell(-1); // Add a new header cell
                    headerCell.textContent = ` ${columnCount + 1}`; // Label dynamically
                    headerCell.contentEditable = false; // Ensure header cell is non-editable
                    continue;
                }

                const cell = row.insertCell(-1); // Add a new cell at the end of the row
                cell.contentEditable = false; // Make the cell non-editable

                const rowLabel = row.cells[0]?.textContent.trim(); // First cell in the row
                const dataKey = dataMapping[rowLabel];

                // Special handling for Employee No.: Increment it dynamically
                if (rowLabel === "Employee No.") {
                    cell.textContent = columnCount; // Dynamically incremented Employee No.
                } else {
                    // Dynamically fetch the data from `mergedData`
                    cell.textContent = dataKey && mergedData[dataKey] !== undefined 
                        ? mergedData[dataKey] 
                        : ""; // Use empty string if data is not found
                }
            }

            // Increment the column count
            columnCount++;

            // If columnCount reaches a multiple of 8, create a new table for the next columns
            if (columnCount % 8 === 0) {
                tableIndex++;
                // columnCount = 1; // Reset column count for the new table
            }
        }

       
        function createNewTable(index) {
            const parent = document.getElementById('dynamic-table');

            // Create a new table element
            const newTable = document.createElement("table");
            newTable.id = `horizontalTable${index}`;
            newTable.className = "w-full border-t-no horizontalTable"; // Add class for styling

            // Get the content of the copy-table
            const copyTable = document.getElementById('copy-table');
            const footerpart = document.getElementById('footerpartforallpage');

            // Clone the `<thead>` of the copy-table
            const copiedTable = copyTable.cloneNode(true);
            const footerpart_page = footerpart.cloneNode(true);

            // Append the copied `<thead>` to the new table
            parent.appendChild(copiedTable);

            // Add the `<tbody>` section for dynamic rows
            const tbody = document.createElement("tbody");
            const rowLabels = [
                "Employee No.",
                "Worker SI No.",
                "Company Name",
                "Employee Name",
                "Job Post",
                "Salary",
                "Reg ID",
                "Visa No.",
                "Visa Issue",
                "Visa Expire",
                "Passport No.",
                "Passport Issue",
                "Passport Expire",
                "Date of Birth"
            ];

            // Create rows dynamically based on the labels
            rowLabels.forEach(label => {
                const row = document.createElement("tr");

                // Create the first cell (row label)
                const labelCell = document.createElement("td");
                labelCell.textContent = label;
                row.appendChild(labelCell);

                // Create the second cell (empty data cell)
                const dataCell = document.createElement("td");
                dataCell.textContent = ""; // Empty cell
                dataCell.contentEditable = false; // Make the cell non-editable
                row.appendChild(dataCell);

                tbody.appendChild(row);
            });

            // Append the `<tbody>` to the new table
            newTable.appendChild(tbody);

            // Add the new table to the parent container
            parent.appendChild(newTable);
            parent.appendChild(footerpart_page);

            return newTable;
        }




        function printtable() {
    // Get the content of the printable section
    var printableContent = document.getElementById('printable-section').innerHTML;

    // Create a new window
    var printWindow = window.open('', '', 'width=1000,height=1200');

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