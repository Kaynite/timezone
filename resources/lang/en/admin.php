<?php

return [

    'nav'        => [
        'home'              => 'Home',
        'all notifications' => 'See All Notifications',
        'all messages'      => 'See All Messages',
        'search'            => 'Search',
        'profile'           => 'Profile',
        'logout'            => 'Logout',
    ],

    'sidebar'    => [
        'admins'      => 'Admins',
        'users'       => 'Users',
        'users types' => 'Users Types',
    ],

    'admins'     => [

        'index'  => [
            'title' => 'Admins',
        ],

        'create' => [
            'title' => 'Add New Admin',
        ],

        'edit'   => [
            'title' => 'Edit Admin Information',
        ],

        'form'   => [
            'username placeholder'    => 'Enter Username',
            'password placeholder'    => 'Enter Password',
            'email placeholder'       => 'Enter Email Address',
            'success add'             => 'Admin was added successfully!',
            'success update'          => 'Admin information was updated successfully!',
            'success delete'          => 'Admin was deleted successfully!',
            'success multiple delete' => 'Selected Admins were deleted successfully!',
            'no selection'            => 'You didn\'t select any admins!',
            'admin no delete'         => 'You can\'t delete yourself as an admin!',

        ],

        'modal'  => [
            'delete'         => 'Delete',
            'close'          => 'Close',
            'body'           => 'Are you sure you want to delete selected admin(s) ?',
            'body with name' => 'Are you sure you want to delete :username ?',
            'title'          => 'Delete admin',
        ],

        'table'  => [
            'id'       => '#',
            'username' => 'Username',
            'email'    => 'Email Address',
            'action'   => 'Actions',
        ],
    ],

    'users'      => [

        'index title'  => 'Users',
        'create title' => 'Add New User',
        'edit title'   => 'Edit User',

        'form'         => [
            'username placeholder'    => 'Enter Username',
            'password placeholder'    => 'Enter Password',
            'email placeholder'       => 'Enter Email Address',
            'select placeholder'      => 'Select user type',
            'success add'             => 'User was added successfully!',
            'success update'          => 'User information was updated successfully!',
            'success delete'          => 'User was deleted successfully!',
            'success multiple delete' => 'Selected Users were deleted successfully!',
            'no selection'            => 'You didn\'t select any users!',
            'user type'               => 'User Type',
        ],

        'modal'        => [
            'body'           => 'Are you sure you want to delete selected user(s) ?',
            'body with name' => 'Are you sure you want to delete :username ?',
            'title'          => 'Delete user',
        ],

        'table'        => [
            'id'     => '#',
            'action' => 'Actions',
            'type'   => 'User Type',
        ],
    ],

    'userstypes' => [

        'index title'  => 'Users Types',
        'create title' => 'Add New Users Type',
        'edit title'   => 'Edit Users Type',

        'form'         => [
            'name_en'                 => 'Name in English',
            'name_en placeholder'     => 'Enter Name in English',
            'name_ar'                 => 'Name in Arabic',
            'name_ar placeholder'     => 'Enter Name in Arabic',
            'success add'             => 'Users type was added successfully!',
            'success update'          => 'Users type was updated successfully!',
            'success delete'          => 'Users type was deleted successfully!',
            'success multiple delete' => 'Selected Users Type were deleted successfully!',
            'no selection'            => 'You didn\'t select any users!',
        ],

        'modal'        => [
            'body'           => 'Are you sure you want to delete users type ?',
            'body with name' => 'Are you sure you want to delete users type :type ?',
            'body note'      => 'Deleting this users type will delete all its users',
            'title'          => 'Delete users type',
        ],

        'table'        => [
            'id'     => '#',
            'action' => 'Actions',
            'type'   => 'User Type',
        ],
    ],

    'settings'   => [
        'title'       => 'Settings',
        'name_ar'     => 'Site name in Arabic',
        'name_en'     => 'Site name in English',
        'description' => 'Site Description',
        'keywords'    => 'Site Keywords',
        'logo'        => 'Site logo',
        'icon'        => 'Site icon',
        'status'      => 'Site status',
        'open'        => 'Open',
        'closed'      => 'Closed for maintenance',
        'message'     => 'Maintenance message',
    ],

];
