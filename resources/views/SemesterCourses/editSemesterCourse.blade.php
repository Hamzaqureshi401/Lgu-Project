
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="SemCourse_ID" value="{{ $semesterCourse->SemCourse_ID }}">
                 <div class="form-group">
                      <label>Semester</label>
                      <select class="form-control" name="Sem_ID"  >
                        @foreach($semesters as $semester)
                        <option value="{{ $semester->Sem_ID }}" {{ $semesterCourse->Sem_ID == $semester->Sem_ID ? 'selected' : '' }}>{{ $semester->SemSession }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Employee</label>
                      <input type="hidden" name="Emp_ID" value="{{ $semesterCourse->Emp_ID }}">
                     <input type="text" name=""  class="form-control" value="{{ $semesterCourse->employee->Emp_FirstName }}" readonly>
                    </div>
                    <div class="form-group">
                      <label>Campus Limit</label>
                      <input type="number" name="CampusLimit" value="{{ $semesterCourse->CampusLimit }}" class="form-control">
                    </div>

                     <div class="form-group">
                      <label>Degree / Course</label>
                      <select class="form-control" name="DegCourse_ID"  >
                        @foreach($degreeCourses as $degreeCourse)
                        <option value="{{ $degreeCourse->Degree_ID }}" {{ $semesterCourse->DegCourses_ID == $degreeCourse->DegCourses_ID ? 'selected' : '' }}>{{ $degreeCourse->getDegree->DegreeName }} / {{ $degreeCourse->getCourse->CourseName }} </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Quiz Weightage</label>
                      <input type="text" name="QuizWeightage" value="{{ $semesterCourse->QuizWeightage }}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Assignment Weightage</label>
                      <input type="text" name="AssignmentWeightage" value="{{ $semesterCourse->AssignmentWeightage }}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Presentation Weightage</label>
                      <input type="text" name="PresentationWeightage" value="{{ $semesterCourse->PresentationWeightage }}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Mid Weightage</label>
                      <input type="text" name="MidWeightage" value="{{ $semesterCourse->MidWeightage }}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>FinalWeightage</label>
                      <input type="text" name="FinalWeightage" value="{{ $semesterCourse->FinalWeightage }}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Section</label>
                      <input type="text" name="Section" value="{{ $semesterCourse->Section }}" class="form-control">
                    </div>
                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
               </div>
             </form>
                



      