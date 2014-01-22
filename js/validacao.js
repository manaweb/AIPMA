function valida_cpf(field, rules, i, options){
		var cpf = field.val();
		cpf = cpf.replace(/[^\d]+/g,'');
		$('#cpf').val(cpf);
      var numeros, digitos, soma, i, resultado, digitos_iguais;
      digitos_iguais = 1;
      if (cpf.length < 11)
            return '* Número do CPF invalido';
      for (i = 0; i < cpf.length - 1; i++)
            if (cpf.charAt(i) != cpf.charAt(i + 1))
                  {
                  digitos_iguais = 0;
                  break;
                  }
      if (!digitos_iguais)
            {
            numeros = cpf.substring(0,9);
            digitos = cpf.substring(9);
            soma = 0;
            for (i = 10; i > 1; i--)
                  soma += numeros.charAt(10 - i) * i;
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(0))
                  return '* Número do CPF invalido';
            numeros = cpf.substring(0,10);
            soma = 0;
            for (i = 11; i > 1; i--)
                  soma += numeros.charAt(11 - i) * i;
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(1))
                  return '* Número do CPF invalido';
            return options.allrules.validate2fields;
            }
      else
            return '* Número do CPF invalido';
}

function valida_cnpj(field, rules, i, options) {
 	var cnpj = field.val();
    cnpj = cnpj.replace(/[^\d]+/g,'');
	
	
    if(cnpj == '') return '* Número do CNPJ invalido';
     $('#cnpj').attr('value',cnpj);
	 
    if (cnpj.length != 14)
        return '* Número do CNPJ invalido';
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" ||
        cnpj == "11111111111111" ||
        cnpj == "22222222222222" ||
        cnpj == "33333333333333" ||
        cnpj == "44444444444444" ||
        cnpj == "55555555555555" ||
        cnpj == "66666666666666" ||
        cnpj == "77777777777777" ||
        cnpj == "88888888888888" ||
        cnpj == "99999999999999")
        return '* Número do CNPJ invalido';
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return '* Número do CNPJ inválido';
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return '* Número do CNPJ inválido';
           
    return options.allrules.validate2fields;
    
}

function valida_cel(field, rules, i, options) {
	var reg = null;
	if (parseInt($('#ddd_cel').val()) == 11)
		reg = /(^[6-9])([0-9]{7,8})/;
	else
		reg = /^([6-9])([0-9]){7}$/;
	if (field.val().match(reg) == null) return '* Número do celular invalido';
	return options.allrules.validate2fields;
}

function valida_cel2(field, rules, i, options) {
	var reg = null;
	var numeros = field.val().match(/\d{2}/);

	if (parseInt(numeros) > 10  && parseInt(numeros) < 20)
		reg = /\([0-9]{2}\) ([6-9])([0-9]{4}-([0-9]{4}))/;
	else
		reg = /\([0-9]{2}\) ([6-9])([0-9]{3,4}-([0-9]{4}))$/;
	if (field.val().match(reg) == null) return '* Número do celular invalido';
	return options.allrules.validate2fields;
}
