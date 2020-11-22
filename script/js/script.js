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

function IsLogged() {
    let value = $('#inputNUsername').val();
    $.ajax({
            type: "GET",
            url: "http://localhost:8000/Agriculture_IoT/config/registration.php?code=554&user=" + value,
        })
        .done(function(response) {
            console.log(response);
        });
}

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

function sensoreScroll() {
    var maxRows = 10;
    var table = document.getElementById('tblSensore');
    var wrapper = table.parentNode;
    var rowsInTable = table.rows.length;
    var height = 0;
    if (rowsInTable > maxRows) {
        for (var i = 0; i < maxRows; i++) {
            height += table.rows[i].clientHeight;
        }
        wrapper.style.height = height + "px";
        wrapper.style.width = "100%";
    }
}