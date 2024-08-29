<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject; // Подключаем интерфейс JWTSubject

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    // Добавьте методы, необходимые для JWTSubject

    /**
     * Получить идентификатор, который будет сохранен в токене JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Вернуть массив данных, которые должны быть добавлены в токен JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
