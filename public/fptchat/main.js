// Configs
let liveChatBaseUrl =
    document.location.protocol + "//" + "livechat.fpt.ai/v36/src";
let LiveChatSocketUrl = "livechat.fpt.ai:443";
let FptAppCode = "321b58316e117218b088763ce405a493";
let FptAppName = "Chat với nhân viên tư vấn";
// Define custom styles
let CustomStyles = {
    // header
    headerBackground:
        "linear-gradient(86.7deg, #59B2F4FF 0.85%, #77AAC1FF 98.94%)",
    headerTextColor: "#ffffffff",
    headerLogoEnable: true,
    headerLogoLink:
        "http://127.0.0.1:8000/UserLTE/assets/images/chatbot/nhanvien_remove_background.png",
    headerText: "Chat với nhân viên tư vấn",
    // main
    primaryColor: "#5AB2F3FF",
    secondaryColor: "#ecececff",
    primaryTextColor: "#ffffffff",
    secondaryTextColor: "#000000DE",
    buttonColor: "#5AB2F3B3",
    buttonTextColor: "#ffffffff",
    bodyBackgroundEnable: true,
    bodyBackgroundLink:
        "https://chatbot-tools.fpt.ai/livechat-builder/img/theme/medical/body.png",
    avatarBot:
        "http://127.0.0.1:8000/UserLTE/assets/images/chatbot/nhanvien_remove_background.png",
    sendMessagePlaceholder: "Nhập tin nhắn của bạn",
    // float button
    floatButtonLogo:
        "http://127.0.0.1:8000/UserLTE/assets/images/chatbot/nhanvien1.png",
    floatButtonTooltip: "Chat với nhân viên tư vấn!",
    floatButtonTooltipEnable: true,
    // // start screen
    // customerLogo:
    //     "http://127.0.0.1:8000/UserLTE/assets/images/chatbot/nhanvien1.png",
    customerWelcomeText: "Nhập tên của bạn",
    customerButtonText: "Bắt đầu",
    prefixEnable: true,
    prefixType: "radio",
    prefixOptions: ["Anh", "Chị"],
    prefixPlaceholder: "Danh xưng",
    // custom css
    css: "",
};
// Get bot code from url if FptAppCode is empty
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
    themes: "",
    styles: CustomStyles,
};
// Append Script
let FptLiveChatScript = document.createElement("script");
FptLiveChatScript.id = "fpt_ai_livechat_script";
FptLiveChatScript.src = liveChatBaseUrl + "/static/fptai-livechat.js";
document.body.appendChild(FptLiveChatScript);
// Append Stylesheet
let FptLiveChatStyles = document.createElement("link");
FptLiveChatStyles.id = "fpt_ai_livechat_script";
FptLiveChatStyles.rel = "stylesheet";
// FptLiveChatStyles.href = liveChatBaseUrl + '/static/fptai-livechat.css'
document.body.appendChild(FptLiveChatStyles);
// Init
FptLiveChatScript.onload = function () {
    fpt_ai_render_chatbox(
        FptLiveChatConfigs,
        liveChatBaseUrl,
        LiveChatSocketUrl
    );
};
