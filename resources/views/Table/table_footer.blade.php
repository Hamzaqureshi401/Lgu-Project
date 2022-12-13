 </div>
                </div>
              </div>
            </div>
          </div>
        </section>

 <!-- Modal with form -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
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

 <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/advance-table.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
 
  <script type="text/javascript">
  $("#exampleModal").prependTo("body");  
   $('.gt-data').click(function(){
    var getEditRoute = @json($getEditRoute);
   $.get(getEditRoute + '/' + ($(this).data('id')) , function(success){
      $("#exampleModal .modal-body").show();
      $('#exampleModal .modal-body').html(success);
      $(document).ready( function () {
       document.querySelector("#myForm").addEventListener("submit", function (evt) {
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
                
              }
          });
        });
      });
    });
});

</script>   
