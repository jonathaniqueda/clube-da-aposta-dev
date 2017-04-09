import $ from 'jquery';
import _ from 'lodash';
import 'bootstrap-sass';
import 'sweetalert';
import 'bootstrap-datepicker';

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
                            input.closest('.form-group').append('<div class="alert alert-warning" style="margin-top: 10px;">' + error + '</div>');
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
                            input.closest('.form-group').append('<div class="alert alert-warning" style="margin-top: 10px;">' + error + '</div>');
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

$('.search-btn').on('click', function (e) {
    e.preventDefault();

    var model = $(this).data('model');
    var input = $('#search' + model + '').val();
    var className = "toRemove" + model;

    $('.' + className).remove();

    $.getJSON($(this).data('route'), {query: input, model: $(this).data('model')}, function (data) {
        var values = '';

        if (data.response != '' && data.response != undefined) {
            var html = '<h5 class="' + className + '">Sugestões (clique em uma delas):</h5><div class="' + className + '"><p><strong>Nenhuma sugestão encontrada</strong></p></div>';
        } else {
            $.each(data, function (k, v) {
                values += '<a href="#" data-team="' + v.name + '" class="send-to-input" data-model="' + model + '">' + v.name + '</a> | ';
            });

            var html = '<h5 class="' + className + '">Sugestões (clique em uma delas):</h5><div class="' + className + '"><p>' + values + '</p></div>';
        }

        $('#append' + model).append(html);
    });
});

$('body').on('click', '.send-to-input', function (e) {
    e.preventDefault();

    var teamValue = $(this).data('team');
    var model = $(this).data('model');

    var input = $('#search' + model);
    input.val(' ');
    input.val(teamValue);
});

if ($('#findTeams').length > 0 && $('#findTeams').val() != '') {
    let route = $('#findTeams').find(':selected').data('route');

    $.getJSON(route, function (data) {
        "use strict";
        var opts = '';

        $.each(data, function (k, v) {
            opts += '<option value="' + v.id + '">' + v.name + '</option>';
        });

        $('#teamsA').append(opts);
        $('#teamsB').append(opts);

        $('.to-show-after-team').show();
    });
}

$('body').on('change', '#findTeams', function (e) {
    e.preventDefault();

    let route = $(this).find(':selected').data('route');

    $('.to-show-after-team').hide();
    $('#teamsA').find('option').remove();
    $('#teamsB').find('option').remove();

    $.getJSON(route, function (data) {
        "use strict";
        var opts = '';

        $.each(data, function (k, v) {
            opts += '<option value="' + v.id + '">' + v.name + '</option>';
        });

        $('#teamsA').append(opts);
        $('#teamsB').append(opts);

        $('.to-show-after-team').show();
    });
});

$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    autoclose: true
});