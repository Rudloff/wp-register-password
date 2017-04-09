<?php
/*
Plugin Name: Register Password
Plugin URI: https://github.com/Rudloff/wp-register-password
Description: Let users choose their password when they register
Author: Pierre Rudloff
Version: 0.1.1
Author URI: https://www.rudloff.pro/
 */

require_once __DIR__.'/vendor/autoload.php';

add_action('register_form', ['RegisterPassword\Main', 'addFormField']);
add_action('registration_errors', ['RegisterPassword\Main', 'checkPassword']);
add_action('user_register', ['RegisterPassword\Main', 'setPassword']);
