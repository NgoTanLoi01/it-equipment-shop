import Vue from 'vue';
import Slider from "./components/slider.vue";

// Đăng ký thành phần Vue
Vue.component("slider-component", Slider);

// Khởi chạy Vue instance
new Vue({
    el: '#slider-app',
    data: {
        baseURL: config('app.base_url')
    }
});
