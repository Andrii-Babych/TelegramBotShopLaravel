<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Telegram {

    /**
     * @var Http
     */
    protected $http;

    /**
     * @var
     */
    protected $bot;

    const url = 'https://api.telegram.org/bot';

    /**
     * @param Http $http
     * @param $bot
     */
    public function __construct(Http $http, $bot)
    {
        $this->http = $http;
        $this->bot = $bot;
    }

    /**
     * @param $chat_id
     * @param $message
     * @return \Illuminate\Http\Client\Response
     */
    public function sendMessage($chat_id, $message)
    {
        return $this->http::post(self::url . $this->bot . '/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html'
        ]);
    }

    /**
     * @param $chat_id
     * @param $message
     * @param $button
     * @return \Illuminate\Http\Client\Response
     */
    public function sendButtons($chat_id, $message, $button)
    {
        return $this->http::post(self::url . $this->bot . '/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'reply_markup' => $button,
        ]);
    }

    /**
     * @param $chat_id
     * @param $product
     * @param $button
     * @return \Illuminate\Http\Client\Response
     */
    public function sendPhoto($chat_id, $product, $button)
    {
        $link = "[ ](".$product->img.') *'. $product->name . "* \n" . $product->desc  ."\n\n *Цена:*" . $product->price . ' грн.';

        return $this->http::post(self::url . $this->bot . '/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $link,
            'parse_mode' => "markdown",
            'reply_markup' => $button,
        ]);



    }

    /**
     * @param $chat_id
     * @param $product
     * @return \Illuminate\Http\Client\Response
     */
    public function sendSelectedProductPhoto($chat_id, $product)
    {
        $link = "[ ](".$product->img.") * Вы выбрали * \n *". $product->name . "* \n" . $product->desc  ."\n\n *Цена:*" . $product->price . ' грн.';

        return $this->http::post(self::url . $this->bot . '/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $link,
            'parse_mode' => "markdown",
        ]);
    }
}

