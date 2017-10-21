$.ajaxSetup(
{
    headers:
    {
        'X-CSRF-Token': $('input[name="_token"]').val()
    }
});

$('.btn-edit').on('click', function () {
    alert($(this).data('id'));
});

$('#add').on('click', function(){
    $('#category').modal('show');
});
$('#save').on('submit', function (e) {
    e.preventDefault();
    var form = $('#frmCategory');
    var fromData = form.serialize();
    var url = form.attr('action');
    $.ajax({
        type : 'post',
        url : url,
        data : formData,
        success : function (data) {
            console.log(data);
        }
    });
});