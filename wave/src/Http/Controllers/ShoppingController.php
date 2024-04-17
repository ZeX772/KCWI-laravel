<?php

namespace Wave\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ShoppingController extends Controller
{
  public function index()
  {

    $apiUrl = config('services.api_url') . '/productCategories';
    $apiResponse = get($apiUrl);
    $shoppingCategories = $apiResponse;

    $apiUrl2 = config('services.api_url') . '/productMainPage';
    $apiResponse2 = get($apiUrl2);
    $shoppingProducts = $apiResponse2;

    $shoppingProducts =  $shoppingProducts['products'];
    // dd($shoppingProducts, $shoppingCategories);
    return view("theme::shopping.shopping", [
      'shoppingCategories' => $shoppingCategories,
      'shoppingProducts' => $shoppingProducts,
    ]);
  }


  public function searchResult(Request $request)
  {
    $requestData = [
      'keyword' => $request->input('keyword'),
      'product_category_id' => $request->input('product_category_id'),
    ];

    $apiUrl = config('services.api_url') . '/searchFilter';

    $apiResponse = post($apiUrl, $requestData);
    //dd($apiResponse);
    //Get Id 
    session(['outline-categories' => ""]);
    session(['outline-categories' => $request->input('product_category_id')]);
    session(['outline-keyword' => ""]);
    session(['outline-keyword' => $request->input('keyword')]);

    $products = $apiResponse['products'];
    $productCategories = $apiResponse['product_categories'];
    return view("theme::shopping.result", [
      'products' => $products,
      'productCategories' => $productCategories,
    ]);
  }

  public function showItem($id)
  {
    $productId = $id;

    $apiUrl = config('services.api_url') . '/product';
    $apiResponse = post($apiUrl, ['product_id' => $productId]);
    $shoppingProducts = $apiResponse;
    $shoppingProducts = $shoppingProducts['product'];

    $apiUrl2 = config('services.api_url') . '/schoolVenues';
    $apiResponse2 = get($apiUrl2);
    $schoolVenues = $apiResponse2;
    
    // $shoppingProducts =  $shoppingProducts['products'];
    return view("theme::shopping.item", [
      'shoppingProduct' => $shoppingProducts[0],
      'schoolVenues' => $schoolVenues,
      'user' => session('userSession'),
      'productImages' => $shoppingProducts
    ]);
  }
  public function addToCart(Request $request)
  {
    $userId = $request->session()->get('userSession')['id'];
    $requestData = [
      'user_id' => $userId,
      'product_id' => $request->input('product_id'),
      'quantity' => $request->input('quantity'),
      'venue_id' => $request->input('venue_id')
    ];
    // dd($requestData);
    $apiUrl = config('services.api_url') . '/cart-details/add';
    $apiResponse = post($apiUrl, $requestData);
    // dd($apiResponse);
    if ($apiResponse) {
      // Product added to cart successfully
      // return redirect()->route('wave.cart-details')->with('message', 'Product added to cart successfully');
      return redirect()->back()->with('message', 'Product added to cart successfully');
    } else {
      // Failed to add product to cart
      $errorMessage = isset($apiResponse->json()['message']) ? $apiResponse->json()['message'] : 'Failed to add product to cart';
      return $errorMessage;
    }
  }

  public function removeFromCart(Request $request)
  {

    $requestData = [
      'order_item_id' => $request->input('order_item_id'),
    ];
    //  dd($requestData);
    $apiUrl = config('services.api_url') . '/cart-details/remove';
    $apiResponse = post($apiUrl, $requestData);
    // dd($apiResponse);
    if ($apiResponse) {
      // Product added to cart successfully
      return redirect()->route('wave.cart-details')->with('success', 'Product removed from the cart successfully');
    } else {
      // Failed to add product to cart
      $errorMessage = isset($apiResponse->json()['message']) ? $apiResponse->json()['message'] : 'Failed to add product to cart';
      return $errorMessage;
    }
  }
  public function showCart(Request $request)
  {
    $userId = $request->session()->get('userSession')['id'];

    $requestData = [
      'user_id' => $userId,
    ];

    $apiUrl = config('services.api_url') . '/getCart';
    $apiResponse = post($apiUrl, $requestData);

    $cartProducts = [];
    if (isset($apiResponse['cart']) && is_array($apiResponse['cart'])) {
      $cartProducts = $apiResponse['cart'];
    }
    // dd($cartProducts);
    return view("theme::shopping.cart-details", ['cartProducts' => $cartProducts]);
  }


  public function showMyOrder(Request $request)
  {
    $userId = $request->session()->get('userSession')['id'];
    $apiUrl = config('services.api_url') . '/myOrders/' . $userId;
    $apiResponse = post($apiUrl, ['user_id' => $userId]);

    // Check if the response contains orders
    $myOrderDetails = isset($apiResponse['orders']) ? $apiResponse['orders'] : [];

    return view("theme::shopping.my-order", ['myOrderDetails' => $myOrderDetails]);
  }

  public function showOrder1(Request $request)
  {
    $userId = $request->session()->get('userSession')['id'];
    $apiUrl = config('services.api_url') . '/myOrdersDetails/' . $userId;
    $apiResponse = post($apiUrl, ['user_id' => $userId]);
    //  dd($apiResponse);
    $myOrderDetails = $apiResponse;

    $myOrderDetails = $myOrderDetails['orders'];

    return view("theme::shopping.order1", ['myOrderDetails' => $myOrderDetails]);
  }
  public function showOrder2()
  {
    return view("theme::shopping.order2");
  }

  public function showBuyTicketProcess1()
  {
    return view("theme::shopping.ticket1");
  }
  public function showBuyTicketProcess2()
  {
    return view("theme::shopping.ticket2");
  }
  public function showBuyTicketProcess3()
  {
    return view("theme::shopping.ticket3");
  }
  public function showInvoice()
  {
    return view("theme::shopping.invoice");
  }
  public function showOnlinePayment()
  {
    return view("theme::shopping.online-payment");
  }
}
