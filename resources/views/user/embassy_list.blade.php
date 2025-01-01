<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Embassy List | KSA Form Print Solution</title>
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>

    @include('layout.head')

</head>

<body>
    @include('layout.navbar')
    <div class="container  ">

        <div class="d-flex max-w-[1050px] mx-auto mt-2 bg-gray-200 rounded-lg px-2 py-1 items-center"
            style="justify-content: space-between;">
            <div class="flex items-center gap-3">
                <div>
                    <label for="pass" class="form-label">Select by passport number/Name</label>
                    <input list="candidates" name="candidate" id="candidate" class="form-control" onchange="getdata()">
                    <input list="candidates" name="cancelInput" id="cancelInput" class="form-control hidden"
                        onchange="getCanceldata()">
                </div>
                <div class="text-xl font-bold">
                    <input type="radio" id="New" name="emb_list" value="New" onchange="toggleInputBox()"
                        checked />
                    <label for="New">New</label>
                    <input type="radio" id="Cancel" name="emb_list" value="Cancel" onchange="toggleInputBox()" />
                    <label for="Cancel">Cancelletion</label>
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

        <div class="bg-white space-y-2 pt-[15px] max-w-[1050px] container-fluid" id="printable">
            <h2 class="text-center text-2xl font-medium">
                بيان بالجوازات المقدمة
            </h2>

            <div class="flex text-lg pt-[30px]">
                <div class="flex-1 space-y-1">
                    <h3 class="flex">
                        <span class="font-semibold text-lg w-[130px]">
                            {{ Session::get('rl_no') }}

                        </span>
                        <span>:رقم الرخصة</span>
                    </h3>
                    <h3 class="flex">
                        <span contentEditable class="font-semibold text-lg w-[130px] " id="currentDate">

                        </span>
                        <span>: التاريخ</span>
                    </h3>
                </div>
                <div class="flex-2">
                    <h3 class="flex items-center justify-end gap-5">
                        <span class="font-semibold mr-14 text-2xl">
                            {{-- {{ $agency_name?.arabic }} --}}
                            {{ Session::get('arabic_name') }}
                        </span>
                        <span>: اسم مقدم الجوازات</span>
                    </h3>
                    <h3 class="flex justify-between">
                        <span></span>
                        <span>: الــتـــوقـيـــع</span>
                    </h3>
                </div>
            </div>

            <table class="w-full table-bordered" id="embassy_list">
                <thead>
                    <tr
                        class=" [&>th]:border [&>th]:border-black [&>th]:py- text-md font-semibold text-center [&>th]:font-bold">


                        <th>
                            <p>المهنة</p>
                            <p>Profession</p>
                        </th>
                        <th class="w-[90px]">
                            <p>التاريخ</p>
                            <p>Year</p>
                        </th>
                        <th class="w-[140px]">
                            <p>رقم التأشيرة</p>
                            <p>Visa Number</p>
                        </th>
                        <th>
                            <p>اسم الكفيل</p>
                            <p>Sponsor Name</p>
                        </th>
                        <th class="w-[140px]">
                            <p>أرقام الجوازات</p>
                            <p>Passport No.</p>
                        </th>
                        <th>
                            <p>ت</p>
                            <p>SL</p>
                        </th>

                    </tr>
                </thead>
                <thead>
                    <tr
                        class=" [&>th]:border [&>th]:border-black [&>th]:py-0 text-md font-semibold text-center [&>th]:font-bold">


                        <th colspan="6" class="border border-black"> جديد / New</th>

                    </tr>
                </thead>

                <tbody id="table_body">


                </tbody>

                <thead id="cancel_head" class="">
                    <tr
                        class=" [&>th]:border [&>th]:border-black [&>th]:py-0 text-md font-semibold text-center [&>th]:font-bold">


                        <th colspan="6" class="border border-black">إلغاء / Cancelation</th>

                    </tr>
                </thead>

                <tbody id="table_cancel_body">


                </tbody>
                <tfoot>
                    <tr class="[&>td]:border [&>td]:border-black [&>td]:p-0 text-lg text-center relative group">

                        <td colspan="5" contentEditable class="font-bold text-xl text-end px-5" id="totalCancel">

                        </td>
                        <td>المجموع</td>
                    </tr>
                </tfoot>
            </table>

            <div
                style="display: flex; flex-wrap: wrap; justify-content: center; font-size: 1rem; font-weight: bold; text-align: center; padding: 0;">
                <div style="flex-basis: 50%; flex-grow: 1;">: الختم</div>
                <div style="flex-basis: 50%; flex-grow: 1;">: المستلم</div>
                <div style="flex-basis: 50%; flex-grow: 1;">: التعبئة</div>
                <div style="flex-basis: 50%; flex-grow: 1;">: المدقق</div>
                <div style="flex-basis: 50%; flex-grow: 1;">: التسجيل</div>
                <div style="flex-basis: 50%; flex-grow: 1;">: المسئول</div>
            </div>

        </div>

        @include('layout.script')
        <script type="text/javascript">

            // $(document).ready( function () {
            //     $('#embassy_list').DataTable();
            // } );
                        
            function toggleInputBox() {
                const radioSelection = document.querySelector('input[name="emb_list"]:checked').value;
                const inputNew = document.getElementById('candidate');
                const inputCancel = document.getElementById('cancelInput');

                if (radioSelection === 'New') {
                    inputNew.style.display = 'block';
                    inputCancel.style.display = 'none';

                    // document.getElementById('candidate').setAttribute('onchange', 'getdata()');
                } else if (radioSelection === 'Cancel') {
                    inputNew.style.display = 'none';
                    inputCancel.style.display = 'block';

                    // document.getElementById('candidate').setAttribute('onchange', 'getCanceldata()');
                } else {
                    // Handle the default case if needed
                    inputNew.style.display = 'block';
                    inputCancel.style.display = 'none';
                }
            }

            var sl = 1;
            var rowsData = [];
            var cancelRowsData = [];

            function getdata() {
                var id = document.getElementById('candidate').value;

                fetch('/user/embassy/' + id, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        addRowToTable(data[0]);
                        document.getElementById('candidate').value = null;
                        updateTotalCount();
                    })
                    .catch(error => {
                        console.error(error);
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
                var tbody = highlight ? document.getElementById('table_cancel_body') : document.getElementById('table_body');
                var tr = document.createElement('tr');
                tr.classList.add('border', 'border-black', 'p-0', 'text-[13px]', 'text-center', 'relative', 'group');

                var td1 = document.createElement('td');
                var td2 = document.createElement('td');
                var td3 = document.createElement('td');
                var td4 = document.createElement('td');
                var td5 = document.createElement('td');
                var td6 = document.createElement('td');
                var td7 = document.createElement('td');

                td1.innerHTML = sl;
                td1.setAttribute('contentEditable', 'true');
                sl++;

                td2.innerHTML = data.prof_name_arabic;
                td3.innerHTML = data.visa_date2.substr(0, 4);
                td3.setAttribute('contentEditable', 'true');
                td4.innerHTML = data.visa_no;
                td5.innerHTML = data.spon_name_arabic;
                td6.innerHTML = data.passport_number;

                var deleteBtn = document.createElement('button');
                deleteBtn.textContent = 'Delete';
                deleteBtn.onclick = function() {
                    deleteRow(this);
                };

                var overwriteBtn = document.createElement('button');
                overwriteBtn.textContent = 'Replace';
                overwriteBtn.onclick = function() {
                    overwriteRow(this);
                };

                td7.appendChild(deleteBtn);
                td7.appendChild(document.createTextNode(' ')); // Add space between buttons
                td7.appendChild(overwriteBtn);

                tr.appendChild(td2);
                tr.appendChild(td3);
                tr.appendChild(td4);
                tr.appendChild(td5);
                tr.appendChild(td6);
                tr.appendChild(td1);
                tr.appendChild(td7);

                if (highlight) {
                    tr.classList.add('bg-yellow-200'); // Apply your highlight class here for cancel data
                    cancelRowsData.push(tr);
                } else {
                    rowsData.push(tr);
                }

                tbody.appendChild(tr);
                updateTable();
            }


            // Function to handle overwrite button click
            function overwriteRow(btn) {
                var row = btn.parentNode.parentNode;
                var index = Array.from(row.parentNode.children).indexOf(row);

                // Prompt user to select candidate from the datalist
                var selectedCandidate = prompt('Select a candidate from the list by entering candidate ID:');

                // Validate input
                if (!selectedCandidate) return; // Handle if user cancels

                // Example: Simulate fetching new data based on selected candidate ID
                fetch('/user/embassy/' + selectedCandidate, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data[0]);
                    // Example: Replace row with new data
                    row.children[0].innerHTML = data[0].prof_name_arabic;
                    row.children[1].innerHTML = data[0].visa_date2.substr(0, 4);
                    row.children[2].innerHTML = data[0].visa_no;
                    row.children[3].innerHTML = data[0].spon_name_arabic;
                    row.children[4].innerHTML = data[0].passport_number;

                    // Update rowsData or cancelRowsData based on tbody ID
                    if (row.parentNode.id === 'table_cancel_body') {
                        cancelRowsData[index] = row;
                    } else {
                        rowsData[index] = row;
                    }

                    // Trigger getdata() or getCanceldata() with the updated passport number or name
                    var passportNumber = data[0].passport_number; // Adjust this based on your data structure

                    if (row.parentNode.id === 'table_cancel_body') {
                        document.getElementById('cancelInput').value = passportNumber; // Adjust this if you use name instead
                        getCanceldata();
                    } else {
                        document.getElementById('candidate').value = passportNumber; // Adjust this if you use name instead
                        getdata();
                    }

                    updateTable();
                })
                .catch(error => {
                    // Handle any errors that occurred during the request
                    console.error('Error fetching candidate data:', error);
                });
            }


            function deleteRow(btn) {
                var row = btn.parentNode.parentNode;
                var index = Array.from(row.parentNode.children).indexOf(row);

                if (row.parentNode.id === 'table_cancel_body') {
                    cancelRowsData.splice(index, 1);
                } else {
                    rowsData.splice(index, 1);
                }
                row.parentNode.removeChild(row);
                updateTableIndexes();
                updateTotalCount();
            }

            function updateTableIndexes() {
                rowsData.forEach((tr, index) => {
                    tr.children[5].innerHTML = index + 1;
                });

                cancelRowsData.forEach((tr, index) => {
                    tr.children[5].innerHTML = index + 1 + rowsData.length;
                });
            }

            function updateTotalCount() {
                var totalRows = rowsData.length + cancelRowsData.length;
                document.getElementById('totalCancel').innerHTML = totalRows;
            }

            function updateTable() {
                updateTableIndexes();
                updateTotalCount();
            }

          

            function printtable() {
                // Hide the delete buttons and overwrite button before printing
                var deleteButtons = document.querySelectorAll('button[onclick="deleteRow(this)"]');
                deleteButtons.forEach(function(button) {
                    var parentTd = button.parentNode; // Get the parent <td> element
                    parentTd.classList.add('no-print'); // Add the no-print class to the parent <td>
                });

                var overwriteButton = document.querySelectorAll('button[onclick="overwriteRow(this);"]');
                overwriteButton.forEach(function(button) {
                    var overwriteparent = button.parentNode; // Get the parent <td> element
                    overwriteparent.classList.add('no-print'); // Add the no-print class to the parent <td>
                });
               
                // Print the specific table
                var printContents = document.getElementById('printable').outerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();

                // Restore the original contents of the page
                document.body.innerHTML = originalContents;

                // Remove the no-print class from the buttons after printing
                deleteButtons.forEach(function(button) {
                    var parentTd = button.parentNode; // Get the parent <td> element
                    parentTd.classList.remove('no-print'); // Remove the no-print class from the parent <td>
                });

                overwriteButton.forEach(function(button) {
                    var overwriteparent = button.parentNode; // Get the parent <td> element
                    overwriteparent.classList.remove('no-print'); // Add the no-print class to the parent <td>
                });            }


            const today = new Date();

            // Get day, month, and year from the date object
            const day = String(today.getDate()).padStart(2, '0');
            const month = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
            const year = today.getFullYear();

            // Format the date as "DD-MM-YYYY"
            const formattedDate = `${day}/${month}/${year}`;

            // Insert the formatted date into the HTML element with the "currentDate" ID
            document.getElementById('currentDate').textContent = formattedDate;
        </script>
        <script>
            $(document).ready(function() {
                var apiUrl = window.location.origin + '/user/get';
                var method = "GET";
                var data = {

                };
                var headers = {

                };

                callApi(apiUrl, method, data, headers);

            });
            var dataObject = {};

            function callApi(apiUrl, method, data, headers) {
                $.ajax({
                    url: apiUrl,
                    type: method,
                    data: data,
                    headers: headers,
                    dataType: "json",

                    success: function(response) {
                        // console.log(response);

                        for (var key in response.candidates) {
                            var candidateValue = response.candidates[key];
                            var userEmail = key;
                            var combinedValue = {
                                candidate: candidateValue,
                                user: response.users[candidateValue] || null
                            };
                            dataObject[userEmail] = combinedValue;
                        }
                        // console.log(dataObject);
                    },
                    error: function(error) {
                        console.error("Error calling API:", error);
                    }
                });
            }
        </script>


</body>

</html>
