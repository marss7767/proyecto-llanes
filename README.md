# proyecto-llanes

Proyecto grupal para el profesor Llanes.

# Agenda de Contactos

**Proyecto grupal – EPET N.º 34**

## 1. Descripción del proyecto

La Agenda de Contactos es una aplicación web desarrollada para facilitar el registro y la administración de contactos desde un solo lugar.

El sistema permite almacenar información personal, como nombres, números de teléfono y direcciones de correo electrónico, utilizando una base de datos para conservar los datos y acceder a ellos cuando sea necesario.

## 2. Objetivo

El objetivo principal es desarrollar una aplicación web sencilla, práctica y funcional que permita organizar los contactos de manera digital, facilitando su registro, búsqueda, visualización, modificación y eliminación.

Además, el proyecto permite aplicar los conocimientos adquiridos durante el desarrollo de páginas web y el manejo de bases de datos.

## 3. Funciones principales

La aplicación cuenta con las siguientes funcionalidades:

- **Agregar contactos:** permite registrar nuevos contactos ingresando nombre, teléfono y correo electrónico.
- **Listar contactos:** muestra los contactos almacenados en la base de datos.
- **Buscar contactos:** permite localizar rápidamente un contacto registrado.
- **Editar contactos:** permite modificar la información de un contacto existente.
- **Eliminar contactos:** permite quitar contactos de la agenda cuando ya no son necesarios.

## 4. Tecnologías utilizadas

Para desarrollar el proyecto se utilizaron las siguientes tecnologías:

- **HTML5:** utilizado para crear la estructura de las páginas.
- **CSS3:** utilizado para diseñar y mejorar la presentación visual de la aplicación.
- **PHP:** encargado de procesar los datos y realizar las operaciones del sistema.
- **MySQL/MariaDB:** utilizado para almacenar y administrar la información de los contactos.
- **XAMPP:** entorno de servidor local que permite ejecutar PHP y administrar la base de datos.
- **Git y GitHub:** utilizados para organizar el trabajo grupal, controlar los cambios y compartir el código.

## 5. Estructura del proyecto

La organización de los archivos del proyecto es la siguiente:

```text
proyecto-llanes/
│
├── css/
│   └── styles.css
│
├── database/
│   └── agenda_contactos.sql
│
├── conexion.php
├── index.php
├── guardar_contacto.php
├── listar.php
├── buscar.php
├── editar_contacto.php
├── actualizar_contacto.php
│
└── README.md
```

Cada archivo cumple una función dentro de la aplicación:

- **index.php:** contiene la página principal de la agenda.
- **conexion.php:** establece la conexión con la base de datos.
- **guardar_contacto.php:** procesa el registro de nuevos contactos.
- **listar.php:** permite mostrar los contactos almacenados.
- **buscar.php:** realiza la búsqueda de contactos.
- **editar_contacto.php:** permite acceder a la edición de un contacto.
- **actualizar_contacto.php:** procesa los cambios realizados en los datos.
- **css/styles.css:** contiene los estilos visuales de la aplicación.
- **database/agenda_contactos.sql:** contiene la estructura y los datos necesarios para crear la base de datos.

## 6. Requisitos para ejecutar el proyecto

Para utilizar la aplicación se necesita:

- Tener instalado XAMPP.
- Contar con un navegador web.
- Tener habilitados los servicios Apache y MySQL.
- Disponer de los archivos del proyecto.
- Importar la base de datos correspondiente.

## 7. Instalación y configuración

### Paso 1: Copiar el proyecto

Ubicar la carpeta `proyecto-llanes` dentro de la carpeta `htdocs` de XAMPP.

Por ejemplo:

```text
C:\xampp\htdocs\Proyectos\proyecto-llanes
```

### Paso 2: Iniciar los servicios

1. Abrir el Panel de Control de XAMPP.
2. Iniciar el servicio Apache.
3. Iniciar el servicio MySQL.
4. Comprobar que ambos servicios estén funcionando correctamente.

### Paso 3: Configurar la base de datos

1. Abrir un navegador web.
2. Ingresar a [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
3. Crear una base de datos llamada `agenda_contactos`, si todavía no existe.
4. Seleccionar la base de datos creada.
5. Ingresar en la opción **Importar**.
6. Seleccionar el archivo `database/agenda_contactos.sql`.
7. Ejecutar la importación para crear la estructura necesaria.

### Paso 4: Verificar la conexión

Comprobar que el archivo `conexion.php` tenga configurados correctamente los datos de conexión con MySQL, incluyendo el nombre de la base de datos `agenda_contactos`.

### Paso 5: Abrir el proyecto

Ingresar desde el navegador a la siguiente dirección:

```text
http://localhost/Proyectos/proyecto-llanes/
```

Una vez abierta la página principal, se podrá utilizar la Agenda de Contactos.

## 8. Pruebas del sistema

Para comprobar el funcionamiento de la aplicación se realizaron pruebas de las principales operaciones:

- Registro de nuevos contactos.
- Visualización de los contactos guardados.
- Búsqueda de contactos existentes.
- Edición y actualización de información.
- Eliminación de contactos.
- Comprobación de la conexión con la base de datos.

Estas pruebas permitieron verificar que las funcionalidades principales del sistema trabajen correctamente.

## 9. Estado del proyecto

**Proyecto finalizado y funcional.**

Se completó el desarrollo de la Agenda de Contactos, integrando las diferentes funcionalidades y conectándolas con la base de datos.

La aplicación permite administrar los contactos mediante las operaciones de registro, consulta, búsqueda, edición y eliminación.

## 10. Desarrollo grupal y organización del trabajo

El proyecto fue realizado de manera colaborativa por los integrantes del grupo, aplicando los conocimientos adquiridos durante las clases de desarrollo web.

### 10.1 Distribución de tareas

Para organizar el trabajo, se dividieron las actividades en diferentes partes:

- Desarrollo de la página principal y organización general del proyecto.
- Creación del formulario para registrar contactos.
- Configuración de la conexión con la base de datos.
- Desarrollo de las funciones para listar y buscar contactos.
- Implementación de las opciones para editar, actualizar y eliminar contactos.
- Diseño y presentación visual mediante CSS.
- Elaboración de la documentación del proyecto.

### 10.2 Herramientas de trabajo

Durante el desarrollo se utilizaron las siguientes herramientas:

- **Visual Studio Code:** para escribir y editar el código.
- **XAMPP:** para ejecutar el servidor local y administrar MySQL.
- **phpMyAdmin:** para crear y gestionar la base de datos.
- **Git:** para registrar los cambios realizados en los archivos.
- **GitHub:** para compartir el proyecto y trabajar de manera colaborativa.

### 10.3 Organización mediante ramas

Se utilizó GitHub para organizar el trabajo grupal mediante ramas (*branches*).

Cada integrante pudo trabajar en una parte del proyecto sin modificar directamente el trabajo de los demás.

Esto permitió desarrollar las diferentes funcionalidades de manera independiente y mantener un mejor control de los cambios.

### 10.4 Integración de los archivos

Una vez desarrolladas las distintas partes, se integraron los archivos para formar una única aplicación.

Durante esta etapa se revisaron las conexiones entre los archivos PHP, las rutas, los estilos CSS y la base de datos.

También se corrigieron errores y se realizaron pruebas para comprobar que las funcionalidades trabajaran correctamente en conjunto.

### 10.5 Pull Requests y rama principal

Se utilizaron los *Pull Requests* de GitHub para proponer e integrar los cambios realizados en las distintas ramas.

Luego de revisar las modificaciones, se incorporaron los archivos a la rama principal `main`, donde quedó reunida la versión final del proyecto.

### 10.6 Resultado del trabajo colaborativo

El trabajo en equipo permitió dividir las responsabilidades, compartir conocimientos y resolver los problemas que aparecieron durante el desarrollo.

Como resultado, se obtuvo una aplicación web funcional que cumple con el objetivo propuesto: administrar una agenda de contactos mediante PHP, HTML, CSS y MySQL.

---

**EPET N.º 34 – Proyecto grupal de desarrollo web**

**Materia:** Desarrollo Web  
**Profesor:** Llanes