$(function () {
  'use strict';
  function randomPassword(length) {
    var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    return pass;
  }
  $('#btn_generate').click(function(){
    $('#new_customer_password').val(randomPassword(8));
  });
  $('.video_modal').click(function(){
    //Rendered Videos of customer '{{ $customer->name }}':
    var inject_contents = '<h2 class="text-center">Rendered Videos of customer `'+$(this).attr('customername')+'`:</h2>';
    var video_data = $(this).data('videos');
    for (var i in video_data){
      inject_contents += '<p class="text-warning text-center" ><a href="'+video_data[i]+'">'+video_data[i]+'</a></p>';
    }
    $('#videoModal .modal-body').html(inject_contents);
    $("#videoModal").modal('show');
  });
  $('.transaction_modal').click(function(){
    $("#account_type").val($(this).attr('customertype'));
    $('#accountid').val($(this).attr('customerid'))
    $("#transactionModal").modal('show');
  });
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#update_type').click(function(){
    var id = $('#accountid').val();
    $('#hypercustomerid'+id).attr('customertype',$('#account_type').val());

    $.ajax(
    {
        url: "typeupdate",
        type: 'POST',
        dataType: "json",
        data: {
            "id": id,
            "type":$('#account_type').val()
        },
        success: function (data)
        {
            if(data.success=="success"){
              
            }
        }
    });
    $('.update-type-success').show();
    setTimeout(function(){ $('.update-type-success').hide(); }, 2000);
  });
  
  $('.delete-customer-id').click(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var id = $(this).data('id');
    $.ajax({
        url: "deletecustomer/"+id,
        type: 'POST',
        dataType: "json",
        data: {
            "id": id,
        },
        success: function (data)
        {
            if(data.success=="success"){
              $('#customerTable tr').each(function(){
                if($(this).data('id') && $(this).data('id')==data.id){
                  $(this).remove();
                }
              });
              alert("Customer Detelted Successfully!");
            }
        }
    });
  });
});
