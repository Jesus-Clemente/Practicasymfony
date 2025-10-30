# Gestión de Proveedores - Symfony 4

Esta es una aplicación web desarrollada en **Symfony 4** para gestionar proveedores. Permite crear, editar, eliminar y listar proveedores, mostrando información como nombre, correo, teléfono, tipo, estado (activo/inactivo) y fechas de creación/actualización.

---

## Características principales

* Listado completo de proveedores.
* Creación y edición de proveedores mediante formularios.
* Eliminación de proveedores con confirmación y protección CSRF.
* Fechas de creación (`createdAt`) y actualización (`updatedAt`) gestionadas automáticamente.
* Redirección automática desde la raíz (`/`) a `/proveedores/`.
* Interfaz limpia y moderna usando CSS puro (sin Bootstrap).
* Preparado para desplegarse con Docker (opcional).

---

## Requisitos previos

* PHP 7.4 o superior
* Composer
* MySQL
* Symfony CLI (opcional, para levantar el servidor de desarrollo)

---

## Dependencias del proyecto

* `symfony/framework-bundle` 4.4
* `symfony/console` 4.4
* `symfony/flex` 1.22
* `symfony/maker-bundle` 1.39
* `doctrine/annotations` 1.14
* `doctrine/deprecations` 1.1
* `doctrine/doctrine-bundle` 2.7
* `doctrine/doctrine-migrations-bundle` 3.2
* `sensio/framework-extra-bundle` 6.2
* `symfony/security-csrf`
* `symfony/form`
* `symfony/validator`
* `twig/twig`

#### Instalación de dependencias con Composer

```bash
composer require symfony/security-csrf
composer require symfony/form symfony/validator
composer require twig
```

> Nota: Symfony base y Doctrine se instalan automáticamente al crear el proyecto con `symfony new`.

---

## Instalación y configuración

1. **Clonar el repositorio:**

```bash
git clone <URL_DE_TU_REPOSITORIO>
cd <NOMBRE_DEL_PROYECTO>
```

2. **Instalar dependencias:**

```bash
composer install
```

3. **Configurar la base de datos**

Edita el archivo `.env` y configura la conexión:

```dotenv
DATABASE_URL=mysql://usuario:contraseña@127.0.0.1:3306/nombre_base_datos
```
En mi caso en el archvio `.env` la configuracion de la conexión es la siguiente:
```dotenv
DATABASE_URL=mysql://root:root@127.0.0.1:3306/proveedor_app
```
4. **Crear la base de datos:**

```bash
php bin/console doctrine:database:create
```

5. **Crear las tablas:**

```bash
php bin/console doctrine:migrations:migrate
```

---

## Levantar el servidor de desarrollo

Con Symfony CLI:

```bash
symfony server:start
```

Luego abre en tu navegador:

```
http://localhost:8000
```

> La raíz `/` redirige automáticamente a `/proveedores/`.

---

## Estructura del proyecto

```
src/
├─ Controller/          # Controladores (ProveedorController, DefaultController)
├─ Entity/              # Entidades (Proveedor)
├─ Form/                # Formularios (ProveedorType)
templates/
├─ proveedor/           # Vistas Twig de proveedores
config/
├─ packages/            # Configuraciones Symfony
├─ routes.yaml          # Rutas principales
```

---

## Uso

1. Accede a `/proveedores/` para ver el listado.
2. Haz clic en **Nuevo proveedor** para crear uno.
3. Edita o elimina proveedores usando los botones correspondientes.
4. Los formularios validan datos y protegen contra CSRF.
5. Los campos `createdAt` y `updatedAt` se gestionan automáticamente.

---

## Comandos útiles de Symfony

* Limpiar cache:

```bash
php bin/console cache:clear
```

* Ver todas las rutas disponibles:

```bash
php bin/console debug:router
```

* Crear un nuevo controlador (si fuera necesario):

```bash
php bin/console make:controller NombreController
```

---

## Notas adicionales

* Los estilos están hechos con CSS puro, no se necesita Bootstrap.
* La redirección desde `/` a `/proveedores/` se gestiona mediante un `DefaultController` o desde `routes.yaml` usando `RedirectController`.
* La aplicación no ha sido desplegada con Docker, ya que el ordenador donde se desarrolló no cumple con los requisitos necesarios para ejecutarlo.
---

## Autor

* [Jesus Clemente]
* Email: [[jesus.clemente.espinosa@gmail.com](mailto:jesus.clemente.espinosa@gmail.com)]
