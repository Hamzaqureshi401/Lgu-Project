              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                     <input type="hidden" name="id" value="{{ $designation->Des_ID }}">
                    <div class="form-group">
                      <label>Designation</label>
                      <input type="text" name="Designation" class="form-control" value="{{ $designation->Designation }}" required>
                    </div>
                    <div class="form-group">
                      <label>Dpt_ID</label>
                      <input type="number" name="Dpt_ID" class="form-control" value="{{ $designation->Dpt_ID }}" required>
                    </div>
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                
