<div class="container-fluid mx-auto">
    <table class="table-auto w-full shadow-2xl">
        <thead>
            <tr class="bg-gray-400">
                <th scope="col">Serial <br/> Number</th>
                <th scope="col">Creation <br/> Date</th>
                <th scope="col">Name</th>
                <th scope="col">Passport <br/> Number</th>
                <th scope="col">DOB</th>
                <th scope="col" style="">VISA/Sponsor <br/> Number</th>
                <th scope="col" class="text-lg">Profession</th>
    
                <th scope="col">Application (MOFA) <br/> Number</th>
               
              </tr>
        </thead>
        <tbody class="">
            @foreach($candidates as $candidate)
              @php
                $dob = $candidate->date_of_birth;
                $birthdate = new DateTime($dob);
                $currentDate = new DateTime();
                $ageInterval = $birthdate->diff($currentDate);
                $years = $ageInterval->y;
                $age = "";
                if ($years > 0) {
                    $age .= $years . " year" . ($years > 1 ? "s" : "");
                }
              @endphp
    
              <!-- Add Candidate Visa Modal -->
              <div class="modal fade" id="addVisaModal" tabindex="-1" aria-labelledby="addVisaModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="addVisaModalLabel">Add Candidate Visa</h5>
                      <button type="button" class="btn-close btn text-red-700 font-bold" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                      <form id="visainput" method="post" action class="mt-5">
                        @csrf
                        <input type="hidden" name="candidate_id" id="candidate_id" value="{{ $candidate->id }}" />
                        <div class="px-10 gap-x-10 grid md:grid-cols-2">
                          @foreach([
                            ['Visa No', 'visa_no', 'Ex- 1303044456'],
                            ['Sponsor ID', 'spon_id', 'Ex- 7097997442'],
                            ['Visa Date (Hijri)', 'visa_date', 'Ex- 1444/09/30'],
                            ['Salary', 'salary', 'Ex- 1000'],
                            ['Sponsor Name (Arabic)', 'spon_name_arabic', 'Ex- القوة العربية.'],
                            ['Sponsor Name (English)', 'spon_name_english', 'Ex- Arabic Power'],
                            ['Profession (Arabic)', 'prof_name_arabic', 'Ex- القوة العربية.'],
                            ['Profession (English)', 'prof_name_english', 'Ex- Electrian'],
                            ['Mofa No', 'mofa_no', 'Ex- 43780333'],
                            ['Mofa Date', 'mofa_date', ''],
                            ['Okala No', 'okala_no', 'Ex- 9430340'],
                            ['Musaned No', 'musaned_no', 'Ex- 039409230'],
                          ] as [$label, $id, $placeholder])
                            <div class="py-2 flex flex-col gap-2">
                              <div class="font-bold text-lg">{{ $label }}</div>
                              <input type="{{ $id === 'mofa_date' ? 'date' : 'text' }}" id="{{ $id }}" name="{{ $id }}" class="form-control p-2 rounded-lg w-full uppercase" placeholder="{{ $placeholder }}" />
                            </div>
                          @endforeach
                        </div>
                        <div class="text-center pt-3">
                          <button type="submit" class="bg-[#289788] mb-2 hover:bg-[#074f56] p-3 rounded text-white font-semibold">Add Candidate Visa</button>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="bg-[#074f56] p-3 rounded text-white font-semibold" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
    
              <!-- Candidate Table Row -->
              <tr class="td-bg my-auto">
                <th scope="col">{{ $candidate->id }}</th>
                <td>
                  {{ date('d-m-Y', strtotime($candidate->created_at)) }}<br/>
                  {{ date('H:m', strtotime($candidate->created_at)) }}
                </td>
                <td><a href="{{ route('user/view', ['id' => $candidate->id]) }}" class="font-semibold hover:font-bold cursor-pointer hover:text-blue-400 ">{{ $candidate->name }}</a></td>
                <td>{{ $candidate->passport_number }}</td>
                <td>
                  {{ date('d-m-Y', strtotime($candidate->date_of_birth)) }}
                  <br/><span class="font-semibold">Age</span>: {{ $age }}
                </td>
                <td>
                  <strong>Visa No:</strong> {{ $candidate->visa_no }} <br/>
                  <strong>Sponsor ID:</strong> {{ $candidate->spon_id }}
                </td>
                <td>{{ $candidate->prof_name_english }}</td>
                <td>{{ $candidate->mofa_no }}</td>
               
              </tr>
            @endforeach
          </tbody>
    </table>
</div>

