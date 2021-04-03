<?php
use App\Models\User;
use App\Models\Theme;
use App\Models\Profile;

    const LOGIN_USER = 1;

    function active_user_profile($id)
    {
        return Profile::where('user_id', $id)->firstOrFail();
    }

    function ThemeName() {
        return Theme::first()->theme_name;
    }

    function ThemeFavicon() {
        return Theme::first()->favicon;
    }

    function ThemeLogo() {
        return Theme::first()->logo;
    }

    function notification_image($id) {
        $noti_user_profile = User::where('id', $id)->firstOrFail()->profile;
        if($noti_user_profile->image == null) {
            return Avatar::create($noti_user_profile->full_name);
        } else {
            return asset($noti_user_profile->image);
        }
    }


?>