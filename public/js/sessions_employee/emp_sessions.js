$(document).ready(() => {
    var url;
    $('.session-info-view').hide();
    // $('.employee-sessions .content').hide();

    var t = document.querySelectorAll('.session-view-btn');

    t.forEach(element => {
        element.addEventListener('click', function () {
            $.ajax({
                type: 'GET',
                url: employee_path+'get_session_info',
                data: {
                    'id': this.id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {

                    console.log(data);

                    $('.first_name_view').text(data['client'].first_name);
                    $('.middle_name_view').text(data['client'].middle_name);
                    $('.last_name_view').text(data['client'].last_name);
                    $('.work_view').text(data['client'].work);
                    $('.email_view').text(data['client'].email);
                    $('.phone_view').text(data['client'].phone);
                    $('.city_view').text(data['client'].city);
                    $('.street_view').text(data['client'].street);
                    $('.appointment_date_view').text(data['session'].appointment_date);
                    $('.note_view').text(data['session'].note);

                },
                error: function (data) {

                }
            });

            $('.employee-sessions .gg').fadeOut(1000);
            $('.session-info-view').fadeIn(1000);
        });
    });

    $('.session-info-view .session-close-view-btn').click(() => {
        $('.session-info-view').fadeOut(1000);
        $('.employee-sessions .gg').fadeIn(1000);

    });

    $('#search_text').keyup((ele) => {
        get_sessions();
    });

    function get_sessions() {
        $.ajax({
            type: "GET",
            url: employee_path+'get-sessions',
            data: {
                'keyword': $('#search_text').val()
            },
            success: function (data) {

                $('.table-body').html('');
                $('.result_number_num').text(data.length);
                data.forEach(element => {
                    template = `
                        <tr>
                            <td>${element.first_name} ${element.middle_name} ${element.last_name}</td>
                            <td>${element.email}</td>
                            <td>${element.phone}</td>
                            <td>${element.appointment_date}</td>
                            <td>${element.status}</td>
                            <td>
                                <button class="btn btn-primary session-view-btn" id='${element.data_id}'>view</button>
                            </td>
                        </tr> 
                    `;
                    $('.table-body').html($('.table-body').html() + template);
                });

            },
            error: function () {

            }
        });
    }
    get_sessions();
});