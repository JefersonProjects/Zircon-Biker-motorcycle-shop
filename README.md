# 🏍️ Zircon Biker - Motorcycle and Accessories Shop

Welcome to Zircon Biker! A digital space created by and for two-wheel enthusiasts. This project is a complete web platform that simulates an online store, designed to offer users an immersive experience in the world of motorcycling, allowing them to explore dream motorcycles and purchase the best accessories on the market.

The main goal is to provide an intuitive, fast, and functional interface, where every click brings you closer to your next adventure.

---

## ✨ Core Features

The platform is divided into two main areas to meet the different needs of our customers:

### **1. Motorcycle Catalog**
Our crown jewel. Users can browse an extensive catalog of motorcycles, filtered by brands and categories (sport, urban, dual-sport, etc.).

* **Detailed View:** Each motorcycle has its own page with technical specifications, an image gallery, and a description.
* **Special Acquisition Process:** We understand that buying a motorcycle is a significant decision. Therefore, instead of a direct purchase, we offer:
    * **WhatsApp Assistance:** Direct contact buttons for an advisor to answer all your questions.
    * **Financing Plans:** Forms to request information about personalized financing options.

### **2. Accessories Shop**
Gear up for the road with everything you need. This section functions as a traditional e-commerce store.

* **Product Catalog:** Sale of helmets, gloves, jackets, and more.
* **Shopping Cart:** Users can add multiple accessories to their cart, view their order summary, and modify quantities.
* **Direct Purchase Process:** A simulated checkout process to finalize the purchase of accessories.

---

## ⚙️ Technologies Used

This project was built using a classic and robust technology stack, ideal for solid and scalable web development.

* **Frontend:**
    * **HTML5:** For the semantic structure and content of the website.
    * **CSS3:** To bring the design to life with modern styles and responsive layouts.
    * **JavaScript (Vanilla):** For interactivity, form validations, and shopping cart logic.

* **Backend:**
    * **PHP:** As the primary server-side language to handle business logic, manage the database, and render dynamic content.

* **Database:**
    * **MySQL:** To store all information about products, categories, brands, and users.

* **Development Environment:**
    * **XAMPP:** To simulate a local Apache server environment and manage the database with phpMyAdmin.

---

## 🚀 Local Installation and Setup

Follow these steps to run the project on your own computer:

1.  **Prerequisites:**
    * Have **XAMPP** installed on your system (it includes Apache, PHP, and MySQL).

2.  **Clone the Repository:**
    ```bash
    git clone https://github.com/JefersonProjects/Zircon-Biker-motorcycle-shop.git
    ```

3.  **Move the Project to `htdocs`:**
    * Copy the entire project folder and paste it inside the `htdocs` folder located in your XAMPP installation directory (e.g., `C:\xampp\htdocs`).

4.  **Start XAMPP Services:**
    * Open the XAMPP Control Panel and start the **Apache** and **MySQL** modules.

5.  **Set Up the Database:**
    * Open your browser and go to `http://localhost/phpmyadmin/`.
    * Create a new database. It is recommended to use a name like `zircon_biker_db`.
    * Select the database you just created and go to the **"Import"** tab.
    * Upload the `.sql` file found in the project folder (e.g., `database/schema.sql`) to create all the necessary tables and records.
    * **Important:** Make sure the database connection credentials in your PHP files (e.g., `config/db.php`) match your MySQL setup (by default, the user is `root` and the password is empty in XAMPP).

6.  **Ready to Ride!**
    * Open your browser and navigate to `http://localhost/your_project_folder_name/`.
    * You should now be able to see the website up and running!
