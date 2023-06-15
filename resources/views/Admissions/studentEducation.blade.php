                  <div class="table-responsive">
                      <table class="table table-striped " id="sortable-table">
                          <thead>
                              <tr>
                                  <th class="text-center">
                                      <i class="fas fa-th"></i>
                                  </th>
                                  <th>Examination Passed</th>
                                  <th>Institution Appeared</th>
                                  <th>Roll No.</th>
                                  <th>Date Started <br>i.e (2019)</th>
                                  <th>Date Ended</th>
                                  <th>Total Marks</th>
                                  <th>Marks Obtained</th>
                              </tr>
                          </thead>
                          <tbody>


                              @foreach ($studentEducations as $studentEducation)
                                  {{-- {{dd($studentEducation);}} --}}
                                  <tr class="form-group" id="tr_clone">
                                      <td>
                                          <div class="sort-handler">
                                              <i class="fas fa-th"></i>
                                          </div>
                                      </td>
                                      <td>
                                          <select name="examination[]" class="form-control my-2">
                                              @php
                                                  $examinations = [
                                                      0 => 'Matric',
                                                      1 => 'FSC Pre-Eng',
                                                      2 => 'FSC Pre-Med',
                                                      3 => 'ICS',
                                                      4 => 'FA',
                                                      5 => 'D.Com',
                                                      6 => 'DAE',
                                                      7 => 'A-Level',
                                                      8 => 'O-Level',
                                                      9 => 'MS',
                                                      10 => 'BSCS',
                                                  ];
                                              @endphp
                                              @foreach ($examinations as $examination)
                                                  <option value="{{ $examination }}"
                                                       {{ $examination ==$studentEducation->Degree ? 'selected' : '' }}>
                                                      {{ $examination }}</option>
                                              @endforeach
                                          </select>
                                      </td>


                                      <td>
                                          <input type="text" name="InstitutionName[]" class="form-control"
                                              value="{{ $studentEducation->InstitutionName }}">
                                      </td>

                                      <td><input type="text" name="Rollno[]" class="form-control"
                                              value="{{ $studentEducation->Rollno }}"></td>
                                      <td><input type="date" name="DateStarted[]" class="form-control"
                                              value="{{ date('Y-m-d', strtotime($studentEducation->DateStarted)) }}">
                                      </td>
                                      <td><input type="date" name="DateEnd[]" class="form-control"
                                              value="{{ date('Y-m-d', strtotime($studentEducation->DateEnd)) }}"></td>
                                      <td><input type="text" name="ObtainedMarks[]" class="form-control"
                                              value="{{ $studentEducation->ObtainedMarks }}">
                                      </td>
                                      <td><input type="text" name="TotalMarks[]" class="form-control"
                                              value="{{ $studentEducation->TotalMarks }}">
                                      </td>
                                      <td style="display: none"><input type="text" name="educationID[]"
                                              class="form-control" value="{{ $studentEducation->ID }}"></td>


                                     @if($loop->index > 0)
                                        <td>
        <a class="btn btn-danger btn-sm tr_remove" >Remove Row</a>
    </td>
    @endif
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                      <div class="form-group">
                          <a class="btn btn-warning btn-block tr_clone_add" style="color:white;">Add New Row </a>

                      </div>
                      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

                      <script type="text/javascript">
                        

                          $(".tr_clone_add").live('click', function() {
                 var $tr = $('#tr_clone');
    var $clone = $tr.clone();
    $clone.find(':text').val('');
    $tr.after($clone);
    $clone.addClass('bg-success');
    
    var removeButton = $('<td></td>').append('<a class="btn btn-sm btn-danger tr_remove">Remove Row</a>');
    $clone.append(removeButton);
            });
            
        $(".tr_remove").live('click', function() {
            $(this).closest('tr').remove(); // Remove the corresponding table row
        });
                      </script>
