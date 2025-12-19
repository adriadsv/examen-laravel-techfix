# CASO 23 - Reparación de Computadoras

**Estudiante:** Adrian Sanchez  
**Fecha:** 19/12/2025  
**Cliente:** TechFix - Soporte Técnico  
**Usuario:** Pablo, técnico  

---

## Mis Decisiones de Diseño

### 1. Tabla principal

**Nombre de la tabla:** equipos  

### Campos:

| Campo              | Tipo        | ¿Obligatorio? |
|-------------------|------------|---------------|
| id                | bigint (PK)| Sí            |
| tipo_equipo       | varchar    | Sí            |
| marca_modelo      | varchar    | Sí            |
| problema_reportado| text       | Sí            |
| nombre_cliente    | varchar    | Sí            |
| telefono          | varchar    | Sí            |
| estado            | varchar    | Sí            |
| created_at        | timestamp  | Sí            |
| updated_at        | timestamp  | Sí            |

La fecha de ingreso del equipo se registra automáticamente mediante el campo `created_at`.

---

### 2. Estados del equipo

Los estados manejados en el sistema son:

- recibido  
- diagnosticando  
- reparando  
- listo  
- entregado  

Estos valores se seleccionan desde un **select** en el formulario para evitar errores de escritura.

---

### 3. ¿Se pueden eliminar registros?

**Respuesta:**  
Sí.

**Razón (1 línea):**  
Se permite la eliminación para cumplir con el CRUD completo, aunque se recomienda conservar los equipos entregados cambiando su estado para mantener un historial técnico.

---

## Descripción General del Sistema

El sistema TechFix permite registrar equipos que ingresan a soporte técnico, visualizar el listado de equipos, editar información en caso de error y gestionar el estado de cada reparación. La interfaz es responsiva y puede utilizarse desde dispositivos móviles.

---

## Base de Datos

Se utilizó **SQLite** para facilitar la ejecución del proyecto sin necesidad de configuración adicional de servidores externos.  
Las migraciones se gestionan mediante Laravel y pueden verificarse con el comando:

```bash
php artisan migrate:status
