@extends('theme::layouts.customer-login')

@section('content')
    <style>
        .email-verification,
        .email-verification * {
            box-sizing: border-box;
        }

        .email-verification {
            background: var(--appcolortone-bg-color, #f1f2f9);
            width: 1920px;
            height: 1200px;
            position: relative;
            overflow: hidden;
        }

        body {
            margin: 0;
            overflow-x: hidden;
            overflow-y: hidden;
            background: #F1F2F9;
        }

        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .frame-52437 {
            display: flex;
            flex-direction: column;
            gap: 84px;
            align-items: center;
            justify-content: flex-start;
            position: absolute;
            left: calc(50% - 172.5px);
            top: calc(50% - 226.5px);
        }

        .frame-52436 {
            flex-shrink: 0;
            width: 345px;
            height: 303px;
            position: relative;
        }

        .content {
            position: absolute;
            inset: 0;
        }

        .enter-your-otp-here {
            color: rgba(23, 20, 51, 0.7);
            text-align: center;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            line-height: 24px;
            font-weight: 500;
            position: absolute;
            right: 7.68%;
            left: 7.84%;
            width: 84.48%;
            top: 57.5px;
        }

        .didn-t-you-received-any-code {
            color: rgba(23, 20, 51, 0.7);
            text-align: center;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            line-height: 24px;
            font-weight: 500;
            position: absolute;
            right: 7.68%;
            left: 7.84%;
            width: 84.48%;
            top: 252px;
        }

        .resend-code {
            color: var(--appcolortone-secondary-1, #233656);
            text-align: center;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            line-height: 24px;
            font-weight: 500;
            text-decoration: underline;
            position: absolute;
            right: 7.68%;
            left: 7.84%;
            width: 84.48%;
            top: 279px;
        }

        .otp {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            justify-content: space-between;
            position: absolute;
            right: 0%;
            left: 0%;
            width: 100%;
            top: calc(50% - -9.38px);
            caret-color: transparent;
        }

        .group-2980 {
            flex-shrink: 0;
            width: 64px;
            height: 64.25px;
            position: static;
        }

        .bg {
            background: var(--appcolortone-secondary-2, #aac9e4);
            border-radius: 23px;
            width: 64px;
            height: 64px;
            position: absolute;
            left: 0px;
            top: 0px;
            box-shadow: var(--app-dropshadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .bg2 {
            background: #ffffff;
            border-radius: 23px;
            flex-shrink: 0;
            width: 64px;
            height: 64px;
            position: relative;
            box-shadow: var(--app-dropshadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .frame-52435 {
            display: flex;
            flex-direction: row;
            gap: 71px;
            align-items: center;
            justify-content: flex-start;
            position: absolute;
            left: 1px;
            top: 0px;
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
            width: 140px;
            height: 22px;
            position: static;
        }

        .email-verification2 {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 600;
            position: absolute;
            right: 0%;
            left: 42.15%;
            width: 57.85%;
            bottom: 14.52%;
            top: 14.52%;
            height: 70.97%;
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

        .bg4 {
            background: var(--appcolortone-secondary-1, #233656);
            border-radius: 33.5px;
            position: absolute;
            right: 0%;
            left: 0%;
            width: 100%;
            bottom: 0%;
            top: 0%;
            height: 100%;
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
    </style>
    </head>

    <body>
        <input type="hidden" name="token" value="{{ session('registration_token') }}">
        <div class="centered">
            <form method="POST" action="{{ route('verify-otp') }}" class="email-verification">
                @csrf
                <div class="frame-52437">
                    <div class="frame-52436">
                        <div class="content">
                            <div class="enter-your-otp-here">Enter your OTP here</div>
                            <div class="didn-t-you-received-any-code">
                                Didn't you receive any code?
                            </div>
                            <a href="{{ route('resend-otp') }}" class="resend-code"
                                style="text-decoration: none; border: none;">Resend code</a>

                        </div>
                        <div class="otp">
                            <div class="bg2" contenteditable="true" data-index="0" oninput="handleInput(this)"></div>
                            <div class="bg2" contenteditable="true" data-index="1" oninput="handleInput(this)"></div>
                            <div class="bg2" contenteditable="true" data-index="2" oninput="handleInput(this)"></div>
                            <div class="bg2" contenteditable="true" data-index="3" oninput="handleInput(this)"></div>
                        </div>
                        <div class="frame-52435">
                            <svg class="arw" width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_5706_96300)">
                                    <a href="{{ route('register') }}">
                                        <rect x="0.5" y="0.5" width="31" height="31" rx="8" fill="white" />
                                    </a>
                                    <path
                                        d="M12.689 16.7789L17.955 21.9613C18.0767 22.0805 18.2413 22.1475 18.413 22.1475C18.5847 22.1475 18.7494 22.0805 18.871 21.9613L19.259 21.5795C19.3804 21.4599 19.4486 21.2978 19.4486 21.1287C19.4486 20.9597 19.3804 20.7976 19.259 20.678L14.837 16.3262L19.264 11.9695C19.3852 11.8498 19.4532 11.6877 19.4532 11.5187C19.4532 11.3498 19.3852 11.1877 19.264 11.068L18.876 10.6862C18.7544 10.5669 18.5897 10.5 18.418 10.5C18.2464 10.5 18.0817 10.5669 17.96 10.6862L12.689 15.8745C12.5679 15.9948 12.5 16.1573 12.5 16.3267C12.5 16.4961 12.5679 16.6586 12.689 16.7789Z"
                                        fill="#171433" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_5706_96300" x="-3.5" y="0.5" width="39" height="39"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="4" />
                                        <feGaussianBlur stdDeviation="2" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0.137255 0 0 0 0 0.211765 0 0 0 0 0.337255 0 0 0 0.5 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_5706_96300" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_5706_96300"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                            <div class="title">
                                <div class="email-verification2">Email Verification</div>
                            </div>
                        </div>
                    </div>
               
                    <button type="submit" class="button" style="border: none;">
                        <div class="shadow"></div>
                        <div class="bg4"></div>
                        <div class="sign-up">Verify<input type="hidden" id="combinedInput" name="combinedInput" value=""></div>
                    </button>
                </div>
        </div>
        </div>
        <script>
            const otpDigits = ["", "", "", ""];

            function handleInput(element) {
                const index = element.getAttribute("data-index");
                const userInput = element.textContent.trim();

                // Apply styles
                applyStyles(element);

                // Limit input to one character
                const firstCharacter = userInput.charAt(0);
                element.textContent = firstCharacter;

                otpDigits[index] = firstCharacter;

                // Automatically move to the next box
                moveToNextElement(element);

                // Combine content and auto-submit if all boxes are filled
                combineContent();
            }

            function applyStyles(element) {
                element.style.background = '#AAC9E4';
                element.style.color = '#ffffff';
                element.style.textAlign = 'center';
                element.style.fontFamily = '"Rpwebaleway-Medium", sans-serif';
                element.style.fontSize = '30px';
                element.style.fontWeight = '500';
                element.style.lineHeight = '1'; // Set line-height to eliminate spacing
                element.style.caretColor = 'transparent'; // Hide the blinking cursor
                element.style.display = 'flex';
                element.style.alignItems = 'center';
                element.style.justifyContent = 'center';
            }

            function resetStyles(element) {
                element.style.background = '#ffffff';
                element.style.color = ''; // You can set the color to the default color if needed
                element.style.textAlign = '';
                element.style.fontFamily = '';
                element.style.fontSize = '';
                element.style.fontWeight = '';
            }

            function moveToNextElement(element) {
                const index = parseInt(element.getAttribute("data-index"));
                if (index < 3) {
                    const nextElement = document.querySelector(`[data-index="${index + 1}"]`);
                    if (nextElement && nextElement.contentEditable === 'true') {
                        nextElement.focus();
                    }
                }
            }

            function combineContent() {
                const combinedContent = otpDigits.join('');
                if (combinedContent.length === 4) {
                  document.getElementById('combinedInput').value = combinedContent;
                    console.log("OTP submitted:", combinedContent);
                }
            }

            // Allow using backspace to delete a digit
            document.addEventListener("keydown", function(e) {
    const key = e.key.toLowerCase();
    if (key === "backspace") {
        const focusedElement = document.activeElement;
        const index = parseInt(focusedElement.getAttribute("data-index"));
        if (index > 0) {
            const prevElement = document.querySelector(`[data-index="${index - 1}"]`);
            if (prevElement && prevElement.contentEditable === 'true') {
                resetStyles(focusedElement); // Reset styles
                prevElement.focus();
                focusedElement.innerText = "";
                otpDigits[index] = ""; // Update the correct index
            }
        } else if (index === 0) { // If the first input box
            resetStyles(focusedElement); // Reset styles
            focusedElement.innerText = ""; // Clear the content
            otpDigits[index] = ""; // Update the correct index
        }
    }
});
        </script>
        </form>
    </body>

    </html>
