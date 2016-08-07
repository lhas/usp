$(document).ready(function(){
	
	$(".mega-dropdown").find("ul.dropdown-menu").addClass('mega-dropdown-menu row')
	$(".mega-dropdown").click(function(){
		var index = $(".mega-dropdown").index( this );
		$(this).children('.mega-dropdown-menu').addClass('mega-dropdown-menu-' + index);
	});

	$("#font-sub").click(function(e) {
		e.preventDefault();
		var font_size = parseInt($(".conteudo article p").css('font-size'));
		if (font_size >= 12) {
			changeCss(".conteudo article p", "font-size: " + (font_size-1) + "px !important;" );
			changeCss(".conteudo article p span", "font-size: " + (font_size-1) + "px !important;" );
		}			
	});

	$("#font-add").click(function(e) {
		e.preventDefault();
		var font_size = parseInt($(".conteudo article p").css('font-size'));
		if (font_size <= 22) {
			changeCss(".conteudo article p", "font-size: " + (font_size+1) + "px !important;" );
			changeCss(".conteudo article p span", "font-size: " + (font_size+1) + "px !important;" );
		}			
	});

	/* front-page */
	seletorPost("#noticias");
	seletorPost("#eventos");

	/* home */
	seletorPost("#destaque-posts");

	/* archive(eventos) */
	seletorPost("#destaque-eventos");

	/* ip-comunica */
	seletorPost("#destaque-ip-comunica");
	seletorPost("#defesas");
	seletorPost("#na-midia");

	seletorPost("#destaque-biblioteca")

	/* busca */
	$("article").animate({'opacity': 1});

	var $grid = $('.resultados').masonry({
	  columnWidth: 'article.item',
	  itemSelector: 'article.item',
	  percentPosition: true,
	  gutter: 20,
	  transitionDuration: '1s'
	});

	$.ajaxSetup({cache:false});

    $(".post-link").click(function(e){
    	e.preventDefault();

        var post_link = $(this).attr("href");
        var load = $(this).data("load");
        var offset = $(this).data("offset")
        var data = {
        	"offset": offset,
        	"cat": $(this).data("cat"),
        	"search": $(this).data("search"),
        	"status": $(this).data("status"),
        };

        $.ajax({
        	url: post_link, 
        	data: data,
        }).done(function(res){
        	if ($grid.length>0) {
        		var $elems = $( res );
					$grid.append( $elems ).masonry( 'appended', $elems );
					if ($elems.length < 10) {
						$(".ver-mais").hide();
					};
        	} else {
        		$(load).append(res);
        	}
        });
        $(this).data("offset", offset + 1);
        
    	return false;
    });

});

function changeCss(className, classValue) {
    // we need invisible container to store additional css definitions
    var cssMainContainer = $('#css-modifier-container');
    if (cssMainContainer.length == 0) {
        var cssMainContainer = $('<div id="css-modifier-container"></div>');
        cssMainContainer.hide();
        cssMainContainer.appendTo($('body'));
    }

    // and we need one div for each class
    classContainer = cssMainContainer.find('div[data-class="' + className + '"]');
    if (classContainer.length == 0) {
        classContainer = $('<div data-class="' + className + '"></div>');
        classContainer.appendTo(cssMainContainer);
    }

    // append additional style
    classContainer.html('<style>' + className + ' {' + classValue + '}</style>');
}

function seletorPost(id){
	$(id + ' .liquid-slider').liquidSlider({
		dynamicArrows: false,
		autoSlide: true,
		preloader:true,
		autoSlideInterval: 3000,
		preload: function(){
			var self = this;
			self.finalize();
		},
		pretransition: function() {
			count = $(id + " .seletor li").length;
			$(id + " .seletor li").removeClass("active");			
    		$(id + " .seletor li:eq("+ (parseInt(this.nextPanel) % count) + ")").addClass("active");
		    this.transition();
		}
	});

    $(id + " .seletor li a").click(function(){
    	var api = $.data( $(id + ' .liquid-slider')[0], 'liquidSlider');
    	api.setNextPanel($(this).data("seletor"));
    	$(id + " .seletor li").removeClass("active");
    	$(this).parent().addClass("active");
    });

    console.log($(id + " .seletor li"));
}