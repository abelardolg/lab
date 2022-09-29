# ¿Qué es este proyecto?
Este proyecto, como su propio nombre indica, es un laboratorio de programación donde, cada cierto tiempo, lo actualizaré 
con código que, al menos es lo que pretendo, cumple con los principios SOLID, de arquitectura limpia, testing, etc.

# Créditos
Un alto porcentaje de este código es el fruto de haber realizado el curso "Symfony 5 + Api Platform" de [Codenip en Udemy](https://www.udemy.com/course/crear-api-con-symfony-y-api-platform/)
el cual te recomiendo si quieres tener una base sólida y profesional en tu código PHP con Symfony.
Además, parte de este código también ha sido súpervitaminado con un vídeo que ellos, los chicos de Codenip, subieron a Youtube:
[Codenip en Youtube](https://www.youtube.com/watch?v=GZ-OE3fewmo&feature=emb_logo).

Codenip son: 
- [Juan González TM](https://twitter.com/juangonzalezdev)
- [Moein Akbarof](https://twitter.com/moein_tech)

# Última actualización:
- 28 de septiembre de 2022

# Licencia:
- Usa este código, modifícalo y distribúyelo siguiendo las buenas prácticas de los proyectos de código abierto.

# Instalación:
Para ejecutarlo, has de instalar:
- docker
- docker-compose
- make

A continuación, has de ejecutar:
- make run

La primera vez tardará, pues ha de bajarse todas las imágenes del software que necesita (nginx, php [con todos sus módulos] y MySQL 8.0).
Una vez terminada la instalación del software, y de que todos los servicios muestren un "done" en color verde, ve a tu navegador y teclea:
- http://localhost:200

Verás un mensaje de error, pues el endpoint / es, realmente, un controlador que requiere del método POST; por ello, es mejor que ejecutes
un cliente HTTP (por ejemplo curl) y hagas una petición POST pasándole, en el body, un json con tres campos: "nombre", "email" y "password".
Te mostrará un mensaje de error si:
- si no pones uno de los tres campos;
- si pones un email mal;
- si la contraseña tiene una longitud menor que 6 caracteres.

# Añadidos:
- Argument resolver para convertir la request en el command, dto requerido para ese caso de uso.
- Validación de los parámetros según reglas establecidas.
- Acorde con los principios de la separación de capas. El request no pasa a la capa de aplicación.