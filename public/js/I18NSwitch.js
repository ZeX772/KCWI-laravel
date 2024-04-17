document.addEventListener("DOMContentLoaded", function() {
    class CountryFlags {
        static BRAZIL         = "https://unpkg.com/i18n-switch@2.0.0/assets/brazil.png";
        static CHINA          = "https://unpkg.com/i18n-switch@2.0.1/assets/china.png";
        static FRANCE         = "https://unpkg.com/i18n-switch@2.0.1/assets/france.png";
        static GERMANY        = "https://unpkg.com/i18n-switch@2.0.1/assets/germany.png";
        static INDIA          = "https://unpkg.com/i18n-switch@2.0.1/assets/india.png";
        static ITALY          = "https://unpkg.com/i18n-switch@2.0.1/assets/italy.png";
        static JAPAN          = "https://unpkg.com/i18n-switch@2.0.1/assets/japan.png";
        static PORTUGAL       = "https://unpkg.com/i18n-switch@2.0.1/assets/portugal.png";
        static RUSSIA         = "https://unpkg.com/i18n-switch@2.0.1/assets/russia.png";
        static SPAIN          = "https://unpkg.com/i18n-switch@2.0.1/assets/spain.png";
        static UNITED_KINGDOM = "https://unpkg.com/i18n-switch@2.0.1/assets/united-kingdom.png";
        static UNITED_STATES  = "https://unpkg.com/i18n-switch@2.0.0/assets/united-states.png";
        static HONG_KONG      = "https://hatscripts.github.io/circle-flags/flags/hk.svg";
    }

    class I18NSwitch {
        constructor(id, main, secondary, general = {}) {
            this.on = true;    
            this.id = id;
            this.main = main;
            this.secondary = secondary;
            this.general = general;
            this.initialized = false;
            this.languageInput = document.getElementById('selectedLanguage');

            if (this.languageInput.value === "") {
                this.languageInput.value = 'en';
            }

            console.log("Language Input:", this.languageInput);
            this.onChange = () => {};
   

            // Initializes the component
            const container = document.getElementById(this.id);
            console.log("Container:", container);      
            this.change();
            container.addEventListener('click', () => {
                console.log("Switcher clicked", this.languageInput.value);
                this.change();    
                switchLanguage(this.languageInput.value);
            });
        }

        onChange = (func) => {
            this.onChange = func;
        }

        isMainLanguageOn = () => {
            console.log("isMainLanguageOn:", this.on);
            return this.on != true;
        }
        
        isSecondaryLanguageOn = () => {
            console.log("isSecondaryLanguageOn:", this.on);
            return this.on == true;
        }

        change = () => {
            const container = document.getElementById(this.id);
            console.log("Change Function Called");
            const currentLanguage = this.languageInput.value; // Retrieve language value from hidden input field
            console.log("Current Language:", $("#selectedLanguage").val());
        

            // Toggle between main and secondary language based on the retrieved language value
            if (this.initialized){
                if (currentLanguage === 'en') {
                    console.log("Switching to main language");
                    this.toggleLanguage(container);
                } else if (currentLanguage === 'zh_HK') {
                    console.log("Switching to secondary language");
                    this.toggleLanguage(container);
                } else {
                    console.log("No language switch needed");
                }
            }

            if (!this.initialized){
                if(currentLanguage === 'en')
                {
                    console.log("Initialized English");
                    this.toggleLanguage(container);
                }
                else if (currentLanguage === 'zh_HK')
                {
                    console.log("Initialized Chinese");
                    this.toggleLanguage(container);
                }
            }

            // Trigger onChange function
            this.onChange();
        }
        

        toggleLanguage = (container) => {
            const playAnimation = (container) => {
                getTrigger(container).style.animation = "slidein .2s ease-out";
            };

            const playReverseAnimation = (container) => {
                getTrigger(container).style.animation = "slidein .2s ease-out reverse";
            };

            const getTrigger = (container) => {
                return document.querySelector(`#${this.id} > *`);
            };

            this.on = !this.on;

            if(!this.initialized)
            {
                if (this.languageInput.value === 'en')
                {
                    console.log('EN initialized');
                    this.languageInput.value = 'zh';
                    this.setLanguage(container, this.main.flag, 'en');
                    getTrigger(container).classList.remove("on");
                    //playReverseAnimation(container);
                }else if (this.languageInput.value === 'zh_HK')
                {
                    console.log('HK initialized');
                    this.languageInput.value = 'en';
                    this.setLanguage(container, this.secondary.flag, 'zh_HK');
                    getTrigger(container).classList.add("on");
                    //playAnimation(container);   
                }
                this.initialized = true;
            }else{
                if (this.languageInput.value === 'zh_HK') {
                    console.log('Switching to EN');
                    this.languageInput.value = 'en';
                    this.setLanguage(container, this.main.flag, 'en');
                    getTrigger(container).classList.remove("on");
                    playReverseAnimation(container);
                } else if (this.languageInput.value === 'en'){
                    console.log('Switching to HK');
                    this.languageInput.value = 'zh_HK';
                    this.setLanguage(container, this.secondary.flag, 'zh_HK');
                    //getTrigger(container).classList.add("on");
                    playAnimation(container);                
                }
            }


            setTimeout(() => {
                getTrigger(container).style.animation = "";
                if (this.on && this.languageInput.value === 'zh_HK') {
                    getTrigger(container).classList.add('on');
                }
                this.onChange();
            }, 135);
        }

        getTrigger = (container) => {
            return container.querySelector(`#${this.id} > *`);
        }

        setLanguage = (container, flagURL, languageCode) => {
            this.getTrigger(container).style.backgroundImage = `url('${flagURL}')`;
            this.getTrigger(container).setAttribute('data-value', languageCode);
            this.languageInput.value = languageCode; // Update hidden input field value
        }
    }

    // Usage
    const langSwitch = new I18NSwitch(
        "i18n-switch",
        {
            flag: CountryFlags.UNITED_STATES,
        },
        {
            flag: CountryFlags.HONG_KONG,
        }
    );

    langSwitch.onChange(() => {
        // Add any additional logic here to handle changes in the language switcher
    });

    function switchLanguage(lang) {
        console.log("lng now", lang);
        $.ajax({
            type: "GET",
            url: "/change-language/" + lang,
            success: (data) => {
                console.log("/change-language/" + lang); // Log the URL used in the AJAX request
                // Reload the page only if language was successfully changed
                location.reload(); // Reload the page after switching language
    
            },
            error: (error) => {
                console.log(error);
            }
        });
    }
});
