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

// IMAGE SLIDER IN PROPERTY PAGE

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}
