 </div>
                </div>
              </div>
            </div>
       <!-- Modal with form -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" style="max-width: 80%;"  role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">{{ $modalTitle }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body">
        <!-- Here Modal form Loads -->
                </div>
            
            </div>
          </div>
        </div>
        </section>


  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>


  <!-- <script type="text/javascript">

  $(document).ready(function(){    
   var table= $('.table-datatable').DataTable({
        paging:false,
        sDom:"ltipr",
        ordering:false,
    });
    $('.search-inp').on('keyup',function(){
      table.search($(this).val()).draw() ;
});
});

  $("#exampleModal").prependTo("body");  
   $('.gt-data').click(function(){
    var getEditRoute = @json($getEditRoute);
   $.get(getEditRoute + '/' + ($(this).data('id')) , function(success){
      $("#exampleModal .modal-body").show();
      $('#exampleModal .modal-body').html(success);
      $(document).ready( function () {
       $("#myForm").bind("submit", function (evt) {
          evt.preventDefault();
       var route = @json($route);
          $.ajax({
            type: 'post',
            url: route,
            data: $('form').serialize(),
            success: function (data) {
               swal(data.title, data.message, data.type);
                if (data.type == 'success')
                {
                  $('#exampleModal .close').click();
                }
              },error: function (jqXHR, exception) {
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
                var er = "Error Occured!";
                swal(er, msg, "error");
            },
          });
        });
      });
    });
});

</script>   
 -->