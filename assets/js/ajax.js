
function get_expenses() {
    $.ajax({
        type: "POST",
        url: 'model/Routing/RoutingExpenses.php',
        data: $(this).serialize() + "&get_expenses_all="+1,
        success: function(response) {
            var jsonData = JSON.parse(response);
            console.log(jsonData);
        }
    });
}

function get_money_at_moment() {
    $.ajax({
        type: "POST",
        url: 'model/Routing/RoutingMoney.php',
        data: $(this).serialize() + "&get_money="+1,
        success: function(response) {
            var jsonData = JSON.parse(response);
            // console.log(jsonData);
            let content = document.querySelector('#content');

            content.innerHTML = '';
            content.innerHTML = `
                <br/>
                <div class="container">
                    <h2>Dinero actual: $${jsonData['money_at']}</h2>
                </div>
            `;
        }
    });
}

function add_expense() {
    let name = document.querySelector("#name");
    let cost = document.querySelector("#cost");
    let description = document.querySelector("#description");
    let data = [];
    data.push(name.value, cost.value, description.value);

    $.ajax({
        type: "POST",
        url: 'model/Routing/RoutingExpenses.php',
        data: $(this).serialize() + "&add_expense="+data,
        success: function(response) {
            var jsonData = JSON.parse(response);
            // console.log(jsonData);

            if(jsonData.status == "success") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Gasto agregado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Algo salio mal al guardar!'
                });
            }


        }
    });

    name.value = '';
    cost.value = '';
    description.value = '';
}

function add_income() {
    let name = document.querySelector("#name");
    let amount = document.querySelector("#amount");
    let description = document.querySelector("#description");
    let data = [];
    data.push(name.value, amount.value, description.value);

    $.ajax({
        type: "POST",
        url: 'model/Routing/RoutingIncomes.php',
        data: $(this).serialize() + "&add_income="+data,
        success: function(response) {
            var jsonData = JSON.parse(response);
            // console.log(jsonData);

            if(jsonData.status == "success") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Ingreso agregado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: `${jsonData['message']}`
                });
            }


        }
    });

    name.value = '';
    amount.value = '';
    description.value = '';
}

function expenses_mont() {
    let month = document.querySelector("#month");
    let year = document.querySelector("#year");
    let data = [];
    data.push(month.value, year.value);

    $.ajax({
        type: "POST",
        url: 'model/Routing/RoutingExpenses.php',
        data: $(this).serialize() + "&get_expenses_month="+data,
        success: function(response) {
            var jsonData = JSON.parse(response);
            console.log(jsonData);

            if(jsonData.status == "success" && jsonData['expenses'].length != 0) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Gastos obtenidos correctamente',
                    showConfirmButton: false,
                    timer: 1500
                });

                let content = document.querySelector('#content');
                content.innerHTML = '';
                let rows = '';
                let table =`
                <br/>
                <div class="container">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Gasto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>`;

                for(let i=0; i<jsonData['expenses'].length; i++) {
                    table += `
                        <tr>
                            <th scope="row">${jsonData['expenses'][i][1]}</th>
                            <td>${jsonData['expenses'][i][2]}</td>
                            <td>${jsonData['expenses'][i][3]}</td>
                        </tr>
                    `;
                }

                table += `
                        </tbody>
                    </table>
                </div>`;

                content.innerHTML = table;

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No hay gastos en ese mes!'
                });
            }


        }
    });

    month.value = '';
    year.value = '';

}