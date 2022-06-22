<?php

namespace App\Http\Controllers;
/**
 * Этот контроллер имммитирует работу в панели пользователя. 
 * Поскольку форм для отправки запросов нет работу методов 
 * связанных с роутами типа POST можно проверить из консоли командой
 * curl -X POST -k http://laravel/user/<method>/<userName>
 * 
 * Предварительно надо отключить проверку CSRF-токена. 
 * В файле app/Http/Middleware/VerifyCsrfToken.php
 * добавить роут 'user/*' в массив $except
 * Источник - https://programmingfields.com/how-to-resolve-419-page-expired-issue-in-laravel-8/
 * 
 */

class UsersController
{
    /**
     * Регистрирует нового пользователя
     * @param string $userName
     * @return void
     */
    public function register(string $userName)
    {
        Echo '<h1>User ' . $userName . ' has been registered</h1>';
    }

    /**
     * Выводит информацию по пользователю
     * @param string $userName
     * @return void
     */
    public function show(string $userName)
    {
        Echo '<h1>Info about User ' . $userName . '</h1>';
    }

    /**
     * Авторизует пользователя
     * @param string $userName
     * @return void
     */
    public function login(string $userName)
    {
        Echo '<h1>User ' . $userName . ' has been authorized</h1>';
    }

    /**
     * Удаляет пользователя
     * @param string $userName
     * @return void
     */    
    public function delete(string $userName)
    {
        Echo '<h1>User ' . $userName . ' has been deleted</h1>';
    }        
}