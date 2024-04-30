<footer class="footer">

    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
    {{-- Chat với AI --}}
    <div class="chatbot-container" id="chatbot-container">
        {{-- <div class="chatbot-header">
            <span class="chatbot-title">Synthia AI</span>
        </div> --}}
        <button class="close-btn" id="close-btn">&times;</button>

        <div class="card card-warning card-outline direct-chat direct-chat-info">
            <div class="card-header">
                <h3 class="card-title" id="name"><i class="fas fa-robot"></i> Synthia AI</h3>

                <div class="card-tools">
                    <span title="" id="posi" class="badge bg-dark">Bard AI</span>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- Conversations are loaded here -->
                <div id="mssg" class="direct-chat-messages">
                    <div class='direct-chat-msg'>
                        <div class='direct-chat-infos clearfix'><span
                                class='direct-chat-name float-left'>Synthia</span><span
                                class='direct-chat-timestamp float-right'><a href="#"
                                    vall="Xin chào;  Tôi là Synthia, 1 trợ lý ảo của cửa hàng NgoTanLoi digital technologies. Tôi có thể giúp gì cho bạn? "
                                    class="text-primary play"><i class="fas fa-play-circle"></i></a> </span></div><img
                            class='direct-chat-img' src='img/neo.jpg' alt='Message User Image'>
                        <div class='direct-chat-text'>Xin chào; Tôi là Synthia, 1 trợ lý ảo của cửa hàng NgoTanLoi
                            digital
                            technologies. Tôi có thể giúp gì cho bạn? </div>
                    </div>
                </div>
                <!--/.direct-chat-messages-->
                <span class="character-typing">
                    <div><b class="wait">Wait,</b> <span>Typing ...</span> </div>
                </span>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <form id="frm">
                    <input id="hdn_csv" type="hidden" />
                    <input id="hdn_prompt" type="hidden" />
                    <input id="hdn_usr" type="hidden" />
                    <div class="input-group">
                        <textarea id="txtMsg" rows="1" name="message" required style="overflow:hidden;resize:none"
                            placeholder="Nhập câu hỏi ..." class="form-control"></textarea>

                        <span class="input-group-append">
                            <button type="button" onclick="createPrompt();return false;" id="Ask"
                                class="btn btn-dark">Gửi</button>
                        </span>
                    </div>
                </form>
            </div>
            <!-- /.card-footer-->
        </div>
    </div>
    <img src="{{ asset('UserLTE/assets/images/chatbot/ai.png') }}" alt="Chatbot" class="chatbot-icon" id="chatbot-icon"
        width="60px" height="" style="padding-bottom: 2px; border-radius: 50%">
    {{-- <a id="zalo" href="#" title="Chat với AI">
        <img src="{{ asset('UserLTE/assets/images/chatbot/ai.png') }}" width="60px" height=""
            style="padding-bottom: 2px">
    </a> --}}

    {{-- Chat với Cửa --}}
    <a id="messenger" href="#" title="Chat với cửa hàng">
        <img src="{{ asset('UserLTE/assets/images/chatbot/real.png') }}" width="60px" height=""
            style="padding-bottom: 2px; border-radius: 50%">
    </a>
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
    const chatbotContainer = document.getElementById('chatbot-container');
    const chatbotIcon = document.getElementById('chatbot-icon');
    const closeBtn = document.getElementById('close-btn');

    chatbotIcon.addEventListener('click', () => {
        chatbotContainer.style.display = 'block';
    });

    closeBtn.addEventListener('click', () => {
        chatbotContainer.style.display = 'none';
    });
</script>
