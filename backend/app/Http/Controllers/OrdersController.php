<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;
use App\Models\User;
use App\Models\Qte;
use Mail;
use App\Mail\MailServer;

class OrdersController extends Controller
{
    public function Order(Request $request)
    {
        if (!$request->session()->has('login')) {
            return redirect()->route('user.index');
        }
        $order = new Order;
        $order->user_id = $request->session()->get('login');
        $order->save();

        $cart = $request->session()->get('cart');
        foreach ($cart as $line)
        {
            $ol = new Qte;
            $ol->order_id = $order->id;
            $ol->product_id  = $line[0];
            $ol->quantity = $line[1];
            $ol->save();
        }

        $request->session()->put('cart', array());
        return $this->Mail($order->id);
    }

    public function Mail($id)
    {
        $order = Order::findOrFail($id);
        $cart  = Qte::where('order_id', $id)->get();

        $pdf = Pdf::loadView('products.pdforder', [
            'order' => $order,
            'cart'  => $cart
        ])->output();

        $email = User::find($order->user_id);

        Mail::to("tachefine700@gmail.com")->send(new MailServer($order, $pdf));

        return back()->with("msg", "Email sent successfully!");
    }


}
