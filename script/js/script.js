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

function ExistUser() {
    let value = $('#inputNUsername').val();
    if (value == '') {
        $('#inputNUsername').removeClass("is-valid is-invalid").addClass("is-invalid");
        $('#bttSend').prop("disabled", true);
    } else {
        $.ajax({
                type: "GET",
                url: "..//config/registration.php?code=554&user=" + value,
            })
            .done(function(response) {
                if (response == 0) {
                    $('#inputNUsername').removeClass("is-valid is-invalid").addClass("is-valid");
                    $('#bttSend').prop("disabled", false);
                } else {
                    $('#inputNUsername').removeClass("is-valid is-invalid").addClass("is-invalid");
                    $('#bttSend').prop("disabled", true);
                }
            });
    }
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

function datoScroll() {
    var maxRows = 7;
    var table = document.getElementById('tblDati');
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

function LeggiDati(nomeChart, idsensor) {
    $.ajax({
            type: "GET",
            url: "../config/requestChart.php?code=695&id=" + idsensor + "&request=" + nomeChart,
        })
        .done(function(response) {
            let arr = response.split(";");
            setChart(nomeChart, arr[0], arr[1], arr[2], arr[3], arr[4], arr[5], arr[6]);
        });
}

function setChart(nomeChart, data1, data2, data3, data4, data5, data6) {
    var ctx = document.getElementById(nomeChart).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: data6.replace(/"/g, '').split(","),
            datasets: [{
                    label: 'Temperatura Terreno',
                    data: data1.replace(/"/g, '').split(","),
                    backgroundColor: 'transparent',
                    borderColor: getRandomColor(),
                    borderWidth: 3
                },
                {
                    label: 'Umidità Terreno',
                    data: data2.replace(/"/g, '').split(","),
                    backgroundColor: 'transparent',
                    borderColor: getRandomColor(),
                    borderWidth: 3
                },
                {
                    label: 'Temperatura Aria',
                    data: data3.replace(/"/g, '').split(","),
                    backgroundColor: 'transparent',
                    borderColor: getRandomColor(),
                    borderWidth: 3
                },
                {
                    label: 'Umidità Aria',
                    data: data4.replace(/"/g, '').split(","),
                    backgroundColor: 'transparent',
                    borderColor: getRandomColor(),
                    borderWidth: 3
                },
                {
                    label: 'Indice UV',
                    data: data5.replace(/"/g, '').split(","),
                    backgroundColor: 'transparent',
                    borderColor: getRandomColor(),
                    borderWidth: 3
                }
            ]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                scales: {
                    yAxes: [{ beginAtZero: false }],
                    xAxes: [{ autoskip: true, maxTicketsLimit: 20 }]
                }
            },
            tooltips: { mode: 'index' },
            legend: {
                display: true,
                position: 'top',
                labels: { fontColor: 'rgb(255,255,255)', fontSize: 16 }
            }
        }
    });
}

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}