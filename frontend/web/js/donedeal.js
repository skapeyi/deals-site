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


    $('.checkout_btn').on('click', function(event){
        var phone_number = document.getElementById('checkoutform-phone').value;
        console.log(phone_number);
        var payment_method = document.getElementById('checkoutform-method').value;
        if( !phone_number || !payment_method )
        {
            alert('Please check phone number or payment method');

        }
        else
        {

            var cartsize = document.getElementById('cartsize').value;

            order = [];
            for(i = 0;i<cartsize;i++ ){
                //construct jason object
                id =  document.getElementById('cartindexid' + i).textContent;
                e = document.getElementById('cartindex' + i);
                quantity = e.options[e.selectedIndex].value;
                unit = document.getElementById('cartindexprice' + i).textContent;
                total = document.getElementById('cartindextotal' + i).textContent;

                item = {
                    id : id,
                    quantity: quantity,
                    unit_price: unit,
                    total_price : total
                }
                order.push(item)
            }

            console.log(order);
            alert(order);

            //go to the next page
            $.ajax({
                url: 'index',
                contentType: 'application/json',
                type: 'post',
                data: order,
                error: function() {
                    console.log('bitch please');;

                },
                success: function(data) {


                    console.log('nigga please');

                }



            });


        }
    });


});


function quantityselectionchanged(id,quantity){
    //calculate the total for the new item which the user has selected
    var cart_index = id.slice(-1);
    var previous_item_total = document.getElementById('cartindextotal'+cart_index).value;
    var unit_price = document.getElementById('cartindexprice'+cart_index).value;
    var new_item_price = quantity * unit_price;
    document.getElementById('cartindextotal'+ cart_index).value = new_item_price;

    //update the new price
    var prev_total = document.getElementById('cart_total').textContent;
    //console.log(previous_item_total+" previous item total")
    //console.log(prev_total+ " previous cart total");
    //console.log(total_price + "  total item cost");

    var new_total = prev_total - previous_item_total + new_item_price;
    console.log(new_total);
    document.getElementById('cart_total').textContent = new_total;
}

// we need to read the data from the cart page and post it to a controller that is going to then create the orders and
// i want to post json to the controller

function checkout(cartsize){

    // need to create a json object to pass to a function that is going to create orders and a payment item in the databases..remember we need diff vouchers for each item in the cart i.e if the cart has a message deal with quantity two, that means, those are two vouchers, thus two orders in the database

    order = [];
    for(i = 0;i<cartsize;i++ ){
        //construct jason object
        id =  document.getElementById('cartindexid' + i).textContent;
        e = document.getElementById('cartindex' + i);
        quantity = e.options[e.selectedIndex].value;
        unit = document.getElementById('cartindexprice' + i).textContent;
        total = document.getElementById('cartindextotal' + i).textContent;

        item = {
            id : id,
            quantity: quantity,
            unit_price: unit,
            total_price : total
        }
        order.push(item)
    }
    console.log(order);

    //now that we have the order object, we need push to the page to select phone number and process payment
    //$.post({
    //    url: 'checkout',
    //    type: 'post',
    //    data: order
    //}
    //
    //);

    $.ajax({
        url: 'checkout',
        type: 'post',
        data: order,
        success: function(){
            window.location.href = 'checkout';
        }

    });

}