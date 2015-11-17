/**
 * Created by Sammie on 8/10/2015.
 */
$(document).ready(function(){

//    the modal for adding a new category on category/index
    $('#addCategorymodalButton').click(function(){
        $('#addCategoryModal').modal('show')
            .find('#categoryModalContent')
            .load($(this).attr('value'));
    });


});