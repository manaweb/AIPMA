(function(a) {
	var isValid = new Array();
	var vTrues = new Array();
	var validar = null;
	var methods = {
		validar : function(configs) {
			var fValidator = $(this);
			var formName = fValidator.attr('name');
			var found = fValidator.find('[validador^=requerido]');
			var nElementsRequired = found.length;
			var currentClass = null;

			isValid[formName] = false;

			fValidator.prepend('<div class="arredondar styles"><a href="javascript:void(0);" class="close">x</a><div id="mensagemRetorno"></div></div>');

			var defaults = $.extend({
				msgSucesso : 'Campo(s) validado(s) com sucesso',
				msgError : 'Campo(s) n&atilde;o preenchido(s) corretamente',
				listarNomeCampos : false,
				onSuccess : function() {},
				onFail : function() {}
			},configs);
			
			return fValidator.each(function() {
				fValidator.submit(function() {
					vTrues[formName] = 0;
					$('.styles, .close').removeClass('success');
					for (i = 0;i < nElementsRequired;i++) {
						var value = found.eq(i);
						var attr = found.eq(i).attr('validador').match(/\[(.*?)\]/g).toString();
						if (value.eq(i).attr('readonly') != 'readonly') {
							if ((attr != null && attr != undefined)) {
								switch(attr) {
									case '[celular]':
										var reg = null;
										var numeros = value.val().match(/\d{2}/);

										if (parseInt(numeros) > 10  && parseInt(numeros) < 20)
											reg = /\([0-9]{2}\) ([6-9])([0-9]{4}-([0-9]{4}))/;
										else
											reg = /\([0-9]{2}\) ([6-9])([0-9]{3,4}-([0-9]{4}))$/;
										if (value.val().match(reg) == null) value.addClass('error');
										else {
											vTrues[formName]++;
											value.removeClass('error');
										}
									break;

									/*case '[cpf]':
										value.val('123');
									break;
									
									case '[cnpj]':
										value.val('asdasdasd');
									break;*/

									case '[email]':
										if (value.val().match(/^([a-z|0-9|\.|-]{1,}[@]).*?([a-z][.]{1,3})([a-z]{1,3})$/) != null) {
											vTrues[formName]++;
											value.removeClass('error');
										}
										else
											value.addClass('error');
									break;
									case '[textarea]':
										if (value.val().length >= 120) {
											vTrues[formName]++;
											value.removeClass('error');
										}
										else
											value.addClass('error');
									break;
									case '[nome]':
									case '[album]':
										if (value.val().length >= 3) {
											vTrues[formName]++;
											value.removeClass('error');
										}
										else
											value.addClass('error');
									break;
									case '[url]':
										if (value.val().match(/^((((http|https):\/\/)|(www.))?(\w+[.])?(\w+[.][a-z]{2,3})?([\/].*))$/) != null) {
											vTrues[formName]++;
											value.removeClass('error');
										}
										else
											value.addClass('error');
									break;
									case '[youtube]':
										if (value.val().match(/^(((http|https):\/\/)|(www.))?(\w+[.])?(\w+[.][a-z]{2,3})?([\/]watch\?v=([\w+]{11}))$/) != null) {
											vTrues[formName]++;
											value.removeClass('error');
										}
										else
											value.addClass('error');
									break;
									default:
										if (value.val() != '' && value.val() != ' ') {
											vTrues[formName]++;
											value.removeClass('error');
										}
										else
											value.addClass('error');
									break;
								}
							}
						}else vTrues[formName]++;

					}
					if (vTrues[formName] == nElementsRequired) {
						$('.styles, .close',this).addClass('success');
						$('#mensagemRetorno',this).html(defaults.msgSucesso);
						currentClass = 'success';
						isValid[formName] = true;
						defaults.onSuccess();
					} else {
						$('.styles, .close',this).addClass('error');
						$('#mensagemRetorno',this).html(defaults.msgError);
						currentClass = 'error';
						defaults.onFail();
						return false;
					}
					$('.styles',this).fadeIn(700);
					return false;
				})
				$('.close').click(function() {
					$(this).parent().fadeOut();
				});
			});
		},
		statusValidacao : function() {
			var formName = this.attr('name');
			if (isValid[formName] == undefined)
				isValid[formName] = false;
			return isValid[formName];
		}
	};

	$.fn.validador = function(method) {
		if (methods[method]) {
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if (typeof method === 'object' || !method) {
			return methods.init.apply( this, arguments );
		} else {
			$.error('Method ' +  method + ' does not exist');
		}
	};
})(jQuery);