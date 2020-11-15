function ShowColture() {
    let currentState = $("#inputStato").val();
    if (currentState > 2 && currentState < 7) {
        $("#divColtura").removeClass("d-none");
        $("#divStato").removeClass("col-md-12").addClass("col-md-6");
    } else {
        $("#divColtura").addClass("d-none");
        $("#divStato").removeClass("col-md-6").addClass("col-md-12");
    }
}

function ShowAlert(mess) {
    window.alert(mess);
}

function ShowPassword() {
    $('.toggle-password').on('click', function() {
        $(this).toggleClass('fa-eye fa-eye-slash');
        let input = $($(this).attr('toggle'));
        if (input.attr('type') == 'password') {
            input.attr('type', 'text');
        } else {
            input.attr('type', 'password');
        }
    });
}

function IsLogged() {}

function CheckPassword() {
    let value = $("#inputNPassword").val();
    let value1 = $("#inputCPassword").val();

    if (value === value1) {
        $("#inputCPassword").removeClass("is-valid is-invalid").addClass("is-valid");
        $("#bttSend").prop("disabled", false);
    } else {
        $("#inputCPassword").removeClass("is-valid is-invalid").addClass("is-invalid");
        $("#bttSend").prop("disabled", true);
    }

    if (value == '' || value1 == '') {
        $("#inputCPassword").removeClass("is-valid is-invalid");
        $("#bttSend").prop("disabled", false);
    }
}