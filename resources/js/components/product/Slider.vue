<template>

</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            sliders: [], // Lưu trữ danh sách slider
            banners: [] // Lưu trữ danh sách banner (nếu có)
        };
    },
    created() {
        // Gửi yêu cầu đến API Laravel để nhận dữ liệu về sliders
        axios.get('/admin/slider/')
            .then(response => {
                // Cập nhật dữ liệu vào thuộc tính 'sliders'
                this.sliders = response.data.sliders;
                // Nếu có banners, cũng có thể cập nhật dữ liệu vào thuộc tính 'banners' ở đây
                this.banners = response.data.banners || [];
            })
            .catch(error => {
                console.error('Error fetching sliders:', error);
            });
    }
};
</script>

<style scoped>
/* Bạn có thể thêm các CSS cho Slider.vue tại đây */
</style>
