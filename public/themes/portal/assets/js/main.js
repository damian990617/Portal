$(document).ready(function () {
    $('.btn-contact').on('click', function () {
        let tel = $(this).data('tel');
        if ($(this).text() != tel) {
            $(this).text(tel);
        }
    });
    $('.select__refresh').on('change', function () {
        let val = $(this).val();
        if (val) {
            window.location.href = val;
        }
    });
    $('.prod-item').on('click', function (event) {
        let url = $(this).data('url');
        let currTarget = $(event.target);
        if (currTarget.hasClass('fa-heart') || currTarget.hasClass('favourite-icon')) {
            let favUrl = currTarget.closest('.favourite-icon').data('url');
            favouriteOfferAction(currTarget, favUrl);
            return false;
        }
        if (url) {
            window.location.href = url;
        }
    });
});

function favouriteOfferAction(currTarget, url)
{
    let action = $.get(url, {'_token': csrfToken}, function (data) {
        if (typeof data.status !== 'undefined') {
            const favContent = currTarget.closest('.favourite-icon');
            favContent.find('i.active').removeClass('active');
            if (data.status) {
                favContent.find('i.fas').addClass('active');
            } else {
                favContent.find('i.far').addClass('active');
            }
        }
    });
}
