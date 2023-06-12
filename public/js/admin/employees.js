
$(document).ready(function () {

    function get_clients(employee_name='') {
        $.ajax({
            'type': 'GET',
            'url': admin_path+'get-all-employees',
            data: {
                'employee_name' : employee_name
            },
            success: function (data) {
                $('.employees-table-body').html('');
                $('.filter-result-employees .number-of-result').text(data.length);
                $('.filter-result-employees').fadeIn(500);
                if (data.length>0){
                    data.forEach(client => {
                        template = `
                            <tr>
                                <td>${client.first_name} ${client.middle_name} ${client.last_name}</td>
                                <td>${client.address}</td>
                                <td>${client.phone}</td>
                                <td>${client.email}</td>
                                <td>${client.id_number}</td>
                                <td>
                                    <button class="btn btn-danger" client_id="${client.id}" disabled>remove</button>
                                    <button class="btn btn-primary" client_id="${client.id}" disabled>edit</button>
                                    <button class="btn btn-success" client_id="${client.id}" disabled>view</button>
                                </td>
                            </tr>
                        `;
                        
                        $('.employees-table-body').html($('.employees-table-body').html() + template);
                    });
                }
            },
            error: function () {

            }
        })
    }
    get_clients();

    $('.filtering-employees').keyup(()=>{
        get_clients($('.filtering-employees').val());
    });

});