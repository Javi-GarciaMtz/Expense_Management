
function change_content(value) {

    let content = document.querySelector('#content');

    switch (value) {

        case 'add_expense':
            content.innerHTML = '';
            content.innerHTML = `
                <br/>
                <div class="container">
                    <h2>Agregar Gasto</h2>
                    <div class="form-group">
                        <label for="name">Gasto</label>
                        <input type="text" class="form-control" id="name" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="cost">Costo</label>
                        <input type="number" class="form-control" id="cost" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <textarea class="form-control" id="description" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" onclick="add_expense();">Agregar</button>
                </div>
            `;
            break;

        case 'get_expenses_all':
            content.innerHTML = '';
            content.innerHTML = 'Consultando todos los gastos';
            get_expenses();

            break;

        case 'get_expenses_month':
            content.innerHTML = '';
            content.innerHTML = 'Consultando gastos por mes';
            break;

        case 'get_expenses_week':
            content.innerHTML = '';
            content.innerHTML = 'Consultando gastos por semana';
            break;

        case 'get_expenses_date':
            content.innerHTML = '';
            content.innerHTML = 'Consultando gastos por fecha en especifico';
            break;

        case 'add_income':
            content.innerHTML = '';
            content.innerHTML = 'Agregando ingreso';
            break;

        case 'home':
            get_money_at_moment();
            break;

        default:
            content.innerHTML = '';
            content.innerHTML = 'ERROR';
            break;
    }

}
