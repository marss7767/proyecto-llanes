# proyecto-llanes
Proyecto grupal para el profesor llanes

# Agenda de Contactos

**Proyecto grupal – EPET N.º 34**

## 1. Descripción del proyecto

La Agenda de Contactos es una aplicación web desarrollada para facilitar el registro y la administración de contactos desde un solo lugar.

El sistema permite almacenar información personal, como nombres, números de teléfono y direcciones de correo electrónico, utilizando una base de datos para conservar los datos.

## 2. Objetivo

El objetivo principal es desarrollar una aplicación sencilla y práctica que permita organizar los contactos, facilitando su búsqueda y administración.

## 3. Funciones principales

El proyecto contempla las siguientes funcionalidades:

- **Agregar contactos:** registrar nuevos contactos con nombre, teléfono y correo electrónico.
- **Listar contactos:** visualizar los contactos guardados.
- **Buscar contactos:** encontrar rápidamente un contacto registrado.
- **Editar contactos:** modificar la información de un contacto existente.
- **Eliminar contactos:** quitar contactos de la agenda.

## 4. Tecnologías utilizadas

Para el desarrollo del proyecto se utilizan las siguientes tecnologías:

- **HTML5:** estructura de las páginas.
- **CSS3:** diseño y presentación visual.
- **PHP:** procesamiento de datos y funcionamiento del sistema.
- **MySQL/MariaDB:** almacenamiento de la información.
- **XAMPP:** entorno de servidor local para ejecutar el proyecto.

## 5. Estructura del proyecto

```text
proyecto-llanes/
│
├── config/
│   └── conexion.php
│
├── css/
│   └── styles.css
│
├── database/
│   └── agenda_contactos.sql
│
├── js/
│
├── index.php
├── guardar_contacto.php
└── README.md
```

*La estructura puede ampliarse a medida que se incorporen los módulos de búsqueda, edición y eliminación.*

## 6. Requisitos para ejecutar el proyecto

- Tener instalado XAMPP.
- Contar con un navegador web.
- Tener habilitados los servicios Apache y MySQL.
- Disponer de los archivos del proyecto.

## 7. Instalación y configuración

### Paso 1: Copiar el proyecto

Ubicar la carpeta `proyecto-llanes` dentro de la carpeta `htdocs` de XAMPP.

### Paso 2: Iniciar los servicios

1. Abrir el Panel de Control de XAMPP.
2. Iniciar Apache.
3. Iniciar MySQL.
4. Comprobar que ambos servicios estén funcionando.

### Paso 3: Configurar la base de datos

1. Abrir el navegador.
2. Ingresar a `http://localhost/phpmyadmin`.
3. Crear una base de datos llamada `agenda_contactos`, si todavía no existe.
4. Seleccionar la opción **Importar**.
5. Elegir el archivo `database/agenda_contactos.sql`.
6. Ejecutar la importación.

### Paso 4: Abrir el proyecto

Ingresar desde el navegador a:

`http://localhost/Proyectos/proyecto-llanes/`

La página principal permitirá acceder a las funcionalidades de la agenda a medida que sean incorporadas.

## 8. Pruebas del sistema

Se realizarán pruebas para comprobar el correcto funcionamiento de las operaciones principales:

- Registro de nuevos contactos.
- Visualización de contactos guardados.
- Búsqueda de contactos.
- Modificación de datos.
- Eliminación de registros.

## 9. Estado del proyecto

**En desarrollo.**

Actualmente se está organizando la estructura inicial y trabajando en la integración de los distintos módulos del sistema.

## 10. Desarrollo grupal

El proyecto se desarrolla de manera colaborativa mediante Git y GitHub. Cada integrante trabaja en funcionalidades específicas utilizando ramas independientes, que luego se integran en la rama principal (`main`).

---

**EPET N.º 34 – Proyecto grupal de desarrollo web**