Feature: Crear servicio
    Para crear servicios
    necesito ser un usuario autenticado
    y rellenar un formulario de forma válida

    Background:
        Given un "usuario autenticado"
        And un "usuario no autenticado"

    Scenario: Crear un servicio sin haber hecho login
        Given que soy un "usuario autenticado"
        When intento crear un "servicio"
        Then soy redirigido a la página de publicaciones

    Scenario: Crear un servicion habiendo hecho login
        Given que soy un "usuario no autenticado"
        When intento crear un "servicio"
        Then el "servicio" es creado
        And soy redirigido a la página de publicaciones
