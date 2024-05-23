function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);

    Swal.fire({
        title: 'Bạn chắc không?',
        text: "Bạn sẽ không thể hoàn tác!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Vâng, xóa!'
      }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function(data){
                    if(data.code == 200){
                        that.parent().parent().remove();
                    }

                },
                error: function(){

                }
            });
          Swal.fire(
            'Đã xóa!',
            'Đối tượng đã được xóa.',
            'success'
          )
        }
      })
}

$(function(){
    $(document).on('click', '.action_delete', actionDelete);

});