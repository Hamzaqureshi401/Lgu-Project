              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                     <input type="hidden" name="id" value="{{ $designation->ID }}">
                    <div class="form-group">
                      <label>Designation</label>
                      <input type="text" name="Designation" class="form-control" value="{{ $designation->Designation }}" >
                    </div>
                    <div class="form-group">
                      <label>Dpt Name</label>
                      <select class="form-control" name="Dpt_ID"  required>
                        @foreach($departments as $department)
                        <option value="{{ $department->ID }}" {{ $department->ID == $designation->Dpt_ID ? 'selected' : '' }}>{{ $department->Dpt_Name }}</option>
                        @endforeach
                      </select>
                    </div>
                <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
              </div>
            </form>
                
