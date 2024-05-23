document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    let typingTimer; // Biến để lưu setTimeout

    // Xử lý khi người dùng gõ vào ô tìm kiếm
    searchInput.addEventListener("input", function () {
        clearTimeout(typingTimer); // Xóa bỏ setTimeout trước đó (nếu có)

        // Sau khi ngừng gõ 1s, thực hiện tìm kiếm
        typingTimer = setTimeout(searchCategories, 300);
    });

    // Hàm tìm kiếm danh mục
    function searchCategories() {
        const searchText = searchInput.value.toLowerCase();
        const rows = document.querySelectorAll(".datatable-table tbody tr");

        rows.forEach((row) => {
            const categoryName = row
                .querySelector("td:nth-child(2)")
                .textContent.toLowerCase();
            if (categoryName.includes(searchText)) {
                row.style.display = ""; // Hiển thị nếu tên danh mục chứa từ khóa tìm kiếm
            } else {
                row.style.display = "none"; // Ẩn nếu không chứa từ khóa tìm kiếm
            }
        });
    }
});
