$(document).ready(function () {
    $('.filter-result-number').hide();

    function get_clients(keyword='') {
        $.ajax({
            'type': 'GET',
            'url': admin_path+'get-all-clients',
            data: {
                'keyword' : keyword
            },
            success: function (data) {
                $('.clients-table-body').html('');
                $('.filter-result-client .number-of-result').text(data.length);
                $('.filter-result-client').fadeIn(500);
                if (data.length>0){
                    data.forEach(client => {
                        template = `
                            <tr>
                                <td>${client.first_name} ${client.middle_name} ${client.last_name}</td>
                                <td>${client.city}</td>
                                <td>${client.street}</td>
                                <td>${client.phone}</td>
                                <td>${client.email}</td>
                                <td>${client.work}</td>
                                <td>${client.id_number}</td>
                                <td>
                                    <button class="btn btn-danger" client_id="${client.id}" disabled>remove</button>
                                    <button class="btn btn-primary" client_id="${client.id}" disabled>edit</button>
                                    <button class="btn btn-success" client_id="${client.id}" disabled>view</button>
                                </td>
                            </tr>
                        `;
                        
                        $('.clients-table-body').html($('.clients-table-body').html() + template);
                    });
                }
            },
            error: function () {

            }
        })
    }
    get_clients();

    $('.filtering-client').keyup(()=>{
        get_clients($('.filtering-client').val());
    });

});