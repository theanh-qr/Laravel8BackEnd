$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Xóa trong danh sách danh mục
function removeRow(id , url)
{
    if(confirm('Xoá mà không thể khôi phục.Bạn chắc chứ ?')){
        // Tạo 1 route phương thức DELETE để xóa
        $.ajax({
            type: 'DELETE',
            datatype:'JSON',
            data: {id},
            url: url,
            success: function(result)
            {
               if(result.error === false)
               {
                    alert(result.message);
                    location.reload();
               }
               else
               {
                    alert('Xóa lỗi vui lòng thử lại');
               }
            }
        })
    }
}

// Upload hình ảnh lên form
$('#btn-upload').click(function (){
    console.log(123);
    const form_data = new FormData();
    form_data.append('file', $("#upload")[0].files[0]);
    form_data.append('_token', $("#token").val());
    console.log(form_data);
    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'json',
        data: form_data,
        url: '/admin/upload/services',
        success: function (results){

            console.log(results);
            //Kiểm tra xem UploadController hàm store tra biến $error = false tức là k có lỗi
            if(results.status == "success"){
                // nếu tồn tại thì hiện ra thẻ ảnh với đường link đã lấy đc
                $('#image_show').html('<a href="'+ results.url +'" target="_blank"><img src="'+ results.url +'" width="100px" height="100px"></a>');
                //Hiện giá trị value trong input có id = 'file'
                $('#file').val(results.url);
            }
            else{
                alert('Upload file k thành công');
            }
        }
    });
});