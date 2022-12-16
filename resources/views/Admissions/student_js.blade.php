<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

    <script type= "text/javascript" src = "{{ URL::asset('assets/js/countries.js') }}"></script>
<script language="javascript">
    print_country("country");
</script>



<script>
    $(":input").inputmask();
</script>


<script>
  function fillAddress(){
  if ($("#homepostalcheck").is(":checked")) {
    $('#permanent_address').val($('#present_address').val());
    $('#permanent_city').val($('#present_city').val());
    $('#permanent_province').val($('#present_province').val());
    $('#permanent_address').prop('readonly', true);
    $('#permanent_city').prop('readonly', true);
    $('#permanent_province').prop('readonly', true);
    if($('#permanent_address').val() == ""){
      $('#permanent_address').removeAttr('readonly')
    }
    if($('#permanent_city').val() == ""){
      $('#permanent_city').removeAttr('readonly')
    }
    if($('#permanent_province').val() == ""){
      $('#permanent_province').removeAttr('readonly')
    }
  } else {
    $('#permanent_address').removeAttr('readonly');
    $('#permanent_city').removeAttr('readonly')
    $('#permanent_province').removeAttr('readonly')
  }
}
$('#homepostalcheck').click(function(){
  fillAddress();
})
  function matric_wait(){
    if ($("#matric_wait").is(":checked") || $("#matric_waits").is(":checked")) {
      $('#matric_marks_obtained').val("0");
      $('#matric_percentage').val("0");
      $('#matric_marks_obtained').prop('readonly', true);
    }
    else{
      $('#matric_marks_obtained').val("");
      $('#matric_percentage').val("");
      $('#matric_marks_obtained').prop('readonly', false);
    }
  }

$('#matric_wait').click(function(){
  matric_wait();
})
$('#matric_waits').click(function(){
  matric_wait();
})

function fsc_wait(){
    if ($("#fsc_wait").is(":checked") || $("#fsc_waits").is(":checked")) {
      $('#fsc_marks_obtained').val("0");
      $('#fsc_percentage').val("0");
      $('#fsc_marks_obtained').prop('readonly', true);
    }
    else{
      $('#fsc_marks_obtained').val("");
      $('#fsc_percentage').val("");
      $('#fsc_marks_obtained').prop('readonly', false);
    }
  }

$('#fsc_wait').click(function(){
  fsc_wait();
})
$('#fsc_waits').click(function(){
  fsc_wait();
})


function becholars_wait(){
    if ($("#becholars_wait").is(":checked") || $("#becholars_waits").is(":checked")) {
      $('#becholars_marks_obtained').val("0");
      $('#becholars_percentage').val("0");
      $('#becholars_marks_obtained').prop('readonly', true);
    }
    else{
      $('#becholars_marks_obtained').val("");
      $('#becholars_percentage').val("");
      $('#becholars_marks_obtained').prop('readonly', false);
    }
  }

$('#becholars_wait').click(function(){
  becholars_wait();
})
$('#becholars_waits').click(function(){
  becholars_wait();
})


function master_wait(){
    if ($("#master_wait").is(":checked") || $("#master_waits").is(":checked")) {
      $('#master_marks_obtained').val("0");
      $('#master_percentage').val("0");
      $('#master_marks_obtained').prop('readonly', true);
    }
    else{
      $('#master_marks_obtained').val("");
      $('#master_percentage').val("");
      $('#master_marks_obtained').prop('readonly', false);
    }
  }

$('#master_wait').click(function(){
  master_wait();
})
$('#master_waits').click(function(){
  master_wait();
})

function masters_wait(){
    if ($("#masters_wait").is(":checked") || $("#masters_waits").is(":checked")) {
      $('#masters_marks_obtained').val("0");
      $('#masters_percentage').val("0");
      $('#masters_marks_obtained').prop('readonly', true);
    }
    else{
      $('#masters_marks_obtained').val("");
      $('#masters_percentage').val("");
      $('#masters_marks_obtained').prop('readonly', false);
    }
  }

$('#masters_wait').click(function(){
  masters_wait();
})
$('#masters_waits').click(function(){
  masters_wait();
})

</script>

<script>
  $(document).ready(function(){
    $('#matric_marks_obtained').on('change', function(){
        var total_marks=$('#matric_total_marks').val();
        var marks_obtaind=$('#matric_marks_obtained').val();
        if(parseInt(marks_obtaind) > parseInt(total_marks)){
          alert("Obtained Marks Should be less than "+total_marks);
          $('#matric_marks_obtained').val("");
        }
        else{
        var count = (marks_obtaind/total_marks)*100;
        $('#matric_percentage').empty();
        $('#matric_percentage').val(count.toFixed(2));
        }
    });
    $('#fsc_marks_obtained').on('change', function(){
        var total_marks=$('#fsc_total_marks').val();
        var marks_obtaind=$('#fsc_marks_obtained').val();
        if(parseInt(marks_obtaind) > parseInt(total_marks)){
          alert("Obtained Marks Should be less than "+total_marks);
          $('#fsc_marks_obtained').val("");
        }
        else{
        var count = (marks_obtaind/total_marks)*100;
        $('#fsc_percentage').empty();
        $('#fsc_percentage').val(count.toFixed(2));
        }
    });
    $('#becholars_marks_obtained').on('change', function(){
        var total_marks=$('#becholars_total_marks').val();
        var marks_obtaind=$('#becholars_marks_obtained').val();
        if(parseInt(marks_obtaind) > parseInt(total_marks)){
          alert("Obtained Marks Should be less than "+total_marks);
          $('#becholars_marks_obtained').val("");
        }
        else{
        var count = (marks_obtaind/total_marks)*100;
        $('#becholars_percentage').empty();
        $('#becholars_percentage').val(count.toFixed(2));
        }
    });
    $('#master_marks_obtained').on('change', function(){
        var total_marks=$('#master_total_marks').val();
        var marks_obtaind=$('#master_marks_obtained').val();
        if(parseInt(marks_obtaind) > parseInt(total_marks)){
          alert("Obtained Marks Should be less than "+total_marks);
          $('#master_marks_obtained').val("");
        }
        else{
        var count = (marks_obtaind/total_marks)*100;
        $('#master_percentage').empty();
        $('#master_percentage').val(count.toFixed(2));
        }
    });
    $('#masters_marks_obtained').on('change', function(){
        var total_marks=$('#masters_total_marks').val();
        var marks_obtaind=$('#masters_marks_obtained').val();
        if(parseInt(marks_obtaind) > parseInt(total_marks)){
          alert("Obtained Marks Should be less than "+total_marks);
          $('#masters_marks_obtained').val("");
        }
        else{
        var count = (marks_obtaind/total_marks)*100;
        $('#masters_percentage').empty();
        $('#masters_percentage').val(count.toFixed(2));
        }
    });
});
  </script>

  <script>
    var count = 0;
    $(".Courses_Class_Validation").change((function() {
        $("#error_message").html("");
        var i = $(this);
        if (parseInt($(this).val()) > 3) i.val("");
        else {
            if ("" == $(this).val()) count -= 1, $(".Courses_Class_Validation").each((function() {
                $(this).prop("readonly", !1)
            }));
            else if (count <= 3) {
                var e = !1;
                $(".Courses_Class_Validation").each((function() {
                    $(this).val() == i.val() && $(this).attr("id") != i.attr("id") && (e = !0, $(".Courses_Class_Validation").each((function() {
                        $(this).prop("readonly", !1)
                    })))
                })), 0 == e ? count += 1 : (3 == count && (count -= 1), i.val(""))
            }
            console.log(count, "===> COunt"), 3 == count ? $(".Courses_Class_Validation").each((function() {
                "" == $(this).val() && ($(this).val(""), $(this).prop("readonly", !0))
            })) : $(".Courses_Class_Validation").each((function() {
                $(this).prop("readonly", !1)
            }))
        }
    }));
    </script>


       <script>

        if($(document).width()>450){
          $('#academic_tab_mob_view').remove();
        }
        else{
          $('#academic_destop_view').remove();
        }

    </script>
    <script>
      var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
      };
      </script>
      <script>
      var loadFile = function(event) {
        const fi = document.getElementById('fileToUpload');
              // Check if any file is selected.
              if (fi.files.length > 0) {
                  for (const i = 0; i <= fi.files.length - 1; i++) {

                      const fsize = fi.files.item(i).size;
                      const file = Math.round((fsize / 1024));
                      // The size of the file.
                      if (file >= 5120) {
                          alert(
                            "File too Big, please select a file less than 6MB");
                      }
                      else {
                          var image = document.getElementById('output');
                          image.src = URL.createObjectURL(event.target.files[0]);
                      }
                  }
              }
      };
      </script>


