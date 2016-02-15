$(document).ready(function($) {
    $('#householdfacility-ownership_status_id').change(function(){
        alert('gat ot');
    });


    //the household form
    $('#householdfacility-separate_main_house').on('switchChange.bootstrapSwitch', function(event, state) {
        console.log('changed');
        console.log(state);
    });

});