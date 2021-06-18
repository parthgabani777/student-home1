$(document).ready(function() {
    const $valueSpan = $('.valueSpan2');
    const $value = $('#customRange11');
    $valueSpan.html($value.val());
    $value.on('input change', () => {
        $valueSpan.html($value.val());
    });
    
    $('#reset').click(function(){
        $('#customerange11').val = 20000;
        $valueSpan.html(20000);

        $( "#preferred_gender1" ).prop( "checked", false );
        $( "#preferred_gender2" ).prop( "checked", false );

        $( "#occupancy1" ).prop( "checked", false );
        $( "#occupancy2" ).prop( "checked", false );
        $( "#occupancy3" ).prop( "checked", false );
        $( "#occupancy3+" ).prop( "checked", false );
    })
});