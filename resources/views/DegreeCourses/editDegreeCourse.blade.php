
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                 <div class="card-body">
                    <div class="form-group">
                      <input type="hidden" name="id" value="{{ $designation->DegCourses_ID }}">
                      <label>Degree</label>
                      <select class="form-control" name="Degree_ID"  required>
                        @foreach($degrees as $degree)
                        <option value="{{ $degree->Degree_ID }}">{{ $degree->DegreeName }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Course</label>
                      <select class="form-control" name="Course_ID"  required>
                        @foreach($courses as $course)
                        <option value="{{ $course->Course_ID }}">{{ $course->CourseName }}</option>
                        @endforeach
                      </select>
                    </div>
                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
               </div>
             </form>
                



      