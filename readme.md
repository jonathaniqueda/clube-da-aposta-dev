<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Project

This is a fully responsive admin panel made with VueJS and Laravel.

## Guide

1. Clone the project.
2. Run composer install.
3. Create a file called envapp.php on base path and set:

```
<?php  putenv('environment=local'); ?>
```

4. Run npm install
5. Create a virtual host or use laravel homestead.
6. For front-end things:

 > npm run dev will open your default browser and run project in develop mode. You will be able to make your changes
 > npm run build will package your source code into /dist directory for production deployment.

7. Look for the env variables on env files inside "envvars/" and create the databases for current env.

8. Finish!
