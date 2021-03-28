<?php


use App\Models\User;
use App\Models\Profile;

    const LOGIN_USER = 1;

    function auth_user_info() {
       
    }

    function active_user_profile($id)
    {
        return Profile::where('user_id', $id)->firstOrFail();
    }











?>