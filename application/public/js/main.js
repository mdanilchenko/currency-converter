$(document).ready(function () {
    $('#convert_btn').on('click', function () {
        $('.result-container').css('display', 'none');
        $('.error-container').css('display', 'none');

        var amount = $('#amount').val();
        var from = $('#currency-from').val();
        var to = $('#currency-to').val();
        if(amount.length === 0 || parseFloat(amount) != amount){
            $('.error-container b').html('InvalidArgumentException');
            $('.error-container').css('display', 'block');
            return;
        }
        $.ajax({
            url: "/converter/"+from.toUpperCase()+"/"+to.toUpperCase()+"/" + encodeURIComponent(amount),
            dataType: 'json',
            success: function (data) {
                if (data.error) {
                    $('.error-container b').html(data.error);
                    $('.error-container').css('display', 'block');
                } else if (data.from && data.to) {
                    $('.cash-container').html('<b class="amount">'+data.from.amount+'</b> '+data.from.currency+' >> <b class="amount">'+data.to.amount+'</b> '+data.to.currency );

                    $('.result-container').css('display', 'block');
                }
            },
            error: function () {
                $('.error-container b').html('Network Exception');
                $('.error-container').css('display', 'block');
            }
        });
    });

    $('#amount').on('keyup', function (e) {
        if (e.keyCode == 13) {
            $('#convert_btn').click();
        }
    });
});