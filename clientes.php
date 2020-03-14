<?php
/**
 * Created by IntelliJ IDEA.
 * User: tiago
 * Date: 11/03/2020
 * Time: 08:00
 */
include_once "estrutura/header.php";
$clientes = null;
include_once "controller/clientes.php";
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-9">
                                <h4 class="text-primary">Clientes</h4>
                            </div>
                            <div class="col-3 text-right">
                                <button class="btn btn-primary novo" data-toggle="modal" data-target=".bd-example-modal-lg">Novo</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data Nasc.</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>Telefone</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="clientes">
                            <?php
                            $html = '';
                            foreach ( $clientes as $item){

                                $date = date_create($item['nascimento']);
                                $date =  date_format($date, 'd/m/Y');
                                $html .= "<tr id='cli-{$item['id']}'>";
                                $html .= "<td>{$item['nome']}</td>";
                                $html .= "<td>{$date}</td>";
                                $html .= "<td>{$item['cpf']}</td>";
                                $html .= "<td>{$item['rg']}</td>";
                                $html .= "<td>{$item['fone']}</td>";
                                $html .= "<td><i style='font-size: 18px; cursor: pointer' title='Editar' rel='{$item['id']}' class='nc-icon  nc-ruler-pencil text-warning editarCli'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <i style='font-size: 18px; cursor: pointer' title='Remover' rel='{$item['id']}' class='nc-icon  nc-simple-remove text-danger removerCli'></i></td>";
                                $html .= "</tr>";
                            }

                            echo $html;
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" id="modalCli" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="controller/clientes.php" method="post">
                <input type="hidden" name="id" id="id" value="">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-9">
                                <label for="recipient-name" class="col-form-label">Nome:</label>
                                <input type="text" class="form-control" name="nome" id="nome" required>
                            </div>
                            <div class="col-3">
                                <label for="recipient-name" class="col-form-label">Data Nasc:</label>
                                <input type="date" class="form-control" name="nasc" id="nasc" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="message-text" class="col-form-label">CPF:</label>
                                <input type="text" class="form-control" name="cpf" id="cpf" data-mask="999.999.999-99" required>
                            </div>
                            <div class="col-4">
                                <label for="message-text" class="col-form-label">RG:</label>
                                <input type="text" class="form-control" name="rg" id="rg" data-mask="99.999.999-A" required>

                            </div>
                            <div class="col-4">
                                <label for="message-text" class="col-form-label">Tel:</label>
                                <input type="text" class="form-control" name="fone" id="fone" data-mask="(99) 99999-9999" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label for="message-text" class="col-form-label">CEP:</label>
                                <input type="text" id="cep" name="cep" class="form-control" data-mask="99999-999"/>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <label for="message-text" class="col-form-label">Logradouro:</label>
                                <input type="text" name="logradouro" id="logradouro" class="form-control "  />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label for="message-text" class="col-form-label">N°:</label>
                                <input type="text" id="numero" name="numero" id="numero" class="form-control"  />
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label for="message-text" class="col-form-label">Bairro:</label>
                                <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Bairro"  />
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label for="message-text" class="col-form-label">Cidade:</label>
                                <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidade"  />
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label for="message-text" class="col-form-label">UF:</label>
                                <select id="estado" name="estado" id="estado" class="form-control" >
                                    <option value="">UF</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                    <option value="ES">Estrangeiro</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            </form>

        </div>
    </div>
</div>
<div class="modal" id="modalRes" tabindex="-1" role="dialog" aria-labelledby="modalRes">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Retorno!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="success2"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<?php
 include_once "estrutura/footer.php";
?>
