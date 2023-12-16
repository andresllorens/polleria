<?php

namespace App\Http\Controllers\WebApp\Security;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\Http\Controllers\Controller;

class UsersManagerController extends Controller
{
    public function panel_admin_users(){
        $usuarios=User::paginate(100);
        return view("webapp.security.panel_admin_users")->with("usuarios",$usuarios);
    }
}