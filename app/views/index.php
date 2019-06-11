<!DOCTYPE html>
<html lang="es">
<?=$head ?>

<body class="bg-light">
    <?=$header ?>

    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="<?=asset_url() ?>img/money.svg" alt="" width="100" height="100">
            <h2>Cotizaciones</h2>
            <p class="lead">E indicadores.</p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-3">Elja el tipo de cambio/indicador</h4>
            </div>

            <div class="col-md-8">
                <form>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <select class="custom-select d-block w-100" id="selector-tipo" required>
                                <option value="">Elegir...</option>
                                <?php
                                foreach ($types as $key => $label) {
                                ?>
                                    <option value="<?=$key ?>"><?=$label ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="col-md-12 mb-3">
                            <button class="btn btn-primary btn-md btn-block" id="boton-consultar" type="button">Consultar</button>
                            <div class="error text-danger py-2 font-weight-bold" id="error-message"></div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex center-content-between lh-condensed">
                        <div id="loading" class="text-center" style="display: none;">
                            <img src="<?=asset_url() ?>img/loading.gif">
                        </div>
                        <div class="text-success">
                            <h1 class="my-0" id="container-valor">$0,00</h1>
                            <small class="text-muted" id="ultima-cotizacion-container" style="display: none">&Uacute;ltima cotizaci&oacute;n <span>16-06-2019</span></small>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <?=$footer ?>
    </div>
    <?=$javascript ?>
</body>
</html>