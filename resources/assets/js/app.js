import $ from 'jquery';
import _ from 'lodash';
import 'bootstrap-sass';
import 'sweetalert';

window.$ = window.jQuery = $;

if ($('.toogle-collapse').length > 0) {
    $('.toogle-collapse > a').click();
}

const ERROR_AJAX = '<div class="alert alert-danger" style="margin-top: 10px; margin-bottom: 10px;" id="alert">Infelizmente não conseguimos completar sua requisição. Tente recarregar a página.</div>';

//Ajax setup for internal AJAX's
$.ajaxSetup({
    headers: {'X-CSRF-TOKEN': window.Laravel.csrfToken}
});

$('.general-ajax-with-redirect').on('submit', function (e) {
    "use strict";
    e.preventDefault();
    var originalBtnTxt = $('.btn-process-ajax').text();

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serializeArray(),
        timeout: 99999999,
        success: function (res) {
            if (res.status === 'success') {

                if (res.response.msg != '' && res.response.msg != undefined) {
                    swal({
                            title: res.response.msg,
                            type: "success",
                            closeOnConfirm: false
                        },
                        function (isConfirm) {
                            if (isConfirm) {
                                window.location.href = res.response.route;
                            }
                        });

                    setTimeout(function () {
                        window.location.href = res.response.route;
                    }, 10000);
                } else {
                    window.location.href = res.response.route;
                }

            } else if (res.status === 'warning') {

                if (res.response.hasOwnProperty('msg')) {
                    $(this).append('<div class="alert alert-warning" style="margin-top: 10px;">' + res.response.msg + '</div>');
                } else {
                    $.each(res.response, function (k, v) {
                        var input = $("input[name='" + k + "']");

                        if (input.length < 1) {
                            var input = $("textarea[name='" + k + "']");
                        }

                        if (input.length < 1) {
                            var input = $("select[name='" + k + "']");
                        }

                        $.each(v, function (number, error) {
                            input.parent().append('<div class="alert alert-warning" style="margin-top: 10px;">' + error + '</div>');
                        });
                    });
                }

            } else {
                $(this).append(ERROR_AJAX);
            }
        },
        fails: function () {
        },
        beforeSend: function () {
            $('.alert').remove();
            $('.btn-process-ajax').text('Processando...');
        },
        complete: function () {
            $('.btn-process-ajax').text(originalBtnTxt);
        }
    });

});

$('.general-ajax-without-redirect').on('submit', function (e) {
    "use strict";
    e.preventDefault();
    var originalBtnTxt = $('.btn-process-ajax').text();

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serializeArray(),
        timeout: 99999999,
        success: function (res) {
            if (res.status === 'success') {
                swal({
                    title: res.response.msg,
                    type: "success",
                    closeOnConfirm: true
                });
            } else if (res.status === 'warning') {

                if (res.response.hasOwnProperty('msg')) {
                    $(this).append('<div class="alert alert-warning" style="margin-top: 10px;">' + res.response.msg + '</div>');
                } else {
                    $.each(res.response, function (k, v) {
                        var input = $("input[name='" + k + "']");

                        if (input.length < 1) {
                            var input = $("textarea[name='" + k + "']");
                        }

                        if (input.length < 1) {
                            var input = $("select[name='" + k + "']");
                        }

                        $.each(v, function (number, error) {
                            input.parent().append('<div class="alert alert-warning" style="margin-top: 10px;">' + error + '</div>');
                        });
                    });
                }

            } else {
                $(this).append(ERROR_AJAX);
            }
        },
        fails: function () {
        },
        beforeSend: function () {
            $('.alert').remove();
            $('.btn-process-ajax').text('Processando...');
        },
        complete: function () {
            $('.btn-process-ajax').text(originalBtnTxt);
            $("#formToClean")[0].reset();
        }
    });

});