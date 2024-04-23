var btnSubmitCreate = document.getElementById('btnSubmitCreate');
btnSubmitCreate.addEventListener('click', function () {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    let validador = {
        tipo_pago: document.getElementById('tipo_pago').value,
        correo_solicitante: document.getElementById('correo_solicitante').value,
        fecha_pago: document.getElementById('fecha_pago').value,
        monto_aprox: document.getElementById('monto_aprox').value
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
            tipo_pago: document.getElementById('tipo_pago').value,
            correo_solicitante: document.getElementById('correo_solicitante').value,
            fecha_pago: document.getElementById('fecha_pago').value,
            monto_aprox: document.getElementById('monto_aprox').value
        }

        showLoadingAlert()
        $(this).prop('disabled', true).html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> CARGANDO...'
        ).addClass('btn btn-secondary');

        axios.post(createUrl, data, {
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