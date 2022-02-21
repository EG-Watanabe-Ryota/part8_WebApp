<?php
declare(strict_types=1);

namespace App\Authentication;

use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Cake\Routing\Router;
use Psr\Http\Message\ServerRequestInterface;

class AppAuthenticationServiceProvider implements AuthenticationServiceProviderInterface
{
    public function getAuthenticationService(ServerRequestInterface $request): AuthenticationServiceInterface
    {
        $service = new AuthenticationService();
        $service->setConfig([
            'unauthenticatedRedirect' => Router::url(['controller' => 'users', 'action' => 'login']),
            'queryParam' => 'redirect',
        ]);
        // 識別子をロードして、電子メールとパスワードのフィールドを確認します
        $service->loadIdentifier('Authentication.Password', [
            'fields' => [
                'username' => 'username',
                'password' => 'password',
            ]
        ]);

        // 認証子をロードするには、最初にセッションを実行する必要があります
        $service->loadAuthenticator('Authentication.Session');
        // メールとパスワードを選択するためのフォームデータチェックの設定
        $service->loadAuthenticator('Authentication.Form', [
            'fields' => [
                'username' => 'username',
                'password' => 'password',
            ],
            'loginUrl' => '/users/login',
        ]);

        return $service;
    }
}
?>