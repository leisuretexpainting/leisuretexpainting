<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'AdminController' => $baseDir . '/app/controllers/admin/AdminController.php',
    'AdminDataController' => $baseDir . '/app/controllers/admin/AdminDataController.php',
    'AdminTenderController' => $baseDir . '/app/controllers/admin/AdminTenderController.php',
    'AdminUserController' => $baseDir . '/app/controllers/admin/AdminUserController.php',
    'AdminUserRolesController' => $baseDir . '/app/controllers/admin/AdminUserRolesController.php',
    'BaseController' => $baseDir . '/app/controllers/BaseController.php',
    'CreateRolesTable' => $baseDir . '/app/database/migrations/2015_01_08_004012_create_roles_table.php',
    'CreateUsersTable' => $baseDir . '/app/database/migrations/2015_01_08_004032_create_users_table.php',
    'DatabaseSeeder' => $baseDir . '/app/database/seeds/DatabaseSeeder.php',
    'HomeController' => $baseDir . '/app/controllers/HomeController.php',
    'IlluminateQueueClosure' => $vendorDir . '/laravel/framework/src/Illuminate/Queue/IlluminateQueueClosure.php',
    'Role' => $baseDir . '/app/models/Role.php',
    'RoleTableSeeder' => $baseDir . '/app/database/seeds/DatabaseSeeder.php',
    'SessionHandlerInterface' => $vendorDir . '/symfony/http-foundation/Symfony/Component/HttpFoundation/Resources/stubs/SessionHandlerInterface.php',
    'Tender' => $baseDir . '/app/models/Tender.php',
    'TestCase' => $baseDir . '/app/tests/TestCase.php',
    'User' => $baseDir . '/app/models/User.php',
    'UserTableSeeder' => $baseDir . '/app/database/seeds/DatabaseSeeder.php',
    'Whoops\\Module' => $vendorDir . '/filp/whoops/src/deprecated/Zend/Module.php',
    'Whoops\\Provider\\Zend\\ExceptionStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/ExceptionStrategy.php',
    'Whoops\\Provider\\Zend\\RouteNotFoundStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/RouteNotFoundStrategy.php',
);
