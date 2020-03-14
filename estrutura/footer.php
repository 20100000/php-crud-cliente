<?php
/**
 * Created by IntelliJ IDEA.
 * User: tiago
 * Date: 11/03/2020
 * Time: 07:55
 */
?>
<footer class="footer">
    <div class="container-fluid">
        <nav>

            <p class="copyright text-center">
                ©
                <script>
                    document.write(new Date().getFullYear())
                </script>
                <a href="#">Teste</a>
            </p>
        </nav>
    </div>
</footer>
</div>
</div>

</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script src="assets/js/cep.js"></script>
<script src="./assets/js/jquery.mask.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var retorno = window.location.search;
        var res = retorno.split('?');
        var id =  res[1];

        user =res[0];

        if (id == 's=1') {
            $("#modalRes").modal();
            $("#success2").text("Salvo com sucesso! \n");
            $("#load2").css("display","none");
            $("#success2").css("display", "block");
        }

        $(document).on('click', '.removerCli', function(){
            var id = $(this).attr('rel');
            var con  = confirm("Tem certeza que deseja deletar cliente");

            if(con){
                $.ajax({
                    url: "./controller/deleteCliente.php?id="+id,
                    type: "GET",
                    async: false,
                    success: function(data)
                    {
                        var res = JSON.parse(data);
                        if (res.success) {
                            $("#cli-"+id).remove();
                        }else{

                        }
                    },
                    error: function(e)
                    {

                    }
                });
            }else{
            }
        });

        $(document).on('click', '.close', function() {
            $('input').val("");
        });

        $(document).on('novo', '.close', function() {
            $('input').val("");
        });

        $(document).on('click', '.editarCli', function() {
            var id = $(this).attr('rel');

            $.ajax({
                url: "./controller/cliente.php?id="+id,
                type: "GET",
                async: false,
                success: function(data)
                {
                    var res = JSON.parse(data);
                    console.log('dataEdit',res.data);
                    if (res.success) {
                        $("#id").val(res.data[0].id);
                        $("#nome").val(res.data[0].nome);
                        $("#nasc").val(res.data[0].nascimento);
                        $("#cpf").val(res.data[0].cpf);
                        $("#rg").val(res.data[0].rg);
                        $("#cep").val(res.data[0].cep);
                        $("#logradouro").val(res.data[0].logradouro);
                        $("#numero").val(res.data[0].n);
                        $("#bairro").val(res.data[0].bairro);
                        $("#cidade").val(res.data[0].cidade);
                        $("select[name=estado]").val(res.data[0].uf);

                        $('#modalCli').modal();
                    }else{

                    }
                },
                error: function(e)
                {

                }
            });
        });
    });
</script>
</html>
