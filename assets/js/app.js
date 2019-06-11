let App = (function() {
    // Configuración API
    let apiBaseURL = '';
    let apiKey = '';

    // Elementos DOM
    const $btn = document.getElementById('boton-consultar');
    const $selector = document.getElementById('selector-tipo');
    const $valorContainer = document.getElementById('container-valor');
    const $ultimaCotizacionContainer = document.getElementById('ultima-cotizacion-container');
    const $loading = document.getElementById('loading');
    const $errorMsg = document.getElementById('error-message');

    const errorMessage = function(msg) {
        $loading.style.display = 'none';
        $valorContainer.innerHTML = '$0,00';
        $valorContainer.style.display = 'block';
        $errorMsg.innerHTML = msg;
    };

    const clearErrorMessage = function() {
        $errorMsg.innerHTML = '';
    };

    const triggerEvents = function() {
        $btn.addEventListener("click", function(event) {
            let type = $selector.value;
            if(type === undefined || type == '' || type == null) {
                return false;
            }
            consumeAPI(type);
        });
    };

    // Formato: 123.456,78
    const formatNumber = function(n) {
        return new Intl.NumberFormat("de-DE").format(n);
    };

    const renderResponse = function(data, type) {
        $valorContainer.style.display = 'block';
        $ultimaCotizacionContainer.style.display = 'block';
        $ultimaCotizacionContainer.querySelectorAll('span').innerHTML = data.ultima_fecha;
        
        let currency = '$';
        if (type == 'merval_usd')
            currency = 'U$S ';

        $valorContainer.innerHTML = currency + formatNumber(data.cotizacion);
    };


    const consumeAPI = function(type) {
        $loading.style.display = 'block';
        $valorContainer.style.display = 'none';
        $ultimaCotizacionContainer.style.display = 'none';
        clearErrorMessage();

        let apiURL = apiBaseURL + type + '?key=' + apiKey;

        fetch(apiURL)
        .then(res => res.json())
        .then(function(data) {
            $loading.style.display = 'none';
            
            if(data.success)
                renderResponse(data.result, type);
            else
                errorMessage(data.error);
        })
        .catch(function(error) {
            errorMessage(error.message);
            console.log(error.message);
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