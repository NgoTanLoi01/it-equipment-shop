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
    <img src="{{ asset('UserLTE/assets/images/chatbot/neo.jpg') }}" alt="Chatbot" class="chatbot-icon"
        id="chatbot-icon" width="60px" height="" style="border-radius: 50%; cursor: pointer;">
</div>
<div id="chatbot-frame-container" style="display: none;">
    <iframe src="https://app.chatfly.co/chat/9053d6d7-ed43-4814-ba31-e0c78b47153c" width="370" height="550"
        style="border:1px solid black; border-radius: 10px;"></iframe>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    var chatbotIcon = document.getElementById("chatbot-icon");
    var chatbotFrameContainer = document.getElementById("chatbot-frame-container");

    chatbotIcon.addEventListener("click", function () {
        if (chatbotFrameContainer.style.display === "none" || chatbotFrameContainer.style.display === "") {
            chatbotFrameContainer.style.display = "block";
        } else {
            chatbotFrameContainer.style.display = "none";
        }

        // Thêm hoặc loại bỏ lớp "shaking"
        chatbotIcon.classList.toggle("shaking");
    });
});

</script>
<script>
    window.chatbotConfig = {
        bot_id: "9053d6d7-ed43-4814-ba31-e0c78b47153c",
    };
</script>
<script src="https://app.chatfly.co/Chat.js"></script>



<style>
    .chatbot-icon-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
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
</style>
