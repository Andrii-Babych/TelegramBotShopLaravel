<?php

namespace App\Helpers;

use App\Models\Products;
use App\Models\Settings;

class TelegramHandler
{

    /**
     * @param int $id
     * @param Telegram $telegram
     * @return void
     */
    public static function sendProductList(int $id, Telegram $telegram)
    {
        $products = Products::where('availability', 1)->get();

        foreach ($products as $product) {

            $buttons = [
                'inline_keyboard' => [
                    [
                        [
                            'text' => 'Купить ' . $product->price . ' грн',
                            'callback_data' => 'buy|' . $product->id,
                        ]
                    ]
                ]
            ];

            $telegram->sendPhoto($id, $product, $buttons);
        }
    }

    /**
     * @param int $id
     * @param int $product_id
     * @param Telegram $telegram
     * @return void
     */
    public static function sendUserSelected(int $id, int $product_id, Telegram $telegram)
    {
        $product = Products::find($product_id);
        $telegram->sendSelectedProductPhoto($id, $product);

    }

    /**
     * @param $id
     * @param Telegram $telegram
     * @return void
     */
    public static function sendMenu($id, Telegram $telegram)
    {
        $message = Settings::getGreetingMessage();

        $buttons = [
            'inline_keyboard' => [
                [
                    [
                        'text' => 'Список товаров',
                        'callback_data' => 'product_list',
                    ]
                ]
            ]
        ];

        $telegram->sendButtons($id, $message, json_encode($buttons));
    }

    /**
     * @param $id
     * @param Telegram $telegram
     * @return void
     */
    public static function sendMessageHelp($id, Telegram $telegram)
    {
        $telegram->sendMessage($id, '🤯');

        $buttons = [
            'inline_keyboard' => [
                [
                    [
                        'text' => 'Список товаров',
                        'callback_data' => 'product_list',
                    ]
                ]
            ]
        ];

        $telegram->sendButtons($id, "Может все же выберешь кнопку?", json_encode($buttons));
    }
}
