
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong> Developerd By<a target="_blank" href="https://www.gatewayit.net/"> Gateway IT</a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark right-sidebar" style="background: url({{asset('public/backEnd/images/sidebar.jpg')}});background-size: cover;background-position: center;background-repeat: no-repeat;padding: 20px 0">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
             
              <img src="{{asset('public/backEnd/')}}/images/sign-out.png">
              <p>Logout</p>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
             </form>
            </a>
          </li>
          <!-- nav item end -->
          <li class="nav-item has-treeview">
            <a href="{{url('password/change')}}" class="nav-link">
              <img src="{{asset('public/backEnd/')}}/images/key.png">
              <p>Change Password</p>
            </a>
          </li>
          <!-- nav item end -->
      </ul>
    </nav>
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->


<script src="{{asset('public/backEnd')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="{{asset('public/backEnd')}}/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('public/backEnd')}}/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{asset('public/backEnd')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('public/backEnd')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/backEnd')}}/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="{{asset('public/backEnd')}}/../../../../cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{asset('public/backEnd')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{asset('public/backEnd')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('public/backEnd')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{asset('public/backEnd')}}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->

<!-- select -->
<script src="{{asset('public/backEnd')}}/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backEnd')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/backEnd')}}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- toastr js -->
<script src="{{asset('public/backEnd')}}/js/toastr.min.js"></script>
  {!! Toastr::message() !!}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{asset('public/backEnd')}}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{asset('public/backEnd')}}/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src=" https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js "></script>
<script>
 $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: true,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
});
</script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
      $(function () {
       flatpickr("#flatpicker", {
        minDate:"today",
       });
      })
  </script>
  <script>
      $(function () {
       flatpickr("#datepickr", {
       });
      })
       $('.select2').select2();
  </script>

  <script src="{{asset('public/backEnd/')}}/plugins/summernote/summernote-lite.js"></script>
<!--camera js-->
  <script src="{{asset('public/backEnd/')}}/plugins/minicolorpicker/jquery.minicolors.min.js"></script>

<script>
   $('.my-colorpicker2').colorpicker()
</script>

    <script>
        $(".textarea").summernote({
          callbacks: {
            // callback for pasting text only (no formatting)
            onPaste: function (e) {
              var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
              e.preventDefault();
              bufferText = bufferText.replace(/\r?\n/g, '<br>');
              document.execCommand('insertHtml', false, bufferText);
            }
          }
        });
   </script>
<script src="{{asset('public/backEnd')}}/plugins/select2/select2.full.min.js"></script>
<script>
  $(function () {
   $('.select2').select2()
       });
</script>
<script src="{{asset('public/backEnd')}}/js/sweetalert2.min.js"></script>
@include('sweet::alert')
<script src="{{asset('public/frontEnd/')}}/js/summernote-lite.js"></script>
  <!-- summernote js -->

<script type="text/javascript">
        $('#productcat').change(function(){
        var ajaxId = $(this).val();    
        if(ajaxId){
            $.ajax({
               type:"GET",
               url:"{{url('ajax-product-subcategory')}}?category_id="+ajaxId,
               success:function(res){               
                if(res){
                    $("#productsubcat").empty();
                    $("#productsubcat").append('<option>=====select subcategory======</option>');
                    $.each(res,function(key,value){
                        $("#productsubcat").append('<option value="'+key+'">'+value+'</option>');
                    });
               
                }else{
                   $("#productsubcat").empty();
                   $("#productchildcat").empty();
                }
               }
            });
        }else{
            $("#productsubcat").empty();
            $("#productchildcat").empty();
        }      
       });
        // category end
        $('#productsubcat').on('change',function(){
        var ajaxId = $(this).val();    
        if(ajaxId){
            $.ajax({
               type:"GET",
               url:"{{url('ajax-product-childsubcategory')}}?category_id="+ajaxId,
               success:function(res){               
                if(res){
                    $("#productchildcat").empty();
                     $("#productchildcat").append('<option value="0">==== select childcategory ====</option>');
                    $.each(res,function(key,value){
                        $("#productchildcat").append('<option value="'+key+'">'+value+'</option>');
                    });
               
                }else{
                   $("#productchildcat").empty();
                }
               }
            });
        }else{
            $("#productchildcat").empty();
        }
            
       });
        $('#productsubcat').on('change',function(){
        var ajaxId = $(this).val();    
        if(ajaxId){
            $.ajax({
               type:"GET",
               url:"{{url('ajax-product-brand')}}?category_id="+ajaxId,
               success:function(res){               
                if(res){
                    $("#productbrand").empty();
                     $("#productbrand").append('<option value="0">==== select brand ====</option>');
                    $.each(res,function(key,value){
                        $("#productbrand").append('<option value="'+key+'">'+value+'</option>');
                    });
               
                }else{
                   $("#productbrand").empty();
                }
               }
            });
        }else{
            $("#productbrand").empty();
            $("#productbrand").empty();
        }
            
       });
    </script>
    <script>    
    $(".alert").delay(4000).fadeOut(2000, function() {
                $(this).alert('close');
            });
  </script>
  <script>
    jQuery("#My-Button").click(function() {
    jQuery(':checkbox').each(function() {
      if(this.checked == true) {
        this.checked = false;                        
      } else {
        this.checked = true;                        
      }      
    });

  });
  </script>
  <script>
    $('.bulkeditprice').change(function(){
        $value = $(this).val(); 
        if ($value !=0) {
            document.getElementById("ifYesPrice").style.display = "block";
        } else {
            document.getElementById("ifYesPrice").style.display = "none";
        }
      });
    $('.bulkeditqty').change(function(){
        $value = $(this).val(); 
        if ($value !=0) {
            document.getElementById("ifYesQty").style.display = "block";
        } else {
            document.getElementById("ifYesQty").style.display = "none";
        }
      });
    $('.bulksaleprice').change(function(){
        $value = $(this).val(); 
        if ($value !=0) {
            document.getElementById("ifYesSale").style.display = "block";
        } else {
            document.getElementById("ifYesSale").style.display = "none";
        }
      });
    
  </script>
  <script type="text/javascript">
        $(document).ready(function() {
          $(".btn-success").click(function(){ 
              var html = $(".clone").html();
              $(".increment").after(html);
          });
          $("body").on("click",".btn-danger",function(){ 
              $(this).parents(".control-group").remove();
          });

        });
        // 
    </script>
</body>
</html>
