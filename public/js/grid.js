$(document).ready(function() {


    $('.pagination a ').on('click', function() {
        update_grid($(this).data('page'));

        return false;
    });

    $('#per_page').on('change', function() {
        update_grid($('.pagination .active a').data('page'));
    });

    $('#search').on('click', function() {
        update_grid($('.pagination .active a').data('page'));

        return false;
    });

    $('#sort a').on('click', function() {
        var input = $(this).find('input');
        if(input.val() == 0) {
            input.val(1);
        } else if(input.val() == 1) {
            input.val(-1);
        } else if(input.val() == -1) {
            input.val(0);
        }

        update_grid($('.pagination .active a').data('page'));

        return false;
    });

    function update_grid(page) {
        $('#page').val(page);
        var form = $('#grid');
        $.ajax({
            url: form.attr('action'),
            data: form.serialize(),
            dataType: 'html',
            success: function(data) {
                $('#container_grid').html(data);
            },
            error: function(error, message) {
                alert(message);
                console.log(error);
            }
        });

    }
});