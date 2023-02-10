@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
<style type="text/css">
   .img{
   width: 20%; 
   height: 60%;
   }  


@page {
    size: 21cm 29.7cm;
/*    margin: 30mm 45mm 30mm 45mm;*/
     /* change the margins as you want them to be. */
}

@media print {
    body{
        width: 21cm;
        height: 29.7cm;
        visibility: hidden;
        -webkit-print-color-adjust:exact !important;
  		print-color-adjust:exact !important;
        /* change the margins as you want them to be. */
   } 
   #content, #content * {
    visibility: visible;
  }
  * {
    color-adjust: exact !important;
    -webkit-print-color-adjust: exact !important;
    print-color-adjust: exact !important;
  }

}



</style>
<section class="section page" id="content">
   <div class="section-body html-content" >
      <div class="invoice">
         <div class="invoice-print">
            <div class="row">
               <div class="col">
                  <div class="img">
                     <img src="{{ asset('images/lgu_logo.jpg') }}"
                        alt="lgu logo"style="height:100px;width:100px;" />
                  </div>
               </div>
               <div class="col text-center" >
                  <div>
                     <h1>Lahore Garrison University</h1>
                     <h3 style="color: red;">[Student Fact Sheet]</h3>
                  </div>
               </div>
               <div class="col">
                  <div class="img float-right">
                     <img src="{{ asset('images/Reserved.ReportViewerWebControl.jfif') }}"
                        alt="lgu logo"style="height:100px;width:100px;" />
                  </div>
               </div>
            </div>
            <hr>
            <div class="row">
               <div class="col-12 bg-dark" style="color: white;">
                  <b>Personal details:</b>
               </div>
            </div>
            <div class="row">
               <div class="col-4">
                  <span><b>Name:</b> </span> {{ $student->Std_FName ?? '--'}}{{ $student->Std_LName ?? '--'}}
               </div>
               <div class="col-4">
                  <span><b>Father Name:</b> </span> {{ $student->FatherName ?? '--' }}
               </div>
               <div class="col-4">
                  <span><b>Section:</b> </span>
               </div>
            </div>
            <br>
            <div class="row">
               <div class="col-6">
                  <span><b>Cnic:</b> </span>{{ $student->CNIC ?? '--' }}
               </div>
               <div class="col-6">
                  <span><b>City:</b> </span>{{ $student->City ?? '--' }}
               </div>
            </div>
            <div class="row">
               <div class="col-12 bg-dark" style="color: white;">
                  <b>Contact details:</b>
               </div>
            </div>
            <div class="row">
               <div class="col-6">
                  <span><b>Contact:</b> </span>{{ $student->StdPhone ?? '--' }}
               </div>
               <div class="col-6">
                  <span><b>Home No:</b> </span>{{ $student->GuardianPhone ?? '--' }}
               </div>
            </div>
            <br>
            <div class="row">
               <div class="col-6">
                  <span><b>Mailing Adress:</b> </span>{{ $student->Address ?? '--' }}
               </div>
               <div class="col-6">
                  <span><b>Mailing City:</b> </span>{{ $student->City ?? '--' }}
               </div>
            </div>
            <div class="row">
               <div class="col-12 bg-dark" style="color: white;">
                  <b>Parents details:</b>
               </div>
            </div>
            <div class="row">
               <div class="col-6">
                  <span><b>Sponser:</b> </span>
               </div>
               <div class="col-6">
                  <span><b>Father Profession:</b> </span>{{ $student->ParentOccupation ?? '--' }}
               </div>
            </div>
            <br>
            <div class="row">
               <div class="col-6">
                  <span><b>Father Name:</b> </span>{{ $student->FatherName ?? '--' }}
               </div>
               <div class="col-6">
                  <span><b>Father Contact:</b> </span>{{ $student->FatherPhone ?? '--' }}
               </div>
            </div>
            <div class="row">
               <div class="col-12 bg-dark" style="color: white;">
                  <b> .</b>
               </div>
            </div>
            <div class="table-responsive">
               <table class="table table-bordered table-striped table-datatable" id="sortable-table">
                  <thead>
                     <tr>
                        <th class="text-center">
                           <i class="fas fa-th"></i>
                        </th>
                        <th>Student</th>
                        <th>Semester Course</th>
                        <th>Mid</th>
                        <th>Final</th>
                        <th>Status</th>
                        
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($Enrollment  as $enrollment)
                     <tr>
                        <td>
                           <div class="sort-handler">
                              <i class="fas fa-th"></i>
                           </div>
                        </td>
                        <td>{{ $enrollment->student->Std_FName ?? '--' }} {{ $enrollment->student->Std_LName ?? '--' }}</td>
                        <td>{{ $enrollment->SemesterCourse->semester->SemSession ?? '--' }}/{{ $enrollment->SemesterCourse->course->CourseName ?? '--' }}</td>
                        <td>{{ $enrollment->Is_i_mid  ?? '--'}}</td>
                        <td>{{ $enrollment->Is_i_final  ?? '--'}}</td>
                        <td>{{ $enrollment->Status  ?? '--'}}</td>
                        
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
             <div class="row">
               <div class="col-12 bg-dark" style="color: white;">
                  <b> .</b>
               </div>
            </div>
            <div class="table-responsive">
               <table class="table table-bordered table-striped table-datatable" id="sortable-table">
                  <thead>
                     <tr>
                        <th class="text-center">
                           <i class="fas fa-th"></i>
                        </th>
                        <th>Degree</th>
                        <th>InstitutionName</th>
                        <th>DateStarted</th>
                        <th>DateEnd</th>
                        <th>ObtainedMarks</th>
                        <th>TotalMarks</th>
                        <th>Rollno</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($StudentEducation  as $enrollment)
                     <tr>
                        <td>
                           <div class="sort-handler">
                              <i class="fas fa-th"></i>
                           </div>
                        </td>
                        <td>{{ $enrollment->Degree ?? '--' }} </td>
                        <td>{{ $enrollment->InstitutionName ?? '--' }} </td>
                        <td>{{ $enrollment->DateStarted ?? '--' }} </td>
                        <td>{{ $enrollment->DateEnd ?? '--' }} </td>
                        <td>{{ $enrollment->ObtainedMarks ?? '--' }} </td>
                        <td>{{ $enrollment->TotalMarks ?? '--' }} </td>
                        <td>{{ $enrollment->Rollno ?? '--' }} </td>
                        
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <div id="editor"></div>
            <!-- <button id="cmd" onclick="CreatePDFfromHTML();">generate PDF</button> -->
            <hr>
         </div>
      </div>
   </div>
</section>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
 <script type="text/javascript">
        function CreatePDFfromHTML() {
    var HTML_Width = $(".html-content").width();
    var HTML_Height = $(".html-content").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($(".html-content")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/jpeg", 7.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("Your_PDF_Name.pdf");
        //$(".html-content").hide();
    });
}
    </script> -->
@endsection