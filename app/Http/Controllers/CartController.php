<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyCart;
use App\Models\Book;
use App\Models\Order;
// Rules to validate postcode and phone number.

class CartController extends Controller
{
    public function addbook(Request $request, $id)
    {
        $book = Book::find($id);
        $cart = new MyCart();

        $cart->name = $book->title;
        $cart->price = $book->price;
        $cart->quantity = $request->quantity;
        $cart->amount = $book->price * $cart->quantity;
        $cart->image = $book->image;

        $cart->save();

        return redirect()->back()->with('added', 'Added to cart');
    }

    public function cart()
    {
        $cart = MyCart::all();

        return view('mycart', [
            "cart" => $cart
        ]);
    }

    public function removeitem($id)
    {
        $cart = MyCart::find($id);

        $cart->delete();

        return redirect()->back()->with('removed', 'Removed from cart');
    }

    public function checkoutitems()
    {
        $cart = MyCart::all();

        return view('guestcheckout', [
            "cart" => $cart
        ]);
    }

    public function purchaseitems(Request $request)
    {
        $request->validate([
            'email' => 'required|min:15|max:55',
            'first_name' => 'required|min:3|max:15',
            'last_name' => 'required|min:3|max:15',
            'address' => 'required|min:15|max:50',
            'town' => 'required|min:5|max:25',
            'postcode' => 'required|min:5|max:7',
            'country' => 'required|min:15|max:35',
            'county' => 'required|min:8|max:25',
            'phone_number' => 'numeric|nullable|min:10|max:13',
        ]);

        $order = new Order();
        // Sum of amount column in my carts
        $subtotal = MyCart::sum('amount');

        // Discount calculation

        $discount_percentage = 5;
        $discount = ($discount_percentage / 100) * $subtotal;

        // Tax calculation

        $tax = 0;    // Initialising tax variable.

        // Calculating shipping fee

        $shipping_fee = 0; // Initialising shipping fee
        $shipping_option = $request->input("shipping");
        if ($shipping_option == "Express") {
            $shipping_fee = 10;
        } else {
            $shipping_fee = 0;
        }

        // Calculating the tax based on order range from subtotal.

        switch (true) {
            case $subtotal > 0 && $subtotal <= 100:
                $tax = 0.05 * $subtotal; // 5% tax for orders up to 100.
                break;
            case $subtotal > 100 && $subtotal <= 250:
                $tax = 0.1 * $subtotal; // 10% tax for orders up to 250.
                break;
            case $subtotal > 250 && $subtotal <= 500:
                $tax = 0.15 * $subtotal; // 15% tax for orders up to 500.
                break;
            case $subtotal > 500 && $subtotal <= 750:
                $tax = 0.2 * $subtotal; // 20% tax for orders up to 750.
                break;
            case $subtotal > 750 && $subtotal <= 1250:
                $tax = 0.25 * $subtotal; // 25% tax for orders up to 1250.
                break;
            default:
                break;
        }

        // Calculating the net_total

        $net_total = ($subtotal - $discount) + $tax;

        // Calculating extra shipping fee

        $extra_shipping_fee = 0;

        if ($net_total > 500 && $net_total < 1000) {
            $extra_shipping_fee = $net_total * 0.05;
        } elseif ($net_total > 1000 && $net_total < 1500) {
            $extra_shipping_fee = $net_total * 0.1;
        }

        $total_shipping_fee = $shipping_fee + $extra_shipping_fee;

        if ($shipping_option == "Free")
        {
            $total_shipping_fee = 0;
        }

        // Calculating total

        $total = $net_total + $total_shipping_fee;

        $order->email = $request->email;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->address = $request->address;
        $order->town = $request->town;
        $order->postcode = $request->postcode;
        $order->country = $request->country;
        $order->county = $request->county;
        $order->phone_number = $request->phone_number;
        $order->subtotal = $subtotal;
        $order->shipping = $request->shipping;
        $order->shipping_fee = $total_shipping_fee;
        $order->discount = $discount;
        $order->tax = $tax;
        $order->total = $total;
        $order->save();

        return redirect()->back()->with('Order', 'Order placed');
    }
}
