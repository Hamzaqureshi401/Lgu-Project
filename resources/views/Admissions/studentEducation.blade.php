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

                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($studentEducations as $education)
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
                             1 => 'FSC Pre-Eng' , 
                             2 => 'FSC Pre-Med' , 
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
                          @foreach($examinations as $examination)
                                    <option value="{{ $examination }}" {{ $examination == $education->Degree ? 'selected' : '' }}>{{ $examination }}</option>
                          @endforeach
                                 </select>
                            </td>
                           
                            <td>
                              <input type="text" name="InstitutionName[]" class="form-control" value="{{ $education->InstitutionName ?? '' }}">
                            </td>
                             <td><input type="text" name="Rollno[]" class="form-control" value="{{ $education->Rollno ?? '' }}"></td>
                             <td><input type="text" name="DateStarted[]" class="form-control" value="{{ $education->DateStarted ?? '' }}"></td>
                              <td><input type="text" name="DateEnd[]" class="form-control" value="{{ $education->DateEnd ?? '' }}"></td>
                               <td><input type="text" name="ObtainedMarks[]" class="form-control" value="{{ $education->ObtainedMarks ?? '' }}"></td>
                                <td><input type="text" name="TotalMarks[]" class="form-control" value="{{ $education->TotalMarks ?? '' }}"></td>
                                
                                   <td>{{ $education->Std_ID ?? '' }}</td>
                                   <td style="display: none"><input type="text" name="educationID[]" class="form-control" value="{{ $education->ID ?? '' }}"></td>

                           
                            <td> <div class="card-body">
                               
                              </div>
                              </td>
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
                    var $tr    = $('#tr_clone').closest('#tr_clone');
                    var $clone = $tr.clone();
                    $clone.find(':text').val('');
                    $tr.after($clone);
                    $clone.addClass('bg-warning');
                });

                  </script>