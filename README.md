# Laravel Development

## Table of Contents

1. [Installation Steps](#seedersInstallation-Steps)
2. [Creating a New Laravel Project](#Creating-a-New-Laravel-Project)

---


## Installation Steps

### 1. Update System Packages

```bash
sudo apt update
```

### 2. Install Apache2 Web Server

```bash
sudo apt install apache2
```

### 3. Install PHP and Required Extensions

```bash
sudo apt install php libapache2-mod-php php-cli php-mbstring php-xml php-bcmath php-json php-zip
```


### 4. Install Composer
Download and install Composer:

```bash
sudo apt install curl unzip
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

### 5. Install Laravel Installer
Navigate to the web directory and install Laravel globally:

```bash
cd /var/www
composer global require laravel/installer
```

### 6. Configure Environment Path
Add Composer's global bin directory to your PATH:

```bash
nano ~/.bashrc
```

Add the following line at the end of the file:

```bash
export PATH="$HOME/.config/composer/vendor/bin:$PATH"
```

Save and exit, then reload the configuration:

```bash
source ~/.bashrc
```

### 7. Verify Installtion
Check if Composer and Laravel are properly installed:

```bash
composer --version
laravel --version
```




## Creating a New Laravel Project

### 1. Create Project

```bash
laravel new example-project
```

### Project Setup

This project was initialized with the following configuration:

-   **Starter Kit**: None
-   **Testing Framework**: Pest
-   **Database**: MySQL
-   **Default Database Migration**: Applied
-   **npm Install**: Executed

### 2. Navigate to Project Directory

```bash
cd example-project
```

### 3. Run Development Server

For quick testing, use the built-in PHP server:

```bash
php artisan serve
```
