function ShowColture() {
    let currentState = document.getElementById("inputStato").value;
    if (currentState > 1 && currentState < 7) {
        document.getElementById("divColtura").classList.remove("d-none");
        document.getElementById("divStato").classList.remove("col-md-12");
        document.getElementById("divStato").classList.add("col-md-6");
        document.getElementById("inputColtura").disabled = false;
    } else {
        document.getElementById("divColtura").classList.add("d-none");
        document.getElementById("divStato").classList.remove("col-md-6");
        document.getElementById("divStato").classList.add("col-md-12");
        document.getElementById("inputColtura").disabled = true;
    }
}

function ActivateOption(num, nameslc) {
    document.getElementById(nameslc).value = num;
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

function sensoreScroll() {
    var maxRows = 6;
    var table = document.getElementById('tblSensore');
    var wrapper = table.parentNode;
    var rowsInTable = table.rows.length;
    var height = 0;
    if (rowsInTable > maxRows) {
        for (var i = 0; i < maxRows; i++) {
            height += table.rows[i].clientHeight;
        }
        wrapper.style.height = height + "px";
    }
}

function terrenoScroll() {
    var maxRows = 6;
    var table = document.getElementById('tblTerreno');
    var wrapper = table.parentNode;
    var rowsInTable = table.rows.length;
    var height = 0;
    if (rowsInTable > maxRows) {
        for (var i = 0; i < maxRows; i++) {
            height += table.rows[i].clientHeight;
        }
        wrapper.style.height = height + "px";
    }
}