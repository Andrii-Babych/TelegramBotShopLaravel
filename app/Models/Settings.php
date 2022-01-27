<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Settings extends Model
{
    /**
     * @var string
     */
    protected $table = 'settings';

    /**
     * @var string[]
     */
    protected $fillable = ['value'];

    /**
     * @param string $message
     * @return mixed|string
     */
    public static function createAndUpdateGreetingMessage(string $message)
    {
        $greeting = self::find(1);
        if (is_null($greeting)) {
            $greeting = new self();
        }
        $greeting->id = 1;
        $greeting->value = $message;
        if ($greeting->save()) {
            return $greeting->value;
        } else {
            return self::getGreetingMessage();
        }
    }

    /**
     * @return string
     */
    public static function getGreetingMessage(): string
    {
        $message = self::find(1);
        return isset($message->value) ? $message->value : '';
    }

}
