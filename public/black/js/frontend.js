$(document).ready(function () {
    $('.select2').select2();
});

$.ajaxSetup({
    headers: {
        'csrftoken': '{{ csrf_token() }}'
    }
});

$('#submit').on('click', function () {
    $city = $('#city').val();
    $category = $('#category').val();
    $zone = $('#zone').val();
    $status = $('#status').val();

    fetch_data($city, $category, $zone, $status, 1);
})

$('body').on('click', '.ajax-pagination .pagination a', function (event) {
    event.preventDefault();
    $page = $(this).attr('href').split('page=')[1];
    $('#hidden_page').val($page);
    $city = $('#city').val();
    $category = $('#category').val();
    $zone = $('#zone').val();
    $status = $('#status').val();
    fetch_data($city, $category, $zone, $status, $page);
});

function fetch_data(city, category, zone, status, page) {
    $.ajax({
        type: 'get',
        url: 'list/search',
        data: {
            'city': city,
            'category': category,
            'zone': zone,
            'status': status,
            'page': page
        },
        success: function (data) {
            console.log(data);
            $('.properties-container').parent().html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}
