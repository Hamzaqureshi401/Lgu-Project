<!-- 
<script type="text/javascript">

  var total = 0;
   $(function () {
       $("#myForm").bind("submit", function (evt) {
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
                //   $('#myForm')[0].reset();
                   total = total + 1;
                  btn.innerText = 'Again Save New Customer (Totoal Saved '+total+')';
                }else{
                  btn.innerText = 'Try Again';
                }

              },
               error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error Please Ask for Administration';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                console.log(msg);
                var er = "Error Occured!";
                swal(er, msg, "error");
            },
              cache: false,
              contentType: false,
              processData: false
          });
        });
      });
</script> -->