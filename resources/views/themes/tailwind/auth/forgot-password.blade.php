@extends('theme::layouts.customer-login')

@section('content')
<style>
.frame-52434,
.frame-52434 * {
  box-sizing: border-box;
}
.frame-52434 {
  display: flex;
  flex-direction: column;
  gap: 57px;
  align-items: flex-start;
  justify-content: flex-start;
  position: relative;
}
.frame-52433 {
  display: flex;
  flex-direction: column;
  gap: 27px;
  align-items: flex-start;
  justify-content: flex-start;
  flex-shrink: 0;
  position: relative;
}
.frame-52432 {
  display: flex;
  flex-direction: row;
  gap: 74px;
  align-items: center;
  justify-content: flex-start;
  flex-shrink: 0;
  position: relative;
}
.arw,
.arw * {
  box-sizing: border-box;
}
.arw {
  flex-shrink: 0;
  width: 31px;
  height: 31px;
  position: relative;
  overflow: visible;
customer.
  color: var(--appcolortone-primary, #171433);
  text-align: center;
  font-family: "Barlow-SemiBold", sans-serif;
  font-size: 32px;
  font-weight: 600;
  position: absolute;
  right: 0%;
  left: 44.12%;
  width: 55.88%;
  bottom: 14.52%;
  top: 14.52%;
  height: 70.97%;
}
.content {
  flex-shrink: 0;
  width: 342.36px;
  height: 48px;
}
.please-enter-your-email-address-you-will-receive-a-link-to-create-a-new-password-via-email,
.please-enter-your-email-address-you-will-receive-a-link-to-create-a-new-password-via-email
  * {
  box-sizing: border-box;
}
.please-enter-your-email-address-you-will-receive-a-link-to-create-a-new-password-via-email {
  color: rgba(23, 20, 51, 0.7);
  text-align: center;
  font-family: "Barlow-Medium", sans-serif;
  font-size: 18px;
  line-height: 24px;
  font-weight: 500;
  position: relative;
    bottom:80%;
}
.frame-52431 {
  display: flex;
  flex-direction: column;
  gap: 22px;
  align-items: flex-start;
  justify-content: flex-start;
  flex-shrink: 0;
  position: relative;
}
.field-1 {
  flex-shrink: 0;
  width: 343px;
  height: 66px;
  position: relative;
  box-shadow: var(
    --app-dropshadow-box-shadow,
    0px 4px 4px 0px rgba(35, 54, 86, 0.5)
  );
}
.bg2 {
  border-radius: 33.5px;
  border-style: solid;
  border-color: var(--appcolortone-secondary-1-50, rgba(35, 54, 86, 0.5));
  border-width: 3px;
  position: absolute;
  right: 0%;
  left: 0%;
  width: 100%;
  bottom: 0%;
  top: 0%;
  height: 100%;
}
.full-name {
  color: var(--appcolortone-primary-1, rgba(23, 20, 51, 0.7));
  text-align: left;
  font-family: "Barlow-Medium", sans-serif;
  font-size: 17px;
  font-weight: 500;
  position: absolute;
  left: 32px;
  bottom: 36.36%;
  top: 33.33%;
  height: 30.3%;
  width: 250px;
}
.frame-2608721 {
  width: 21.99px;
  height: 16.5px;
  position: absolute;
  right: 23px;
  top: 24.76px;
}
.button {
  flex-shrink: 0;
  width: 343px;
  height: 66px;
  position: relative;
}
.shadow {
  background: var(--appcolortone-secondary-1-50, rgba(35, 54, 86, 0.5));
  border-radius: 33.5px;
  position: absolute;
  right: 0%;
  left: 0%;
  width: 100%;
  bottom: 0%;
  top: 43.94%;
  height: 56.06%;
  filter: blur(17.5px);
}
.bg3 {
  background: var(--appcolortone-secondary-1, #233656);
  position: absolute;
  right: 0%;
  left: 0%;
  width: 100%;
  bottom: 0%;
  top: 0%;
  height: 110%;
  border-radius: 130.5px;
}
.sign-up {
  color: #ffffff;
  text-align: center;
  font-family: "Barlow-Medium", sans-serif;
  font-size: 18px;
  font-weight: 500;
  position: absolute;
  right: 36.77%;
  left: 36.77%;
  width: 26.47%;
  bottom: 33.33%;
  top: 33.33%;
  height: 33.33%;
}


  .centered-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 30px; /* Adjust the gap between elements as needed */
  }
  .frame-52430 {
    text-align: center;
  }

  .frame-52431 {
    text-align: center;
  }
  .textField {
  box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);
  height: 75px;
  background-color: transparent;
  margin-top: 20px;
  border-radius: 130.5px;
  border: 3px solid var(--app-color-tone-secondary-150, rgba(35, 54, 86, 0.50));
  font-family: Barlow;
  font-size: 17px;
  font-style: normal;
  font-weight: 500;
  line-height: normal;
  width:100%;
  }
  .create-new-account,
.create-new-account * {
  box-sizing: border-box;
}
.create-new-account {
  color: var(--appcolortone-primary, #171433);
  text-align: center;
  font-family: "Barlow-SemiBold", sans-serif;
  font-size: 30px;
  font-weight: 600;
  position: relative;


}
</style>

<div class="centered-container" style="margin-bottom:30px;">
    <form action="{{ route('customer.forgot-password') }}" method="post">
        @csrf 
        <div class="frame-52430" style="display: flex; flex-direction: column; align-items: center;margin-bottom: 60px;">
            <svg
    class="arw"
    width="24"
    height="24"
    viewBox="0 0 32 32"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
    style="margin-left: -180px;height:40px;width:40px;margin-top:70px;"
>
    <g filter="url(#filter0_d_5706_96300)">
        <a href="{{ route('auth-login') }}">
            <rect x="0.5" y="0.5" width="31" height="31" rx="8" fill="white" />
        </a>
        <path
            d="M12.689 16.7789L17.955 21.9613C18.0767 22.0805 18.2413 22.1475 18.413 22.1475C18.5847 22.1475 18.7494 22.0805 18.871 21.9613L19.259 21.5795C19.3804 21.4599 19.4486 21.2978 19.4486 21.1287C19.4486 20.9597 19.3804 20.7976 19.259 20.678L14.837 16.3262L19.264 11.9695C19.3852 11.8498 19.4532 11.6877 19.4532 11.5187C19.4532 11.3498 19.3852 11.1877 19.264 11.068L18.876 10.6862C18.7544 10.5669 18.5897 10.5 18.418 10.5C18.2464 10.5 18.0817 10.5669 17.96 10.6862L12.689 15.8745C12.5679 15.9948 12.5 16.1573 12.5 16.3267C12.5 16.4961 12.5679 16.6586 12.689 16.7789Z"
            fill="#171433"
        />
    </g>
    <defs>
        <filter
            id="filter0_d_5706_96300"
            x="-3.5"
            y="0.5"
            width="39"
            height="39"
            filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB"
        >
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feColorMatrix
                in="SourceAlpha"
                type="matrix"
                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                result="hardAlpha"
            />
            <feOffset dy="4" />
            <feGaussianBlur stdDeviation="2" />
            <feComposite in2="hardAlpha" operator="out" />
            <feColorMatrix
                type="matrix"
                values="0 0 0 0 0.137255 0 0 0 0 0.211765 0 0 0 0 0.337255 0 0 0 0.5 0"
            />
            <feBlend
                mode="normal"
                in2="BackgroundImageFix"
                result="effect1_dropShadow_5706_96300"
            />
            <feBlend
                mode="normal"
                in="SourceGraphic"
                in2="effect1_dropShadow_5706_96300"
                result="shape"
            />
        </filter>
    </defs>
</svg>

                <div class="create-new-account" style = "margin-top:160px;">Forgot Password</div>        
            </div>
            <div class="content">
                <div class="please-enter-your-email-address-you-will-receive-a-link-to-create-a-new-password-via-email">
                    Please enter your email address. You will receive a link to create a new
                    password via email.
                </div>
            </div>
            <div style="height: auto;">
                <input class="form-control textField" type="text" name="email" placeholder="Email Address" required />
            </div>
            <button type="submit" class="button" style="margin-top: 40px; border: none;background:none;">
                <div class="shadow"></div>
                <div class="bg3"></div>
                <div class="sign-up">Submit</div>
            </button>
        </div>
    </form>
</div>

@endsection