<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Navigation Menu
    |--------------------------------------------------------------------------
    |
    | This array is for Navigation menus of the backend.  Just add/edit or
    | remove the elements from this array which will automatically change the
    | navigation.
    |
    */

    // SIDEBAR LAYOUT - MENU

    'sidebar' => [
        [
            'title' => 'Dashboard',
            'link' => '/admin/dashboard/basic',
            'active' => 'admin/dashboard/basic',
            'icon' => 'icon-fa icon-fa-dashboard',
        ],
        [
            'title' => 'Loại điện',
            'link' => '/admin/loaidien',
            'active' => 'admin/loaidien',
            'icon' => 'icon-fa icon-fa-th-large'
        ],
        [
            'title' => 'Giá điện',
            'link' => '/admin/giadien',
            'active' => 'admin/giadien',
            'icon' => 'icon-fa icon-fa-money'
        ],
        [
            'title' => 'Điện kế',
            'link' => '/admin/dienke',
            'active' => 'admin/dienke',
            'icon' => 'icon-fa icon-fa-superpowers'
        ],
        [
            'title' => 'Người dùng',
            'link' => '#',
            'active' => 'admin/users*',
            'icon' => 'icon-fa icon-fa-user',
            'children' => [
                [
                    'title' => 'Danh sách người quản lý',
                    'link' => '/admin/users/admin',
                    'active' => '/admin/users/admin',
                ],
                [
                    'title' => 'Danh sách khách hàng',
                    'link' => '/admin/users/khach_hang',
                    'active' => '/admin/users/khach_hang',
                ],
                [
                    'title' => 'Danh sách nhân viên',
                    'link' => '/admin/users/nhan_vien',
                    'active' => '/admin/users/nhan_vien',
                ],
            ]
        ],
    ],

    // HORIZONTAL MENU LAYOUT -  MENU

    'horizontal' => [
        [
            'title' => 'Dashboard',
            'link' => '#',
            'active' => 'admin/dashboard*',
            'icon' => 'icon-fa icon-fa-dashboard',
            'children' => [
                [
                    'title' => 'Basic',
                    'link' => '/admin/dashboard/basic',
                    'active' => 'admin/dashboard/basic',
                ],
                [
                    'title' => 'Ecommerce',
                    'link' => '/admin/dashboard/ecommerce',
                    'active' => 'admin/dashboard/ecommerce',
                ],
                [
                    'title' => 'Finance',
                    'link' => '/admin/dashboard/finance',
                    'active' => 'admin/dashboard/finance',
                ]
            ]
        ],
        [
            'title' => 'Layouts',
            'link' => '#',
            'active' => 'admin/layouts*',
            'icon' => 'icon-fa icon-fa-th-large',
            'children' => [
                [
                    'title' => 'Sidebar',
                    'link' => '/admin/layouts/sidebar',
                    'active' => 'admin/layouts/sidebar',
                ],
                [
                    'title' => 'Icon Sidebar',
                    'link' => '/admin/layouts/icon-sidebar',
                    'active' => 'admin/layouts/icon-sidebar',
                ],
                [
                    'title' => 'Horizontal Menu',
                    'link' => '/admin/layouts/horizontal-menu',
                    'active' => 'admin/layouts/horizontal-menu',
                ],
            ]
        ],
        [
            'title' => 'Basic UI',
            'link' => '#',
            'active' => 'admin/basic-ui*',
            'icon' => 'icon-fa icon-fa-star',
            'children' => [
                [
                    'title' => 'Buttons',
                    'link' => '/admin/basic-ui/buttons',
                    'active' => 'admin/basic-ui/buttons',
                ],
                [
                    'title' => 'Cards',
                    'link' => '/admin/basic-ui/cards',
                    'active' => 'admin/basic-ui/cards',
                ],
                [
                    'title' => 'Tabs & Accordians',
                    'link' => '/admin/basic-ui/tabs',
                    'active' => 'admin/basic-ui/tabs',
                ],
                [
                    'title' => 'Typography',
                    'link' => '/admin/basic-ui/typography',
                    'active' => 'admin/basic-ui/typography',
                ],
                [
                    'title' => 'Tables',
                    'link' => '/admin/basic-ui/tables',
                    'active' => 'admin/basic-ui/tables',
                ]
            ]
        ],
        [
            'title' => 'Components',
            'link' => '#',
            'active' => 'admin/components*',
            'icon' => 'icon-fa icon-fa-puzzle-piece',
            'children' => [
                [
                    'title' => 'Datatables',
                    'link' => '/admin/components/datatables',
                    'active' => 'admin/components/datatables',
                ],
                [
                    'title' => 'Notifications',
                    'link' => '/admin/components/notifications',
                    'active' => 'admin/components/notifications',
                ],
                [
                    'title'=>' Nestable List',
                    'link'=>'/admin/components/nestable-list',
                    'active'=>'admin/components/nestable-list',
                ],
                [
                    'title'=>'Nestable Tree',
                    'link'=>'/admin/components/nestable-tree',
                    'active'=>'admin/components/nestable-tree',
                ],
                [
                    'title' => 'Image Cropper',
                    'link' => '/admin/components/image-cropper',
                    'active' => 'admin/components/image-cropper',
                ],
                [
                    'title' => 'Image Zoom',
                    'link' => '/admin/components/zoom',
                    'active' => 'admin/components/zoom',
                ],
                [
                    'title' => 'Calendar',
                    'link' => '/admin/components/calendar',
                    'active' => 'admin/components/calendar',
                ],
                [
                    'title' => 'Rating',
                    'link' => '#',
                    'active' => 'admin/components/ratings*',
                    'icon' => 'icon-fa icon-fa-star',
                    'children' => [
                        [
                            'title' => 'Star Ratings',
                            'link' => '/admin/components/ratings/star',
                            'active' => 'admin/components/ratings/star',
                        ],
                        [
                            'title' => 'Bar Ratings',
                            'link' => '/admin/components/ratings/bar',
                            'active' => 'admin/components/ratings/bar',
                        ],
                    ],
                ],
            ]
        ],
        [
            'title' => 'Todo App',
            'link' => '/admin/todos',
            'active' => 'admin/todos*',
            'icon' => 'icon-fa icon-fa-check',
        ],
        [
            'title' => 'Settings',
            'link' => '#',
            'active' => 'admin/settings*',
            'icon' => 'icon-fa icon-fa-cogs',
            'children' => [
                [
                    'title' => 'Social',
                    'link' => '/admin/settings/social',
                    'active' => 'admin/settings/social',
                ],
                [
                    'title' => 'Mail',
                    'link' => 'admin/settings/mail',
                    'active' => 'admin/settings/mail*',
                    'icon' => 'icon-fa icon-fa-mail',
                ],
            ]
        ]
    ]
];
