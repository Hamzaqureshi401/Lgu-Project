@extends('layouts.app_new')
@section('title')  @endsection 
@section('content')
<!-- style="transform: rotate(90deg) scale(.7);" -->
<body class="A4 landscape">
   <!-- Each sheet element should have the class "sheet" -->
   <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
   <section class="sheet padding-10mm" style="transform: scale(.9);">
      <!-- Write HTML just like a web page -->
      <div class="html-content" id="printableArea">
         <table id="vertical" style="width:100%; background-color:white;">
            <tr>
               @include('Challans.pr_Challan_Single_View')
               @include('Challans.pr_Challan_Single_View')
               @include('Challans.pr_Challan_Single_View')
            </tr>
         </table>
      </div>
   </section>
   <hr>

</body>
<body>
    <section>
        <div class="bg-white text-center" style=" margin-left: 50px; margin-bottom: 90px; width:93%;">
   <a class="btn btn-warning btn-icon icon-left" style="color: white; margin: 10px;" onclick="printDiv('printableArea')"><i class="fas fa-print"></i> Print Challan</a>
   
</div>
    </section>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    function printDiv(divName) {
       var printContents = document.getElementById(divName).innerHTML;
       var originalContents = document.body.innerHTML;
   
       document.body.innerHTML = printContents;
   
       window.print();
   
       document.body.innerHTML = originalContents;
    }
   
</script>
@endsection