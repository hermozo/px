$(document).ready(function () {

	//alert($(window).width());
    var dt = new DashTimer('#timer0').init({
        start: {
            fill: 'green',
            innerRatio: .9,
            outerRatio: 1
        },
        finish: {
            fill: 'red',
            innerRatio: .3,
            outerRatio: 1
        },
        values: {
            show: true,
            decorate: function (d) {
                return Math.floor(d / 10) * 10;
            },
            classes: "mui--text-light-secondary mui--text-caption"
        }
    }).setData([{
            immediate: {
                angle: true
            },
            start: {
                angle: 1,
                fill: '#eee'
            },
            finish: {
                angle: 0,
                fill: '#eee'
            }
        }, {
            values: {
                show: true
            }
        }]).start(1000, 0, .50);


    var dt = new DashTimer('#timer1').init({
        start: {
            fill: 'green',
            innerRatio: .9,
            outerRatio: 1
        },
        finish: {
            fill: 'red',
            innerRatio: .3,
            outerRatio: 1
        },
        values: {
            show: true,
            decorate: function (d) {
                return Math.floor(d / 10) * 10;
            },
            classes: "mui--text-light-secondary mui--text-caption"
        }
    }).setData([{
            immediate: {
                angle: true
            },
            start: {
                angle: 1,
                fill: '#eee'
            },
            finish: {
                angle: 0,
                fill: '#eee'
            }
        }, {
            values: {
                show: true
            }
        }]).start(1000, 0, .10);


    var dt = new DashTimer('#timer2').init({
        start: {
            fill: 'green',
            innerRatio: .9,
            outerRatio: 1
        },
        finish: {
            fill: 'red',
            innerRatio: .3,
            outerRatio: 1
        },
        values: {
            show: true,
            decorate: function (d) {
                return Math.floor(d / 10) * 10;
            },
            classes: "mui--text-light-secondary mui--text-caption"
        }
    }).setData([{
            immediate: {
                angle: true
            },
            start: {
                angle: 1,
                fill: '#eee'
            },
            finish: {
                angle: 0,
                fill: '#eee'
            }
        }, {
            values: {
                show: true
            }
        }]).start(1000, 0, .60);



    var dt = new DashTimer('#timer3').init({
        start: {
            fill: 'green',
            innerRatio: .9,
            outerRatio: 1
        },
        finish: {
            fill: 'red',
            innerRatio: .3,
            outerRatio: 1
        },
        values: {
            show: true,
            decorate: function (d) {
                return Math.floor(d / 10) * 10;
            },
            classes: "mui--text-light-secondary mui--text-caption"
        }
    }).setData([{
            immediate: {
                angle: true
            },
            start: {
                angle: 1,
                fill: '#eee'
            },
            finish: {
                angle: 0,
                fill: '#eee'
            }
        }, {
            values: {
                show: true
            }
        }]).start(1000, 0, .70);



    var dt = new DashTimer('#timer4').init({
        start: {
            fill: 'green',
            innerRatio: .9,
            outerRatio: 1
        },
        finish: {
            fill: 'red',
            innerRatio: .3,
            outerRatio: 1
        },
        values: {
            show: true,
            decorate: function (d) {
                return Math.floor(d / 10) * 10;
            },
            classes: "mui--text-light-secondary mui--text-caption"
        }
    }).setData([{
            immediate: {
                angle: true
            },
            start: {
                angle: 1,
                fill: '#eee'
            },
            finish: {
                angle: 0,
                fill: '#eee'
            }
        }, {
            values: {
                show: true
            }
        }]).start(1000, 0, .100);

    /*$('#sidebarCollapse').on('click', function () {
     $('#sidebar_left').toggleClass('activeOn');
     //$('#collapseExample').animate({width: 'toggle'}, 200);
     //$(this).toggleClass('active');
     });*/
    /*$( "#sidebarCollapse" ).toggle( "slow", function() {
     // Animation complete.
     });*/
    /*$("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#app").toggleClass("toggled");
    });*/
    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').fadeOut();
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').fadeIn();
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
    
    $('.menu_list > li > i.fas, .dropdown_menu > li > i.fas').click(function () {
    	$(this).toggleClass("fa-angle-up");
    	var display = $(this).next().css("display");
        if(display=="none")
        	$(this).next().show('blind');
        else
        	$(this).next().hide('blind');
        /*$(this).next().css("height",0);
        $(this).next().animate({
            height: "auto !important",
            opacity: 1,
            transition: "opacity 1s ease-in-out"           
          }, 1500 );*/
    });
    $('.bxslider').bxSlider({
        mode: 'fade',
        captions: true,
        pager: true,
        auto: true,
        controls: false,
    });
    $(document).on("click", ".choice_item", function(){
    	//alert($(this).attr("id"));
    	$.get("/detail/"+$(this).attr("id"), function(response){
    		$("#content_modal").html(response);
    		$('#modal_view').modal('show');
    	})
    });
    $("#btn_faq").click(function(){
    	//alert($(this).attr("id"));
    	$.get("/faq", function(response){
    		$("#content_modal").html(response);
    		$('#modal_view').modal('show');
    	})
    });
    
    /*$(window).on('hashchange',function(){
		page = window.location.hash.replace('#','');
		console.log(location.search.substring(1));
		getProducts(page);
	});*/
	$(document).on('click','.pagination .page-item a', function(e){
		e.preventDefault();
		var page = $(this).attr('href').split('page=')[1];
		$.ajax({
			url: '/noticias?page=' + page+'&ajax=1'
		}).done(function(data){
			$('#content_nt').html(data);
			window.history.pushState("Details", "Title", "/noticias?page="+page);
		});
	});
	function getProducts(page){
		$.ajax({
			url: '/noticias?page=' + page+'&ajax=1'
		}).done(function(data){
			$('#content_nt').html(data);
			window.history.pushState("Details", "Title", "/noticias?page=1");
		});
	}
});