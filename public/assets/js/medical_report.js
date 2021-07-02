
$(document).ready(function()
{
   $('#selectId').change(function() 
   {
       var id_consult = $("#selectId option:selected").val();
       
       $.ajax(
           {
           method: 'POST',
           url: "/medicalrecord/history",
           data: {
               'id_consult': id_consult,
           },
           success: function(response) 
           {
               $.each(response, function(key, consultdata) 
               {
                   $('.consult_reason').text(consultdata['consult_reason']);
                   $('.observations').text(consultdata['observations']);
                   $('.recommendations').text(consultdata['recommendations']);
                   $('.treatment').text(consultdata['treatment']);
                   $('#historyModal').modal('show');
               })
           }
       });
   });
});