$(document).ready(function () {

    $(window).bind("beforeunload", function () {
        idle_number($('.number-text').text());
        // return confirm("Do you really want to refresh?");
    });


    // get position of dev have id='sessionForm' to use in scroll
    var offset_top_sessionForm = $("#sessionForm").position().top;

    $('.session-form').hide();
    $('.form-field').hide();
    $('.appointment_date_container').hide();
    $('.message-alert-success').hide();
    $('.message-alert-failed').hide();

    $('#note').mousedown(function () {
        $('.session-form').height('fit-content');
    });

    $('#note').mouseup(function () {
        $('.session-form').height($('.session-form').height() + 'px');
    });

    $('.enter-number').hide();


    function confirm_event(status = null) {
        phone = ($('.enter-number').val().length == 8) ? $('.enter-number').val() : $('.number-text').text();
        return confirm("are you sure to change status number " + phone + " into " + status + " ?")
    }

    btn_state = 0;
    $('.answered-btn').click(() => {
        if (($('.enter-number').css('display') == 'block' && $('.enter-number').val().length == 8) || $('.enter-number').css('display') == 'none') {
            if (btn_state == 0) {
                btn_state = 1;
                setTimeout(() => {
                    btn_state = 0;
                }, 2000);

                $('.session-form').height('1000px');
                $('html, body').animate({
                    scrollTop: offset_top_sessionForm
                }, 200);
                $('.session-form').fadeIn(1000);
                $('.form-field').fadeIn();
            }
        }

    });

    $('.reject-btn').click(() => {
        if (confirm_event('reject')) {
            if (btn_state == 0) {
                btn_state = 1;
                if ($('.enter-number').val().length == 0) {
                    add_new_number($('.number-text').text(), 'reject');
                    set_status_number($('.number-text').text());
                } else if ($('.enter-number').val().length == 8) {
                    add_new_number($('.enter-number').val(), 'reject');
                    set_status_number($('.enter-number').val());
                }
                get_phone_number();
                close_form();
                setTimeout(() => {
                    btn_state = 0;
                }, 2000);
            }
        }
    });

    $('.busy-btn').click(() => {
        if (confirm_event('busy')) {
            if (btn_state == 0) {
                console.log('busy');
                btn_state = 1;
                if ($('.enter-number').val().length == 0) {
                    add_new_number($('.number-text').text(), 'busy');
                    set_status_number($('.number-text').text());
                } else if ($('.enter-number').val().length == 8) {
                    add_new_number($('.enter-number').val(), 'busy');
                    set_status_number($('.enter-number').val());
                }
                get_phone_number();
                close_form();
                setTimeout(() => {
                    btn_state = 0;
                }, 2000);
            }
        }
    });

    $('.out-of-service-btn').click(() => {
        if (confirm_event('out of service')) {
            if (btn_state == 0) {
                console.log('out of service');
                btn_state = 1;
                if ($('.enter-number').val().length == 0) {
                    add_new_number($('.number-text').text(), 'out of service');
                    set_status_number($('.number-text').text());
                } else if ($('.enter-number').val().length == 8) {
                    add_new_number($('.enter-number').val(), 'out of service');
                    set_status_number($('.enter-number').val());
                }
                get_phone_number();
                close_form();
                setTimeout(() => {
                    btn_state = 0;
                }, 2000);
            }
        }
    });

    $('.new-btn').click(() => {
        btn_diable(0);
        if ($('.new-btn').text() == 'New') {
            $('.new-btn').text('Random number');
            $('.number-text').fadeOut(500);
            $('.enter-number').fadeIn(1500);
        } else {
            $('.new-btn').text('New');
            $('.enter-number').val('');
            $('.clear-enter-number').hide();
            $('.enter-number').fadeOut(500);
            $('.number-text').fadeIn(1500);
        }

    });

    $('.clear-enter-number').click(() => {
        $('.enter-number').val('');
        $('.clear-enter-number').fadeOut(250);
        btn_diable(0);
        close_form();
    });
    $('.clear-enter-number').hide();

    enter_number_state = 0;
    $('.enter-number').keyup(() => {
        if ($('.enter-number').val().length > 0 && enter_number_state == 0) {
            $('.clear-enter-number').fadeIn(250);
            if ($('.enter-number').val().length == 8) {
                enter_number_state = 1;
                get_status_number($('.enter-number').val());
            }
        } else if ($('.enter-number').val().length > 0 && $('.enter-number').val().length < 8 && enter_number_state == 1) {
            enter_number_state = 0;
        } else if ($('.enter-number').val().length == 0) {
            enter_number_state = 0;
            $('.clear-enter-number').fadeOut(250);
        }
    });

    // // event whene client acceptance to listener
    // $('.acceptance-service').change(function () {

    //     $(this).css('background-color', '#198754');
    //     $('.reject-service').css('background-color', '#fff');

    //     $('.session-form').height('1140px');

    //     $('html, body').animate({
    //         scrollTop: offset_top_sessionForm
    //     }, 500);

    //     $('.form-field').fadeIn(500);

    // });

    // // event on reject to listener
    // $('.reject-service').change(function () {


    //     $('.acceptance-service').css('background-color', '#fff');

    //     setTimeout(() => {
    //         $(this).css('background-color', '#fff');
    //         $(this).prop('checked', false);
    //     }, 2000);

    //     close_form();


    // });



    // event on booking apoointment to show date field
    $('.booking-apoointment').change(function () {
        $('.session-form').height($('.session-form').height() + 80 + 'px');
        $('.appointment_date_container').fadeIn(200);

        $(this).css('background-color', '#198754');
        $('.dont-booking-apoointment').css('background-color', '#fff');
    });

    // event on dont booking apoointment to hide date field
    $('.dont-booking-apoointment').change(function () {
        $('.session-form').height($('.session-form').height() - 80 + 'px');
        $('.appointment_date_container').fadeOut(200);

        $(this).css('background-color', '#dc3545');
        $('.booking-apoointment').css('background-color', '#fff');
    });

    var getNumber, getNumber_state = 0;

    // active and disable setInterval for check if any number status is idle 
    function toggle_interval(state) {
        if (state == 0) {
            getNumber_state = 0;
            clearInterval(getNumber);
            return;
        } else {
            getNumber_state = 1;
            getNumber = setInterval(() => {
                console.log('toggle');
                get_phone_number();
            }, 2000);
        }
    }

    // print data like printer
    function print_phone_number(phone) {
        btn_state = 1;
        setTimeout(() => {
            btn_state = 0;
        }, 2000);
        dataarray = phone.split('');
        $('.number-text').text('');
        dataarray.forEach((element, i) => {
            setTimeout(() => {
                $('.number-text').text($('.number-text').text() + element);
            }, i * 100);
        });
    }

    // get phone number
    function get_phone_number(phone = null) {
        $.ajax({
            type: 'GET',
            url: employee_path+'phone/get-number',
            success: function (data) {
                if (data.length >= 7) {
                    $('.enter-number').fadeOut();
                    $('.new-option').show();
                    print_phone_number(data);
                    toggle_interval(0);
                } else if (data.length == 0 && getNumber_state == 0) {
                    $('.number-text').text('');
                    $('.enter-number').fadeIn(1000);
                    $('.new-option').hide();
                    toggle_interval(1);
                }
            }
        });
    }

    function add_new_number(phone = null, status = null) {
        $.ajax({
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: 'http://31.9.57.141/laravel/call-center/public/employee/phone/new',
            data: {
                'phone': phone,
                'status': status,
            },
            success: function (data) {
                console.log(data);
            },
        });
    }

    function reject_number(phone = null) {
        $.ajax({
            type: 'POST',
            url: 'http://31.9.57.141/laravel/call-center/public/employee/phone/reject',
            data: {
                'phone': phone,
            },
            success: function (data) {
                close_form();
            }
        });
    }

    function busy_number(phone = null) {
        $.ajax({
            type: 'POST',
            url: 'http://31.9.57.141/laravel/call-center/public/employee/phone/busy',
            data: {
                'phone': phone,
            },
            success: function (data) {
                close_form();
            }
        });
    }

    function out_of_service_number(phone = null) {
        $.ajax({
            type: 'POST',
            url: 'http://31.9.57.141/laravel/call-center/public/employee/phone/out-of-service',
            data: {
                'phone': phone,
            },
            success: function (data) {
                close_form();
            }
        });
    }

    function idle_number(phone = null) {
        $.ajax({
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: 'http://31.9.57.141/laravel/call-center/public/employee/phone/idle',
            data: {
                'phone': phone,
            },
            success: function (data) {
                close_form();
            }
        });
    }

    function get_status_number(phone = null) {
        $.ajax({
            type: 'GET',
            url: 'http://31.9.57.141/laravel/call-center/public/employee/phone/get-status-number',
            data: {
                'phone': phone,
            },
            success: function (data) {
                if (data == 'process') {
                    btn_diable(1,'The number is already processed');
                } else if (data == 'in process') {
                    console.log(data);
                    btn_diable(1,'You have entered a number that matches the displayed number');
                    setTimeout(()=>{
                        btn_diable(0);
                        close_form();
                    },3000);
                } else {
                    in_process(phone);
                }
            }
        });
    }

    function set_status_number(phone = null) {
        $.ajax({
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: 'http://31.9.57.141/laravel/call-center/public/employee/phone/set-status-number',
            data: {
                'phone': phone,
                'status': 'process',
            },
            success: function (data) {
                console.log(data);
            }
        });
    }

    function in_process(phone = null) {
        $.ajax({
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: 'http://31.9.57.141/laravel/call-center/public/employee/phone/in-process',
            data: {
                'phone': phone,
                'status': 'process',
            },
            success: function (data) {
                console.log(data);
            }
        });
    }

    function new_number(phone = null) {
        $.ajax({
            type: 'GET',
            url: 'http://31.9.57.141/laravel/call-center/public/employee/phone/new',
            data: {
                'phone': phone,
                'status': 'reject'
            },
            success: function (data) {
                console.log(data);
            }
        });
    }

    $('.save_Session_info').click(function () {
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var middle_name = $('#middle_name').val();
        var id_number = $('#id_number').val();
        var work = $('#work').val();

        var city = $('#city').val();
        var street = $('#street').val();
        var zip = $('#zip').val();

        var email = $('#email').val();
        // var phone = $('#phone').val();
        var phone = ($('.enter-number').val().length == 0) ? $('.number-text').text() : $('.enter-number').val();

        var note = $('#note').val();

        var appointment_date = $('#appointment_date').val();

        $.ajax({
            type: 'POST',
            url: 'http://31.9.57.141/laravel/call-center/public/employee/save_session_info',
            data: {
                'first_name': first_name,
                'last_name': last_name,
                'middle_name': middle_name,
                'id_number': id_number,
                'city': city,
                'street': street,
                'zip': zip,
                'email': email,
                'phone': phone,
                'note': note,
                'work': work,
                'appointment_date': appointment_date,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                add_new_number(phone, 'proccessed');

                $('.success-message-text').text(data.message);
                $('.message-alert-success').fadeIn(1500);

                close_form();
                $('.new-btn').text('New');
                $('.enter-number').val('');
                $('.clear-enter-number').hide();
                $('.enter-number').fadeOut(500);
                $('.number-text').fadeIn(1500);
                setTimeout(() => {
                    get_phone_number();
                }, 1000);

                setTimeout(() => {
                    $('.message-alert-success').fadeOut(1500);
                }, 8000);
            },
            error: function (data) {
                // $('.failed-message-text').text(data.responseJSON.message);
                $('.failed-message-text').text('Please validate the data and try again');
                $('.message-alert-failed').fadeIn(1500);
                setTimeout(() => {
                    $('.message-alert-failed').fadeOut(1500);
                }, 15000);
            }
        });


    });

    $('.message-alert-failed button').click(() => {
        $('.message-alert-failed').fadeOut(1500);
    });

    $('.message-alert-success button').click(() => {
        $('.message-alert-success').fadeOut(1500);
    });


    get_phone_number(); // call function png to get phone number



    function close_form() {
        $('.new-btn').text('New');
        $('.enter-number').val('');
        $('.clear-enter-number').hide();
        $('.enter-number').fadeOut(500);
        $('.number-text').fadeIn(1500);

        $('.acceptance-service').css('background-color', '#fff');
        $('.acceptance-service').prop('checked', false);

        $('.reject-service').css('background-color', '#fff');
        $('.reject-service').prop('checked', false);

        $('.booking-apoointment').css('background-color', '#fff');
        $('.booking-apoointment').prop('checked', false);

        $('.dont-booking-apoointment').css('background-color', '#fff');
        $('.dont-booking-apoointment').prop('checked', false);
        $('.appointment_date_container').hide();

        $('.session-form').fadeOut(1000);

        $('html, body').animate({
            scrollTop: 0
        }, 500);

        $('.form-field').fadeOut(500);

        $('#first_name').val('');
        $('#last_name').val('');
        $('#middle_name').val('');
        $('#id_number').val('');
        $('#work').val('');
        $('#city').val('');
        $('#street').val('');
        $('#zip').val('');
        $('#note').val('');
        $('#email').val('');

        $('#note').height('20px');

        $('.enter-number').val('');
        $('.clear-enter-number').fadeOut();
        $('.number-text').fadeIn(1500);

    }

    function btn_diable(state,message='') {
        if (state == 0) {
            $('.enter-number').css('border', 'initial');
            $('.answered-btn').prop('disabled', false);
            $('.reject-btn').prop('disabled', false);
            $('.reject-btn').prop('disabled', false);
            $('.busy-btn').prop('disabled', false);
            $('.out-of-service-btn').prop('disabled', false);
        } else {
            $('.enter-number').css('border', '2px solid red');
            $('.answered-btn').prop('disabled', true);
            $('.reject-btn').prop('disabled', true);
            $('.reject-btn').prop('disabled', true);
            $('.busy-btn').prop('disabled', true);
            $('.out-of-service-btn').prop('disabled', true);
            $('.failed-message-text').text(message);
            $('.message-alert-failed').fadeIn(1500);
            $('.message-alert-failed').delay(3000).fadeOut(1500);
        }
    }

});