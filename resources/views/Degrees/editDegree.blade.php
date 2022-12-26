
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}    
                  <div class="card-body">
                    <input type="hidden" name="id" value="{{ $degree->ID }}">
                    <div class="form-group">
                      <label>Degree Name</label>
                      <input type="text" name="DegreeName" class="form-control"
                      value="{{ $degree['DegreeName'] }}" required>
                    </div>
                    <div class="form-group">
                      <label>Degree Level</label>
                      <input type="text" name="DegreeLevel" class="form-control" value="{{ $degree->DegreeLevel }}"required>
                    </div>
                    <div class="form-group">
                      <label>Degree Full Name</label>
                      <input type="text" name="DegreeFullName" class="form-control" value="{{ $degree['DegreeFullName'] }}"required>
                    </div>
                    <div class="form-group">
                      <label>Dpt ID</label>
                      <input type="number" name="Dpt_ID" class="form-control" value="{{ $degree['Dpt_ID'] }}"required>
                    </div>
                    <div class="form-group">
                      <label>Total Credit Hours</label>
                      <input type="number" name="Total_Credit_Hours" class="form-control" value="{{ $degree['Total_Credit_Hours'] }}"required>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <input type="number" name="Status" class="form-control" value="{{ $degree['Status'] }}"required>
                    </div>
                   
                <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
              </div>
            </form>
