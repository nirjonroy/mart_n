<p id="totalshipping">শিপিং চার্জ  

                                        @php $totalshipping = Session::get('totalshipping');
                                        @endphp
                                            ৳ <li ><span  value="{{BanglaConverter::en2bn($totalshipping)}}" disabled="disabled"> /-
                                         </span>
                                         </li>
                                         </p>

<script>
         $(document).ready(function(e){ 
            function shippingContent(){
             $.ajax({
               type:"GET",
               url:"{{url('/shipping/content')}}",
               dataType: "html",
               success: function(shippingfee){
                 toastr.success('ধন্যবাদ', 'কার্টে পণ্য যোগ হয়েছে');
                 $('#totalshipping').html(shippingfee);
               }
                });
            }
            $('.totalprice').change(function(){
                var shipping = $(this).val();

                if(shipping){
                    $.ajax({
                       cache: 'false',
                       type:"GET",
                       url:"{{url('shipping-charge')}}/"+shipping,
                       dataType: "json",
                    success: function(shippingfee){
                        return shippingContent();
                        }
                    });
                }
               
               });

            });
    </script>