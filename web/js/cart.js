 $(document).keyup(function(e) {
     if (e.keyCode == 27) {
         $('.open').removeClass('open');
         $('html').removeClass('nooverflow');
     }
 });

window.cart = {

    init : function() {

        /*$('#cart-desktop_link').on('click', function(){
            window.cart.isCartEmpty();
        });*/

        $('#shopping-cart').on('click', 'a.bag-remove', function(){
            var id = $(this).attr('data-id');
            var lens = $(this).attr('data-lens');
            window.cart.removeFromCart(id,lens);
        });

        $('#shopping-cart').on('click', '#continue_shopping', function(){
            $('.open').removeClass('open');
            $('html').removeClass('nooverflow');
        });
    },

    isCartEmpty : function() {
        var url = '/cart/iscartempty';
        $.getJSON(url, function(data) {
            if(data == 0) {
                $('#checkout').addClass("disabled");
                if (window.location.pathname == "/checkout") {
                    window.location.replace("/");
                }
            }
        });
    },

    removeFromCart : function(id,lens){
        /*$.getJSON(url, function(data) {
            window.cart.afterCartOperation(data);
        });*/
        $.ajax({
            url: "../cart/removefromcart",
            type:'get',
            data: {id: id, lens:lens},
            success: function (data){
                if(data.success == true){
                    $('.bag_number_of_items').html(count.toString());
                    $('#bag-items').openMenu();
                        }
                    alert(data.success);
                    }
                });
    },

    afterCartOperation: function(data){
        if(data.success == true) {
            var count = data.count;
            /*var cart = data.cart;*/
            $('.bag_number_of_items').html(count.toString());
            $('#bag-items').openMenu();
        }
    }
};

$(document).ready(function(){
    window.cart.init();
});
