
function get_expenses() {
    $.ajax({
        type: "POST",
        url: 'model/expenses.php',
        data: $(this).serialize() + "&get_expenses="+1,
        success: function(response) {
            var jsonData = JSON.parse(response);
            console.log(jsonData);
        }
    });
}

function get_money_at_moment() {
    $.ajax({
        type: "POST",
        url: 'model/money.php',
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
        url: 'model/expenses.php',
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
        url: 'model/incomes.php',
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
                    text: 'Algo salio mal al guardar!'
                });
            }


        }
    });

    name.value = '';
    amount.value = '';
    description.value = '';
}
