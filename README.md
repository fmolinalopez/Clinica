# CLINICA

**Clinica** es una red social que permite a medicos y pacientes ponerse en contactos a traves de
citas y conversaciones.
Esta realizada con **Laravel 5.5** y **Bootstrap 4**.

## Instalación

Para poder usar la aplicacion necesita tener instalado **PHP**, **Composer**, **Vagrant** y **VirtualBox**

#### Composer
Instalar **Composer**: https://getcomposer.org/download/

#### Virtual Box
Instalar **Virtual Box**: https://www.virtualbox.org/wiki/Downloads

#### Vagrant
Instalar **Vagrant**: https://www.vagrantup.com/downloads.html

#### Homestead
Instalar **Homestead**: https://laravel.com/docs/5.5/homestead

## Configuración

Una vez instalados los programas requeridos, descargar el proyecto
```
    https://github.com/fmolinalopez/Clinica
```
Una vez descargado procederemos a la configuracion del mismo.

#### Homestead.yaml
- En primer lugar modificaremos el archivo **Homestead.yaml** ubicado en la carpeta **Homestead.**

```
ip: "192.168.10.10"
memory: 2048
cpus: 1
provider: virtualbox

authorize: C:\Users\Vikin\.ssh\keyfran.pub

keys:
    - C:\Users\Vikin\.ssh\keyfran

folders:
    - map: C:\Users\Vikin\Documents\Homestead_Projects
      to: /home/vagrant/code

sites:
    - map: clinica.test
      to: /home/vagrant/code/clinica/public

databases:
    - clinica
```

#### hosts
- En segundo lugar modificaremos el archivo hosts con permisos de administrador y añadiremos 
192.162.10.10 clinica.test al final.
    - En **Linux** se encuentra en: `etc/hosts`
    - En **Windows** la ruta sería: `C:\Windows\System32\drivers\etc`


Una vez realizados todos estos pasos, levantamos la máquina virtual con el comando
**vagrant up** en la carpeta Homestead. 

#### .env
Una vez realizado todos estos pasos, tendremos que configurar el archivo **.env** dentro del proyecto.
Para ello crearemos un nuevo **.env**, cuya configuracion sera:

```
APP_NAME=Clinica
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://clinica.test
 
DB_CONNECTION=mysql
DB_HOST=192.168.10.10
DB_PORT=3306
DB_DATABASE=clinica
DB_USERNAME=homestead
DB_PASSWORD=secret
 
BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync
 
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
 
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

```

Para generar 'APP_KEY, deberá utilizar el comando:'
```
php artisan key:generate
```

### Base de datos
Para acceder a la base de datos, utilizará los datos del archivo **.env**.
- Accedemos a **_Database_** -> **_New_** -> **_Data Source_** -> **_MySQL_**   


## Instalación de los componentes necesarios
Para instalar los componentes necesarios para que la aplicación funcione,
 deberá ejecutar el comando:
```
composer install
```

Una vez que estemos conectados a la Base de Datos y todos los componentes estén ya instalados, podrá proceder a utilizar
el siguiente comando en el proyecto, este comando _"llenará"_ la base de datos gracias al uso de las factorías, con 
información generada aleatoriamente con**$faker**.

```
php artisan migrate:refresh --seed
```

## Manual de uso de la aplicación
Una vez llegados aquí, significa que todo ha funcionado de forma correcta, a continuación le detallaré las distintas
funcionalidades que posee la página de **Walalolo.**

En primer lugar, cabe destacar que las funciones de las que dispondrá el usuario variarán dependiendo si este está
logeado o no en ese momento.

A lo largo del manual verá la siguiente abreviación **(LMI)**, significa **_"link for more information"_**, al hacer 
click en el enlace ,accederemos a una vista específica del producto o del usuario en su caso.

### Usuario NO logeado
- En el **navbar** dispondrá de 4 opciones:
    - **Tabla de productos:** accederá a una nueva página donde encontrará una tabla con todos los productos disponibles,
    aquí podrá ordenar los productos según cada sección y también dispondrá de un recuadro para buscar cosas concretas.
    La foto, el título y el nombre del propietario poseen **(LMI)**.
    - **Búsqueda:** aquí podremos buscar productos según su nombre y accederemos a una nueva página donde veremos
    dichos productos.
    - **Login:** nos permite logearnos en la página si ya disponemos de una cuenta.
    - **Register:** nos permite registrarnos en la página con un nuevo usuario.
- El **contenido principal** de la página se divide en **tres secciones:**
    - La **parte superior** posee un **Carousel**, aquí se mostrarán aquellos productos que posean entre sus características
    el ser **"destacado"**. Si hacemos click en la imagen iremos a una nueva página donde veremos más información acerca
    de ese producto.
    - En la **parte central** de la página aparecerán todos los productos de más reciente "creación" hasta el más
    antiguo. Estos productos poseen la siguiente información:
        - Nombre del producto **(LMI)**, imagen del usuario que la ha subido **(LMI)**, nombre del usuario que la ha subido
         **(LMI)**, visitas de ese producto, imagen **(LMI)**, descripción y precio del producto.
    - En el **lateral izquierdo** de la página, encontramos una pequeña tabla con dos opciones seleccionables y una tercera
    con un desplegable, que nos permite filtrar los productos según lo seleccionado, el funcionamiento es el siguiente:
        - Las dos opciones seleccionables nos permite filtrar por aquellos productos que tengan un precio
        negociable o que permitan el intercambio.
        - La tecera opción, el desplegable, nos permite seleccionar la categoría a la que pertecene dicho producto.
- **Footer:** 
    - Foto y enlace de **Github** con links hacia el Github del proyecto.
    - Logo central de **Walalolo** que te redirecciona a la página principal.
      
#### Vista de un producto en concreto
Aquí dispondrá de toda la información acerca del producto al que ha accedido junto a un mapa con la localización del 
usuario del producto. Tanto la foto del usuario como su nombre son **(LMI)**.

#### Vista de un usuario
- En la parte superior encontrará un **mapa** con la ubicación del usuario.
- Podrá ver la **valoración** que tiene el usuario, esta valoración es una media que se obtiene a partir de los votos que 
otros usuarios han realizado sobre él.
- Podrá ver todos los productos que ese usuario tiene a disposición en la página.
- Si hace click en el botón de mostrar comentarios, se abrirán los comentarios que ese usuario ha recibido de otros
usuarios, estos comentarios son públicos.

### Usuario logeado
Hasta aquí todo lo que un usuario no logeado puede hacer, al logearte, tendrás nuevas funciones y permisos, a
continuación les explicaré las nuevas funcionalidades, las anteriores citadas se mantendrán intactas.
- En el **navbar** se modificará un poco:
    - **Añadir productos:** aquí podrás añadir un nuevo producto.
    - Click en el **nombre del usuario logeado**, aparecerá un dropdown:
        - **Perfil:** accedemos a una nueva sección, aquí podremos **ver** todos los datos del usuario.
            - **Editar Perfil:** si accedemos a **editar perfil**, podremos **modificar** la información del usuario.
        - **Ofertas:** veremos todas las ofertas que han realizado otros usuarios sobre nuestros productos con la 
        **negociación del precio activada**. Aquí podremos **aceptar/rechazar** las ofertas, las aceptadas pasarán a la
        parte de **"Ofertas aceptadas"**.
        - **Tus productos:** accedemos la vista de usuario pero en este caso la del tuyo.
        - **Logout**: nos desconectamos de la cuenta.
    - **Foto del usuario:** enlace directo a tu **perfil.**
    - **Icono del mensaje:** esto nos llevará a todas las conversaciones que tiene el **usuario.**
    
#### Vista de un producto en concreto
Las nuevas opciones que dispone aquí son dos:
- Si el producto posee la característica de **negociación del precio: sí**, podrá realizarle una **contraoferta** del
precio de ese producto a su usuaro.
- Si usted accede a un producto suyo, dispondrá de la opción de **Editar producto**, aquí podrá, al igual que con el 
**perfil**, modificar los datos del producto.

#### Vista de un usuario
Las nuevas opciones que dispone aquí son 3:
- Podrás **valorar** al usuario con una puntuación del 0 al 5, si vuelve a valorar, se modificará su valoración anterior.
- Podrás enviarle un mensaje directo al usuario, este mensaje directo sólo podrá verlo el usuario en cuestión.
    - Si ya existe una **conversación** con el usuario, aparecerá el icono de un **mensaje** encima de la foto del 
    usuario, para que pueda acceder a la **conversación** que haya tenido con ese **usuario.**
- Podrás realizarle un **comentario público** al usuario.


## Componentes utilizados en el proyecto
- **Lozad.js**
- **iziModal.js**
- **Autocomplete**
- **Datatables.js**
- **DatePicker.js**
- **Leaflet.js**
- **GeoIp**
- **Todos los componentes necesarios para el uso correcto de Bootstrap v4.0.**