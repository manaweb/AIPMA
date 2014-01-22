function showResponse(responseText, statusText, xhr, $form)  { 
    // for normal html responses, the first argument to the success callback 
    // is the XMLHttpRequest object's responseText property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'xml' then the first argument to the success callback 
    // is the XMLHttpRequest object's responseXML property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'json' then the first argument to the success callback 
    // is the json data object returned by the server 
 
    alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
        '\n\nThe output div should have already been updated with the responseText.'); 
}

/*
	Desenvolvido por: Wesley H. de Oliveira
	Função: Este arquivo é responsável por fazer as requisições assíncronas com o scripts server-side.
		@param1: Seletor do elemento que irá receber a mensagem de erro ou sucesso [String] (selectorMsg)
		@param2: URL ou diretório do arquivo que ele irá mandar a requisição [String] (url)
		@param3: Mensagem que irá aparecer na tela antes/durante a requisição [String] (msgBefore)
		@param4: Mensagem que irá aparecer na tela caso ocorra um erro na requisição [String] (msgError)
	Versão: 1.0.0
*/

(function(a) {
	a.fn.requestFrom = function(ajaxRequest) {
		var configs = $.extend({
			selectorMsg : '#mensagemRetorno',
			url : 'index.php',
			method: 'POST',
			msgBefore : 'Aguarde...',
			msgError : 'Ocorreu uma falha, tente novamente mais tarde ou contate o desenvolvedor.',
			classFather : '.validador',
			classMsgs : '.styles, .close',
			classSuccess : 'success',
			classError : 'error',
			sendFiles : false,
			maxSize: 7,
			regex: /(jpg|jpeg|gif|png)$/g
		},ajaxRequest);
		return this.each(function() {
			$(configs.classMsgs).removeClass(configs.classSuccess).addClass(configs.classError);
			if (configs.sendFiles == false) {
				var response = $.ajax({
					url: configs.url,
					type: configs.method,
					dataType: 'html',
					contentType: "application/x-www-form-urlencoded;charset=ISO-8859-1",
					data: $(configs.classFather).serialize(),
					async: false,
					beforeSend : function(xhr) {
						$(configs.classMsgs).removeClass(configs.classSuccess).addClass(configs.classError);
						$(configs.selectorMsg).html(configs.msgBefore);
						xhr.setRequestHeader("Accept-Charset","ISO-8859-1");
						xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=ISO-8859-1");
					},
					success : function(data) {
						if (data.toLowerCase().match(/error|erro|warning/g) == null)
							$(configs.classMsgs).removeClass(configs.classError).fadeOut(50,function() {
								$(this).addClass(configs.classSuccess).fadeIn(750);
								$(configs.selectorMsg).html(data);
							});
						else
							$(configs.selectorMsg).html(data);
					},
					error : function() {
						$(configs.selectorMsg).html(configs.msgError);
					}
				});
			}else {
				var isFalse = false;
				var patt = /(jpg|jpeg|gif|png)$/g;
				if (navigator.appName.toLowerCase().indexOf('internet explorer') < 0) {
					var upload = $('#upload')[0].files;
					var finalSize = 0.0;
					for (i = 0;i < upload.length;i++) {
						/*if (patt.test(upload[i].name) === false) {
							isFalse = true;
						}else*/ finalSize += upload[i].size;
					}
				}else {
					/*var FO = new ActiveXObject("Scripting.FileSystemObject");
					var upload = document*/
				}
				if (isFalse == false) {
					finalSize = Math.round(finalSize/(1024*1024));
					if (finalSize <= configs.maxSize) {
						$(configs.classFather).ajaxSubmit({
							url: configs.url,
							type: 'POST',
							dataType: 'html',
							contentType: "application/x-www-form-urlencoded;charset=ISO-8859-1",
							data: $(this).formSerialize(),
							beforeSubmit: function(xhr) {
								configs.msgBefore = 'Enviando arquivo(s), aguarde...';
								$(configs.selectorMsg).html(configs.msgBefore).append('<br><span id="porcent"></span>');
								xhr.setRequestHeader("Accept-Charset","ISO-8859-1");
								xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=ISO-8859-1");
							},
							uploadProgress: function(event, position, total, percentComplete) {
								$('#porcent').html(percentComplete+'%');
							},
							error: function(data) {
								$(configs.selectorMsg).html(data);
							},
							success: function(data) {
								if (data.toLowerCase().match(/error|erro|warning/g) == null) {
									$(configs.classMsgs).removeClass(configs.classError).fadeOut(50,function() {
										$(this).addClass(configs.classSuccess).fadeIn(750);
										$(configs.selectorMsg).html(data);
									});
									return true;
								}
								else {
									$(configs.selectorMsg).html(data);
									return false;
								}
							}
						});
					}else {
						$(configs.classMsgs).removeClass(configs.classSuccess).addClass(configs.classError);
						$(configs.selectorMsg).html('Error: Voc&ecirc; ultrapassou o limite m&aacute;ximo de imagens. Limite: '+configs.maxSize+' MB');
					}
				}else $(configs.selectorMsg).html('Error: Formato inv&aacute;lido. Formatos permitidos (jpg,png,gif)');
			}
		});
	};
})(jQuery);