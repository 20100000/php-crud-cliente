$(document).ready(function(){
    $("#cep").on("change", function(){
        var cep = $("input[name=cep]").val().replace(/[^0-9]/, '');
        if(cep){
            var url = 'https://correiosapi.apphb.com/cep/' + cep;

            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(json) {
                $("#logradouro").text(json.logradouro);
                $("#bairro").text(json.bairro+", ");
                $("#cidade").text(json.localidade);
                // $("#estado").text("-"+json.uf);
                $("#end").show();

                $("input[name=logradouro]").val(json.logradouro);
                $("input[name=bairro]").val(json.bairro);
                $("input[name=cidade]").val(json.localidade);
                $("select[name=estado]").val(json.uf);

            });
        }
    });

    
});