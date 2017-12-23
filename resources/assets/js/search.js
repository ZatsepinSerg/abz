
$(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        var id = '';
        var page = $(this).attr('href').split('page=')[1];

        var type = $('#type_pagination').attr('title')

        console.log(type)
        if(type == 'sort'){
            sort_info(id,page)
        }
        if(type=='search'){
            search_info(search,page)
        }
        if(type=='main'){
            getWorkes(page)
        }
    });




function search_info(search, page) {

    var searchStr = search.searchString.value;
    var selectStr = search.select.value;

    if (searchStr.replace(/\s/g, '') == '') {
        $('.search').addClass('has-error');

        return false
    }

    $('.search').removeClass('has-error')

    $.ajax({
        type: 'get',
        url: '/ajax/search_info?page=' + page,
        data: {
            string: searchStr, select: selectStr
        },
        success: function (response) {
            console.log(page)
            $('.content').html(response)
            $('#type_pagination').attr('title','search')
            location.hash = page;
        },
        error: function () {
            alert('error');
        }
    });
    return false;
}

function sort_info(id, page) {

    if(id){
        var sequence = $('#' + id).val()

        if (sequence != "ASC") {
            sequence = "ASC"
        } else {
            sequence = "DESC"
        }
    }

    if(page =='undefined'){
        page = 1
    }

    $.ajax({
        type: 'get',
        url: '/sort_info?page=' + page,
        data: {
            column: id, sequence: sequence
        },
        success: function (response) {
            $('.content').html(response)
            $('#type_pagination').attr('title','sort')

            location.hash = page ;
            if (sequence == "ASC") {
                $('#' + id).val("ASC")
                $('#' + id).append('<span class=" glyphicon glyphicon-menu-up sort" aria-hidden="true"></span>');
            } else {
                $('#' + id).val("DESC")
                $('#' + id).append('<span class=" glyphicon glyphicon-menu-down sort" aria-hidden="true"></span>');
            }
        },
        error: function () {
            alert('error');
        }
    });
    return false;
}



function getWorkes(page) {
    $.ajax({
        url: '/ajax/workers?page=' + page
    }).done(function (data) {

        $('.content').html(data);
        $('#type_pagination').attr('title','main')
        location.hash = page;
    })
}
