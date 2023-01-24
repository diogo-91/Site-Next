
/***********************
******** PRONTO ********
************************/
	$(document).ready(function(){

		// smoothScroll();

		ScrollReveal({
			reset: true,
			origin: 'bottom',
			distance:'10px',
			delay: 0,
			duration: 300
		}).reveal('.scrollReveal');

		$("#banners .scroll").on("click",function(){
			var altura_tela_usuario = $(window).height();
			$("html,body").stop().animate({scrollTop: altura_tela_usuario}, 500);
		});


		$("#produtos .sidebar ul li").on("click",function(){
			if($(this).hasClass('ativo')){
				$(this).removeClass('ativo');
			}else{
				$("#produtos .sidebar ul li.ativo").removeClass("ativo");
				$(this).addClass("ativo");
			}
		});


		$("#produto .lado2 .configuracoes .tabs .cada").on("click",function(){
			var texto = $(this).attr("data-texto");

			$("#produto .lado2 .configuracoes .textototal").slideUp('fast');
			setTimeout(function(){
				$("#produto .lado2 .configuracoes .textototal").html(texto);
			},150);
			setTimeout(function(){
				$("#produto .lado2 .configuracoes .textototal").slideDown('fast');
			},300);

			$("#produto .lado2 .configuracoes .tabs .cada.ativo").removeClass("ativo");
			$(this).addClass("ativo");
		});	


		$("#produto .lado1 .thumbs .cada").on("click",function(){

			var imagem = $(this).find('img').attr('src');
			$("#produto .lado1 .imagem_principal img").attr("src",imagem);

			$("#produto .lado1 .thumbs .cada.ativo").removeClass("ativo");
			$(this).addClass("ativo");

		});




		$("#servicos .sec_video .lado2 .play").on("click",function(){
			var video = $(this).attr("data-video");
			$.ajax({
				url: 'functions/helper.post.php',
				type: 'POST',
				dataType: 'html',
				data: {acao:'getVideoServico', video:video},
			
				success:function(retorno){
					// console.log(retorno);
					$(".modal .conteudo").html(retorno);
					$(".overlay-modal").fadeIn("fast");
					$(".modal").fadeIn("fast");
				}
			});
		});

		$(".overlay-modal, .modal .fechar").on("click",function(){
			$(".modal .conteudo").html('');
			$(".overlay-modal").fadeOut("fast");
			$(".modal").fadeOut("fast");
		});



		$(".modal-orcamento .fechar, .overlay-orcamento").on("click",function(){
			$(".modal-orcamento").fadeOut("fast");
			$(".overlay-orcamento").fadeOut("fast");
		});

		$(".abrirModalOrcamento").on("click",function(){
			$(".modal-orcamento").fadeIn("fast");
			$(".overlay-orcamento").fadeIn("fast");
		});




	});

/***********************
***** AO CARREGAR ******
************************/
	// $(window).load(function(){

	// });


/**************************
****** AO DAR SCROLL ******
***************************/

	// $(window).scroll(function(){

	// });


/***********************
***** OWL CAROUSEL *****
************************/
	$("#banners .banners").owlCarousel({
		autoplay: true,
		autoplayTimeout: 9000,
		items: 1,
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		loop:true
	});



	var slides_interna = $("#servicos .sec_vejatbm .todos_slides .slides");
	slides_interna.owlCarousel({
		autoplay: true,
		autoplayTimeout: 3000,
		items: 6
	});

	$("#servicos .sec_vejatbm .todos_slides .arrow-left").on("click",function(){
		console.log('clicou prev');
		slides_interna.trigger("prev.owl.carousel");
	});

	$("#servicos .sec_vejatbm .todos_slides .arrow-right").on("click",function(){
		console.log('clicou next');
		slides_interna.trigger("next.owl.carousel");
	});


/***********************
****** FUNCTIONS *******
************************/

	function smoothScroll(){
		// SMOOTH SCROLL
		$('a[href*=#]:not([href=#])').click(function() {
		    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		      var target = $(this.hash);
		      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		      if (target.length) {
		        $('html,body').animate({
		          scrollTop: target.offset().top
		        }, 1000);
		        return false;
		      }
		    }
		});
	}