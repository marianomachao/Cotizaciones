# Cotizaciones e indicadores

El objetivo del sistema es brindar una interfaz al usuario para consultar la cotización del dólar (en pesos argentinos) y algunos otros indicadores económicos.

Dichas cotizaciones e indicadores son consumidos desde un Web Service externo, proporcionado por el  Argentina [Banco de la Nación](https://estadisticasbcra.com).

## Requisitos del servidor

- `PHP >= 5.6`
- `Apache HTTP Server con mod_rewrite activado.` 

## Instalación

En primer lugar clonar el repositorio en nuestro servidor:

```bash
git clone https://github.com/marianomachao/Cotizaciones.git
```

Definir URL base en `application/config/config.php`

```
$config['base_url'] = 'http://misitio.com/mi_carpeta/';
```
En caso de querer modificar los tipos de cotización del selector, se pueden configurar desde `application/config/config.php`.

El listado de los distintos elementos posibles se encuentra [aquí](https://estadisticasbcra.com/api/documentacion).

```
$config['api_types'] = array(
	'usd', 'usd_of', 'usd_of_minorista', 'lebac','leliq','merval','merval_usd'
);
```

Listo! la aplicación ya está lista para ser usada desde el navegador/móvil