// JavaScript Document
jQuery.fn.fontsizemanager = function () {
	return this.each(function() {
		var startFontSize = parseFloat($("body").css("font-size"));
		var object = $(this);
		
		object.html('<u><a style="cursor: pointer;" id="fontsizemanager_add"><img src="images/fsup.jpg"></a> <a style="cursor: pointer" id="fontsizemanager_minus"><img src="images/fsdn.jpg"></a> <a style="cursor: pointer" id="fontsizemanager_reset"><img src="images/fsorg.jpg"></a></u>');
		$('#fontsizemanager_add').click(function() {
			var newFontSize = parseFloat($("body").css("font-size"))
			newFontSize=newFontSize*1.2;
			$('body').css("font-size",newFontSize);
		});
		$('#fontsizemanager_minus').click(function() {
			var newFontSize = parseFloat($("body").css("font-size"))
			newFontSize=newFontSize*0.8;
			$('body').css("font-size",newFontSize);			 
		});
		$('#fontsizemanager_reset').click(function() {
			$('body').css("font-size",startFontSize);			 
		});
	});
}