<?php

namespace RegisterPassword;

class Main
{
    static public function addFormField()
    {
        echo '<p>
    		<label for="user_password">'.__('Password').'<br>
    		<input required name="user_password" id="user_password" class="input" size="25" type="password"></label>
    	</p>';
    }

    static public function checkPassword(\WP_Error $errors)
    {
        if (empty($_POST['user_password'])) {
            $errors->add('empty_password', __('<strong>ERROR</strong>: The password field is empty.'));
        }

        return $errors;
    }

    static public function setPassword($userId)
    {
        if (isset($_POST['user_password']) && !empty($_POST['user_password'])) {
            wp_set_password($_POST['user_password'], $userId);
            update_user_option($userId, 'default_password_nag', false, true);
        }
    }
}
