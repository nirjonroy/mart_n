<a href="{{url('show-cart')}}"><span class="shoppingcount">{{Cart::instance('shopping')->content()->count()}}</span><img src="{{asset('public/frontEnd/')}}/images/shopping-cart.png" alt=""></a>

<script type="text/javascript">
    $(document).ready(function(){
    function cartContent(){
         $.ajax({
           type:"GET",
           url:"{{url('/cart/content')}}",
           dataType: "html",
           success: function(cartinfo){
             $('#cartTable').html(cartinfo);
             $('#loader').hide();
           }
        });
    }
    function cartQty(){
         $.ajax({
           type:"GET",
           url:"{{url('/cart/quantity')}}",
           dataType: "html",
           success: function(cartinfo){
             $('#cartQty').html(cartinfo);
             $('#loader').hide();
           }
        });
    }

    // Remove to cart start
    $(".removeToCart").click(function(e){
        var id = $(this).data("id");
        // alert(id);
        $('#loader').show();
        if(id){
              $.ajax({
               cache: false,
               type:"GET",
               url:"{{url('delete-cart')}}/"+id,
               dataType: "json",
            success: function(cartinfo){
                return cartContent() + cartQty();
            }
          });
        }
   });
    // Remove to cart end

    // cart qty increment to cart start
    $(".cartincrementqty").click(function(e){
        var id = $(this).data("id");
        var qty = parseInt($(this).val())+1;
        // alert(id);
        // alert(qty);
        $('#loader').show();
        if(id,qty){
              $.ajax({
               cache: false,
               type:"GET",
               url:"{{url('increment-cart')}}/"+id+'/'+qty,
               dataType: "json",
            success: function(cartinfo){
                return cartContent();
            }
          });
        }
   });
    // cart qty increment to cart end

    // cart qty increment to cart start
    $(".cartdecrementqty").click(function(e){
        var id = $(this).data("id");
        var qty = parseInt($(this).val())-1;
        // alert(id);
        // alert(qty);
        $('#loader').show();
        if(id,qty){
              $.ajax({
               cache: false, 
               type:"GET",
               url:"{{url('decrement-cart')}}/"+id+'/'+qty,
               dataType: "json",
            success: function(cartinfo){
                $('#loader').hide();
                return cartContent();
            }
          });
        }
   });
    // cart qty increment to cart end

    // cart qty update js start
    $(".cartupdate").on('keyup', function(){
        var id = $(this).data("id");
        var qty = parseInt($(this).val());
        // alert(id);
        // alert(qty);
        $('#loader').show();
        if(id,qty){
              $.ajax({
               cache: false, 
               type:"GET",
               url:"{{url('decrement-cart')}}/"+id+'/'+qty,
               dataType: "json",
            success: function(cartinfo){
                return cartContent();
                $('#loader').hide();
            }
          });
        }
   });
    // cart qty update js end
  });
</script>
<!-- main add to cart ajax end -->