# Simple Web Structure (based on PHP)

This project contains the basic structure of a web application based on PHP,
with authentication and installation of a database. It is mainly intended for internal projects,
with the aim of having a website in the shortest possible time.

## Table of Contents

1. [Features](#features)
2. [Requirements](#requirements)
3. [Installation](#installation)
4. [FAQs](#faqs)


## Features
* Authentication by form
* Included Bootstrap & FontAwesome (responsive)
* Database initializer

## Requirements
* Webserver (Apache, Nginx...)
* PHP (>7.1 recommended)
    * php_mysql module (if case of using DB)
* Mysql (if case of using DB)

## Installation
1. Download repository in your web directory:
    ```
    git clone git@github.com:davidmoremad/basic-web-structure-php.git
    ```
2. Go to http://localhost/ (You will be redirected to install.php file to install DB)


## FAQ's

### How to use without Database
1. Edit the following line in **/conf/config.ini** file:
    ```
    db_reqd = false
    ```

2. For security reasons, remove **/install.php** & **/includes/mysql_init.php** files and the following lines in /conf/config.ini file:
    ```
    db_name = example
    db_user = root
    db_pass = 1234
    ```
### How to use without Authentication
1. Just edit the /includes/loader.php file removing this code-block:
    ```
    # Check logged user
    if (!isLoggedIn() && !preg_match('/login(.php)?/', currentPage())) {
      redirectTo(ROOT_DIR.'login.php');
    }
    ```
