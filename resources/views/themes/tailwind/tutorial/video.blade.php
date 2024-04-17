@extends('theme::layouts.customer')

@section('style')
<style>
 .box {
  background: #ffffff;
  border-radius: 24px;
  padding: 18px 12px 18px 12px;
  display: flex;
  flex-direction: column;
  gap: 10px;
  align-items: flex-start;
  justify-content: center;
  align-self: stretch;
  flex-shrink: 0;
  height: 104px;
  position: relative;
  box-shadow: var(
    --app-dropshadow-box-shadow,
    0px 4px 4px 0px rgba(35, 54, 86, 0.5)
  );
}
.button1 {
  background: #233656;
  border-radius: 29px;
  padding: 4px 10px 4px 10px;
  display: flex;
  flex-direction: row;
  gap: 10px;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  color: #ffffff;
  text-align: left;
  font-family: "Poppins-Medium", sans-serif;
  font-size: 18px;
  font-weight: 500;
  position: relative;
}
</style>
@endsection

@section('content')
<body style="background: #171433;">
    <div class="d-xxl-flex flex-column align-items-xxl-center centered" style="background: #171433;width: 80%;">
        <div style="width: 100%;margin-bottom: 20px;">
            <a href="{{route('wave.tutorial')}}">
                <button class type="button" style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;margin-left:40px;margin-top:30px;">
                  <i class="fas fa-chevron-left"></i></button></a></div>
                  <div style="display: flex; justify-content: center;">
                    <div style="width: 1286px; height: 650px;margin-right:-25%;">
                        <video width="1286" height="650" controls="" style="width: 100%; height: 100%;margin-right:-25%;">
                            <source src="/videos/tutorial.mp4" type="video/mp4">
                           Your browser does not support the video tag.</video>
                    </div>
                </div>
                
        <div class="container">
            <div class="row gx-2 gy-2 row-cols-md-1 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-3">
                <div class="col-md-6">
                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center divcard" style="border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;padding: 10px;width: auto;">
                        <div class="container d-md-flex align-items-md-center" style="width: auto;">
                            <div class="box row"style="right:-25%;width:118%">
                                <div class="col-md-4 d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center">
                                    <img src="../themes/tailwind/images/clipboard-image-72.png" style="width: 59px;"></div>
                                <div class="col-md-4 d-xl-flex d-xxl-flex flex-column justify-content-xl-center align-items-xl-start justify-content-xxl-center align-items-xxl-start">
                                    <p class="text-nowrap d-xl-flex d-xxl-flex justify-content-xxl-start p18b" style="margin-bottom: 0px;margin-left:-25px;"><strong>Alex ab roller</strong></p>
                                    <p class="text-nowrap fw-lighter p14b" style="margin-bottom: 0px;margin-left:-25px;"><strong>0:19 Mins</strong></p>
                                </div>
                                <div class="col-md-4 d-md-flex d-xl-flex d-xxl-flex align-items-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center">
                                    <button class="text-nowrap button1" type="button" style="width: auto;padding: 0px;padding-left: 10px;padding-right: 10px;font-size: 10px;height: auto;padding-top: 10px;padding-bottom: 10px;left:-10%;">Next Up</button></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center divcard" style="border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;padding: 10px;width: auto;">
                        <div class="container d-md-flex align-items-md-center" style="width: auto;">
                            <div class="box row"style="right:-15%;">
                                <div class="col-md-4 d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center">
                                    <img src="../themes/tailwind/images/clipboard-image-72.png" style="width: 59px;"></div>
                                <div class="col-md-4 d-xl-flex d-xxl-flex flex-column justify-content-xl-center align-items-xl-start justify-content-xxl-center align-items-xxl-start">
                                    <p class="text-nowrap d-xl-flex d-xxl-flex justify-content-xxl-start p18b" style="margin-bottom: 0px;margin-left:-25px;"><strong>Swimming Tips</strong></p>
                                    <p class="text-nowrap fw-lighter p14b" style="margin-bottom: 0px;margin-left:-25px;"><strong>0:19 Mins</strong></p>
                                </div>
                                <div class="col-md-4 d-md-flex d-xl-flex d-xxl-flex align-items-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center">
                                    <button class="text-nowrap button1" type="button" style="width: auto;padding: 0px;padding-left: 10px;padding-right: 10px;font-size: 10px;height: auto;padding-top: 10px;padding-bottom: 10px;left:-10%;">Next Up</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

@section('javascript')
<script></script>
@endsection