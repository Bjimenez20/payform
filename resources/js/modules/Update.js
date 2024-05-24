var btnSubmitEdit = document.getElementById('btnSubmitEdit');
btnSubmitEdit.addEventListener('click', function () {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    let validador = {
        id: document.getElementById('id').value,
        payment_type: document.getElementById('payment_type').value,
        payment_state: document.getElementById('payment_state').value,
        payment_name: document.getElementById('payment_name').value,
        email: document.getElementById('email').value,
        payment_date: document.getElementById('payment_date').value,
        approximate_amounte: document.getElementById('approximate_amounte').value,
    };

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

        var data = {
            id: document.getElementById('id').value,
            payment_type: document.getElementById('payment_type').value,
            payment_state: document.getElementById('payment_state').value,
            payment_name: document.getElementById('payment_name').value,
            email: document.getElementById('email').value,
            payment_date: document.getElementById('payment_date').value,
            approximate_amounte: document.getElementById('approximate_amounte').value,
            payment_link: document.getElementById('payment_link')?.value || '',
            reference_id: document.getElementById('reference_id')?.value || '',
            user: document.getElementById('user')?.value || '',
            password: document.getElementById('password')?.value || '',
            payment_instructions: document.getElementById('payment_instructions')?.value || '',
            account_number: document.getElementById('account_number')?.value || '',
            account_bank: document.getElementById('account_bank')?.value || '',
            identification: document.getElementById('identification')?.value || '',
            airline_link: document.getElementById('airline_link')?.value || '',
            flight_type: document.getElementById('flight_type')?.value || '',
            city_origin: document.getElementById('city_origin')?.value || '',
            destination_city: document.getElementById('destination_city')?.value || '',
            departure_date: document.getElementById('departure_date')?.value || '',
            outeard_flight_schedule: document.getElementById('outeard_flight_schedule')?.value || '',
            ida_observation: document.getElementById('ida_observation')?.value || '',
            city_origin_return: document.getElementById('city_origin_return')?.value || '',
            city_destination_return: document.getElementById('city_destination_return')?.value || '',
            return_date: document.getElementById('return_date')?.value || '',
            return_flight_schedule: document.getElementById('return_flight_schedule')?.value || '',
            return_observation: document.getElementById('return_observation')?.value || ''
        }

        showLoadingAlert()
        $(this).prop('disabled', true).html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> CARGANDO...'
        ).addClass('btn btn-secondary');

        axios.post(updateUrl, data, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            }
        })
            .then(response => {
                if (response.data.status === 200) {
                    Swal.fire({
                        icon: 'success',
                        title: response.data.title,
                        text: response.data.message
                    }).then(() => {
                        window.location = "/home"
                    })
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: "Error en el servidor",
                    text: "Por favor intenta más tarde"
                })
                console.log(error)
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
})

function showLoadingAlert() {
    Swal.fire({
        type: 'info',
        html: '<span class="iconify me-3" data-icon="line-md:uploading-loop" data-width="150" style="color: rgb(87, 24, 176)"></span><span class="fw-bold h3">Cargando...</span>',
        showCancelButton: false,
        showConfirmButton: false,
        allowOutsideClick: false
    });
}