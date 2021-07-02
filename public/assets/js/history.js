$(document).ready(function() {
  $('#selectId').change(function() {
      var id_consult = $("#selectId option:selected").val();
      load_info(id_consult);
  });
  $(document).on('click','.infos', function(){
      load_info($(this).attr('id'));
  });
  $(document).on('click','.files', function(){
      var id = $(this).attr('id');
      load_picture(id);
  });
  $(document).on('click','.letter',function(){
      var id = $(this).attr('id');
      var patient = $(this).attr('patient');
     $.ajax({
          method: "POST",
          url:'/medicalletter/'+patient+'/'+id,
          dataType:'html',
          success:function(dataResult){
              $('#showPicture').modal('show');
              $('#delete_file').hide();
              $("#large_picture").html(dataResult);
          }
      })
  });
  $(document).on('click','.load_file', function(){
      var id_consult = $(this).attr('id');
      var id_patient=$('.files').attr('patient');
      $('#id_patient').val(id_patient);
      $('#id_consult').val(id_consult);
      $('#loadPicture').modal('show');
      $("#file").val('');
  });
 $('#add_picture').click( function(){

      if($('#file').val()=='')
      {
          alert('Please Select the File');
      }
      else
      {
          var id = $('#id_consult').val();
          var fd=new FormData($('#upload_file')[0]);
          $.ajax({
          method: 'POST',
          url: 'savepicture',
          processData: false,
          contentType: false,
          data: fd,
          cache: false,
          dataType: 'JSON',
          success: function(response)
              {
                   // Hide error container
                  $('#err_file').removeClass('d-block');
                  $('#err_file').addClass('d-none');
                  
                  if(response.success==1) // Uploaded succesfully
                  {
                      $("#file").val('');
                      $('#loadPicture').modal('hide');
                      $('#err_file').removeClass('d-block');
                      $('#err_file').addClass('d-none');
                      load_picture(id);
                  }
                  else if(response.success == 2) // File not uploaded
                  {
                      // Response message
                      //console.log(response.load_name);
                     // console.log(response.files);
                      $('#err_file').text(response.message);
                      $('#err_file').removeClass('d-none');
                      $('#err_file').addClass('d-block');
                      $("#file").val('');
                  }
                  else 
                  {
                      // Display error message
                      $('#err_file').text(response.error);
                      $('#err_file').removeClass('d-none');
                      $('#err_file').addClass('d-block');
                      $("#file").val('');
                  }
              }
          });
      }
  }); 
  $(document).on('click','.show_pic', function(){

          var picture_id=$(this).attr('id');
          var name=$(this).attr('picture-name');
          var pdf_src =$(this).attr('pdf-src');
          var id_consult = $(this).attr('consult');
          $('#showPicture').modal('show');
          $('.pictureName').text(name);
          $('#file_id').val(picture_id);
          $("#consult_id").val(id_consult);
          if(pdf_src!="")
          {
              var src=$(this).attr('pdf-src');
              $("#large_picture").html('<embed class="file" src="'+src+'" type="application/pdf" style="height:900px; width: 100%;">');
          }
          else
          {
              var src=$(this).attr('src');
              $("#large_picture").html('<img class="file" src="'+src+'" style="width:100%; height:auto;">');

          }
      });
  $(document).on('click','#delete_file', function(){
      $('#deleteFile').modal('show');
  });
  $(document).on('click','.delete_confirm', function(){
      var id_file= $("#file_id").val();
      var id_consult=$('#consult_id').val();
      console.log(id_consult);
      $.ajax({
          method: 'POST',
          url:"deletepicture",
          data: {
              'id_file':id_file,
              'id_consult':id_consult
          },
          success:function(response){
              $('#deleteFile').modal('hide');
              $('#showPicture').modal('hide');
              load_picture(id_consult);
              //console.log(response.status);
              //console.log(response.file);

          }
      });
  });
});

function load_picture(id_consult)
{
  $.ajax({
      method: 'POST',
      url: 'getpicture',
      data: {
          'id_consult': id_consult
            },
      cache: false,
      success: function(dataResult)
          {
              $('#card_view').html(dataResult);
          }
  });
}
function load_info(id_consult)
{
  $.ajax({
      method: 'POST',
      url: "/medicalrecord/history",
      data: {
          'id_consult': id_consult,
      },
      success: function(response) 
      {
          $.each(response, function(key, consult) 
          {
              var climax="";
              if(consult['climax']==1)
                  {
                      climax="yes";
                  }
              else {
                  climax="no";
              }
              $('.consult-info').html(
                  '<h4 class="card-header container-fluid">\
                      <div class="row">\
                          <div class="col card-title"> Consult date:'+consult['date']+'</div>\
                              <div class="col text-right">\
                                  <a href="#" class="badge btn-info files" id="'+consult['id_consult']+'" patient="'+consult['id_patient']+'" >Files</a>\
                                  <a href="#" class="badge btn-info letter" id="'+consult['id_consult']+'" patient="'+consult['id_patient']+'">Medical letter</a>\
                                  <a href="#" class="badge btn-info infos" id="'+consult['id_consult']+'">Consult info</a>\
                                  </div>\
                              </div>\
                  </h4>\
                  </div>\
                  <div class="card-body" id="card_view">\
                      <h6>Date of last period: ' + consult['last_period']+ '</h6>\
                      <h6>Menstrual cycle: ' + consult['menstrual_cycle']+ '</h6>\
                      <h6>Number of births: ' + consult['births']+ '</h6>\
                      <h6>Number of abortions: ' + consult['abortions']+ '</h6>\
                      <h6>Climax: ' + climax +'</h6>\
                      <h6>Consult reason: ' + consult['consult_reason']+ '</h6>\
                      <h6>Observations: ' + consult['observations']+ '</h6>\
                      <h6>Recommendations: ' + consult['recommendations']+ '</h6>\
                      <h6>Treatment: ' + consult['treatment']+ '</h6>\
                      </div>');
          });
      }
  }); 
}