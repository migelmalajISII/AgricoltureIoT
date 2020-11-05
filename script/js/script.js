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