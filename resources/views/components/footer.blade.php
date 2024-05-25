<footer class="footer" style="background-image: url('http://127.0.0.1:8000/UserLTE/assets/images/about-header-bg.jpg')">

    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
    {{-- Chat với AI --}}
    {{-- <img src="{{ asset('UserLTE/assets/images/chatbot/ai.png') }}" alt="Chatbot" class="chatbot-icon" id="chatbot-icon"
        width="60px" height="" style="padding-bottom: 2px; border-radius: 50%"> --}}

    {{-- Chat với Cửa --}}
    {{-- <a id="messenger" href="#" title="Chat với cửa hàng">
        <img src="{{ asset('UserLTE/assets/images/chatbot/real.png') }}" width="60px" height=""
            style="padding-bottom: 2px; border-radius: 50%">
    </a> --}}
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        <img src="{{ asset('UserLTE/assets/images/demos/demo-3/Logo.jpg') }}" class="footer-logo"
                            alt="Footer Logo" width="105" height="25" style="border-radius: 50px">
                        <p> NGO TAN LOI Digital Technologies Mang lại trải nghiệm mua sắm hơn cả tuyệt vời!</p>

                        <div class="widget-call">
                            <i class="icon-phone"></i>
                            Có một câu hỏi? Gọi cho chúng tôi 24/7
                            <a href="tel:#">033 712 0073</a>
                        </div><!-- End .widget-call -->
                    </div><!-- End .widget about-widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <ul class="widget-list">
                            <li><a href="#">{{ getConfigValueFromSettingTable('setting1') }}</a></li>
                            <li><a href="#">{{ getConfigValueFromSettingTable('setting2') }}</a></li>
                            <li><a href="#">{{ getConfigValueFromSettingTable('setting3') }}</a></li>
                            <li><a href="#">{{ getConfigValueFromSettingTable('setting4') }}</a></li>
                            <li><a href="#">{{ getConfigValueFromSettingTable('setting5') }}</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <ul class="widget-list">
                            <li><a href="#">{{ getConfigValueFromSettingTable('setting6') }}</a></li>
                            <li><a href="#">{{ getConfigValueFromSettingTable('setting7') }}</a></li>
                            <li><a href="#">{{ getConfigValueFromSettingTable('setting8') }}</a></li>
                            <li><a href="#">{{ getConfigValueFromSettingTable('setting9') }}</a></li>
                            <li><a href="#">{{ getConfigValueFromSettingTable('setting10') }}</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <ul class="widget-list">
                            <li><a href="#">Hệ thống cửa hàng</a></li>
                            <li><a href="#">Hệ thống cửa hàng</a></li>
                            <li><a href="#">Hệ thống bảo hành</a></li>
                            <li><a href="#">Giới thiệu máy đổi trả</a></li>
                            <li><a href="#">Tin khuyến mãi</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">{{ getConfigValueFromSettingTable('Copyright') }}</p>
            <!-- End .footer-copyright -->
            <figure class="footer-payments">
                <img src="{{ asset('UserLTE/assets/images/payments.png') }}" alt="Payment methods" width="272"
                    height="20">
            </figure><!-- End .footer-payments -->
        </div><!-- End .container -->
    </div><!-- End .footer-bottom -->

</footer><!-- End .footer -->
<!-- Biểu tượng Chatbot và khung chứa iframe -->
<div class="chatbot-icon-container" id="chatbot-icon-container">
    <div id="chatbot-tooltip" class="chatbot-tooltip">NgoTanLoi Digital Technology xin chào!</div>
    <img src="{{ asset('UserLTE/assets/images/chatbot/neo.jpg') }}" alt="Chatbot" class="chatbot-icon"
        id="chatbot-icon" width="60px" height="" style="border-radius: 50%; cursor: pointer;">
</div>
<div id="chatbot-frame-container" style="display: none;">
    {{-- chatbot tranhoangnam --}}
    {{-- <iframe src="https://app.chatfly.co/chat/9053d6d7-ed43-4814-ba31-e0c78b47153c" width="450" height="550"
        style="border:1px solid black; border-radius: 10px;"></iframe> --}}
    {{-- chatbot ngotanloi2424 --}}
    <iframe src="https://app.chatfly.co/chat/6d58feb0-c166-4ce4-9d7e-63a37e64ec81" width="450" height="550"
        style="border:1px solid black; border-radius: 10px;"></iframe>

</div>

{{-- Chat Fly AI --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var chatbotIcon = document.getElementById("chatbot-icon");
        var chatbotFrameContainer = document.getElementById("chatbot-frame-container");
        var chatbotTooltip = document.getElementById("chatbot-tooltip");

        chatbotIcon.addEventListener("click", function() {
            if (chatbotFrameContainer.style.display === "none" || chatbotFrameContainer.style
                .display === "") {
                chatbotFrameContainer.style.display = "block";
            } else {
                chatbotFrameContainer.style.display = "none";
            }

            chatbotIcon.classList.toggle("shaking");
        });

        chatbotIcon.addEventListener("mouseenter", function() {
            chatbotTooltip.style.display = "block";
        });

        chatbotIcon.addEventListener("mouseleave", function() {
            chatbotTooltip.style.display = "none";
        });
    });
</script>
<script>
    window.chatbotConfig = {
        //bot_id tranhoannam
        //bot_id: "9053d6d7-ed43-4814-ba31-e0c78b47153c",
        //bot_id ngotanloi
        bot_id: "6d58feb0-c166-4ce4-9d7e-63a37e64ec81",
    };
</script>
<script src="https://app.chatfly.co/Chat.js"></script>

<style>
    .chatbot-icon-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        display: flex;
        align-items: center;
    }

    #chatbot-frame-container {
        position: fixed;
        bottom: 90px;
        right: 20px;
        z-index: 1000;
        background: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    @keyframes shake {
        0% {
            transform: translateX(0);
        }

        20% {
            transform: translateX(-10px);
        }

        40% {
            transform: translateX(10px);
        }

        60% {
            transform: translateX(-10px);
        }

        80% {
            transform: translateX(10px);
        }

        100% {
            transform: translateX(0);
        }
    }

    .shaking {
        animation: shake 0.5s;
    }

    .chatbot-tooltip {
        display: none;
        position: absolute;
        bottom: 10px;
        right: 110%;
        /* Adjust as needed to position the tooltip */
        background-color: black;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        white-space: nowrap;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-size: 14px;
        z-index: 1001;
    }
</style>




{{-- Chat FPT AI --}}
{{-- <link href="{{ asset('Bard_ai_clone/css/adminlte.min.css')}}" rel="stylesheet" type="text/css" /> --}}
{{-- <script>
    // Configs
    let liveChatBaseUrl = document.location.protocol + '//' + 'livechat.fpt.ai/v36/src'
    let LiveChatSocketUrl = 'livechat.fpt.ai:443'
    let FptAppCode = '321b58316e117218b088763ce405a493'
    let FptAppName = 'Chatbot Hỗ Trợ'
    // Define custom styles
    let CustomStyles = {
        // header
        headerBackground: '#3C3737FF',
        headerTextColor: '#ffffffff',
        headerLogoEnable: true,
        headerLogoLink: 'https://chatbot-tools.fpt.ai/livechat-builder/img/theme/digital_agency/logo_head.svg',
        headerText: 'Chatbot Hỗ Trợ',
        // main
        primaryColor: '#EE238FFF',
        secondaryColor: '#ecececff',
        primaryTextColor: '#ffffffff',
        secondaryTextColor: '#000000DE',
        buttonColor: '#b4b4b4B3',
        buttonTextColor: '#ffffffff',
        bodyBackgroundEnable: true,
        bodyBackgroundLink: 'https://chatbot-tools.fpt.ai/livechat-builder/img/theme/digital_agency/body.png',
        avatarBot: 'https://chatbot-tools.fpt.ai/livechat-builder/img/theme/digital_agency/bot.svg',
        sendMessagePlaceholder: 'Nhập tên của bạn',
        // float button
        floatButtonLogo: 'https://chatbot-tools.fpt.ai/livechat-builder/img/theme/digital_agency/logo.svg',
        floatButtonTooltip: 'NgoTanLoi Digital Technology xin chào!',
        floatButtonTooltipEnable: true,
        // start screen
        customerLogo: 'https://chatbot-tools.fpt.ai/livechat-builder/img/theme/digital_agency/logo.svg',
        customerWelcomeText: 'Vui lòng nhập tên của bạn',
        customerButtonText: 'Bắt đầu',
        prefixEnable: false,
        prefixType: 'radio',
        prefixOptions: ["Anh", "Chị"],
        prefixPlaceholder: 'Danh xưng',
        // custom css
        css: ''
    }
    // Get bot code from url if FptAppCode is empty
    if (!FptAppCode) {
        let appCodeFromHash = window.location.hash.substr(1)
        if (appCodeFromHash.length === 32) {
            FptAppCode = appCodeFromHash
        }
    }
    // Set Configs
    let FptLiveChatConfigs = {
        appName: FptAppName,
        appCode: FptAppCode,
        themes: '',
        styles: CustomStyles
    }
    // Append Script
    let FptLiveChatScript = document.createElement('script')
    FptLiveChatScript.id = 'fpt_ai_livechat_script'
    FptLiveChatScript.src = liveChatBaseUrl + '/static/fptai-livechat.js'
    document.body.appendChild(FptLiveChatScript)
    // Append Stylesheet
    let FptLiveChatStyles = document.createElement('link')
    FptLiveChatStyles.id = 'fpt_ai_livechat_script'
    FptLiveChatStyles.rel = 'stylesheet'
    FptLiveChatStyles.href = liveChatBaseUrl + '/static/fptai-livechat.css'
    document.body.appendChild(FptLiveChatStyles)
    // Init
    FptLiveChatScript.onload = function() {
        fpt_ai_render_chatbox(FptLiveChatConfigs, liveChatBaseUrl, LiveChatSocketUrl)
    }
</script> --}}
