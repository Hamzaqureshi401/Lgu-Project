
<!-- General JS Scripts -->
<script src="{{ URL::asset('assets/js/app.min.js')}}"></script>

 <script src="{{ asset('assets/bundles/izitoast/js/iziToast.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/toastr.js') }}"></script>

<!-- JS Libraies -->
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="{{ URL::asset('assets/js/scripts.js')}}"></script>
<!-- Custom JS File -->
<script src="{{ URL::asset('assets/js/custom.js')}}"></script>
<script type="text/javascript">
      
      @if(session('successToaster'))
       
        var msg = "{{session('successToaster')}}";
        var title = "{{session('title')}}";
        
         iziToast.success({
          title: title,
          message: msg,
          position: 'topRight'
        });
        @elseif(session('errorToaster'))
        var msg = "{{session('errorToaster')}}";
        var title = "{{session('title')}}";
         iziToast.error({
          title: title,
          message: msg,
          position: 'topRight'
        });
        @elseif(session('infoToaster'))
         var msg = "{{session('infoToaster')}}";
         var title = "{{session('title')}}";
         iziToast.info({
          title: title,
          message: msg,
          position: 'topRight'
        });
         @elseif(session('warningToaster'))
         var msg = "{{session('infoToaster')}}";
         var title = "{{session('title')}}";
         iziToast.warning({
          title: title,
          message: msg,
          position: 'topRight'
        });
        @endif
  </script>
</body>

</html>