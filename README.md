# Cotizaciones e indicadores

El objetivo del sistema es brindar una interfaz al usuario para consultar la cotización del dólar (en pesos argentinos) y algunos otros indicadores económicos.

Dichas cotizaciones e indicadores son consumidos desde un Web Service externo, proporcionado por el  Argentina [Banco de la Nación](https://estadisticasbcra.com).

## Requisitos del servidor

- `PHP >= 5.6`
- `Apache HTTP Server con mod_rewrite activado.` o `NGINX`

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

## Configuración para Nginx

Luego de setear la variable de URL Base en config.php, debemos abrir el archivo de configuración de nuestro servidor virtual (en mi caso `cotizaciones.conf`) y agregar las siguientes líneas (o modificar en caso de que la directiva ya se encuentre definida).

```
location / {
    try_files $uri $uri/ /index.php;
}
```

En mi caso el archivo `cotizaciones.conf` queda configurado de la siguiente manera:

```
server {
	
	## How to allow access from LAN and Internet to your local project:
	## http://winnmp.wtriple.com/howtos.php#How-to-allow-access-from-LAN-and-Internet-to-your-local-project
	
	listen		127.0.0.1:80;
	
	## How to add additional local test server names to my project:
	## http://winnmp.wtriple.com/howtos.php#How-to-add-additional-local-test-server-names-to-my-project
	
	server_name 	cotizaciones.test;
	
	## To manually change the root directive replace the ending comment with: # locked
	## http://winnmp.wtriple.com/howtos.php#How-to-change-the-root-directory-of-a-project
	
	root 	"c:/winnmp/www/cotizaciones"; # automatically modified on each restart! can be manually set by replacing this comment
	
	
	## Access Restrictions
	allow		127.0.0.1;
	deny		all;
	
	
	## Add locations:
	## http://winnmp.wtriple.com/howtos.php#How-to-add-locations
	
	
	## Configure for various PHP Frameworks:
	## http://winnmp.wtriple.com/nginx.php
	
	
	autoindex on;
 
	location ~ \.php$ {
		try_files $uri =404;
		include		nginx.fastcgi.conf;
		include		nginx.redis.conf;
		fastcgi_pass	php_farm;
		fastcgi_hide_header X-Powered-By;
	}
 
	location / {
                # Check if a file or directory index file exists, else route it to index.php.
                try_files $uri $uri/ /index.php;
        }
 
}
```


Listo! la aplicación ya está lista para ser usada desde el navegador/móvil