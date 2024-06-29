<?php

return [
    'list' => [
        // * DASHBOARD
        [
            'route_names' => [
                'wave.user.admin-main.dashboard',
            ],
            'route' => 'wave.user.admin-main.dashboard',
            'has_badge' => false,
            'name' => 'dashboard',
            'label' => 'Dashboard',
            'icon' => 'themes/tailwind/images/clipboard-image.png',
            'is_subitem' => false
        ],
        // * TIME TABLE
        [
            'route_names' => [
                'wave.user.admin-main.timetable',
            ],
            'route' => 'wave.user.admin-main.timetable',
            'has_badge' => false,
            'name' => 'time_table',
            'label' => 'Timetable',
            'icon' => 'themes/tailwind/images/clipboard-image-1.png',
            'is_subitem' => false
        ],
        // * MEMBER
        [
            'route_names' => [
                'wave.user.admin-main.student',
                'wave.user.admin-main.student-view'
            ],
            'route' => 'wave.user.admin-main.student',
            'has_badge' => false,
<<<<<<< Updated upstream
            'name' => 'student',
=======
            'name' => 'member',
>>>>>>> Stashed changes
            'label' => 'Member',
            'icon' => 'themes/tailwind/images/clipboard-image-2.png',
            'is_subitem' => false
        ],
        // * COURSE
        [
            'route_names' => [
                'wave.user.admin-main.course',
            ],
            'route' => 'wave.user.admin-main.course',
            'has_badge' => false,
            'name' => 'course',
            'label' => 'Course',
            'icon' => 'themes/tailwind/images/clipboard-image-3.png',
            'is_subitem' => false
        ],
        // * CLASSES
        [
            'route_names' => [
                'wave.user.admin-main.classes',
            ],
            'route' => 'wave.user.admin-main.classes',
            'has_badge' => false,
            'name' => 'classes',
            'label' => 'Classes',
            'icon' => 'themes/tailwind/images/clipboard-image-19.png',
            'is_subitem' => false
        ],
        // * COACH
        [
            'route_names' => [
                'wave.user.admin-main.coach',
            ],
            'route' => 'wave.user.admin-main.coach',
            'has_badge' => false,
            'name' => 'coach',
            'label' => 'Coach',
            'icon' => 'themes/tailwind/images/clipboard-image-7.png',
            'is_subitem' => false
        ],
        // * eCommerce
        [
            'route_names' => [
                'wave.user.admin-main.products',
                'wave.user.admin-main.orders',
                'wave.user.admin-main.customers'
            ],
            'name' => 'ecommerce',
            'label' => 'eCommerce',
            'icon' => 'themes/tailwind/images/clipboard-image-8.png',
            'is_subitem' => true,
            'subitems' => [
                [
                    'route' => 'wave.user.admin-main.products',
                    'name' => 'products',
                    'label' => 'Products'
                ],
                [
                    'route' => 'wave.user.admin-main.orders',
                    'name' => 'orders',
                    'label' => 'Orders'
                ],
                [
                    'route' => 'wave.user.admin-main.customers',
                    'name' => 'customers',
                    'label' => 'Customers'
                ],
                [
                    'route' => 'wave.user.admin-main.productCategory',
                    'name' => 'product_categories',
                    'label' => 'Category'
                ]
            ]
        ],
        // * REQUEST
        [
            'route_names' => [
                'wave.user.admin-main.request',
            ],
            'route' => 'wave.user.admin-main.request',
            'has_badge' => true,
            'name' => 'request',
            'label' => 'Request',
            'icon' => 'themes/tailwind/images/clipboard-image-9.png',
            'is_subitem' => false
        ],
        // * PAYROLL
        [
            'route_names' => [
                'wave.user.admin-main.payroll',
            ],
            'route' => 'wave.user.admin-main.payroll',
            'has_badge' => false,
            'name' => 'payroll',
            'label' => 'Payroll',
            'icon' => 'themes/tailwind/images/clipboard-image-10.png',
            'is_subitem' => false
        ],
        // * TRANSACTIONS
        [
            'route_names' => [
                'wave.user.admin-main.invoices',
                'wave.user.admin-main.receipt',
                'wave.user.admin-main.receipt-view',
                'wave.user.admin-main.consolidate',
                'wave.user.admin-main.consolidate-view',
            ],
            'name' => 'transaction',
            'label' => 'Transactions',
            'icon' => 'themes/tailwind/images/transactions.png',
            'is_subitem' => true,
            'subitems' => [
                [
                    'route' => 'wave.user.admin-main.invoices',
                    'name' => 'invoices',
                    'label' => 'Invoices'
                ],
                [
                    'route' => 'wave.user.admin-main.receipt',
                    'name' => 'receipt',
                    'label' => 'Receipts'
                ],
            ]
        ],
        // * REPORT
        [
            'route_names' => [
                'wave.user.admin-main.general-report',
                'wave.user.admin-main.invoice-report'
            ],
            'has_badge' => false,
            'name' => 'report',
            'label' => 'Report',
            'icon' => 'themes/tailwind/images/clipboard-image-9.png',
            'is_subitem' => true,
            'subitems' => [
                [
                    'route' => 'wave.user.admin-main.general-report',
                    'name' => 'report',
                    'label' => 'General Report'
                ],
                [
                    'route' => 'wave.user.admin-main.invoice-report',
                    'name' => 'report',
                    'label' => 'Invoice Report'
                ]
            ]
        ],
        // * CONTENT
        [
            'route_names' => [
                'wave.user.admin-main.setting-web-app',
                'wave.user.admin-main.content-placevideo',
                'wave.user.admin-main.content-sharevideo'
            ],
            'name' => 'content',
            'label' => 'Content',
            'icon' => 'themes/tailwind/images/clipboard-image-11.png',
            'is_subitem' => true,
            'subitems' => [
                [
                    'route' => 'wave.user.admin-main.content-placevideo',
                    'name' => 'place_video',
                    'label' => 'Place Video'
                ],
                [
                    'route' => 'wave.user.admin-main.content-sharevideo',
                    'name' => 'share_video',
                    'label' => 'Share Video'
                ]
            ]
        ],
        // * NOTIFICATION
        [
            'route_names' => [
                'wave.user.admin-main.notification.template',
                'wave.user.admin-main.notification.announcement'
            ],
            'name' => 'notification',
            'label' => 'Notification',
            'icon' => 'themes/tailwind/images/clipboard-image-12.png',
            'is_subitem' => true,
            'subitems' => [
                [
                    'route' => 'wave.user.admin-main.notification.template',
                    'name' => 'notification_category',
                    'label' => 'Template'
                ],
                [
                    'route' => 'wave.user.admin-main.notification.announcement',
                    'name' => 'notification_announcement',
                    'label' => 'Announcement/News/Urgent News'
                ]
            ]
        ],
        // * SETTINGS
        [
            'route_names' => [
                'wave.user.admin-main.setting', 'wave.user.admin-main.setting-closure', 
                'wave.user.admin-main.setting-staff', 'wave.user.admin-main.setting-banklist',
                'wave.user.admin-main.faq', 'wave.user.admin-main.faq-category', 'wave.user.admin-main.setting-role',
                'wave.user.admin-main.setting-addstaff', 'wave.user.admin-main.setting-addrole',
                'wave.user.admin-main.setting-closure-category'
            ],
            'name' => 'setting',
            'label' => 'Setting',
            'icon' => 'themes/tailwind/images/clipboard-image-13.png',
            'is_subitem' => true,
            'subitems' => [
                [
                    'route' => 'wave.user.admin-main.setting-role',
                    'name' => 'role',
                    'label' => 'Role'
                ],
                [
                    'route' => 'wave.user.admin-main.setting-staff',
                    'name' => 'staff',
                    'label' => 'Staff'
                ],
                // [
                //     'route' => 'wave.user.admin-main.setting',
                //     'name' => 'school',
                //     'label' => 'School'
                // ],
                [
                    'route' => 'wave.user.admin-main.setting-closure',
                    'name' => 'closure',
                    'label' => 'Closure'
                ],
                // [
                //     'route' => 'wave.user.admin-main.setting-banklist',
                //     'name' => 'bank_list',
                //     'label' => 'Bank List'
                // ],
                [
                    'route' => 'wave.user.admin-main.faq',
                    'name' => 'faq',
                    'label' => 'FAQ'
                ]
            ]
        ],
    ]
];