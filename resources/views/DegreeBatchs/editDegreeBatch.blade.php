
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                 <div class="card-body">
                    <div class="form-group">
                      <input type="hidden" name="id" value="{{ $degreeBatches->ID }}">
                      <label>Degree</label>
                      <select class="form-control" name="Degree_ID"  required>
                        @foreach($degrees as $degree)
                        <option value="{{ $degree->ID }}"
                          {{ $degreeBatches->Degree_ID == $degree->ID ? 'selected' : '' }}
                          >{{ $degree->DegreeName }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Batch</label>
                      <select class="form-control" name="Batch_ID"  required>
                        @foreach($batches as $semester)
                        <option 
                        value="{{ $semester->ID }}" 
                        {{ $degreeBatches->Batch_ID == $semester->ID ? 'selected' : '' }}>{{ $semester->SemSession }}</option>
                        @endforeach
                      </select>
                    </div>
                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
               </div>
             </form>
                



      