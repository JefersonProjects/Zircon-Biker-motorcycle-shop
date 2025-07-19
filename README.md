# 🏍️ Zircon Biker - Tienda de Motocicletas y Accesorios

¡Bienvenido a Zircon Biker! Un espacio digital creado por y para apasionados de las dos ruedas. Este proyecto es una plataforma web completa que simula una tienda en línea, diseñada para ofrecer a los usuarios una experiencia inmersiva en el mundo del motociclismo, permitiéndoles explorar motocicletas de ensueño y adquirir los mejores accesorios del mercado.

El objetivo principal es ofrecer una interfaz intuitiva, rápida y funcional, donde cada clic te acerque más a tu próxima aventura.

---

## ✨ Funcionalidades Principales

La plataforma se divide en dos grandes áreas para satisfacer las distintas necesidades de nuestros clientes:

### **1. Catálogo de Motocicletas**
Nuestra joya de la corona. Los usuarios pueden explorar un amplio catálogo de motocicletas, filtradas por marcas y categorías (deportivas, urbanas, doble propósito, etc.).

* **Visualización Detallada:** Cada moto cuenta con su propia página con especificaciones técnicas, galería de imágenes y descripción.
* **Proceso de Adquisición Especial:** Entendemos que comprar una moto es una decisión importante. Por ello, en lugar de una compra directa, ofrecemos:
    * **Asesoría por WhatsApp:** Botones de contacto directo para que un asesor resuelva todas tus dudas.
    * **Planes de Financiamiento:** Formularios para solicitar información sobre opciones de financiamiento personalizadas.

### **2. Tienda de Accesorios**
Equípate para la ruta con todo lo que necesitas. Esta sección funciona como un e-commerce tradicional.

* **Catálogo de Productos:** Venta de cascos, guantes, chaquetas, y más.
* **Carrito de Compras:** Los usuarios pueden agregar múltiples accesorios a su carrito, ver el resumen de su pedido y modificar las cantidades.
* **Proceso de Compra Directo:** Simulación de un checkout para finalizar la compra de los accesorios.

---

## ⚙️ Tecnologías Utilizadas

Este proyecto fue construido utilizando un stack de tecnologías clásico y robusto, ideal para un desarrollo web sólido y escalable.

* **Frontend:**
    * **HTML5:** Para la estructura semántica y el contenido de la web.
    * **CSS3:** Para dar vida al diseño, con estilos modernos y layouts responsivos.
    * **JavaScript (Vanilla):** Para la interactividad, validaciones de formularios y la lógica del carrito de compras.

* **Backend:**
    * **PHP:** Como lenguaje principal del lado del servidor para procesar la lógica de negocio, gestionar la base de datos y renderizar el contenido dinámico.

* **Base de Datos:**
    * **MySQL:** Para almacenar toda la información de productos, categorías, marcas y usuarios.

* **Entorno de Desarrollo:**
    * **XAMPP:** Para simular un entorno de servidor local Apache y gestionar la base de datos con phpMyAdmin.

---

## 🚀 Instalación y Puesta en Marcha Local

Sigue estos pasos para ejecutar el proyecto en tu propia computadora:

1.  **Prerrequisitos:**
    * Tener **XAMPP** instalado en tu sistema (incluye Apache, PHP y MySQL).

2.  **Clona el Repositorio:**
    ```bash
    git clone https://github.com/JefersonProjects/Zircon-Biker-motorcycle-shop.git
    ```

3.  **Mueve el Proyecto a `htdocs`:**
    * Copia la carpeta completa del proyecto y pégala dentro de la carpeta `htdocs` que se encuentra en tu directorio de instalación de XAMPP (ej: `C:\xampp\htdocs`).

4.  **Inicia los Servicios de XAMPP:**
    * Abre el panel de control de XAMPP y activa los módulos de **Apache** y **MySQL**.

5.  **Configura la Base de Datos:**
    * Abre tu navegador y ve a `http://localhost/phpmyadmin/`.
    * Crea una nueva base de datos. Se recomienda usar un nombre como `zircon_biker_db`.
    * Selecciona la base de datos que acabas de crear y ve a la pestaña **"Importar"**.
    * Sube el archivo `.sql` que se encuentra en la carpeta del proyecto (ej: `database/schema.sql`) para crear todas las tablas y registros necesarios.
    * **Importante:** Asegúrate de que las credenciales de conexión a la base de datos en tus archivos PHP (ej: `config/db.php`) coincidan con tu configuración de MySQL (normalmente el usuario es `root` y la contraseña está vacía por defecto en XAMPP).

6.  **¡Listo para Rodar!**
    * Abre tu navegador y accede a `http://localhost/nombre_de_la_carpeta_del_proyecto/`.
    * ¡Ya deberías poder ver la página funcionando!
