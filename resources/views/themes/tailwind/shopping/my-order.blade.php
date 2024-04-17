@extends('theme::layouts.customer')

@section('style')
    <style>
        .shopping {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
            font-weight: 700;
            margin-right: -10%;
        }

        .order {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 600;
            position: relative;
            background: #ffffff;
            border-radius: 8px;
            border-style: solid;
            border-color: var(--appcolortone-secondary-1, #233656);
            border-width: 1px;
            padding: 15px 16px 15px 16px;
        }

        .d-flex {
            display: flex;
            flex-grow: 1;
        }

        .navbar {
            background: #FFF;
            padding: 20px;
            position: left;
            min-height: 0px;
            top: 0;
            left: 0%;
            right: 0%;
            box-shadow: 10px 0 10px -10px rgba(0, 0, 0, 0.25);
        }

        .container-fluid {
            display: flex;
            flex-direction: column;
        }

        .box {
            background: #ffffff;
            border-radius: 24px;
            padding: 18px 24px 18px 24px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
            justify-content: center;
            align-self: stretch;
            flex-shrink: 0;
            height: 104px;
            position: relative;
            box-shadow: var(--app-dropshadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .p24b {
            color: #171433;
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 600;
            position: relative;
        }

        .p18b {
            color: #233656;
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 14px;
            font-weight: 500;
            position: relative;
        }

        @media (max-width:1440px){
            .p18b{
                font-size:18px;
            }
        }
        @media (max-width: 1024px) {
    .box {
            left:150px;
    }
    .p18b{
        font-size:16px;
    }
}
@media (max-width: 768px) {
    .box {
        height:auto;
         left:80px;
         min-width:150px;
    }
    .p18b{
        font-size:10px;
    }
    .p24b{
        font-size:14px;
    }
    .arrow{
        font-size:14px;
        margin-right:-30px;
        margin-bottom:-45px;
    }
}
    </style>
@endsection

@section('content')
    <div class="d-flex flex-column" id="content-wrapper"
        style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);min-height: 100vh;">
        <div class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
            <div style="display: flex; align-items: center;">
                <div class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
                    <a href="{{ route('wave.shopping') }}">
                        <button class type="button"
                            style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                            <i class="fas fa-chevron-left"></i></button></a>
                </div>
            </div>
            <p class="shopping d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                style="margin-bottom: 30px;height: 31px;text-align: center;margin-left:-160px;"><strong>My
                    Order</strong></p>
            <div>
            </div>
        </div>
        @forelse ($myOrderDetails as $myOrderDetail)
        <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center" placeholder="">
            <div style="width:50%;">
                <a href="{{ route('wave.order1') }}" style="text-decoration: none;">
                    <div class="box-container">
                        <div class="box d-xl-flex d-xxl-flex justify-content-between divcard" style="padding: 20px;margin-bottom:30px;">
                            <div style="display: flex; flex-direction: column; justify-content: flex-start;">
                                <div>
                                    <p class="p24b" style="margin-bottom: 0px;">Payment details</p>
                                </div>
                                <div style="display: flex; flex-direction: row;">
                                    <p class="p18b" style="margin-bottom: 0px;color: #23365680;margin-right: 5px;"><strong>Date:</strong></p>
                                    <p class="p18b" style="margin-bottom: 0px;margin-right: 10px;"><strong>{{ $myOrderDetail['order_date'] }}</strong></p>
                                    <p style="margin-bottom: 0px;color: #23365680;margin-right: 5px;" class="p18b"><strong>Time:</strong></p>
                                    <p style="margin-bottom: 0px;" class="p18b"><strong>{{ $myOrderDetail['time'] }}</strong></p>
                                </div>
                                <div style="display: flex; flex-direction: row;">
                                    <p style="margin-bottom: 0px;color: #23365680;margin-right: 5px;" class="p18b"><strong>Order:&nbsp;</strong></p>
                                    <p style="margin-bottom: 0px;" class="p18b"><strong>{{ $myOrderDetail['transaction_id'] }}</strong></p>
                                </div>
                            </div>
                            <div style="margin-left: auto;">
                                <svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #171433;transform: translateY(-60px);">
                                    <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @empty
    <div class="d-flex justify-content-center align-items-center">
        <p class="p18b" style="text-align:center;background-color:#233656;color:white;font-size:24px;width:60%;border-radius:32px;">No order details found.</p>
    </div>
    @endforelse
    
    </div>
    </div>
    </div>
    </body>
@endsection

@section('javascript')
    <script></script>
@endsection
