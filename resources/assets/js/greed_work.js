$(document).on('click', 'div.parent', function () {

    var id = this.id;

    if (id) {
        var type = $('#phazer' + id).attr('class');

        if (type == 'show_greed') {
            $('#phazer' + id).removeClass('show_greed');
            $('#phazer' + id).addClass('hide_greed');
            addBrach(id);
        } else {
            $('#phazer' + id).removeClass('hide_greed');
            $('#phazer' + id).addClass('show_greed');
            $('#phazer' + id + ' .child').remove();
        }

    }
});

function addBrach(id) {
    $.ajax({
        type: 'get',
        url: '/ajax/subordinate?boss=' + id,
        beforeSend: function () {
            $('#phazer' + id).append('<div id="loading" class="hide">' +
                ' <p><img src="/img/ajax-loader.gif" /> Please Wait</p>' +
                '</div>');
        },
        complete: function () {
            $('#loading').hide();
        },
        success: function (response) {
            $('#phazer' + id).append(response).show(200);
        },
        error: function () {
            alert('error');
        }
    });
}
