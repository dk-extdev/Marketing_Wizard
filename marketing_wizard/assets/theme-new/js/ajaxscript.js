$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$('.del-btn').on('click', function () {
    var id = $(this).attr('videoID');
    $.ajax(
    {
        url: "my_videos/delete/"+id,
        type: 'post',
        dataType: "json",
        data: {
            "id": id
        },
        success: function (data)
        {
            if(data.success=="success"){
                location.reload();
            }
        }
    });
});

