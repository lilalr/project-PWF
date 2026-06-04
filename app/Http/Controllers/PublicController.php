<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    /**
     * Home landing page (Liora Fragrance).
     */
    public function index()
    {
        // Get the first 4 products for featured section
        $featuredProducts = Product::with('category')->take(4)->get();
        
        // Find Velour or fallback to any signature product
        $velour = Product::where('name', 'Velour')->first();
        if (!$velour) {
            $velour = Product::first();
        }

        return view('welcome', compact('featuredProducts', 'velour'));
    }

    /**
     * Fragrances page displaying all products with scent descriptions and longevity.
     */
    public function fragrances()
    {
        $products = Product::with('category')->get();
        return view('fragrances', compact('products'));
    }

    /**
     * View Cart page.
     */
    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    /**
     * Add product to cart.
     */
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'qty' => 1,
                'scent_notes' => $product->scent_notes,
                'longevity' => $product->longevity
            ];
        }

        session()->put('cart', $cart);
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Product added to cart!',
                'cart_count' => count($cart)
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!')->with('open_cart', true);
    }

    /**
     * Remove product from cart.
     */
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart!')->with('open_cart', true);
    }

    /**
     * Update product quantity in cart.
     */
    public function updateCart(Request $request, $id)
    {
        $request->validate([
            'qty' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty'] = intval($request->qty);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated successfully!')->with('open_cart', true);
    }

    /**
     * Checkout flow.
     */
    public function checkout()
    {
        // Checkout requires login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to checkout.');
        }

        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('public.cart')->with('error', 'Your cart is empty.');
        }

        // Build WhatsApp text
        $user = Auth::user();
        $orderId = 'LF-' . rand(10000, 99999);
        
        $message = "*🛍️ [LIORA FRAGRANCE] - NEW ORDER*\n";
        $message .= "--------------------------------------------------\n";
        $message .= "Halo Liora Fragrance, saya ingin memesan produk berikut:\n\n";
        
        $total = 0;
        foreach ($cart as $id => $item) {
            $sub = $item['price'] * $item['qty'];
            $total += $sub;
            $message .= "• *" . $item['name'] . "* (" . $item['qty'] . "x) - $" . number_format($sub, 0) . "\n";
        }
        
        $message .= "\n*Total Pembayaran:* *$" . number_format($total, 0) . "*\n";
        $message .= "--------------------------------------------------\n";
        $message .= "*Detail Pemesan:*\n";
        $message .= "👤 *Nama:* " . $user->name . "\n";
        $message .= "✉️ *Email:* " . $user->email . "\n";
        $message .= "🆔 *Order Ref:* " . $orderId . "\n\n";
        $message .= "Mohon informasi untuk langkah pembayaran selanjutnya. Terima kasih!";

        // Clear cart
        session()->forget('cart');

        // Redirect to WhatsApp (number: 628985610029)
        $waUrl = "https://api.whatsapp.com/send?phone=628985610029&text=" . urlencode($message);

        return redirect()->away($waUrl);
    }
}
