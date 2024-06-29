<?php

namespace Wave\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Stripe\Checkout\Session as StripeSession;

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
    //  dd($shoppingProducts, $shoppingCategories);
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
    
    // $shoppingProducts = $apiResponse;
    // $shoppingProducts = $shoppingProducts['product'];
    // dd($shoppingProducts);
    // $shoppingProducts =  $shoppingProducts['products'];
    return view("theme::shopping.item", [
      'shoppingProduct' => $shoppingProducts[0],
      'schoolVenues' => $schoolVenues,
      'user' => session('userSession'),
      'productImages' => $shoppingProducts
    ]);
  }

//   public function success(Request $request)
// {
//     $apiUrl = config('services.api_url') . '/create-payment-intent';

//     $response = Http::post($apiUrl);
//     // dd($response->json());
//     return view('theme::shopping.success');
// }

//   public function payment(Request $request)
// {
//     $requestData = [
//         'amount' => $request->input('amount'),
//         'currency' => $request->input('currency')
//     ];
//     //  dd($requestData);
//     $apiUrl = config('services.api_url') . '/create-payment-intent';

//     $response = Http::post($apiUrl, $requestData);
//     // dd($response);
//     // $clientSecret = $response->json()['clientSecret'];
//     // dd($response->json());
//     return view('theme::shopping.payment', [
//         // 'clientSecret' => $clientSecret,
//         'amount' => $request->input('amount'),
//         'currency' => $request->input('currency'),
//         'product_id' => $request->input('product_id'),
//         'quantity' => $request->input('quantity'),
//         'venue_id' => $request->input('venue_id')
//     ]);
// }
public function payment(Request $request)
{
  dd($request->all());
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    try {
        // Create a new Checkout Session for the payment
        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => $request->currency,
                    'product_data' => [
                        'name' => $request->product_name,
                    ],
                    'unit_amount' => $request->amount,
                ],
                'quantity' => $request->quantity,
            ]],
            'mode' => 'payment',
            'phone_number_collection' => ['enabled' => true],
            'success_url' => route('success'),
            'cancel_url' =>route('cancel'),
            'metadata' => [
              'product_picture' => $request->product_pic // Pass the picture URL as metadata
          ]
        ]);

        // Redirect to the Stripe hosted checkout page
        return redirect()->away($session->url);
    } catch (\Exception $e) {
        // Handle any exceptions
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
public function showSuccess()
{
  return view("theme::shopping.success");
}
public function showCancel()
{
  return view("theme::shopping.cancel");
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
    //  dd($requestData);
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
