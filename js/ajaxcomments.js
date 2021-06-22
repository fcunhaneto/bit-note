jQuery('document').ready(function($) {
	var cancel = '';
	var commentform = $('#commentform'); // find the comment form
	commentform.prepend('<div id="comment-status"></div>'); // add info panel before the form to provide feedback or errors
	var statusdiv = $('#comment-status'); // define the info panel
	var list;
	$('.comment-reply-link').click(function() {
		list = $(this).parent().parent().parent().attr('id');

		var respond = $('#respond');
		var author = respond.next('.author-to-reply').text();
		var url = document.URL;
		var value = url.substring(url.lastIndexOf('/') + 1);
		url = url.replace(value, '');
		$('#reply-title').remove();
		respond.prepend('<h4>Deixe uma reposta para&nbsp;' + author + ':</h4>');
		$('#submit').after('&nbsp;&nbsp;&nbsp;&nbsp;' + '<a rel="nofollow" id="cancel-comment-reply-link" href="' + url + '">Cancelar Reposta</a>');
	});

	commentform.submit(function() {
		var name = $('input[name=author]').val();
		var email = $('input[name=email]').val();
		var comment = $('textarea[name=comment]').val();
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;
		if (name.length == 0 && email.length == 0) {
			statusdiv.html('<p class="ajax-error text-danger" >Seu nome e e-mail são necessários.</p>');
		 	return false;
		} else if (name.length == 0) {
			statusdiv.html('<p class="ajax-error text-danger" >Seu nome é necessário.</p>');
		 	return false;
		} else if (email.length == 0) {
			statusdiv.html('<p class="ajax-error text-danger" >Seu e-mail é necessário.</p>');
		 	return false;
		}
		if (!emailReg.test(email)) {
			statusdiv.html('<p class="ajax-error text-danger" >Entre com um e-mail válido.</p>');
		 	return false;
		}
		if(comment.length == 0) {
			statusdiv.html('<p class="ajax-error text-danger">O campo comentário não pode estar vazio.</p>');
		 	return false;
		}
		//serialize and store form data in a variable
		var formdata = commentform.serialize();
		//Add a status message
		statusdiv.html('<p>Enviando...</p>');
		//Extract action URL from commentform
		var formurl = commentform.attr('action');
		//Post Form with data

		$.ajax({
			type: 'post',
			url: formurl,
			data: formdata,
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				statusdiv.html('<p class="ajax-error text-danger" >Você pode ter deixado um dos campos em branco, ou estar postando muito rápido.</p>');
			},
			success: function(data, textStatus) {
				if (data == "success" || textStatus == "success") {
					statusdiv.html('<p class="ajax-success text-success" >Obrigado por seu comentário. Ele é importante para nós.</p>');

					if ($("#commentsbox").has("ul.commentlist").length > 0) {
						if (list != null) {
							$('div.rounded').prepend(data);
						} else {
							$('ul.commentlist').append(data);
						}
					} else {
						$("#commentsbox").find('div.post-info').prepend('<ul class="commentlist"> </ol>');
						$('ul.commentlist').html(data);
					}
				} else {
					statusdiv.html('<p class="ajax-error text-warning" >Aguarde um pouco antes de publicar seu próximo comentário.</p>');
				}
			}
		});
		return false;
	});
});
