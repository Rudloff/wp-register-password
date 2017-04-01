<?php
/*
Plugin Name: Register Password
Plugin URI: https://github.com/Rudloff/wp-register-password
Description: Let users choose their password when they register
Author: Pierre Rudloff
Version: 0.1.0
Author URI: https://www.rudloff.pro/
 */

require_once __DIR__.'/vendor/autoload.php';

use RegisterPassword\Main;

add_action('register_form', [Main::class, 'addFormField']);
add_action('registration_errors', [Main::class, 'checkPassword']);
add_action('user_register', [Main::class, 'setPassword']);
