
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script type="text/javascript">
  
  var total = 0;
   $(function () {
       document.querySelector("#myForm").addEventListener("submit", function (evt) {
          evt.preventDefault();
          var btn = document.getElementById('button');
          btn.innerText = 'Saving Wait..';
          var route = @json($route);
          $.ajax({
            type: 'post',
            url: route,
            data: $('form').serialize(),
            success: function (data) {
             
              swal(data.title, data.message, data.type);
              $('#myForm')[0].reset();
               var btn = document.getElementById('button');
                btn.disabled = false;
                total = total + 1;
                btn.innerText = 'Again Save New Customer (Totoal Saved '+total+')';
              }
          });
        });
      });
</script>

