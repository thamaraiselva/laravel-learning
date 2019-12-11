$("#add_board").click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    var formData = {
        name: jQuery('#board_name').val(),
    };
    // var state = jQuery('#btn-save').val();
    var type = "POST";
    var ajaxurl = 'add_board';
    // if (state == "update") {
    //     type = "PUT";
    //     ajaxurl = 'links/' + link_id;
    // }
    $.ajax({
        type: type,
        url: ajaxurl,
        data: formData,
        dataType: 'json',
        success: function (data) {
            var board_card = '<a class="card" href="'+data.url+'"><div><div class="card-body">'+ data.name +' </div></div></a>'
            $('.boards').append(board_card);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});