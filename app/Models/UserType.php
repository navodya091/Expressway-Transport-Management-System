<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    const USER_TYPE_OWNER = 1;
    const USER_TYPE_IT_ADMIN = 2;
    const USER_TYPE_MANAGER = 3;
    const USER_TYPE_DRIVER = 4;
    const USER_TYPE_DATA_ENTRY_USER = 5;
}
