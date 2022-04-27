<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
/**
 * Инициализатор RBAC выполняется в консоли php yii rbac/init
 */
class RbacController extends Controller {

    public function actionInit() {

        if (!$this->confirm("Are you sure? It will re-create permissions tree.")) {
            return self::EXIT_CODE_NORMAL;
        }

        $auth = Yii::$app->authManager;
        $auth->removeAll();

        // Создадим роли админа и редактора новостей
        $admin = $auth->createRole('admin');
        $admin->description = 'Роль для админа';
        $user = $auth->createRole('user');
        $user->description = 'Роль для пользователя';

        $auth->add($admin);
        $auth->add($user);

        $this->stdout('Done!' . PHP_EOL);
    }
}