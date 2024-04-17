@extends('theme::layouts.app')

@section('content')
<style>
.reset-password,
.reset-password * {
  box-sizing: border-box;
}
.reset-password {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh; /* Set height to 100% of the viewport height for vertical centering */
  }
  /* Add the following styles to center the inner content */
  .frame-52441 {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
.frame-52440 {
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
  font-size: 32px;
  font-weight: 600;
  position: absolute;
  right: 0%;
  left: 30.19%;
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
  font-size: 24px;
  line-height: 24px;
  font-weight: 500;
  position: absolute;
  right: 0%;
  left: 7%;
  width: 100%;
  top: 58px;
}
.frame-15 {
  display: flex;
  flex-direction: column;
  gap: 20px;
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
.password-wrapper {
    position: relative;
}
.eye-icon {
    position: absolute;
    top: 50%;
    right: -65px;
    transform: translateY(-50%);
    cursor: pointer; 
    font-size: 24px;
}
.password-wrapper .form-control.textField[type="password"] {
    display: block;
}
.password-wrapper .form-control.textField[type="text"].visible {
    display: none;
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
  width: 120%;
  bottom: 0%;
  top: 0%;
  height: 80px;
  margin-left: -25px;
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
  right: 47.77%;
  left: 36.77%;
  width: 26.47%;
  bottom: 33.33%;
  top: 33.33%;
  height: 33.33%;
  margin-right: -60px;
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
  width:140%;
  margin-left: -15px;
}
.container {
            /* Adjust as needed */
            width: 80%;
            max-width: 400px; /* Example max-width, adjust as needed */
            text-align: center;
        }
        .eye-icon svg {
    width: 28px; /* Adjust the width to make the eye icon larger */
    height: 22px; /* Adjust the height to make the eye icon larger */
}
</style>

{{-- <form method="post"> --}}
  <form method="post" action="{{ route('reset_password', ['token' => $token]) }}">
    @csrf
    <div class="container">
    <div class="reset-password">
        <div class="frame-52441" style="display: flex; flex-direction: column; align-items: center;margin-bottom: 60px;">
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
                  <g filter="url(#filter0_d_5706_97833)">
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
                      id="filter0_d_5706_97833"
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
                        result="effect1_dropShadow_5706_97833"
                      />
                      <feBlend
                        mode="normal"
                        in="SourceGraphic"
                        in2="effect1_dropShadow_5706_97833"
                        result="shape"
                      />
                    </filter>
                  </defs>
                </svg>
                <div class="title"style="margin-bottom: 10px; white-space: nowrap;">
                  <div class="reset-password2">Reset Password</div>
                </div>
              </div>
              <div class="content">
                <div class="enter-new-password">Enter new password</div>
              </div>
            </div>
            <div class="mt-6">
              <div class="mt-3 rounded-md shadow-sm password-wrapper">
                  <input id="password" class="form-control textField" type="password" name="password" placeholder="New Password" class="w-full form-input">
                  <div id="togglePassword" class="frame-2608721 eye-icon" onclick="togglePassword()">
                      <svg class="eye-icn" width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.5082 2.58984C5.86322 2.58984 0.832222 8.45785 0.620222 8.70785C0.550166 8.79057 0.511719 8.89545 0.511719 9.00385C0.511719 9.11224 0.550166 9.21713 0.620222 9.29985C1.98126 10.837 3.54255 12.1843 5.26222 13.3058L8.13422 10.4338C7.851 9.76242 7.77441 9.0218 7.91426 8.30663C8.05411 7.59145 8.40404 6.93423 8.91932 6.41895C9.4346 5.90366 10.0918 5.55374 10.807 5.41389C11.5222 5.27404 12.2628 5.35062 12.9342 5.63385L15.2952 3.27285C14.0818 2.82823 12.8005 2.59714 11.5082 2.58984Z" fill="#AAC9E4"/>
                          <path d="M22.4197 8.74402C20.9946 6.82504 19.1765 5.23224 17.0867 4.07202L19.6187 1.54002C19.7046 1.45409 19.7529 1.33754 19.7529 1.21602C19.7529 1.0945 19.7046 0.977951 19.6187 0.892021C19.5327 0.806091 19.4162 0.757813 19.2947 0.757812C19.1731 0.757813 19.0566 0.806091 18.9707 0.892021L3.39267 16.47C3.30693 16.556 3.25879 16.6726 3.25879 16.794C3.25879 16.9155 3.30693 17.032 3.39267 17.118C3.43489 17.1608 3.48519 17.1947 3.54063 17.2179C3.59608 17.2411 3.65557 17.253 3.71567 17.253C3.83712 17.2529 3.95359 17.2047 4.03967 17.119L6.91267 14.246C8.33452 14.9805 9.90479 15.3819 11.5047 15.42C17.1497 15.42 22.1807 9.55202 22.3927 9.30202C22.4578 9.22486 22.4957 9.12843 22.5006 9.02759C22.5055 8.92675 22.477 8.8271 22.4197 8.74402ZM11.5047 12.67C10.6929 12.6665 9.9057 12.3912 9.26867 11.888L14.3877 6.76902C14.812 7.30793 15.0757 7.95564 15.1484 8.63772C15.2211 9.31979 15.0999 10.0085 14.7987 10.6248C14.4974 11.241 14.0284 11.7598 13.4456 12.1214C12.8627 12.483 12.1896 12.6728 11.5037 12.669L11.5047 12.67Z" fill="#AAC9E4"/>
                      </svg>
                  </div>
              </div>

          <div class="mt-6">
              <div class="mt-3 rounded-md shadow-sm password-wrapper ">
                  <input id="password_confirmation" class="form-control textField" type="password" name="password_confirmation" placeholder="Confirm password" required class="w-full form-input">
                  <div id="togglePassword_confirmation" class="frame-2608721 eye-icon" onclick="togglePasswordConfirmation()">
                      <svg class="eye-icn" width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.5082 2.58984C5.86322 2.58984 0.832222 8.45785 0.620222 8.70785C0.550166 8.79057 0.511719 8.89545 0.511719 9.00385C0.511719 9.11224 0.550166 9.21713 0.620222 9.29985C1.98126 10.837 3.54255 12.1843 5.26222 13.3058L8.13422 10.4338C7.851 9.76242 7.77441 9.0218 7.91426 8.30663C8.05411 7.59145 8.40404 6.93423 8.91932 6.41895C9.4346 5.90366 10.0918 5.55374 10.807 5.41389C11.5222 5.27404 12.2628 5.35062 12.9342 5.63385L15.2952 3.27285C14.0818 2.82823 12.8005 2.59714 11.5082 2.58984Z" fill="#AAC9E4"/>
                          <path d="M22.4197 8.74402C20.9946 6.82504 19.1765 5.23224 17.0867 4.07202L19.6187 1.54002C19.7046 1.45409 19.7529 1.33754 19.7529 1.21602C19.7529 1.0945 19.7046 0.977951 19.6187 0.892021C19.5327 0.806091 19.4162 0.757813 19.2947 0.757812C19.1731 0.757813 19.0566 0.806091 18.9707 0.892021L3.39267 16.47C3.30693 16.556 3.25879 16.6726 3.25879 16.794C3.25879 16.9155 3.30693 17.032 3.39267 17.118C3.43489 17.1608 3.48519 17.1947 3.54063 17.2179C3.59608 17.2411 3.65557 17.253 3.71567 17.253C3.83712 17.2529 3.95359 17.2047 4.03967 17.119L6.91267 14.246C8.33452 14.9805 9.90479 15.3819 11.5047 15.42C17.1497 15.42 22.1807 9.55202 22.3927 9.30202C22.4578 9.22486 22.4957 9.12843 22.5006 9.02759C22.5055 8.92675 22.477 8.8271 22.4197 8.74402ZM11.5047 12.67C10.6929 12.6665 9.9057 12.3912 9.26867 11.888L14.3877 6.76902C14.812 7.30793 15.0757 7.95564 15.1484 8.63772C15.2211 9.31979 15.0999 10.0085 14.7987 10.6248C14.4974 11.241 14.0284 11.7598 13.4456 12.1214C12.8627 12.483 12.1896 12.6728 11.5037 12.669L11.5047 12.67Z" fill="#AAC9E4"/>
                      </svg>
                  </div>
              </div>   
          </div>
        </div>
            </div>
          </div>
          <button type="submit" class="button" style="border: none;">
            <div class="shadow"></div>
            <div class="bg3"></div>
            <div class="sign-up">Change</div>
        </button>        
        </div>
      </div>
    </div>
      <script>
        function togglePassword() {
         const passwordInput = document.querySelector('#password');
 
     
 if (passwordInput.type === 'password') {
     passwordInput.type = 'text';
 } else {
     passwordInput.type = 'password';
 }
 
 const textPasswordInput = document.querySelector('.password-wrapper .textField[type="text"].visible');
 if (textPasswordInput.style.display === 'block') {
     textPasswordInput.style.display = 'none';
 } else {
     textPasswordInput.style.display = 'block';
 }
     }
     function togglePasswordConfirmation() {
         const passwordInput = document.querySelector('#password_confirmation');
         const textPasswordInput = document.querySelector('.password-confirmation-wrapper .textField[type="text"].visible-confirmation');
 
         if (passwordInput.type === 'password') {
             passwordInput.type = 'text';
         } else {
             passwordInput.type = 'password';
         }
 
         if (textPasswordInput.style.display === 'block') {
             textPasswordInput.style.display = 'none';
         } else {
             textPasswordInput.style.display = 'block';
         }
     }
 </script>
</form>
@endsection