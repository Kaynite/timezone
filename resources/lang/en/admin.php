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
        'categories'  => 'Categories',
        'admins'      => 'Admins',
        'users'       => 'Users',
        'users types' => 'Users Types',
        'countries'   => 'Countries',
        'cities'      => 'Cities',
        'states'      => 'States',
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

    'countries'  => [

        'index title'  => 'Countries',
        'create title' => 'Add new country',
        'edit title'   => 'Edit Country',

        'form'         => [
            'name_ar'                 => 'Country name in Arabic',
            'name_en'                 => 'Country name in English',
            'code'                    => 'Country Code (eg. USA, EG)',
            'mob'                     => 'Phone code',
            'logo'                    => 'Country\'s Flag',
            'name_ar placeholder'     => 'Enter Country name in Arabic',
            'name_en placeholder'     => 'Enter Country name in English',
            'code placeholder'        => 'Enter Country Code',
            'mob placeholder'         => 'Enter Phone code',

            'success add'             => 'Country was added successfully!',
            'success update'          => 'Country information was updated successfully!',
            'success delete'          => 'Country was deleted successfully!',
            'success multiple delete' => 'Selected Countries were deleted successfully!',
            'no selection'            => 'You didn\'t select any country!',
        ],

        'modal'        => [
            'delete'         => 'Delete',
            'close'          => 'Close',
            'body'           => 'Are you sure you want to delete selected countries ?',
            'body with name' => 'Are you sure you want to delete :name ?',
            'title'          => 'Delete country',
        ],

        'table'        => [
            'id'       => '#',
            'username' => 'Username',
            'email'    => 'Email Address',
            'action'   => 'Actions',
        ],
    ],

    'cities'     => [
        'index title'  => 'Cities',
        'create title' => 'Add new city',
        'edit title'   => 'Edit city',

        'form'         => [
            'name_ar'                 => 'City name in Arabic',
            'name_en'                 => 'City name in English',
            'country'                 => 'Country',

            'name_ar placeholder'     => 'Enter city name in Arabic',
            'name_en placeholder'     => 'Enter city name in English',
            'country placeholder'     => 'Select country',

            'success add'             => 'City was added successfully!',
            'success update'          => 'City information was updated successfully!',
            'success delete'          => 'City was deleted successfully!',
            'success multiple delete' => 'Selected cities were deleted successfully!',
            'no selection'            => 'You didn\'t select any city!',
        ],

        'modal'        => [
            'delete'         => 'Delete',
            'close'          => 'Close',
            'body'           => 'Are you sure you want to delete selected cities ?',
            'body with name' => 'Are you sure you want to delete :name ?',
            'title'          => 'Delete city',
        ],

        'table'        => [
            'id'       => '#',
            'username' => 'Username',
            'email'    => 'Email Address',
            'action'   => 'Actions',
        ],
    ],

    'states'     => [
        'index title'  => 'States',
        'create title' => 'Add new state',
        'edit title'   => 'Edit state',

        'form'         => [
            'name_ar'                 => 'State name in Arabic',
            'name_en'                 => 'State name in English',

            'name_ar placeholder'     => 'Enter state name in Arabic',
            'name_en placeholder'     => 'Enter state name in English',
            'country placeholder'     => 'Select country',

            'success add'             => 'State was added successfully!',
            'success update'          => 'State information was updated successfully!',
            'success delete'          => 'State was deleted successfully!',
            'success multiple delete' => 'Selected states were deleted successfully!',
            'no selection'            => 'You didn\'t select any state!',
        ],

        'modal'        => [
            'delete'         => 'Delete',
            'close'          => 'Close',
            'body'           => 'Are you sure you want to delete selected states ?',
            'body with name' => 'Are you sure you want to delete :name ?',
            'title'          => 'Delete state',
        ],

        'table'        => [
            'id'       => '#',
            'username' => 'Username',
            'email'    => 'Email Address',
            'action'   => 'Actions',
        ],
    ],

    'settings'   => [
        'title'          => 'Settings',
        'name_ar'        => 'Site name in Arabic',
        'name_en'        => 'Site name in English',
        'description_ar' => 'Site description in Arabic',
        'description_en' => 'Site description in English',
        'keywords'       => 'Site Keywords',
        'logo'           => 'Site logo',
        'icon'           => 'Site icon',
        'status'         => 'Site status',
        'open'           => 'Open',
        'closed'         => 'Closed for maintenance',
        'message'        => 'Maintenance message',
    ],

];
