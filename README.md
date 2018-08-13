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
información generada aleatoriamente con **$faker**.

```
php artisan migrate:refresh --seed
```
