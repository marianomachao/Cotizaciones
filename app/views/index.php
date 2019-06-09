<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mariano Machao">
    <meta name="generator" content="Mariano Machao">
    <title>Cotizaciones</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="dist/css/form-cotizador.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Cotizaciones</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#">Link 1</a>
            <a class="p-2 text-dark" href="#">Link 2</a>
            <a class="p-2 text-dark" href="#">Link 3</a>
            <a class="p-2 text-dark" href="#">Link 4</a>
        </nav>
    </div>

    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="dist/img/money.svg" alt="" width="100" height="100">
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
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <img class="mb-2" src="dist/img/money.svg" alt="" width="50" height="50">
                    <small class="d-block mb-3 text-muted">&copy; 2017-2019</small>
                </div>
                <div class="col-6 col-md">
                    <h5>Link 1</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Sub Link 1</a></li>
                        <li><a class="text-muted" href="#">Sub Link 1</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Link 2</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Sub Link 2</a></li>
                        <li><a class="text-muted" href="#">Sub Link 2</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Link 3</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Sub Link 3</a></li>
                        <li><a class="text-muted" href="#">Sub Link 3</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md">
                    <h5>Link 4</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Sub Link 4</a></li>
                        <li><a class="text-muted" href="#">Sub Link 4</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script src="dist/js/form-validation.js"></script>
</body>

</html>