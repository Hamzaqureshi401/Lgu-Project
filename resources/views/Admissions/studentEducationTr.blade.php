<tr class="form-group " id="tr_clone">
    <td>
      <div class="sort-handler ">
        <i class="fas fa-th"></i>
      </div>
    </td>
    <td>
  <select name="examination[]" class="form-control border border-1 rounded border-dark my-2">
    @php
     $examinations = [
     0 => 'Matric',
     1 => 'FSC Pre-Eng' , 
     2 => 'FSC Pre-Med' , 
     3 => 'ICS',
     4 => 'FA',
     5 => 'D.Com',
     6 => 'DAE',
     7 => 'A-Level',
     8 => 'O-Level',
     9 => 'MS',
     10 => 'BSCS',

     ];
    @endphp 
  @foreach($examinations as $examination)
            <option value="{{ $examination }}" >{{ $examination }}</option>
  @endforeach
         </select>
    </td>
   
    <td>
      <input type="text" name="InstitutionName[]" class="form-control border border-1 rounded border-dark" value="">
    </td>
     <td><input type="number" name="Rollno[]" class="form-control border border-1 rounded border-dark" value=""></td>
     <td><input type="date" name="DateStarted[]" class="form-control border border-1 rounded border-dark" value=""></td>
      <td><input type="date" name="DateEnd[]" class="form-control border border-1 rounded border-dark" value=""></td>
       <td><input type="number" name="ObtainedMarks[]" class="form-control border border-1 rounded border-dark" value=""></td>
        <td><input type="number" name="TotalMarks[]" class="form-control border border-1 rounded border-dark" value=""></td>
        
           <td></td>
           <td style="display: none"><input type="text" name="educationID[]" class="form-control border border-1 rounded border-dark" value=""></td>

   
   
  </tr>