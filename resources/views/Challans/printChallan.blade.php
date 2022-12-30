@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
<section class="section">

   <div class="section-body" id="divToPrint">
      <div class="invoice">
         <div class="invoice-print">
            <div class="row  html-content">
               @include('Challans.challanSingleview')
               @include('Challans.challanSingleview')
               @include('Challans.challanSingleview')
            </div>
         </div>
         <hr>
        
       <a class="btn btn-warning btn-icon icon-left" style="color: white;" onClick="CreatePDFfromHTML()"><i class="fas fa-print"></i> Pdf Download</a>
      </div>
      </div>
   </div>
    
      </div>
   </div>
</section>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script type="text/javascript">
	     
   

  //Create PDf from HTML...
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
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('l', 'pt', [PDF_Height , PDF_Width]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("Your_PDF_Name.pdf");
        //$(".html-content").hide();
    });
}

</script>
@endsection