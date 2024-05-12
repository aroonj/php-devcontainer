# หลักการ

ตัวอย่างวิธีการพัฒนา Application ด้วย PHP โดยใช้ `vscode` `dev containers extension`

## ตั้งค่า dev-container

ในตัวอย่างนี้ใช้ `php & mariadb` container ซึ่งมี file config ใน `.devcontainer` directory ประกอบด้วย:

1. devcontainer.json
1. docker-compose.yml
1. Dockerfile
1. php-mariadb.code-workspace

หากแก้ไข file ใดแล้ว ให้ทำการ build image ใหม่ ด้วย `Devcontainers: Build Container` ใน vscode command pallete

### การ run php cli

1. start XDebuger
1. run หรือ  debug php file บน vscode หรือ shell (Linux) ใน container

### การ run php ใน apache

project `phpprj` ใช้เป็นตัวอย่างทดสอบ โดยทำ soft link ทุกครั้งที่ `container start` ไปที่ `/var/www/html/phpprj`

1. start apache `apache2ctl start`
1. ทดสอบ URL `http://localhost/phpprj/`

`การ run php -S localhost:8080 ยังทดสอบไม่ได้`

## การใช้ PHPUnit

project `phpunit1` เป็นตัวอย่างแรกการตั้งค่า PHPUnit 

### มีปัญหา

`composer init` ใช้งานไม่ได้ มี error ในขี้นตอนสุดท้าย โดยตรวจสอบ composer.json file ที่สร้างไม่ผ่าน ก็เลยไม่สร้างทุก file

แก้ไขโดย `composer require --dev phpunit/phpunit` แล้วแก้ไขเพิ่มเติม

### โครงสร้าง files

The typical file structure for a PHP project using Composer includes the following directories and files:

1. assets/: Uncompiled/raw CSS, LESS, Sass, 1. JavaScript, images.
1. bin/: Command line scripts.
1. config/: Application configuration.
1. node_modules/: Node.js modules for managing front end.
1. public/: Publicly accessible files, including the main entry point (e.g., index.php).
1. src/: PHP source code files, often organized by type (e.g., Controller/, Model/, etc.).
1. templates/: Template files.
1. tests/: Unit and functional tests.
1. translations/: Translation files (e.g., en_US.yaml).
1. var/: Temporary application files, such as cache/ and log/.
1. vendor/: 3rd party packages and components installed by Composer.
1. composer.json: Composer dependencies file.
1. phpunit.xml.dist: PHPUnit configuration file.

This structure is designed to be logical and understandable, with a separation of concerns to keep your project organized. The public/ directory is the only one that should be publicly accessible via a web server for security reasons. It typically contains a single front controller (like index.php) and static front-end files (CSS, JavaScript, images).

### การตั้งค่า

แก้ไขเพิ่มเติม `composer.json` เพื่อจัดการ php auto include path search

``` json
"autoload": {
    "psr-4": {
        "YourNamespace\\": "src/"
    }
}
```

เมื่อแก้ไขแล้วให้ run command

``` shell
composer dump-autoload 
```

### run test

``` shell
 ./vendor/bin/phpunit tests
```

หรือในการณีที่มี `phpunit.xml`

``` shell
 ./vendor/bin/phpunit tests
```