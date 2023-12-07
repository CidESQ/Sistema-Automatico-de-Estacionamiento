# Sistema-Automatico-de-Estacionamiento

Este repositorio contiene el código fuente y los recursos asociados a un Sistema de Automatización de Estacionamiento desarrollado utilizando una Raspberry Pi como plataforma principal. El sistema proporciona una solución completa para la gestión automatizada de un estacionamiento, incluyendo la entrada y salida de vehículos, la detección de ocupación mediante sensores, la administración de tarifas, la generación de reportes y un control de acceso basado en tarjetas RFID.

## Características Principales:

- **Modo Administrador:**

  - Control total sobre la configuración del sistema.
  - Gestión de tarifas.
  - Consulta de coches activos.
  - Generación de reportes detallados.
  - Administración de usuarios y coches.
  - Eliminación de usuarios de acceso.

- **Modo Personal:**

  - Acceso limitado para realizar consultas, cobros y generar reportes.
  - Interfaz simplificada para un uso eficiente.

- **Integración de Sensores:**

  - Uso de sensores para la detección de la ocupación de los cajones de estacionamiento.
  - Indicadores visuales (luces rojas y verdes) para mostrar el estado de disponibilidad.

- **Lector de Tarjetas RFID:**

  - Permitiendo la entrada y salida de vehículos mediante tarjetas electrónicas.

- **Generación de Reportes:**
  - Reportes en formato PDF con detalles sobre coches registrados, usuarios y ganancias.
  - Reportes diarios, mensuales y personalizados según el rango de fechas.

## Estructura del Repositorio:

- **`src/`:** Contiene el código fuente de la aplicación web y los módulos de control.
- **`database/`:** Scripts y archivos relacionados con la configuración de la base de datos.
- **`docs/`:** Documentación del proyecto, incluyendo el diseño del sistema y manuales.
- **`hardware/`:** Información sobre la configuración del hardware y conexiones.

## Instrucciones de Configuración:

Para configurar el sistema en una Raspberry Pi, siga las instrucciones proporcionadas en la carpeta `docs/` para la instalación del software, configuración de hardware y otros detalles importantes.

---

_Contribuidores: - Jocelyn Cuevas Velazquez - Diego Liberato Jury - Cid Emmanuel Esquivel González ._
