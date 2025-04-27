<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('shop.index', compact('products'));
    }

    public function wool()
    {
        $products = Product::where('material', 'Wool')->get();
        return view('shop.wool', compact('products'));
    }
    
    // Method to display Cotton Products
    public function cotton()
    {
        // Fetch only cotton products
        $products = Product::where('material', 'Cotton')->get();
    
        // Return the cotton products view
        return view('shop.cotton', compact('products'));
    }
    
    public function acrylic()
{
    // Fetch only acrylic products
    $products = Product::where('material', 'Acrylic')->get();

    // Return the acrylic products view
    return view('shop.acrylic', compact('products'));
}


public function knittingNeedles()
{
    // Fetch only knitting needles products
    $products = Product::where('material', 'Knitting Needles')->get();

    // Return the knitting needles products view
    return view('shop.knittingNeedles', compact('products'));
}

public function crochetHooks()
{
    // Fetch only crochet hooks products
    $products = Product::where('material', 'Crochet Hook')->get();

    // Return the crochet hooks products view
    return view('shop.crochetHooks', compact('products'));
}

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('shop.cart', compact('cart'));
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('shop.checkout', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('shop')->with('error', 'Your cart is empty.');
        }

        // Create the order
        $order = Order::create([
            'customer_id' => Auth::guard('customer')->id(),
            'total' => collect($cart)->sum(function ($item) {
                return $item['price'] * $item['quantity'];
            }),
        ]);

        // Create order items
        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Clear cart
        session()->forget('cart');

        return redirect()->route('shop')->with('success', 'Your order has been placed successfully!');
    }
}
