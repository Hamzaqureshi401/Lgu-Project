@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              
                  <div class="card-body">
                   <div class="form-group">
                      <label>Degree Batch</label>
                      <select class="form-control select2" name="DegBatches_ID"  required>
                        @foreach($degreeBatches as $degreeBatche)
                        <option value="{{ $degreeBatche->ID }}">{{ $degreeBatche->degree->DegreeName ?? '' }} / {{ $degreeBatche->batch->SemSession ?? '' }}</option>
                        @endforeach
                      </select>
                    </div>

                   <div class="form-group">
                      <label>Semester Course</label>
                      <select class="form-control select2" name="SemCourse_ID" required>
                          <option value="" disabled selected>Select Semester Course</option>
                      </select>
                  </div>
                    <div class="form-group">
                      <label>Class Section </label>
                      <select class="form-control select2" name="Section"  required>
                        @foreach (range('A', 'Z') as $letter)
                    <option value="{{ $letter }}">{{ $letter }} </option>
                    @endforeach
                      </select>
                    </div>
                   <div class="form-group">
                      <label>Employee </label>
                      <select class="form-control select2" name="Emp_ID"  required>
                        @foreach($employees as $employee)
                        <option value="{{ $employee->ID }}">{{ $employee->Emp_FirstName }} {{ $employee->Emp_LastName }}</option>
                        @endforeach
                      </select>
                    </div>
                    
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
              </div>

              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Variables to track pagination
    let currentPage = 1;
const perPage = 1000; // Number of options per page

// Function to fetch options
function fetchOptions(page) {
    $.ajax({
        url: `/api/semester-courses?page=${page}&per_page=${perPage}`,
        method: 'GET',
        success: function(response) {
            const options = response.data;

            // Append fetched options to the select element
            const selectElement = $('select[name="SemCourse_ID"]');
            options.forEach(option => {
                const optionElement = $('<option>');
                optionElement.val(option.ID).text(`${option.semester.SemSession} / ${option.course ? option.course.CourseName : 'No Course'}`);

                selectElement.append(optionElement);
            });

            // Check if more options are available
            if (options.length === perPage) {
                fetchOptions(page + 1); // Fetch the next page
            }
        },
        error: function(error) {
            console.error(error);
        }
    });
}

// Initial fetch
fetchOptions(currentPage);

</script>

                
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      