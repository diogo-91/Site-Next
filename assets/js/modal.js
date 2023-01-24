// MODAL
$(document).ready(function(){
	var elemento = $("*[abrir-modal]");

	var style = '<style>\
		.overlay-modal{display:none; width: 100%; height: 100vh; float: left; clear: both; background: rgba(0,0,0,0.5); position: fixed; z-index:999999 !important;}\
		.modal{display:none; background:#FFF; width: 50%; height: auto; position: absolute; z-index:9999999 !important; overflow:auto; margin:40px 0px; padding:20px 40px; float: left; clear: both; margin-left:25%;}\
		.modal-fechar{position:absolute; right:15px; top:15px; color:#F00; font-size:16px; cursor:pointer;}\
		.modal-fechar:hover{color:#780000;}\
		.modal-fechar i{font-size:24px; float: right; margin-top: -3px; margin-left: 5px;}\
		@media only screen and (max-width: 768px){\
			.modal{margin-left:0px; width:100%; margin:0px 0px;}\
		}\
	</style>\
	';
	
	$("body").prepend(style);
	$("body").prepend("<div class='overlay-modal'></div>");

	elemento.each(function(){
		$(this).on("click",function(){
			$(".modal").removeClass("bounceInDown animated").addClass("bounceOutUp animated").hide();
			var modal_nome = $(this).attr("abrir-modal");
			var modal = $("#"+modal_nome);
			$(".overlay-modal").fadeIn("fast");
			modal.removeClass("bounceOutUp animated").show().addClass("bounceInDown animated");
		});
	});

	$(document).on("click",".overlay-modal",function(){
		$(".modal").removeClass("bounceInDown animated").addClass("bounceOutUp animated").hide();
		$(".overlay-modal").fadeOut(100);
	});

	$(document).on("click",".modal-fechar",function(){
		$(".modal").removeClass("bounceInDown animated").addClass("bounceOutUp animated").hide();
		$(".overlay-modal").fadeOut(100);
	});
});