## 🛠️ Installation Guide

### 🔹 **Step 1: Clone the Repository**
```sh
git clone https://github.com/abdelazizib/gec-task
cd gec-task
```

### 🔹 **Step 2: Install Dependencies**
```sh
composer install
```

### 🔹 **Step 3: Environment Setup**
```sh
cp .env.example .env
php artisan key:generate
```
Update `.env` with database credentials.

### 🔹 **Step 4: Database Configuration**
```sh
php artisan migrate
```
### 🔹 **Step 5: Setup Storage**
```sh
php artisan storage:link
```
### 🔹 **Step 6: Run the Application**
```sh
php artisan serve --port=991
```
🔗 Open `http://127.0.0.1:991`
