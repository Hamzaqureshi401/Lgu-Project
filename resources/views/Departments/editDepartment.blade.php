              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                    <input type="hidden" name="id" value="{{ $department->Dpt_ID }}">
                    <div class="form-group">
                      <label>Dpt Name</label>
                      <input type="text" name="Dpt_Name" class="form-control" value="{{ $department->Dpt_Name }} ">
                    </div>
                    <div class="form-group">
                      <label>Dpt Full Name</label>
                      <input type="text" name="Dpt_FullName" class="form-control" value="{{ $department->Dpt_FullName }}" required>
                    </div>
                    <div class="form-group">
                      <label>HODUID</label>
                      <input type="number" name="HODUID" class="form-control" value="{{ $department->HODUID }}" required>
                    </div>
                    <div class="form-group">
                      <label>Dean U ID</label>
                      <input type="number" name="DeanUID" class="form-control" value="{{ $department->DeanUID }}" required>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <input type="number" name="Status" class="form-control" value="{{ $department->Status }}" required>
                    </div>
                  <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                </div>
              </form>
                


      