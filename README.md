# Proyecto Laravel DUAL en Wegetit
### André Arroyo Sarrelangue

## Tecnologías utilizadas
- **Lando**
- **PHP**
- **JavaScript**
- **Bootstrap**
- **Laravel 11**
- **Pest**

## Descripción
Tenemos un sitio web llamado solucionesonline.demo en el cual cualquier usuario registrado puede publicar un servicio ejemplo "Aprende a tocar el piano" el cual tiene un descripción, entre otras características.
Por lo cual tiene que haber login y registro de usuarios, además una vez logueado accederá a un área de usuario donde se visualicen todos los servicios creados de ese usuario pudiendo dar de alta, modificar o dar de baja servicios. 

A la vez habrá una página donde consultar los servicios publicados por el resto de usuarios y podrá acceder al resto a una página detalle del mismo.
Tiene que haber un usuario de rol administrador que vea todos los servicios de todos los usuarios, tanto los publicados como los no publicados y pueda cambiar su estado.
Se puede utilizar componentes extra de Laravel. Las vistas la debes realizar en BLADE

## Requisitos
1. **Sistema de login y registro de usuarios.**
2. **Área de usuario para modificar servicios.**
3. **Indexado de publicaciones.**
4. **Vista detallada del servicio.**
5. **Usuario administrador: Puede modificar los servicios de los usuarios.**
6. **Chat entre usuario y anfitrión basado en una publicación.**
7. **Múltiples Chats**
8. **Tests con Pest**

## Sistema de login y registro de usuarios
Todo el sistema de autenticación y registro se encuentra en [`RegisterUserController.php`](app/Http/Controllers/RegisterUserController.php) y el sistema de login en [`SessionController.php`](app/Http/Controllers/SessionController.php). Las vistas relativas al login y registros están en el directorio [`auth`](resources/views/auth).

## Sistema de publicación de servicios
El sistema mediante el cual se gestionan las funcionalidades CRUD se encuentra en [`ServicioController.php`](app/Http/Controllers/ServicioController.php). Las vistas que indexan, muestran y ofrecen formularios para modificar estos servicios están en el directorio [`servicios`](resources/views/servicios).

### 1. Indexado de publicaciones
### 2. Vista detallada del servicio
### 3. Modificar publicaciones

## Área de usuario para modificar servicios
Se ha creado un apartado de Perfil en la web en el que el usuario puede consultar sus publicaciones, tanto públicas como privadas. Su controlador es [`PefilController.php`](app/Http/Controllers/PerfilController.php) y las vistas están en el directorio [`perfil`](resources/views/perfil).

## Chat de mensajes
Los usuarios que visitan las publicaciones pueden abrir un chat con el creador del servicio. He utilizado JavaScrip, el script se encuentra en la vista [`chat.blade.php`](resources/views/servicios/chat.blade.php). El controlador que gestiona el chat es [`ChatController.php`](app/Http/Controllers/ChatController.php).

## Testing
