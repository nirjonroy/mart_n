jQuery(document).ready(function () {
    "use strict";
      $(function(){
		  new WOW().init(); 
		});
 //   MAIN SLIDER START
        $('.mainslider').owlCarousel({
            items: 1,
            loop: true,
            dots: true,
            autoplay: true,
            nav: false,
            autoplayHoverPause: false,
            margin: 0,
            smartSpeed: 1000,
            autoplayTimeout: 5000,
            mouseDrag: false,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        });

        $('.product-slider').owlCarousel({
            items: 1,
            loop: true,
            dots: true,
            autoplay: true,
            nav: false,
            autoplayHoverPause: true,
            margin: 0,
            smartSpeed: 1000,
            autoplayTimeout: 5000,
            mouseDrag: false,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        });



    // home text slider 
    $('.offer-product-slider').owlCarousel({
        items: 5,
        loop: true,
        dots: false,
        autoplay: true,
        nav: false,
        autoplayHoverPause: false,
        margin: 30,
        smartSpeed: 1000,
        autoplayTimeout: 5000,
        mouseDrag: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            520: {
                items: 2,
                nav: false
            },
            767: {
                items: 3,
                nav: false
            },
            991: {
                items: 4,
                nav: false,
                loop: false,
            },
            1192: {
                items: 5,
                nav: false,
                loop: true,
            }
        }
        });

    // mobile menu start
     var $main_nav = $('#main-nav');
        var $toggle = $('.toggle');

        var defaultData = {
            maxWidth: false,
            customToggle: $toggle,
            navTitle: 'Mart9294',
            levelTitles: true,
            pushContent: '#container'
        };

        // add new items to original nav
        $main_nav.find('li.add').children('a').on('click', function () {
            var $this = $(this);
            var $li = $this.parent();
            var items = eval('(' + $this.attr('data-add') + ')');

            $li.before('<li class="new"><a>' + items[0] + '</a></li>');

            items.shift();

            if (!items.length) {
                $li.remove();
            } else {
                $this.attr('data-add', JSON.stringify(items));
            }

            Nav.update(true);
        });

        // call our plugin
        var Nav = $main_nav.hcOffcanvasNav(defaultData);

        // demo settings update

        const update = (settings) => {
            if (Nav.isOpen()) {
                Nav.on('close.once', function () {
                    Nav.update(settings);
                    Nav.open();
                });

                Nav.close();
            } else {
                Nav.update(settings);
            }
        };

        $('.actions').find('a').on('click', function (e) {
            e.preventDefault();

            var $this = $(this).addClass('active');
            var $siblings = $this.parent().siblings().children('a').removeClass('active');
            var settings = eval('(' + $this.data('demo') + ')');

            update(settings);
        });

        $('.actions').find('input').on('change', function () {
            var $this = $(this);
            var settings = eval('(' + $this.data('demo') + ')');

            if ($this.is(':checked')) {
                update(settings);
            } else {
                var removeData = {};
                $.each(settings, function (index, value) {
                    removeData[index] = false;
                });

                update(removeData);
            }
        });
        // mobile menu end


        // customer login 
        $("#hidemenu" ).hide();
        $('#hovercategory').click(function() {
          $('#hidemenu').slideToggle('slow', function() {
          });
        });

        $("#marchantmenu").click(function(){
            $(".mleft-nav").slideToggle("show");
        });
        $(".close-mleft-nav").click(function(){
            $(".mleft-nav").hide();
        });
        // Marchange Nav show and hide
        
        $(".alert").delay(4000).fadeOut(2000, function() {
                $(this).alert('close');
            });

        // setTimeout(function() {
        //     $(".fadeoutalert").alert('close');
        // }, 2000);
      
        // Alert Fade Out

        $("#showloginpagel").click(function(){
            $("#cloginpanel").slideToggle("slow");
            });
            // customer login panel show
            
        $(".v-tab_content").hide();
        $(".v-tab_content:first").show();

        $(".v-tab_tab-head li").click(function() {
        
          $(".v-tab_content").hide();
          var activeTab = $(this).attr("rel"); 
          $("#"+activeTab).fadeIn();        
          $(".v-tab_tab-head li").removeClass("active");
          $(this).addClass("active");

          
        });

        
     

   })

