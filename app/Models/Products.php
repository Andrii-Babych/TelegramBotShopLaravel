<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Products extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var string[]
     */
    protected $fillable = [ 'name', 'qty', 'desc', 'price', 'img', 'availability' ];

    /**
     * @param array $response
     * @return void
     */
    public static function create(array $response)
    {
        if(count($response) > 0) {
            self::truncate();
        }

        foreach ($response as $item){
            $product = new self;
            $product->id = $item->id;
            $product->name = $item->name;
            $product->qty = $item->qty;
            $product->desc = $item->desc;
            $product->price = (int) $item->price;
            $product->img = $item->img;
            $product->availability = (int) $item->availability;
            $product->save();
        }

    }

}
