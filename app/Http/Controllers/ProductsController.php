<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;

class ProductsController extends Controller
{
    public function addProductToCart(int $id)
    {
        // return $id;
        if ($id != '') {
            // add item to cart
            $product = Product::find($id);
            if ($product != null) {
                $item = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'thumbnail' => $product->thumbnail
                ];
                // Session::forget('cartItems');
                // Session::forget('cartItemsTotal');
                if (Session::get('cartItems') != null) {
                    if (array_search($id, array_column(Session::get('cartItems'), 'id')) === false){

                        Session::push('cartItems', $item);
                        $totalPrice = Session::get('cartItemsTotal') + $product->price;
                        Session::put('cartItemsTotal', $totalPrice);

                        return response()->json([
                            'status' => 1,
                            'count' => count(Session::get('cartItems')),
                            'cart_total_price' => number_format(Session::get('cartItemsTotal'), 2)
                        ]);
                    } else {
                        return response()->json([
                            'status' => 0,
                            'count' => count(Session::get('cartItems')),
                            'cart_total_price' => number_format(Session::get('cartItemsTotal'), 2)
                        ]);
                    }
                } else {
                    Session::push('cartItems', $item);
                    Session::put('cartItemsTotal', $product->price);
                    return response()->json([
                        'status' => 1,
                        'count' => count(Session::get('cartItems')),
                        'cart_total_price' => number_format(Session::get('cartItemsTotal'), 2)
                    ]);
                }

            }
        }
    }

    public function saveOrder(Request $request)
    {
        // return $request;
        $cartItems = Session::get('cartItems');
        foreach ($cartItems as $value) {
            $saveOrder = new Order;
            $saveOrder->product_id = $value['id'];

            $saveOrder->product_name = $value['name'];
            $saveOrder->product_price = $value['price'];
            $saveOrder->name = $request->name;
            $saveOrder->email = $request->email;
            $saveOrder->phone = $request->phone;
            $saveOrder->address = $request->address;
            $saveOrder->total_amount = number_format(Session::get('cartItemsTotal'), 2);
            $saveOrder->save();
        }
        if($saveOrder){
            FacadesSession::flush();
            return json_encode([
                'status' => 'success',
                'message' => 'Item purchased successfully'
            ]);
        }else{
            return json_encode([
                'status' => 'error',
                'message' => 'An error occured'
            ]);
        }

        // return $cartItems;
        // return $request;
    }
}
