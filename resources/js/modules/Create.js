$(document).ready(function () {
    $('#payment_type').on('change', function () {
        var selectedTipoPago = $(this).val();

        if (selectedTipoPago == '1' || selectedTipoPago == '2') {
            $('#vuelo_vuelta').addClass('d-none');
            $('#vuelo_ida').addClass('d-none');
        }
        if (selectedTipoPago == '3') {
            $('#option_payment_link_pse_portals').removeClass('d-none');
            $('#option_reference_id_pse_portals').removeClass('d-none');
            $('#option_payment_instructions_pse_portals').removeClass('d-none');
            $('#vuelo_vuelta').addClass('d-none');
            $('#vuelo_ida').addClass('d-none');
        } else if (selectedTipoPago == '5') {
            $('#option_payment_link_pse_portals').removeClass('d-none');
            $('#option_reference_id_pse_portals').removeClass('d-none');
            $('#option_payment_instructions_pse_portals').removeClass('d-none');
            $('#option_user_portals').removeClass('d-none');
            $('#option_password_portals').removeClass('d-none');
            $('#vuelo_vuelta').addClass('d-none');
            $('#vuelo_ida').addClass('d-none');
        } else {
            $('#option_payment_link_pse_portals').addClass('d-none');
            $('#option_reference_id_pse_portals').addClass('d-none');
            $('#option_payment_instructions_pse_portals').addClass('d-none');
            $('#option_user_portals').addClass('d-none');
            $('#option_password_portals').addClass('d-none');
        }

        if (selectedTipoPago == '4') {
            $('#option_vuelo').removeClass('d-none');
        } else {
            $('#option_vuelo').addClass('d-none');
        }

        if (selectedTipoPago == '6') {
            $('#option_urgentes').removeClass('d-none');
            $('#vuelo_vuelta').addClass('d-none');
            $('#vuelo_ida').addClass('d-none');
        } else {
            $('#option_urgentes').addClass('d-none');
        }
    });

    $('#flight_type').on('change', function () {
        var selectedTipoVuelo = $(this).val();

        if (selectedTipoVuelo == '1') {
            $('#vuelo_vuelta').removeClass('d-none');
            $('#vuelo_ida').removeClass('d-none');
        } else if (selectedTipoVuelo == '2') {
            $('#vuelo_vuelta').addClass('d-none');
            $('#vuelo_ida').removeClass('d-none');
            $('#vuelo_ida').removeClass('mb-4');
        } else {
            $('#vuelo_vuelta').addClass('d-none');
            $('#vuelo_ida').addClass('d-none');
        }
    });

    var btnSubmitCreate = document.getElementById('btnSubmitCreate');
    btnSubmitCreate.addEventListener('click', function () {

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        let payment_type = document.getElementById('payment_type').value;
        let flight_type = document.getElementById('flight_type').value;

        let validador = {
            payment_type: payment_type,
            payment_name: document.getElementById('payment_name').value,
            email: document.getElementById('email').value,
            payment_date: document.getElementById('payment_date').value,
            approximate_amounte: document.getElementById('approximate_amounte').value,
        };

        if (payment_type == '1' || payment_type == '2') {
            validador.archivo = document.getElementById('archivo').value
        } else if (payment_type == '3') {
            validador.payment_link = document.getElementById('payment_link').value
            validador.reference_id = document.getElementById('reference_id').value
            validador.payment_instructions = document.getElementById('payment_instructions').value
        } else if (payment_type == '4') {
            validador.flight_type = flight_type
            validador.airline_link = document.getElementById('airline_link').value
        } else if (payment_type == '5') {
            validador.payment_link = document.getElementById('payment_link').value
            validador.reference_id = document.getElementById('reference_id').value
            validador.user = document.getElementById('user').value
            validador.password = document.getElementById('password').value
            validador.payment_instructions = document.getElementById('payment_instructions').value
        } else if (payment_type == '6') {
            validador.account_number = document.getElementById('account_number').value
            validador.account_bank = document.getElementById('account_bank').value
            validador.identification = document.getElementById('identification').value
        }

        if (flight_type == '1') {
            validador.city_origin = document.getElementById('city_origin').value
            validador.destination_city = document.getElementById('destination_city').value
            validador.departure_date = document.getElementById('departure_date').value
            validador.outeard_flight_schedule = document.getElementById('outeard_flight_schedule').value
            validador.ida_observation = document.getElementById('ida_observation').value
            validador.city_origin_return = document.getElementById('city_origin_return').value
            validador.city_destination_return = document.getElementById('city_destination_return').value
            validador.return_date = document.getElementById('return_date').value
            validador.return_flight_schedule = document.getElementById('return_flight_schedule').value
            validador.return_observation = document.getElementById('return_observation').value
        } else if (flight_type == '2') {
            validador.city_origin = document.getElementById('city_origin').value
            validador.destination_city = document.getElementById('destination_city').value
            validador.departure_date = document.getElementById('departure_date').value
            validador.outeard_flight_schedule = document.getElementById('outeard_flight_schedule').value
            validador.ida_observation = document.getElementById('ida_observation').value
        }

        let allFieldsFilled = true;
        let emptyFields = [];

        for (let key in validador) {
            if (validador.hasOwnProperty(key)) {
                let element = document.getElementById(key);
                if (!validador[key]) {
                    allFieldsFilled = false;
                    element.classList.add('is-invalid');
                    emptyFields.push(element.getAttribute('data-title'));
                } else {
                    element.classList.remove('is-invalid');
                    element.classList.add('is-valid');
                }
            }
        }

        if (allFieldsFilled) {

            let formData = new FormData(document.getElementById("payments"));
            console.log(formData);
            var data = {
                payment_type: document.getElementById('payment_type').value,
                payment_name: document.getElementById('payment_name').value,
                email: document.getElementById('email').value,
                payment_date: document.getElementById('payment_date').value,
                approximate_amounte: document.getElementById('approximate_amounte').value,
                payment_link: document.getElementById('payment_link').value,
                reference_id: document.getElementById('reference_id').value,
                payment_instructions: document.getElementById('payment_instructions').value,
                user: document.getElementById('user').value,
                password: document.getElementById('password').value,
                airline_link: document.getElementById('airline_link').value,
                city_origin: document.getElementById('city_origin').value,
                destination_city: document.getElementById('destination_city').value,
                departure_date: document.getElementById('departure_date').value,
                outeard_flight_schedule: document.getElementById('outeard_flight_schedule').value,
                ida_observation: document.getElementById('ida_observation').value,
                city_origin_return: document.getElementById('city_origin_return').value,
                city_destination_return: document.getElementById('city_destination_return').value,
                return_date: document.getElementById('return_date').value,
                return_flight_schedule: document.getElementById('return_flight_schedule').value,
                return_observation: document.getElementById('return_observation').value,
                account_number: document.getElementById('account_number').value,
                account_bank: document.getElementById('account_bank').value,
                identification: document.getElementById('identification').value
            }

            showLoadingAlert()
            $(this).prop('disabled', true).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> CARGANDO...'
            ).addClass('btn btn-secondary');

            axios.post(createUrl, formData, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                }
            })
                .then(response => {
                    console.log(response)
                    if (response.data.status === 200) {
                        Swal.fire({
                            icon: 'success',
                            title: response.data.title,
                            text: response.data.message
                        }).then(() => {
                            window.location = "/"
                        })
                    }
                })
                .catch(error => {
                    console.log(error)
                    Swal.fire({
                        icon: 'error',
                        title: "Error en el servidor",
                        text: "Por favor intenta más tarde"
                    })
                });

        } else {
            let errorMessage = "<ul style='list-style-type: none; margin: 0; padding: 0'>";
            emptyFields.forEach(title => {
                errorMessage += `<li>${title}</li>`;
            });
            errorMessage += "</ul>";

            Swal.fire({
                title: 'Campos Vacíos',
                html: errorMessage,
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });

    function showLoadingAlert() {
        Swal.fire({
            icon: 'info',
            html: '<span class="iconify me-3" data-icon="line-md:uploading-loop" data-width="150" style="color: rgb(87, 24, 176)"></span><span class="fw-bold h3">Cargando...</span>',
            showCancelButton: false,
            showConfirmButton: false,
            allowOutsideClick: false
        });
    }
});
