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

    //    signin modal
    $('#signinmodalButton').click(function(){
        $('#signinModal').modal('show')
            .find('#signinModalContent')
            .load($(this).attr('value'));
    });

    //    signupmodal
    $('#signupmodalButton').click(function(){
        $('#signupModal').modal('show')
            .find('#signupModalContent')
            .load($(this).attr('value'));
    });

    //    locationmodal
    $('#locationModalButton').click(function(){
        $('#locationModal').modal('show')
            .find('#locationModalContent')
            .load($(this).attr('value'));
    });


});


function quantityselectionchanged(id,quantity){

    //calculate the total for the new item which the user has selected

    var cart_index = id.slice(-1);
    var previous_item_total = document.getElementById('cartindextotal'+cart_index).textContent;
    var unit_price = document.getElementById('cartindexprice'+cart_index).textContent;
    var new_item_price = quantity * unit_price;
    document.getElementById('cartindextotal'+ cart_index).textContent = new_item_price;

    //update the new price
    var prev_total = document.getElementById('cart_total').textContent;
    //console.log(previous_item_total+" previous item total")
    //console.log(prev_total+ " previous cart total");
    //console.log(total_price + "  total item cost");

    var new_total = prev_total - previous_item_total + new_item_price;
    console.log(new_total);
    document.getElementById('cart_total').textContent = new_total;


}