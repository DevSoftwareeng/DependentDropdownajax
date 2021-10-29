$(document).ready(function(){
    $("#country").on('change',function(){
        var countryId = $(this).val();
            $.ajax({
            type:'POST',
            url:'',
            data: {id:countryId},
            dateType:"html",
            success:function(data){
                alert(data);
                $('#state').html(data);
            }
        });
    });
});
