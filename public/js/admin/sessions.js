
$(document).ready(function () {

    function get_clients(employee_name='') {
        $.ajax({
            'type': 'GET',
            'url': admin_path+'get-all-sessions',
            data: {
                'employee_name' : employee_name
            },
            success: function (data) {
                $('.sessions-table-body').html('');
                $('.filter-result-sessions .number-of-result').text(data.length);
                $('.filter-result-sessions').fadeIn(500);
                if (data.length>0){
                    data.forEach(client => {
                        template = `
                            <tr>
                                <td>${client.employee_id}</td>
                                <td>${client.client_id}</td>
                                <td>${client.appointment_id}</td>
                                <td>${client.note}</td>
                                <td>
                                    <button class="btn btn-danger" client_id="${client.id}" disabled>remove</button>
                                    <button class="btn btn-primary" client_id="${client.id}" disabled>edit</button>
                                    <button class="btn btn-success" client_id="${client.id}" disabled>view</button>
                                </td>
                            </tr>
                        `;
                        
                        $('.sessions-table-body').html($('.sessions-table-body').html() + template);
                    });
                }
            },
            error: function () {

            }
        })
    }
    get_clients();

    $('.filtering-sessions').keyup(()=>{
        get_clients($('.filtering-sessions').val());
    });

});