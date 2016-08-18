$(document).ready(function(){

	// letras
	$(document).on('click', '#letras a', function() {
		var letraAtual = $(this).html();

		$('#letras a').removeClass('atual');
		$(this).addClass('atual');

		if(letraAtual == "Todas") {
			$('.revista').stop().fadeIn();
		} else {
			$('.revista').stop().fadeOut();
			$('.revista[data-letra="' + letraAtual + '"]').stop().fadeIn();
		}
	});
	// fim letras

	// changeCrop
	$(document).on('click', '.changeCrop', function() {
		// descobrir qual slide desejado
		var i = $(this).find('a').data('seletor');
		console.log(i);
		var api = $.data( $('#crop-slider')[0], 'liquidSlider');
		api.setNextPanel(i);
		api.updateClass($(this));
	});
	// Fim changeCrop

	// Imagens
	$(".imgLiquidFill").imgLiquid();
	// Fim Imagens
	
	// Busca FAQ

	var options = {
	    valueNames: [ 'titulo', 'pergunta', 'resposta' ]
	};

	var hackerList = new List('faq-list', options);

	$(".pergunta").on("click", function() {
		$(this).parent().find('.resposta').stop().fadeToggle('slow');
	});

	// Fim Busca FAQ

	// Calendário

	var date = $(".calendarios").data("selected-dates");

	var pickmeupDate = (date && date.length >= 1) ? date : new Date;

	$('.calendarios').pickmeup({
		flat		: true,
		date		: pickmeupDate,
		format			: 'd/m/Y',
		mode		: 'multiple',
		calendars	: 3,
		locale: 	{
		    days: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
		    daysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
		    daysMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
		    months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
		    monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
		},
		fill: function(a) {

			var options = $('.calendarios').data('pickmeup-options');
			var currentDate = options.current;
			var monthCurrentDate = ('0' + (currentDate.getMonth()+1)).slice(-2);
			var yearCurrentDate = currentDate.getFullYear();

			filtrarEventos(monthCurrentDate, yearCurrentDate);
		},
		change: function(a) {
			$('.calendarios').pickmeup('clear');
			var currentDates = $("#listaEventos").data('selected-dates');
			var newDates = currentDates.slice();

			$('.calendarios').pickmeup('set_date', newDates);
		},

	});

	function filtrarEventos(month, year) {

		$("#listaEventos li").each(function() {

			var thisMonth = $(this).data("month");
			var thisYear = $(this).data("year");

			if(thisMonth == month && thisYear == year) {
				$(this).stop().fadeIn('fast');
			} else {
				$(this).stop().fadeOut('fast');
			}
		});
	}

	var dataAtual = new Date();
	var mesAtual = ('0' + (dataAtual.getMonth()+1)).slice(-2);
	var anoAtual = dataAtual.getFullYear();

	filtrarEventos(mesAtual, anoAtual);

	// Fim Calendário
	
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
	seletorPost("#crop-crop");

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
		autoSlideInterval: 6000,
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

}