<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

<script src="{{asset('assets/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    function toggleInputBox() {
    const radioSelection = document.querySelector('input[name="emb_list"]:checked').value;
    const inputNew = document.getElementById('candidate');
    const inputCancel = document.getElementById('cancelInput');

    if (radioSelection === 'New') {
        inputNew.style.display = 'block';
        inputCancel.style.display = 'none';
        console.log("new selected");
        // document.getElementById('candidate').setAttribute('onchange', 'getdata()');
    } else if (radioSelection === 'Cancel') { // corrected condition check
        inputNew.style.display = 'none';
        inputCancel.style.display = 'block';
        console.log("cancel selected");
        // document.getElementById('candidate').setAttribute('onchange', 'getCanceldata()');
    }
}

</script>
<script>

// $(document).ready(function() {
//     var apiUrl = window.location.origin + '/user/get';
//     var method = "GET";
//     var data = {
       
//     };
//     var headers = {
       
//     };
    
//     callApi(apiUrl, method, data, headers);
   
// });
// var dataObject = {};
// function callApi(apiUrl, method, data, headers) {
//             $.ajax({
//                 url: apiUrl,
//                 type: method,
//                 data: data,
//                 headers: headers,
//                 dataType: "json",
               
//                 success: function (response) {
//                         console.log(response);
                        
//                         for (var key in response.candidates) {
//                             var candidateValue = response.candidates[key];
//                             var userEmail = key;
//                             var combinedValue = {
//                                 candidate: candidateValue,
//                                 user: response.users[candidateValue] || null 
//                             };
//                             dataObject[userEmail] = combinedValue;
//                         }
//                         console.log(dataObject);
//                     },   
//                     error: function (error) {
//                     console.error("Error calling API:", error);
//                 }
//             });
// }



</script>