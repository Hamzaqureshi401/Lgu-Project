
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                    <input type="hidden" name="id" value="{{ $courses->Course_ID }}">
                    <div class="form-group">
                      <label>Course Code</label>
                      <input type="text" name="CourseCode" class="form-control" value="{{ $courses->CourseCode }} "required>
                    </div>
                    <div class="form-group">
                      <label>Course Name</label>
                      <input type="text" name="CourseName" class="form-control" value="{{ $courses->CourseName }}" required>
                    </div>
                    <div class="form-group">
                      <label>Credit Hours</label>
                      <input type="number" name="CreditHours" class="form-control" value="{{ $courses->CreditHours }}" required>
                    </div>
                    <div class="form-group">
                      <label>Lecture Type</label>
                      <input type="text" name="LectureType" class="form-control" value="{{ $courses->LectureType }}" required>
                    </div>
                <a id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</a>
                



      