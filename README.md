# 📦 SIMGUD – Sistem Informasi Gudang

A web-based warehouse management system designed to manage inventory, track stock movement, and generate reports efficiently.

---

## ✨ Key Features

- 📥 **Goods In (Barang Masuk)**
  Record incoming items from suppliers with detailed information.

- 📤 **Goods Out (Barang Keluar)**
  Manage outgoing items and track distribution.

- 📦 **Inventory Management**
  Monitor stock levels in real-time and avoid stock shortages.

- 🔍 **Search & Filter Items**
  Quickly find items using advanced filtering.

- 📊 **Stock Reports**
  Generate daily, monthly, and yearly inventory reports.

- 🔐 **Authentication System**
  Secure login and access control for users.

---

## 🧠 Technical Highlights

- RESTful architecture for inventory management
- MVC pattern implementation using Laravel
- Efficient database handling with Eloquent ORM
- Real-time updates using AJAX
- Structured stock calculation logic (in/out tracking)

---

## 🛠️ Tech Stack

- **Backend:** Laravel  
- **Database:** MySQL  
- **Frontend:** Bootstrap / Tailwind  
- **JavaScript:** AJAX  

---

## 📸 Screenshots

🔗 https://ighfarhost.com/project-pos.html  

---

## 🎯 Project Purpose

This system is built to help businesses:

- Manage warehouse inventory efficiently  
- Track stock movement in real-time  
- Reduce human errors in stock calculation  
- Improve operational efficiency  

---

## 🔄 System Flow

1. User login to the system  
2. Input incoming or outgoing goods  
3. Data stored in database  
4. System updates stock automatically  
5. Reports generated dynamically  

---

## ⚙️ Installation Guide

```bash
git clone https://github.com/ighfar-collab/simkeu.git
cd simkeu
composer install
cp .env.example .env
php artisan key:generate
```

### 🗄️ Database Setup

```bash
php artisan migrate
php artisan db:seed
```

### ▶️ Run Application

```bash
php artisan serve
```

---

## 🔐 Demo

🔗 https://simkeu.ighfarhost.com  

### Demo Account

- **Admin**
  - Email: admin@mail.com  
  - Password: password123  

---

## 🚀 Future Development

- 📄 Export reports (PDF / Excel)  
- 📊 Dashboard with analytics & charts  
- 🔔 Low stock notification  
- 🔐 Role & permission management  
- 📦 Multi-warehouse support  

---

## 👨‍💻 Author

**Ighfar Ilaina**  
Backend Developer (Laravel)

🔗 https://github.com/ighfar-collab  

---

## 💡 Project Value

This project demonstrates:

- Real-world warehouse management system  
- Inventory tracking & stock control logic  
- Clean and scalable Laravel architecture  
- Practical solution for business operations  
