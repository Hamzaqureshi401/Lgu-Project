
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $semester->Sem_ID }}">
                  <div class="form-group">
                      <label>Sem Session</label>
                      <input type="text" value="{{ $semester->SemSession }}" name="SemSession" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Year</label>
                      <input type="number" value="{{ $semester->Year }}" name="Year" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>Sem Start Date</label>
                      <input type="Date" value="{{ $semester->SemStartDate }}" name="SemStartDate" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>Sem End Date</label>
                      <input type="Date" value="{{ $semester->SemEndDate }}" name="SemEndDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Enrollment Start Date</label>
                      <input type="Date" value="{{ $semester->EnrollmentStartDate }}" name="EnrollmentStartDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Enrollment End Date</label>
                      <input type="Date" value="{{ $semester->EnrollmentEndDate }}" name="EnrollmentEndDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Exam Start Date</label>
                      <input type="Date" value="{{ $semester->ExamStartDate }}" name="ExamStartDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Exam End Date</label>
                      <input type="Date" value="{{ $semester->ExamEndDate }}" name="ExamEndDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>I mid StartDate</label>
                      <input type="Date" value="{{ $semester->I_mid_StartDate }}" name="I_mid_StartDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>I mid EndDate</label>
                      <input type="Date" value="{{ $semester->I_mid_EndDate }}" name="I_mid_EndDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>I final StartDate</label>
                      <input type="Date" value="{{ $semester->I_final_StartDate }}" name="I_final_StartDate" class="form-control"required>
                    </div>
                 <div class="form-group">
                      <label>I final EndDate</label>
                      <input type="Date" value="{{ $semester->I_final_EndDate }}" name="I_final_EndDate" class="form-control"required>
                    </div>
                <a id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</a>
                



      