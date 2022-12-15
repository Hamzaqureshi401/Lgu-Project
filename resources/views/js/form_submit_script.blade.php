
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script type="text/javascript">
  
  var total = 0;
   $(function () {
       document.querySelector("#myForm").addEventListener("submit", function (evt) {
          evt.preventDefault();
          var btn = document.getElementById('button');
          btn.innerText = 'Saving Wait..';
          var route = @json($route);
          var formData = new FormData(this);
          console.log(formData);
          $.ajax({
            type: 'post',
            url: route,
            data: formData,
            success: function (data) {
              swal(data.title, data.message, data.type);
               var btn = document.getElementById('button');
                btn.disabled = false;
                 if (data.type == 'success')
                {
                  $('#myForm')[0].reset();
                   total = total + 1;
                  btn.innerText = 'Again Save New Customer (Totoal Saved '+total+')';
                }else{
                  btn.innerText = 'Try Again';
                }
               
              },
              cache: false,
              contentType: false,
              processData: false
          });
        });
      });
</script>

