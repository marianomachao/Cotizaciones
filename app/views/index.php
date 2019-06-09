<!DOCTYPE html>
<html lang="es">
<?=$head ?>

<body class="bg-light">
    <?=$header ?>

    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="<?=$assets_url ?>img/money.svg" alt="" width="100" height="100">
            <h2>Cotizaciones</h2>
            <p class="lead">Breve descripción.</p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-3">Elja el tipo de Cambio</h4>
            </div>

            <div class="col-md-8">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <select class="custom-select d-block w-100" id="moneda" required>
                                <option value="">Elegir...</option>
                                <option>USD</option>
                            </select>

                        </div>
                        <div class="col-md-12 mb-3">
                            <button class="btn btn-primary btn-md btn-block" type="submit">Consultar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex center-content-between lh-condensed">
                        <div class="text-success">
                            <h1 class="my-0">$38,95</h1>
                            <small class="text-muted">al día 16-06-2019</small>
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