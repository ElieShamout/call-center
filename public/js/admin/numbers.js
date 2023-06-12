
$(document).ready(function () {

    function get_clients(phone='') {
        $.ajax({
            'type': 'GET',
            'url': admin_path+'get-all-numbers',
            data: {
                'phone' : phone
            },
            success: function (data) {
                $('.numbers-table-body').html('');
                $('.filter-result-numbers .number-of-result').text(data.length);
                $('.filter-result-numbers').fadeIn(500);
                if (data.length>0){
                    data.forEach(client => {
                        template = `
                            <tr>
                                <td>${client.employee_id}</td>
                                <td>${client.phone_number}</td>
                                <td>${client.status}</td>
                                <td>
                                    <button class="btn btn-danger" client_id="${client.id}" disabled>remove</button>
                                    <button class="btn btn-primary" client_id="${client.id}" disabled>edit</button>
                                    <button class="btn btn-success" client_id="${client.id}" disabled>view</button>
                                </td>
                            </tr>
                        `;
                        
                        $('.numbers-table-body').html($('.numbers-table-body').html() + template);
                    });
                }
            },
            error: function () {

            }
        })
    }
    get_clients();

    $('.filtering-numbers').keyup(()=>{
        get_clients($('.filtering-numbers').val());
    });

});