<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Request;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $message = Settings::getGreetingMessage();
        return view('dashboard', ['message' => $message]);
    }

    /**
     * Update / create message.
     * @return Renderable
     */
    public function update(): Renderable
    {
        $message = Request::post('message');
        $result = Settings::createAndUpdateGreetingMessage($message);
        return view('dashboard', ['message' => $result]);
    }
}
