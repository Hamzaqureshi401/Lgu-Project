@extends('layouts.app_new')
@section('title')  @endsection 
@section('content')
      <!-- style="transform: rotate(90deg) scale(.7);" -->

      @push('styles')
        <style type="text/css"  media="print">
            h3 {
              text-align: center;
            }
            .receipt {
              height: 8.5in;
              width: 33%;
              float: left;
              border: 1px solid black;
            }
            /*.output {
              height;
              8.5in;
              width: 11in;
              border: 1px solid red;
              position: absolute;
              
            }*/
            .output
    {
     -webkit-transform: rotate(-90deg); 
     -moz-transform:rotate(-90deg);
     filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    }
            @media print {
              .output {
                -ms-transform: rotate(270deg);
                /* IE 9 */
                -webkit-transform: rotate(270deg);
                /* Chrome, Safari, Opera */
                transform: rotate(270deg);
                top: 1.5in;
                left: -1in;
              }
            }
  </style>
      @endpush
            <div class="row  html-content output" id="printableArea">
                <table id="vertical" style="width:100%; background-color:white;">
                    <tr>

                    @include('Challans.pr_Challan_Single_View')
                    @include('Challans.pr_Challan_Single_View')
                    @include('Challans.pr_Challan_Single_View')

                    </tr>
                    </table>
            </div>
         
        
       <a class="btn btn-warning btn-icon icon-left" style="color: white;" onClick="CreatePDFfromHTML()"><i class="fas fa-print"></i> Pdf Download</a>
       <input type="button" onclick="printDiv('printableArea')" value="print a div!" />
      
  
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" 
    integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/"
    crossorigin="anonymous"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<!-- html2canvas 1.0.0-alpha.11 or higher version is needed -->


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


    //  let pWidth = pdf.internal.pageSize.width; // 595.28 is the width of a4
    // let srcWidth = document.getElementById('idName').scrollWidth;
    // let margin = 18; // narrow margin - 1.27 cm (36);
    // let scale = (pWidth - margin * 2) / srcWidth;
    // let pdf = new jsPDF('p', 'pt', 'a4');
    // pdf.html(document.getElementById('divToPrint'), {
    //     x: margin,
    //     y: margin,
    //     html2canvas: {
    //         scale: scale,
    //     },
    //     callback: function () {
    //         window.open(pdf.output('bloburl'));
    //     }
    // });
}

// function printDiv(divName) {
//      var printContents = document.getElementById(divName).innerHTML;
//      var frame = document.getElementsByClassName('html-content').item(0);
//     var data = frame.innerHTML;
//     var win = window.open('', '', 'height=500,width=900');
//     win.document.write('<style>@page{size:landscape;}</style><html><head><title></title>');
//     win.document.write('</head><body >');
//     win.document.write(data);
//     win.document.write('</body></html>');
//     win.print();
//     win.close();
//     return true;
// }
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

</script>
@endsection