var App = (function() {

    var apiBaseURL = '';
    var apiKey = '';

    var $btn = document.getElementById('boton-consultar');
    var $selector = document.getElementById('selector-tipo');
    var $valorContainer = document.getElementById('container-valor');
    var $fechaContainer = document.getElementById('container-fecha');
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
                // errorMessage('Debe elegir un tipo de cotización/indicador.');
            }
            consultarAPI(type);
        });
    };

    var consultarAPI = function(type) {
        $loading.style.display = 'block';
        clearErrorMessage();
        
        var apiURL = apiBaseURL + type + '?key=' + apiKey;

        fetch(apiURL)
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            $loading.style.display = 'none';
            var data = JSON.parse(data.result);
            console.log(data);
        })
        .catch(function(error) {
            console.log(error.message);
            $loading.style.display = 'none';
            errorMessage('Hubo un error al consultar. Por favor intente luego.');
        });

    };

    // Public
    return {
        init: function(url, api_key) {
            triggerEvents();
            apiBaseURL = url;
            apiKey = api_key;
        }
    }
}());