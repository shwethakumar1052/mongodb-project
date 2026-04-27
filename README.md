# Placement Management System (MongoDB Edition)

A modern, high-performance Placement Management System built with **PHP** and **MongoDB**. This project has been fully migrated from a legacy SQL architecture to a modern NoSQL backend, providing better scalability and faster data handling.

## 🚀 Key Features

### 👤 Student Features
*   **Account Management**: Secure registration and login with security question-based password recovery.
*   **Profile Customization**: Students can update their academic details (percentage, course, etc.) to match company requirements.
*   **Smart Eligibility Engine**: Real-time checking of eligibility for IT and BPO companies based on academic performance.
*   **Application Tracking**: Students can view the status of all their applications (Applied, Selected, Rejected).
*   **Course Enrollment**: Join training and skill development courses directly from the portal.
*   **Social Feed**: Interactive dashboard with a community feed where students can view updates and "like" posts.

### 🛡️ Admin Features
*   **Central Dashboard**: Overview of all placements, training sessions, and student activity.
*   **Company Management**: Add, edit, and manage company profiles, including minimum percentage requirements and job categories (IT/BPO).
*   **Application Control**: View all student applications and manage the selection process.
*   **Training Management**: Create and update technical training courses and assign lecturers.
*   **Admin Creation**: Securely add new Placement Officers to the management team.
*   **Student Monitoring**: View student categories, suggestions, and course enrollments.

## 🛠️ Tech Stack
*   **Backend**: PHP 8.2 (ZTS x64)
*   **Database**: MongoDB (NoSQL)
*   **Frontend**: HTML5, Vanilla CSS, Bootstrap 4
*   **Dependencies**: MongoDB PHP Driver, Composer
*   **Design**: Modern Responsive UI with College Campus hero backgrounds.

## ⚙️ Setup & Installation

### 1. Requirements
*   XAMPP with PHP 8.2+
*   MongoDB Server (Community Edition)
*   MongoDB PHP Extension (`php_mongodb.dll`)

### 2. Database Setup
1.  Open **MongoDB Compass**.
2.  Create a new database named `mydatabase`.
3.  Import the provided `migration_data.json` into the corresponding collections (`adminlogin`, `studentlogin`, `companies`, `feed`, etc.).

### 3. PHP Configuration
1.  Add the `php_mongodb.dll` to your `C:\xampp\php\ext\` folder.
2.  Add `extension=mongodb` to your `php.ini` file.
3.  Restart your Apache server.

### 4. Running the Project
```bash
# Start the local PHP development server
php -S localhost:8000
```
Visit **http://localhost:8000** in your browser.

## 🔑 Test Credentials
*   **Admin**: `admin1` / `123`
*   **Student**: `naveen` / `12345`

---
Developed with ❤️ for Advanced Placement Management.
