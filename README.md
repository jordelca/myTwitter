My Twitter
========================

Se ha implementado una aplicación similar a Twitter, para la ejecución de los ejercicios del curso. La aplicación se ha subido a heroku, por lo tanto está visible en cualquier momento en:
http://mytwitter-jordelca.herokuapp.com/

Características
---------------

La aplicación consta de los siguientes apartados:
Una página de inicio para usuarios no autenticados:
* http://mytwitter-jordelca.herokuapp.com/
Login de acceso para usuarios registrados
http://mytwitter-jordelca.herokuapp.com/en/login
Formulario de registro para usuarios nuevos
* http://mytwitter-jordelca.herokuapp.com/en/register/
Validación de ambos formularios
Url amigables como se puede comprobar en ( user: testuser / pass: p@ssword)
* http://mytwitter-jordelca.herokuapp.com/en/user/testuser

Roles de usuarios
-----------------
Sistema de gestión de roles, solo accesible por usuarios ROLE_ADMIN ( user: testuser2 / pass: p@ssword)
* http://mytwitter-jordelca.herokuapp.com/en/admin/
Internacionalización de la aplicación:
* http://mytwitter-jordelca.herokuapp.com/en/twit/
* http://mytwitter-jordelca.herokuapp.com/es/twit/

Se ha utilizado:
----------------

* Assetic para la gestión de assets
* PhpUnit para los tests unitarios y funcionales

Se puede acceder al código en el siguiente repositorio de github:
* https://github.com/jordelca/myTwitter.git

