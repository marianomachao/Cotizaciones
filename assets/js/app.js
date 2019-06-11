var App = (function() {
    // Configuración API
    var apiBaseURL = '';
    var apiKey = '';

    // Elementos DOM
    var $btn = document.getElementById('boton-consultar');
    var $selector = document.getElementById('selector-tipo');
    var $valorContainer = document.getElementById('container-valor');
    var $ultimaCotizacionContainer = document.getElementById('ultima-cotizacion-container');
    var $loading = document.getElementById('loading');
    var $errorMsg = document.getElementById('error-message');

    var errorMessage = function(msg) {
        $errorMsg.innerHTML = msg;
    };

    var clearErrorMessage = function() {
        $errorMsg.innerHTML = '';
    };

    var triggerEvents = function() {
        $btn.addEventListener("click", function(event) {
            var type = $selector.value;
            if(type === undefined || type == '' || type == null) {
                return false;
            }
            consumeAPI(type);
        });
    };

    // Formato: 123.456,78
    var formatNumber = function(n) {
        return new Intl.NumberFormat("de-DE").format(n);
    };

    var renderResponse = function(data, type) {
        $valorContainer.style.display = 'block';
        $ultimaCotizacionContainer.style.display = 'block';
        $ultimaCotizacionContainer.querySelectorAll('span').innerHTML = data.ultima_fecha;
        
        var currency = '$';
        if (type == 'merval_usd')
            var currency = 'U$S '

        $valorContainer.innerHTML = currency + formatNumber(data.cotizacion);
    };

    var consumeAPI = function(type) {
        $loading.style.display = 'block';
        $valorContainer.style.display = 'none';
        $ultimaCotizacionContainer.style.display = 'none';
        clearErrorMessage();

        var apiURL = apiBaseURL + type + '?key=' + apiKey;

        fetch(apiURL)
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            $loading.style.display = 'none';
            
            if(data.success)
                renderResponse(data.result, type);
            else
                errorMessage(data.error);
        })
        .catch(function(error) {
            console.log(error.message);
            $loading.style.display = 'none';
            errorMessage('Hubo un error al consultar. Por favor intente luego.');
        });

    };

    // Publico
    return {
        init: function(url, api_key) {
            triggerEvents();
            apiBaseURL = url;
            apiKey = api_key;
        }
    }
}());