<?php

namespace RegisterPassword;

class Main
{
    public static function addFormField()
    {
        echo '<p>
    		<label for="user_password">'.__('Password').'<br>
    		<input required name="user_password" id="user_password" class="input" size="25" type="password"></label>
    	</p>';
    }

    public static function checkPassword(\WP_Error $errors)
    {
        if (empty($_POST['user_password'])) {
            $errors->add('empty_password', __('<strong>ERROR</strong>: The password field is empty.'));
        }

        return $errors;
    }

    public static function setPassword($userId)
    {
        if (isset($_POST['user_password']) && !empty($_POST['user_password'])) {
            wp_set_password($_POST['user_password'], $userId);
            update_user_option($userId, 'default_password_nag', false, true);
        }
    }
}
