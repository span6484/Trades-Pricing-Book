<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function index(){
    //    return $this->pageHeading();
    //     return $this->sidebarItems();
    // }

    public function pageHeading()
    {
        $pageHeading = 'Users';

        $sidebarItems = [
            'Add User',
            'Edit User',
            'Delete User',
            'Delete User',
            'Delete User',
            'Delete User',
            'Delete User',
            'Delete User',
            'Delete User',
            'Delete User',
            'Delete User',
            'Delete User',
            'Fuck a suers'
        ];

        return view('users', compact('pageHeading', 'sidebarItems'));
    }

    public function sidebarItems()
    {
        $sidebarItems = [
            'Add User',
            'Edit User',
            'Delete User',
            'Fuck a suers'
        ];

        return view('users', compact('sidebarItems'));
    }

}
