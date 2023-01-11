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
                          <tr class="form-group">
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>
                          <select name="matric_examination[]" class="form-control my-2">
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
                           
                            <td> <div class="card-body">
                                <!-- only change id -->
                                
                              </div>
                              </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>