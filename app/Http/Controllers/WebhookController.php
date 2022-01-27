<?php

namespace App\Http\Controllers;

use App\Helpers\Telegram;
use App\Helpers\TelegramHandler;
use Illuminate\Http\Request;


class WebhookController extends Controller
{

    /**
     * @param Request $request
     * @param Telegram $telegram
     * @return void
     */
    public function index(Request  $request, Telegram  $telegram)
    {
       // \Log::debug($id);
        $id = env('REPORT_TELEGRAM_ID');

        $callback_query = $request->input('callback_query');

        if(!is_null($callback_query))
        {
            $button_pressed = data_get($callback_query, 'data');
            $id = data_get($callback_query, 'from.id');

            if($button_pressed == 'product_list')
            {
                TelegramHandler::sendProductList($id, $telegram);
            } else {
                $type_button = explode('|', $button_pressed)[0];
                $product_id = explode('|', $button_pressed)[1];

                if($type_button == 'buy'){
                    TelegramHandler::sendUserSelected($id, $product_id, $telegram);
                }
            }
        }

        $message = $request->input('message');
        if(!is_null($message))
        {
            $text = data_get($message, 'text');
            $id = data_get($message, 'from.id');

            if(isset($text) && $text != '/start'){
                TelegramHandler::sendMessageHelp($id, $telegram);
            } else {
                TelegramHandler::sendMenu($id, $telegram);
            }
        }

    }

//    public function getProducts(Telegram $telegram)
//    {
//
//        $products = Products::where('availability', 1)->get();
//
//        foreach ($products as $product) {
//
//            $buttons = [
//                'inline_keyboard' => [
//                    [
//                        [
//                            'text' => 'Купить ' . $product->price . ' грн',
//                            'callback_data' =>  '1|'.$product->id,
//                        ]
//                    ]
//                ]
//            ];
//
//            $telegram->sendPhoto(env('REPORT_TELEGRAM_ID'), $product, $buttons);
//        }
//    }

}
