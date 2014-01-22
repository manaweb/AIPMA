$(document).ready(function() {

    $('.maskCep').mask('99.999-999');

    $('#btnBuscarCep').click(function() {
        $.blockUI({
            message: '<h3> Consultando...</h3>'
        });
        $('#panelFooter').text('');

        //Pega o conteudo do campo CEP e remove caracteres especiais
        var cep = $('#cep').val().replace(/[^\d]/g, "");

        $.ajax({
            url: "http://cep.correiocontrol.com.br/" + cep + ".json",
            type: "GET",
            dataType: "json",
            success: function(json) {
                $('#logradouro').val(json.logradouro);
                $('#bairro').val(json.bairro);
                $('#cidade').val(json.localidade);
                $('#estado').val(json.uf);

            },
            error: function() {
                $('#panelFooter').text('CEP não localizado!');
                 $('#logradouro').val('');
                $('#bairro').val('');
                $('#cidade').val('');
                $('#estado').val('');
            },
            complete: function() {
                $.unblockUI();
            }
        });


    })

    $('#btnGravarForm').click(function() {
        var cep = $('#txtNumCep').val();
        var logradouro = $('#txtLogradouro').val();
        var numLogradouro = $('#txtNumLogradouro').val();
        var bairro = $('#txtBairro').val();
        var cidade = $('#txtCidade').val();
        var estado = $('#txtEstado').val();

        alert(cep + "|" + logradouro + "|" + numLogradouro + "|" + bairro + "|" + cidade + "|" + estado);
    })

});