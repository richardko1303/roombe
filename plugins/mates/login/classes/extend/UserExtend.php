<?php

namespace Mates\Login\Classes\Extend;

use RainLab\User\Models\User;

class UserExtend
{
    public static function UserExtend() {
        User::extend(function($model) {
            $model->hasMany['projects'] = ['Teamgrid\Project\Models\Project'];
        });
    }
}
