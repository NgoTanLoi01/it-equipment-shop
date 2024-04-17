<footer class="footer">

    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <a id="zalo" href="#" title="Chat với AI">
        <img src="{{ asset('UserLTE/assets/images/chatbot/ai.png') }}" width="60px" height=""
            style="padding-bottom: 2px">
    </a>
    <a id="messenger" href="#" title="Chat với cửa hàng">
        <img src="{{ asset('UserLTE/assets/images/chatbot/real.png') }}" width="60px" height=""
            style="padding-bottom: 2px">
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
    #zalo {
        position: fixed;
        bottom: 170px;
        right: 35px;
        z-index: 9999;
    }

    #messenger {
        position: fixed;
        bottom: 100px;
        right: 35px;
        z-index: 9999;
    }
</style>
