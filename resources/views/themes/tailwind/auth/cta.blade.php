@extends('theme::layouts.customer-login')

@section('content')
<style>


.reset-password {
  background: var(--appcolortone-bg-color, #f1f2f9);
  height: 1200px;
  position: relative;
  overflow: hidden;
}
.frame-52441 {
  display: flex;
  flex-direction: column;
  gap: 70px;
  align-items: flex-start;
  justify-content: flex-start;
  position: absolute;
  left: calc(50% - 171.5px);
  top: 441.5px;
  border: 0;
  outline: none;
  box-shadow: none;
}
.frame-52440 {
  border: 0;
  outline: none;
  box-shadow: none;
  display: flex;
  flex-direction: column;
  gap: 83px;
  align-items: flex-start;
  justify-content: flex-start;
  flex-shrink: 0;
  position: relative;
}
.frame-52439 {
  display: flex;
  flex-direction: column;
  gap: 27px;
  align-items: flex-start;
  justify-content: flex-start;
  flex-shrink: 0;
  position: relative;
}
.frame-52438 {
  display: flex;
  flex-direction: row;
  gap: 78px;
  align-items: center;
  justify-content: flex-start;
  flex-shrink: 0;
  position: relative;
}
.arw {
  flex-shrink: 0;
  width: 31px;
  height: 31px;
  position: relative;
  overflow: visible;
}
.title {
  flex-shrink: 0;
  width: 127px;
  height: 22px;
  position: static;
}
.reset-password2 {
  color: var(--appcolortone-primary, #171433);
  text-align: center;
  font-family: "Barlow-SemiBold", sans-serif;
  font-size: 18px;
  font-weight: 600;
  position: absolute;
  right: 0%;
  left: 46.19%;
  width: 53.81%;
  bottom: 14.52%;
  top: 14.52%;
  height: 70.97%;
}
.content {
  flex-shrink: 0;
  width: 342.36px;
  height: 24px;
  position: static;
}
.enter-new-password {
  color: rgba(23, 20, 51, 0.7);
  text-align: center;
  font-family: "Barlow-Medium", sans-serif;
  font-size: 16px;
  line-height: 24px;
  font-weight: 500;
  position: absolute;
  right: 0%;
  left: 0%;
  width: 100%;
  top: 58px;
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
  border: none; /* Add this line to remove the border */
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
.eye-icn {
  height: auto;
  position: absolute;
  right: 0%;
  left: 0%;
  width: 100%;
  bottom: 0%;
  top: 0%;
  height: 100%;
  overflow: visible;
}
.eye-icn2 {
  height: auto;
  position: absolute;
  right: 0%;
  left: 0%;
  width: 100%;
  bottom: 0%;
  top: 0%;
  height: 100%;
  overflow: visible;
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
  border-radius: 130.5px;
  position: absolute;
  right: 0%;
  left: 0%;
  width: 116%;
  bottom: 0%;
  top: -50%;
  height: 80px;
  margin-left: -15px;
  display: flex;
    align-items: center;
    justify-content: center;
}
.sign-up {
  color: #ffffff;
  text-align: center;
  font-family: "Barlow-Medium", sans-serif;
  font-size: 24px;
  font-weight: 500;
  position: absolute;
  right: 36.77%;
  left: 39.77%;
  width: 26.47%;
  bottom: 33.33%;
  top: -13.33%;
  height: 33.33%;
}
.transparent-bg {
  background: var(--appcolortone-black-50, rgba(0, 0, 0, 0.5));
  width: 1920px;
  height: 1200px;
  position: absolute;
  left: 0px;
  top: 0px;
}
.frame-52442 {
  width: 325.5px;
  height: 509px;
  position: absolute;
  left: calc(50% - 162.75px);
  top: calc(50% - 234.5px);
  right: calc(10% -10px);
}
.bg4 {
  background: var(--appcolortone-secondary-2, #aac9e4);
  border-radius: 200px;
  width: 335.5px;
  height: 509px;
  position: absolute;
  left: 10px;
  top: 0px;
}
.key-vector {
  height: auto;
  position: absolute;
  right: 20.08%;
  left: 14.89%;
  width: 71.03%;
  bottom: 47.74%;
  top: 9.63%;
  height: 42.63%;
  overflow: visible;
}
.content2 {
  position: absolute;
  inset: 0;
}
.your-password-has-been-reset {
  color: var(--appcolortone-secondary-1, #233656);
  text-align: center;
  font-family: "Barlow-SemiBold", sans-serif;
  font-size: 20px;
  line-height: 24px;
  font-weight: 600;
  position: absolute;
  left: 82.5px;
  top: 302px;
  width: 181.75px;
  height: 56px;
}
.button2 {
  position: absolute;
  inset: 0;
  left: 30px;
}
.shadow2 {
  height: auto;
  position: absolute;
  right: 19.64%;
  left: 20.13%;
  width: 60.23%;
  bottom: 12.18%;
  top: 80.55%;
  height: 7.27%;
  overflow: visible;
}
.bg6 {
  height: auto;
  position: absolute;
  right: 18.99%;
  left: 19.48%;
  width: 61.54%;
  bottom: 13.16%;
  top: 75.44%;
  height: 11.39%;
  overflow: visible;
}
.done {
  color: #ffffff;
  text-align: center;
  font-family: "Barlow-Medium", sans-serif;
  font-size: 18px;
  font-weight: 500;
  position: absolute;
  right: 43.04%;
  left: 43.54%;
  width: 13.42%;
  bottom: 16.7%;
  top: 78.98%;
  height: 4.32%;
}

.bg {
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
  margin-left: -5px;
}
body {
    overflow: hidden;
    margin-top: -300px;
  } 
  .textField {
  box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);
  height: 80px;
  background-color: transparent;
  margin-top: 20px;
  border-radius: 130.5px;
  border: 3px solid var(--app-color-tone-secondary-150, rgba(35, 54, 86, 0.50));
  font-family: Barlow;
  font-size: 24px;
  font-style: normal;
  font-weight: 500;
  line-height: normal;
  width:150%;
  margin-left: -40px;
}
.frame-15 {
  display: flex;
  flex-direction: column;
  gap: 10px;
  align-items: flex-start;
  justify-content: flex-start;
  flex-shrink: 0;
  position: relative;
  border: 0;
  outline: none;
  box-shadow: none;
  margin: 0;
    padding: 0;
    left:8.5%;
    top: -30px;
}

</style>
<body>
<div class="reset-password">
    <div class="frame-52441">
      <div class="frame-52440">
        <div class="frame-52439">
          <div class="frame-52438">
            <svg
              class="arw"
              width="32"
              height="32"
              viewBox="0 0 32 32"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <g filter="url(#filter0_d_5706_98362)">
                <rect
                  x="0.5"
                  y="0.5"
                  width="31"
                  height="31"
                  rx="8"
                  fill="white"
                />
                <path
                  d="M12.689 16.7789L17.955 21.9613C18.0767 22.0805 18.2413 22.1475 18.413 22.1475C18.5847 22.1475 18.7494 22.0805 18.871 21.9613L19.259 21.5795C19.3804 21.4599 19.4486 21.2978 19.4486 21.1287C19.4486 20.9597 19.3804 20.7976 19.259 20.678L14.837 16.3262L19.264 11.9695C19.3852 11.8498 19.4532 11.6877 19.4532 11.5187C19.4532 11.3498 19.3852 11.1877 19.264 11.068L18.876 10.6862C18.7544 10.5669 18.5897 10.5 18.418 10.5C18.2464 10.5 18.0817 10.5669 17.96 10.6862L12.689 15.8745C12.5679 15.9948 12.5 16.1573 12.5 16.3267C12.5 16.4961 12.5679 16.6586 12.689 16.7789Z"
                  fill="#171433"
                />
              </g>
              <defs>
                <filter
                  id="filter0_d_5706_98362"
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
                    result="effect1_dropShadow_5706_98362"
                  />
                  <feBlend
                    mode="normal"
                    in="SourceGraphic"
                    in2="effect1_dropShadow_5706_98362"
                    result="shape"
                  />
                </filter>
              </defs>
            </svg>
            <div class="title">
              <div class="reset-password2">Reset Password</div>
            </div>
          </div>
          <div class="content">
            <div class="enter-new-password">Enter new password</div>
          </div>
        </div>
        <div class="frame-15">
          <div>
            <div class="bg2"></div>
            <input id="password" class="form-control textField" type="password" name="password" placeholder=" New Password" class="w-full form-input">
            <div class="frame-2608721" style="border: none;">
            </div>
          </div>
          <div>
            <div class="bg2"></div>
            <input id="password_confirmation" class="form-control textField" type="password" name="password_confirmation" placeholder="Confirm password" required class="w-full form-input">
            <div class="frame-2608721" style="border: none;">
            </div>
          </div>
        </div>
      </div>
      <div class="button">
        <div class="shadow"></div>
        <div class="bg3"></div>
        <div class="sign-up">Change</div>
      </div>
      
    </div>
    <div class="transparent-bg"></div>
    <div class="frame-52442 ">
      <div class="bg4" style="margin-right: 20px;"></div>
      <svg
        class="key-vector"
        width="218"
        height="218"
        viewBox="0 0 218 218"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
        style="margin-right: 20px;"
      >
        <path
          opacity="0.05"
          d="M109.25 217.5C169.173 217.5 217.75 168.923 217.75 109C217.75 49.0771 169.173 0.5 109.25 0.5C49.3271 0.5 0.75 49.0771 0.75 109C0.75 168.923 49.3271 217.5 109.25 217.5Z"
          stroke="#233656"
          stroke-width="30"
          transform="translate(10, 0)"
        />
        <path
          d="M81.6058 119.467C80.0123 119.099 78.3454 119.211 76.8159 119.79C75.2864 120.37 73.9631 121.389 73.0132 122.721C72.0633 124.052 71.5295 125.635 71.4793 127.27C71.4292 128.905 71.8649 130.518 72.7314 131.905C73.5979 133.292 74.8562 134.391 76.3473 135.063C77.8384 135.735 79.4952 135.949 81.1083 135.679C82.7214 135.41 84.2182 134.668 85.4096 133.547C86.601 132.427 87.4334 130.978 87.8015 129.385C88.2923 127.248 87.9157 125.004 86.7542 123.145C85.5927 121.285 83.7412 119.963 81.6058 119.467V119.467ZM79.124 130.21C78.5927 130.087 78.1097 129.81 77.7362 129.412C77.3626 129.015 77.1152 128.516 77.0253 127.978C76.9353 127.44 77.0069 126.888 77.2309 126.391C77.455 125.894 77.8214 125.474 78.2839 125.185C78.7463 124.896 79.2841 124.751 79.8291 124.768C80.3742 124.785 80.902 124.963 81.3459 125.279C81.7898 125.596 82.1298 126.037 82.3229 126.547C82.516 127.057 82.5536 127.613 82.4309 128.144C82.2656 128.856 81.8245 129.474 81.2046 129.861C80.5847 130.248 79.8364 130.374 79.124 130.21Z"
          fill="#233656"
          transform="translate(10, 0)"
        />
        <path
          d="M162.925 78.0215C163.044 77.3694 162.924 76.6961 162.587 76.1256C162.249 75.5551 161.716 75.1259 161.087 74.9171L161.072 74.9138L140.299 68.1113C139.653 67.8999 138.952 67.9346 138.33 68.2087C137.708 68.4828 137.209 68.9769 136.929 69.5962L133.595 76.9773L125.496 76.7377C124.952 76.7215 124.416 76.8667 123.954 77.155C123.492 77.4433 123.127 77.8618 122.903 78.3577L119.567 85.7396L111.472 85.4989C110.992 85.4847 110.517 85.5962 110.093 85.8222C109.67 86.0483 109.312 86.3811 109.057 86.7877L103.781 95.1802C97.8811 91.9349 91.0663 90.7539 84.4186 91.8246C77.771 92.8953 71.6716 96.1564 67.0894 101.09C62.5071 106.024 59.7045 112.347 59.1269 119.055C58.5492 125.764 60.2296 132.473 63.901 138.117C67.5725 143.762 73.0246 148.017 79.3913 150.209C85.7581 152.4 92.6745 152.401 99.0421 150.212C105.41 148.023 110.863 143.769 114.537 138.127C118.21 132.484 119.893 125.775 119.318 119.066L158.154 95.071C158.464 94.8796 158.733 94.6286 158.945 94.3327C159.157 94.0367 159.309 93.7016 159.391 93.3468L162.901 78.1514C162.912 78.1078 162.917 78.0648 162.925 78.0215ZM83.5131 145.854C79.9586 145.035 76.6285 143.441 73.7604 141.188C70.8922 138.934 68.5566 136.075 66.92 132.815C65.2833 129.556 64.386 125.975 64.2919 122.328C64.1979 118.682 64.9095 115.059 66.3759 111.72C67.8423 108.38 70.0275 105.404 72.7756 103.006C75.5238 100.607 78.7673 98.8445 82.2748 97.8432C85.7824 96.8419 89.4676 96.6267 93.0679 97.213C96.6681 97.7993 100.095 99.1726 103.103 101.235C103.409 101.444 103.755 101.59 104.118 101.662C104.482 101.735 104.857 101.734 105.22 101.658C105.583 101.583 105.927 101.435 106.232 101.224C106.536 101.012 106.795 100.741 106.993 100.427L112.883 91.0574L121.239 91.306C121.783 91.3223 122.32 91.1771 122.781 90.8888C123.243 90.6006 123.609 90.1821 123.833 89.6862L127.169 82.3033L135.268 82.543C135.812 82.5591 136.349 82.4139 136.81 82.1256C137.272 81.8373 137.638 81.4188 137.862 80.9229L140.934 74.1214L153.723 78.307L111.024 104.736C110.715 104.927 110.447 105.177 110.235 105.472C110.024 105.767 109.872 106.101 109.79 106.454C109.707 106.808 109.696 107.174 109.755 107.532C109.815 107.89 109.944 108.233 110.136 108.541C121.761 127.145 105.06 150.831 83.5131 145.854ZM154.279 90.9841L118.236 113.252C117.712 111.452 117.022 109.703 116.174 108.03L156.039 83.3562L154.279 90.9841Z"
          fill="#233656"
        />
      </svg>
      <div class="content2">
        <div class="your-password-has-been-reset">
          Your Password has been reset!
        </div>
      </div>
      <div class="button2">
        <svg
          class="shadow2"
          width="185"
          height="38"
          viewBox="0 0 185 38"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <g filter="url(#filter0_f_5706_97580)">
            <path
              d="M166.25 0.5H19.25C9.03273 0.5 0.75 8.78273 0.75 19C0.75 29.2173 9.03273 37.5 19.25 37.5H166.25C176.467 37.5 184.75 29.2173 184.75 19C184.75 8.78273 176.467 0.5 166.25 0.5Z"
              fill="#233656"
            />
          </g>
          <defs>
            <filter
              id="filter0_f_5706_97580"
              x="-34.25"
              y="-34.5"
              width="254"
              height="107"
              filterUnits="userSpaceOnUse"
              color-interpolation-filters="sRGB"
            >
              <feFlood flood-opacity="0" result="BackgroundImageFix" />
              <feBlend
                mode="normal"
                in="SourceGraphic"
                in2="BackgroundImageFix"
                result="shape"
              />
              <feGaussianBlur
                stdDeviation="17.5"
                result="effect1_foregroundBlur_5706_97580"
              />
            </filter>
          </defs>
        </svg>
        <a href="{{ route('auth-login') }}" class="your-link-class">
            <svg class="bg6" width="189" height="59" viewBox="0 0 189 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M159.75 0.5H29.75C13.7337 0.5 0.75 13.4837 0.75 29.5C0.75 45.5163 13.7337 58.5 29.75 58.5H159.75C175.766 58.5 188.75 45.5163 188.75 29.5C188.75 13.4837 175.766 0.5 159.75 0.5Z" fill="#233656" />
            </svg>
            <div class="done">
                <span>Done</span>
            </div>
        </a>
      </div>
    </div>
  </div>
</form>
</body>

@endsection