$('.export-data-info').hide();
$(document).ready(() => {
    $('.export-info').hide();

    $('.single-client').hide();
    $('.all-client').hide();
    $('.single-session').hide();
    $('.all-session').hide();
    $('.all-phone-numbers').hide();
    $('.single-phone-number').hide();
    $('.all-appointments').hide();
    $('.single-appointments').hide();

    document.querySelectorAll('.option-item').forEach((ele) => {
        ele.addEventListener('click', () => {
            $('.single-client').hide();
            $('.all-client').hide();
            $('.single-session').hide();
            $('.all-sessions').hide();
            $('.all-phone-numbers').hide();
            $('.single-phone-number').hide();
            $('.all-appointments').hide();
            $('.single-appointment').hide();

            switch (ele.id) {
                case "singleClient":
                    $('.single-client').fadeIn();
                    break;
                case "allClients":
                    $('.all-client').show();
                    break;
                case "singleSession":
                    $('.single-session').show();
                    break;
                case "allSessions":
                    $('.all-sessions').show();
                    break;
                case "singleAppointment":
                    $('.single-appointment').show();
                    break;
                case "allAppointments":
                    $('.all-appointments').show();
                    break;
                case "allPhoneNumbers":
                    $('.all-phone-numbers').show();
                    break;
                case "singlePhoneNumber":
                    $('.single-phone-number').show();
                    break;
            }

            $('.export-options-1').fadeOut();
            $('.export-data-info').delay(500).fadeIn(1500);
        });
    });

    $('.close-export-info').click((ele) => {
        $('.export-data-info').hide();
        $('.export-options-1').fadeIn(1500);
    });
});