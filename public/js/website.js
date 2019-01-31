$(document).ready(function () {



    $(".contenidositemk").height($(window).height());
    $(".sliderMenumk").height($(window).height());

    $(".contenidositemk").css({'marginTop': $('nav').height() + 'px'})
    $(".sliderMenumk").css({'marginTop': $('nav').height() + 'px'})

    $(window).resize(function () {
        $(".contenidositemk").height($(window).height());
        $(".sliderMenumk").height($(window).height());

        $(".contenidositemk").css({'marginTop': $('nav').height() + 'px'})
        $(".sliderMenumk").css({'marginTop': $('nav').height() + 'px'})
    });


    $('.owl-carousel').owlCarousel({

        nav: true,
        dots: false,
        items: 1,
        merge: true,
        loop: true,
        margin: 10,
        video: true,
        lazyLoad: true,
        center: true,

    });
	
	
	function estrellas(){
		var x = parseInt(localStorage.getItem("estrellas")) - 1;
		var y = 0;
		$.each($(".startbtncalificacion"), function( i, val ) {
			if(y <= x){
				  $(val).css('cssText', 'color: #ffd65e !important');
			}else{
				  $(val).css('cssText', '');
			}
		  y++;
		});
				
	}
	
	
	$(".startbtncalificacion").click(function(){
		localStorage.setItem("estrellas", $(this).data('punt'));
		estrellas();
	})
	estrellas();

	
	
	
	
	
	
	
	
	function estadomenu(data){
		if(data == 0){
				$(".sliderMenumk2").addClass('animated slideInLeft');
				$(".sliderMenumk2").css({'display':'block'});
				$(".contenidositemk").removeClass('col-md-12');
				$(".contenidositemk").addClass('col-md-10');
				$("#navegarmenu").html('<i class="fas fa-times"></i>');
			}else{
				$(".sliderMenumk2").addClass('animated slideInRight');
				$(".sliderMenumk2").css({'display':'none'});
				$(".contenidositemk").removeClass('col-md-10');
				$(".contenidositemk").addClass('col-md-12');	
				$("#navegarmenu").html('<i class="fas fa-bars"></i>');
			}
	}
	/*****Ini menu*******/
	$.get($("#urlPathURLX").attr('name')+'/menupx').done(function(data){
			estadomenu(data);
		})
	$("#navegarmenu").click(function(){
		$.get($("#urlPathURLX").attr('name')+'/menupx/'+1).done(function(data){
			estadomenu(data);
		})
	})
	
	
	

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    $('.menu_list > li > a.btn_plusdd, .dropdown_menu > li > a.btn_plusdd').click(function (event) {
        $(this).next().toggleClass("fa-angle-up");
        var display = $(this).next().next().css("display");
        if (display == "none")
            $(this).next().next().show('blind');
        else
            $(this).next().next().hide('blind');
        event.preventDefault();
    });

    $('.menu_list > li > i.fas, .dropdown_menu > li > i.fas').click(function () {
        $(this).toggleClass("fa-angle-up");
        var display = $(this).next().css("display");
        if (display == "none")
            $(this).next().show('blind');
        else
            $(this).next().hide('blind');
    });

    $(document).on("click", ".choice_item", function () {
        //alert($(this).attr("id"));
        $.get("/detail/" + $(this).attr("id"), function (response) {
            $("#content_modal").html(response);
            $('#modal_view').modal('show');
        })
    });


    $("#btn_faq").click(function () {
        //alert($(this).attr("id"));
        $.get("/faq", function (response) {
            $("#content_modal").html(response);
            $('#modal_view').modal('show');
        })
    });

    /*$(window).on('hashchange',function(){
     page = window.location.hash.replace('#','');
     console.log(location.search.substring(1));
     getProducts(page);
     });*/
    $(document).on('click', '.pagination .page-item a', function (e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        var linkd = $(this).attr('href').split('?page=')[0];
        var linkan = linkd.split('/')[3];
        //console.log(linkan);
        $.ajax({
            url: '/' + linkan + '?page=' + page + '&ajax=1'
        }).done(function (data) {
            $('#content_nt').html(data);
            window.history.pushState("Details", "Title", "/" + linkan + "?page=" + page);
        });
    });
    function getProducts(page) {
        $.ajax({
            url: '/noticias?page=' + page + '&ajax=1'
        }).done(function (data) {
            $('#content_nt').html(data);
            window.history.pushState("Details", "Title", "/noticias?page=1");
        });
    }
    /*$(".direccion").click(function(){
     alert("Si");
     var lat = parseFloat($(this).data("lat"));
     var lng = parseFloat($(this).data("lng"));
     var p = parseInt($(this).data("param"));
     var ubi = {lat: lat, lng: lng};
     initMap(ubi); 
     parom(ubi,p);
     });*/
    $(window).scroll(function () {
        //Display or hide scroll to top button
        var windowTop = $(this).scrollTop();
        var topMenuFixed = 100;
        var windowHeight = $(window).height();
        var documentHeight = $(document).height();
        //console.log($(this).scrollTop()+" "+windowHeight+" "+documentHeight+" "+(windowHeight+topMenuFixed));
        if ($(this).scrollTop() > topMenuFixed && documentHeight > (windowHeight + topMenuFixed)) {
            $('#sidebar').addClass('nav-fixed-left');
            $('#content').addClass('cnt-fixed-left');
        } else {
            $('#sidebar').removeClass('nav-fixed-left');
            $('#content').removeClass('cnt-fixed-left');
        }
    });
});