/*!
 * Javascript Backend file
 *
 * @version: 1.0
 * @package: scripts
 */
function Confirm(options) {
	var $ = jQuery;
	var title = (options.title) ? options.title: 'Are you sure';
	var $ = jQuery;
	$('body').append('<div id="confirmbox"><h3>' + title + '</h3><p>' + options.message + '</p><p class="input"><input type="button" value="Ignore" class="no" /> <input type="button" value="Accept" class="yes" /></p></div><div id="dim"></div>');
	
	
	$('#confirmbox input.yes').live('click', function() {
		if (options.ok) 
			options.ok();
	});
	$('#confirmbox input.no').live('click', function() {
		if (options.cancel) 
			options.cancel();
	});
	$('#dim, #confirmbox input').live('click', function() {
		$('#confirmbox, #dim').fadeOut(500, function() {
			$('#confirmbox, #dim').remove();
		});
	});
}

function Alert(message, title) {
	title = (title) ? title: 'Notice';
	var $ = jQuery;
	$('body').append('<div id="alertbox"><h3>' + title + '</h3><p>' + message + '</p><p class="input"><input type="button" value="OK" /></p></div><div id="dim"></div>');
	
	$('#dim, #alertbox input').live('click', function() {
		$('#alertbox, #dim').fadeOut(500, function() {
			$('#alertbox, #dim').remove();
		});
	});
}

function progress(done, total, message) {
	var $ = jQuery;
	var message = (message) ? message: '';
	var h = $('#progressbar').height();
	if ($('#progressbar').length == 0) {
		$('body').append('<div id="progressbar"><div class="total"><div class="done"></div></div><p>' + message + '</p></div>');
		$('#progressbar').animate({bottom:0}, 1000);
	} else {
		var percent = Math.ceil((done / total) * 100);
		$('#progressbar .done').animate({width: percent + "%"}, 200);
		if (percent >= 100) {
			$('#progressbar').animate({bottom:0 - h}, 500, function(){
				$(this).remove();
			});
		}
	}
}