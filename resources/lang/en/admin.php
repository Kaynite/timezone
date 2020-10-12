<?php

return [

    'nav'           => [
        'home'              => 'Home',
        'all notifications' => 'See All Notifications',
        'all messages'      => 'See All Messages',
        'search'            => 'Search',
        'profile'           => 'Profile',
        'logout'            => 'Logout',
    ],

    'sidebar'       => [
        'categories'        => 'Categories',
        'admins'            => 'Admins',
        'users'             => 'Users',
        'users types'       => 'Users Types',
        'countries'         => 'Countries',
        'cities'            => 'Cities',
        'states'            => 'States',
        'trademarks'        => 'Trademarks',
        'manufacturers'     => 'Manufacturers',
        'shipping'          => 'Shipping',
        'malls'             => 'Malls',
        'colors'            => 'Colors',
        'sizes'             => 'Sizes',
        'weight'            => 'Weight',
        'products'          => 'Products',
        'products_approved' => 'Approved',
        'products_pending'  => 'Pending',
        'products_rejected' => 'Rejected',
        'products_trash'    => 'Trash',
        'orders'            => 'Orders',
    ],

    'admins'        => [

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

    'users'         => [

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

    'userstypes'    => [

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

    'countries'     => [

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

    'cities'        => [
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

    'states'        => [
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

    'trademarks'    => [
        'index title'  => 'Trademarks',
        'create title' => 'Add new trademark',
        'edit title'   => 'Edit trademark',

        'form'         => [
            'name_ar'                 => 'Trademark name in Arabic',
            'name_en'                 => 'Trademark name in English',
            'image'                   => 'Trademark image',

            'name_ar placeholder'     => 'Enter trademark name in Arabic',
            'name_en placeholder'     => 'Enter trademark name in English',

            'success add'             => 'Trademark was added successfully!',
            'success update'          => 'Trademark information was updated successfully!',
            'success delete'          => 'Trademark was deleted successfully!',
            'success multiple delete' => 'Selected trademarks were deleted successfully!',
            'no selection'            => 'You didn\'t select any trademarks!',
        ],

        'modal'        => [
            'delete'         => 'Delete',
            'close'          => 'Close',
            'body'           => 'Are you sure you want to delete selected trademarks ?',
            'body with name' => 'Are you sure you want to delete :name ?',
            'title'          => 'Delete trademark',
        ],
    ],

    'categories'    => [
        'index title'  => 'Categories',
        'create title' => 'Add new category',
        'edit title'   => 'Edit category',
        'delete'       => 'Delete category',

        'form'         => [
            'name_ar'                    => 'Category name in Arabic',
            'name_en'                    => 'Category name in English',
            'description_ar'             => 'Category description in Arabic',
            'description_en'             => 'Category description in English',
            'keywords'                   => 'Keywords',
            'icon'                       => 'Category icon',
            'image'                      => 'Category image',
            'parent category'            => 'Parent Category',

            'name_ar placeholder'        => 'Enter category name in Arabic',
            'name_en placeholder'        => 'Enter category name in English',
            'description_ar placeholder' => 'Enter category description in Arabic',
            'description_en placeholder' => 'Enter category description in English',
            'keywords placeholder'       => 'Enter keywords (separate between them using comma(", "))',
            'icon placeholder'           => 'Enter category icon (Fontawesome icon like "fa fa-flag")',

            'success add'                => 'Category was added successfully!',
            'success update'             => 'Category information was updated successfully!',
            'success delete'             => 'Category was deleted successfully!',
            'success multiple delete'    => 'Selected categories were deleted successfully!',
            'same parent child'          => 'The category can\'t be his own parent!',
        ],

        'modal'        => [
            'delete' => 'Delete',
            'close'  => 'Close',
            'body'   => 'Are you sure you want to delete selected category ?',
            'title'  => 'Delete category',
        ],
    ],

    'manufacturers' => [
        'index title'  => 'Manufacturers',
        'create title' => 'Add new manufacturer',
        'edit title'   => 'Edit manufacturer',
        'delete'       => 'Delete manufacturer',

        'form'         => [
            'name_ar'                 => 'Manufacturer name in Arabic',
            'name_en'                 => 'Manufacturer name in English',
            'website'                 => 'Manufacturer website',
            'email'                   => 'Manufacturer email address',
            'phone'                   => 'Manufacturer phone number',
            'facebook'                => 'Manufacturer facebook',
            'twitter'                 => 'Manufacturer twitter',
            'lat'                     => 'Latitude',
            'lng'                     => 'Longitude',
            'logo'                    => 'Manufacturer logo',

            'name_ar placeholder'     => 'Enter manufacturer name in Arabic',
            'name_en placeholder'     => 'Enter manufacturer name in English',
            'website placeholder'     => 'Enter manufacturer website (https://www.example.com)',
            'email placeholder'       => 'Enter manufacturer email address (example@asdf.com)',
            'phone placeholder'       => 'Enter manufacturer phone number (01234567890)',
            'facebook placeholder'    => 'Enter manufacturer facebook (https://www.facebook.com/example)',
            'twitter placeholder'     => 'Enter manufacturer twitter (https://www.twitter.com/example)',
            'lat placeholder'         => 'Enter latitude',
            'lng placeholder'         => 'Enter longitude',

            'success add'             => 'Manufacturer was added successfully!',
            'success update'          => 'Manufacturer information was updated successfully!',
            'success delete'          => 'Manufacturer was deleted successfully!',
            'success multiple delete' => 'Selected manufacturers were deleted successfully!',
            'no selection'            => 'You didn\'t select any manufacturers!',
        ],

        'modal'        => [
            'delete'         => 'Delete',
            'close'          => 'Close',
            'body'           => 'Are you sure you want to delete selected manufacturer ?',
            'body with name' => 'Are you sure you want to delete :name ?',
            'title'          => 'Delete manufacturer',
        ],
    ],

    'shipping'      => [
        'index title'  => 'Shipping companies',
        'create title' => 'Add new shipping company',
        'edit title'   => 'Edit shipping company',
        'delete'       => 'Delete shipping company',

        'form'         => [
            'name_ar'                 => 'Shipping company name in Arabic',
            'name_en'                 => 'Shipping company name in English',
            'website'                 => 'Shipping company website',
            'email'                   => 'Shipping company email address',
            'phone'                   => 'Shipping company phone number',
            'facebook'                => 'Shipping company facebook',
            'twitter'                 => 'Shipping company twitter',
            'logo'                    => 'Shipping company logo',
            'user_id'                 => 'Company account',

            'name_ar placeholder'     => 'Enter shipping company name in Arabic',
            'name_en placeholder'     => 'Enter shipping company name in English',
            'website placeholder'     => 'Enter shipping company website (https://www.example.com)',
            'email placeholder'       => 'Enter shipping company email address (example@asdf.com)',
            'phone placeholder'       => 'Enter shipping company phone number (01234567890)',
            'facebook placeholder'    => 'Enter shipping company facebook (https://www.facebook.com/example)',
            'twitter placeholder'     => 'Enter shipping company twitter (https://www.twitter.com/example)',
            'lat placeholder'         => 'Enter latitude',
            'lng placeholder'         => 'Enter longitude',

            'success add'             => 'Shipping company was added successfully!',
            'success update'          => 'Shipping company information was updated successfully!',
            'success delete'          => 'Shipping company was deleted successfully!',
            'success multiple delete' => 'Selected shipping companies were deleted successfully!',
            'no selection'            => 'You didn\'t select any shipping companies!',
        ],

        'modal'        => [
            'delete'         => 'Delete',
            'close'          => 'Close',
            'body'           => 'Are you sure you want to delete selected company ?',
            'body with name' => 'Are you sure you want to delete :name ?',
            'title'          => 'Delete company',
        ],
    ],

    'malls'         => [
        'index title'  => 'Malls',
        'create title' => 'Add new mall',
        'edit title'   => 'Edit mall',
        'delete'       => 'Delete mall',

        'form'         => [
            'name_ar'                 => 'Mall name in Arabic',
            'name_en'                 => 'Mall name in English',
            'website'                 => 'Mall website',
            'email'                   => 'Mall email address',
            'phone'                   => 'Mall phone number',
            'facebook'                => 'Mall facebook',
            'twitter'                 => 'Mall twitter',
            'logo'                    => 'Mall logo',
            'country_id'              => 'Country',
            'address'                 => 'Address',

            'name_ar placeholder'     => 'Enter mall name in Arabic',
            'name_en placeholder'     => 'Enter mall name in English',
            'website placeholder'     => 'Enter mall website (https://www.example.com)',
            'email placeholder'       => 'Enter mall email address (example@asdf.com)',
            'phone placeholder'       => 'Enter mall phone number (01234567890)',
            'facebook placeholder'    => 'Enter mall facebook (https://www.facebook.com/example)',
            'twitter placeholder'     => 'Enter mall twitter (https://www.twitter.com/example)',

            'success add'             => 'Mall was added successfully!',
            'success update'          => 'Mall information was updated successfully!',
            'success delete'          => 'Mall was deleted successfully!',
            'success multiple delete' => 'Selected malls were deleted successfully!',
            'no selection'            => 'You didn\'t select any malls!',
        ],

        'modal'        => [
            'delete'         => 'Delete',
            'close'          => 'Close',
            'body'           => 'Are you sure you want to delete selected mall?',
            'body with name' => 'Are you sure you want to delete :name ?',
            'title'          => 'Delete mall',
        ],
    ],

    'colors'        => [
        'index title'  => 'Colors',
        'create title' => 'Add new color',
        'edit title'   => 'Edit color',
        'delete'       => 'Delete color',

        'form'         => [
            'name_ar'                 => 'Color name in Arabic',
            'name_en'                 => 'Color name in English',
            'color'                   => 'Color',

            'name_ar placeholder'     => 'Enter color name in Arabic',
            'name_en placeholder'     => 'Enter color name in English',

            'success add'             => 'Color was added successfully!',
            'success update'          => 'Color information was updated successfully!',
            'success delete'          => 'Color was deleted successfully!',
            'success multiple delete' => 'Selected colors were deleted successfully!',
            'no selection'            => 'You didn\'t select any colors!',
        ],

        'modal'        => [
            'delete'         => 'Delete',
            'close'          => 'Close',
            'body'           => 'Are you sure you want to delete selected color?',
            'body with name' => 'Are you sure you want to delete :name ?',
            'title'          => 'Delete color',
        ],
    ],

    'sizes'         => [
        'index title'  => 'Sizes',
        'create title' => 'Add new size',
        'edit title'   => 'Edit size',
        'delete'       => 'Delete size',

        'form'         => [
            'name_ar'                 => 'Size name in Arabic',
            'name_en'                 => 'Size name in English',
            'category_id'             => 'Category',
            'status'                  => 'Status',

            'name_ar placeholder'     => 'Enter size name in Arabic',
            'name_en placeholder'     => 'Enter size name in English',

            'success add'             => 'Size was added successfully!',
            'success update'          => 'Size information was updated successfully!',
            'success delete'          => 'Size was deleted successfully!',
            'success multiple delete' => 'Selected sizes were deleted successfully!',
            'no selection'            => 'You didn\'t select any sizes!',
        ],

        'modal'        => [
            'delete'         => 'Delete',
            'close'          => 'Close',
            'body'           => 'Are you sure you want to delete selected size?',
            'body with name' => 'Are you sure you want to delete :name ?',
            'title'          => 'Delete size',
        ],
    ],

    'weight'        => [
        'index title'  => 'Weight',
        'create title' => 'Add new weight unit',
        'edit title'   => 'Edit weight unit',
        'delete'       => 'Delete weight unit',

        'form'         => [
            'unit_ar'                 => 'Weight unit in Arabic',
            'unit_en'                 => 'Weight unit in English',

            'unit_ar placeholder'     => 'Enter weight unit in Arabic',
            'unit_en placeholder'     => 'Enter weight unit in English',

            'success add'             => 'Weight unit was added successfully!',
            'success update'          => 'Weight unit information was updated successfully!',
            'success delete'          => 'Weight unit was deleted successfully!',
            'success multiple delete' => 'Selected weight units were deleted successfully!',
            'no selection'            => 'You didn\'t select any weight units!',
        ],

        'modal'        => [
            'delete'         => 'Delete',
            'close'          => 'Close',
            'body'           => 'Are you sure you want to delete selected weight units?',
            'body with name' => 'Are you sure you want to delete :name ?',
            'title'          => 'Delete color',
        ],
    ],

    'products'      => [
        'index title'  => 'Products',
        'create title' => 'Add new product',
        'edit title'   => 'Edit product',
        'delete'       => 'Delete product',

        'form'         => [
            'title_ar'                => 'Product in Arabic',
            'title_en'                => 'Product in English',

            'title_ar placeholder'    => 'Enter product in Arabic',
            'title_en placeholder'    => 'Enter product in English',

            'success add'             => 'Product was added successfully!',
            'success update'          => 'Product information was updated successfully!',
            'success delete'          => 'Product was deleted successfully!',
            'success multiple delete' => 'Selected products were deleted successfully!',
            'no selection'            => 'You didn\'t select any products!',
        ],

        'modal'        => [
            'delete'         => 'Delete',
            'close'          => 'Close',
            'body'           => 'Are you sure you want to delete selected weight units?',
            'body with name' => 'Are you sure you want to delete :name ?',
            'title'          => 'Delete color',
        ],
    ],

    'orders'        => [
        'index title' => 'Orders',
        'show title'  => 'Order #:id',
        'edit title'  => 'Edit order',
        'delete'      => 'Delete order',

        'form'        => [
            'first_name'              => 'First name',
            'last_name'               => 'Last name',
            'payment_method'          => 'Payment method',
            'total'                   => 'Total cost',
            'date'                    => 'Date',
            'address_1'               => 'Address 1',
            'address_2'               => 'Address 2',
            'subtotal'                => 'Subtotal',
            'discount'                => 'Discount',
            'discount_code'           => 'Discount code',
            'tax'                     => 'Tax',
            'state'                   => 'State',
            'status'                  => 'Status',

            'success add'             => 'Weight unit was added successfully!',
            'success update'          => 'Order information was updated successfully!',
            'success delete'          => 'Order was deleted successfully!',
            'success multiple delete' => 'Selected Orders were deleted successfully!',
            'no selection'            => 'You didn\'t select any Orders!',
        ],

        'modal'       => [
            'delete'         => 'Delete',
            'close'          => 'Close',
            'body'           => 'Are you sure you want to delete selected weight units?',
            'body with name' => 'Are you sure you want to delete :name ?',
            'title'          => 'Delete color',
        ],
    ],

    'settings'      => [
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
