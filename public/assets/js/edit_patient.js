$(document).ready(function(){
    $('select').selectpicker();
    $('#county').change(function(){
        $('#city').html('<option value="" disabled selected>Choose your city</option>');
        $('#city').selectpicker('refresh');
        var id_county = $(this).val();
        console.log(id_county);
        if(id_county != '')
        {
            $.ajax({
                method:"POST",
                url: "/city",
                data:{'id_county':id_county},
                success: function(response)
                {
                    $.each(response.citys, function(key, city){
                    console.log(city['city']);
                        $('#city').append($("<option></option>").attr("value", city['id_city']).text(city['city'])); 
                    });
                    $('#city').selectpicker('refresh');
                }
            })   
        }
        else
        {
            $('#city').html('<option value="" disabled selected>Choose your county first</option>');
            $('#city').selectpicker('refresh');
        }
    });
});