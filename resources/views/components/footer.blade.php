<footer class="footer">

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
                            alt="Footer Logo" width="105" height="25">
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
<style>
    .chatbot-container {
        display: none;
        position: fixed;
        bottom: 160px;
        right: 20px;
        width: 300px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        border-radius: 10px;
        /* Đã thay đổi border-radius thành 10px */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        z-index: 9999;
    }

    .chatbot-container .card {
        border-radius: 10px;
        /* Đã thay đổi border-radius của card thành 10px */
        border: none;
        /* Đã loại bỏ border của card */
    }

    .chatbot-container .card-header {
        padding: 15px;
        /* Đã tăng padding của card-header */
        background-color: #4CAF50;
        color: white;
        border-top-left-radius: 10px;
        /* Đã thay đổi border-radius của card-header */
        border-top-right-radius: 10px;
        /* Đã thay đổi border-radius của card-header */
    }

    .chatbot-container .card-footer {
        padding: 15px;
        /* Đã tăng padding của card-footer */
        background-color: #f0f0f0;
        /* Đã thay đổi màu nền của card-footer */
        border-bottom-left-radius: 10px;
        /* Đã thay đổi border-radius của card-footer */
        border-bottom-right-radius: 10px;
        /* Đã thay đổi border-radius của card-footer */
    }

    .chatbot-container .chatbot-title {
        font-size: 20px;
        /* Đã tăng kích thước font của tiêu đề chatbot */
    }

    .close-btn {
        float: right;
        background: none;
        border: none;
        cursor: pointer;
        font-size: 20px;
        color: #ffffff;
        /* Đã thay đổi màu của nút đóng */
    }

    .chatbot-icon {
        position: fixed;
        bottom: 90px;
        right: 35px;
        width: 60px;
        height: 60px;
        cursor: pointer;
        border-radius: 50%;
        /* Đã thêm border-radius để làm tròn hình ảnh */
    }

    #messenger {
        position: fixed;
        bottom: 20px;
        right: 35px;
        z-index: 9999;
    }
</style>
{{-- <link href="{{ asset('Bard_ai_clone/css/adminlte.min.css')}}" rel="stylesheet" type="text/css" /> --}}

<script>
    // Configs
    let liveChatBaseUrl = document.location.protocol + '//' + 'livechat.fpt.ai/v36/src';
    let LiveChatSocketUrl = 'livechat.fpt.ai:443';
    let FptAppCode = '321b58316e117218b088763ce405a493';
    let FptAppName = 'NTL Digital Technology hỗ trợ';
    // Define custom styles
    let CustomStyles = {
        // Header
        headerBackground: 'linear-gradient(86.7deg, #3353a2ff 0.85%, #31b7b7ff 98.94%)',
        headerTextColor: '#ffffffff',
        headerLogoEnable: false,
        headerLogoLink: 'https://chatbot-tools.fpt.ai/livechat-builder/img/Icon-fpt-ai.png',
        headerText: 'NTL Digital Technology hỗ trợ',
        // Main
        primaryColor: '#6d9ccbff',
        secondaryColor: '#ecececff',
        primaryTextColor: '#ffffffff',
        secondaryTextColor: '#000000DE',
        buttonColor: '#b4b4b4ff',
        buttonTextColor: '#ffffffff',
        bodyBackgroundEnable: false,
        bodyBackgroundLink: '',
        avatarBot: 'https://chatbot-tools.fpt.ai/livechat-builder/img/bot.png',
        sendMessagePlaceholder: 'Nhập tin nhắn của bạn',
        // Float button
        floatButtonLogo: 'https://chatbot-tools.fpt.ai/livechat-builder/img/Icon-fpt-ai.png',
        floatButtonTooltip: 'NgoTanLoi Digital Technology xin chào!',
        floatButtonTooltipEnable: true,
        // Start screen
        customerLogo: 'https://chatbot-tools.fpt.ai/livechat-builder/img/bot.png',
        customerWelcomeText: 'Vui lòng nhập thông tin của bạn để bắt đầu trò chuyện:',
        customerButtonText: 'Bắt đầu trò chuyện',
        // Prefix
        prefixEnable: true, // Bật chức năng yêu cầu nhập thông tin
        prefixType: 'radio', // Loại input là radio button
        prefixOptions: ["Anh", "Chị"], // Các lựa chọn cho danh xưng
        prefixPlaceholder: 'Chọn danh xưng', // Placeholder cho input
        // Custom CSS
        css: ''
    };
    // Get bot code from URL if FptAppCode is empty
    if (!FptAppCode) {
        let appCodeFromHash = window.location.hash.substr(1);
        if (appCodeFromHash.length === 32) {
            FptAppCode = appCodeFromHash;
        }
    }
    // Set Configs
    let FptLiveChatConfigs = {
        appName: FptAppName,
        appCode: FptAppCode,
        themes: '',
        styles: CustomStyles
    };
    // Append Script
    let FptLiveChatScript = document.createElement('script');
    FptLiveChatScript.id = 'fpt_ai_livechat_script';
    FptLiveChatScript.src = liveChatBaseUrl + '/static/fptai-livechat.js';
    document.body.appendChild(FptLiveChatScript);
    // Append Stylesheet
    let FptLiveChatStyles = document.createElement('link');
    FptLiveChatStyles.id = 'fpt_ai_livechat_script';
    FptLiveChatStyles.rel = 'stylesheet';
    FptLiveChatStyles.href = liveChatBaseUrl + '/static/fptai-livechat.css';
    document.body.appendChild(FptLiveChatStyles);
    // Init
    FptLiveChatScript.onload = function() {
        fpt_ai_render_chatbox(FptLiveChatConfigs, liveChatBaseUrl, LiveChatSocketUrl);
    };
</script>
