
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $semesterDetail->ID }}">
                 <div class="card-body">
                   <div class="form-group">
                      <label>Degree</label>
                      <select class="form-control" name="Degree_ID"  >
                        @foreach($degrees as $degree)
                        <option value="{{ $degree->ID }}" {{ $degree->ID == $semesterDetail->Degree_ID ? 'selected' : '' }}>
                          {{ $degree->DegreeName }}
                        </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Semester</label>
                      <select class="form-control" name="Sem_ID"  >
                        @foreach($semesters as $semester)
                        <option value="{{ $semester->ID }}"{{ $semester->ID == $semesterDetail->Sem_ID ? 'selected' : '' }}>{{ $semester->SemSession }} </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Semester No</label>
                      <input type="number" name="SemesterNo" class="form-control" value="{{ $semesterDetail->SemesterNo }}"required>
                    </div>
                    <div class="form-group">
                      <label>Semester Fee</label>
                      <input type="text" name="SemesterFee" class="form-control" value="{{ $semesterDetail->SemesterFee }}"required>
                    </div>
                    <div class="form-group">
                      <label>Per Semester</label>
                      <input type="number" name="PerSemester" class="form-control" value="{{ $semesterDetail->PerSemester }}"required>
                    </div>
                    <div class="form-group">
                      <label>Per Course</label>
                      <input type="text" name="PerCourse" class="form-control" value="{{ $semesterDetail->PerCourse }}"required>
                    </div>
                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
               </div>
             </form>
                



      