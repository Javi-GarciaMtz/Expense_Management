
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
            content.innerHTML = `
                <br/>
                <div class="container">
                    <h2>Gastos por Mes</h2>

                    <div class="form-group">
                        <label for="month">Selecciona el mes</label>
                        <select class="form-control" id="month">
                            <option selected>Mes a consultar</option>
                            <option value="01">Enero</option>
                            <option value="02">Febrero</option>
                            <option value="03">Marzo</option>
                            <option value="04">Abril</option>
                            <option value="05">Mayo</option>
                            <option value="06">Junio</option>
                            <option value="07">Julio</option>
                            <option value="08">Agosto</option>
                            <option value="09">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="year">Año</label>
                        <input type="number" class="form-control" id="year" placeholder="">
                    </div>

                    <button type="submit" class="btn btn-primary" onclick="expenses_mont();">Consultar</button>
                </div>
            `;
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
            content.innerHTML = `
                <br/>
                <div class="container">
                    <h2>Agregar Ingreso</h2>
                    <div class="form-group">
                        <label for="name">Nombre del ingreso</label>
                        <input type="text" class="form-control" id="name" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="amount">Ingreso</label>
                        <input type="number" class="form-control" id="amount" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <textarea class="form-control" id="description" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" onclick="add_income();">Agregar</button>
                </div>
            `;
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
