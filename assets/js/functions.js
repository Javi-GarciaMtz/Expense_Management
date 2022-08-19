
function change_content(value) {

    let content = document.querySelector('#content');

    switch (value) {

        case 'add_expense':
            content.innerHTML = '';
            content.innerHTML = `
                <div class="container">
                    <div class="row">

                        <div id="data_expenses">
                            <h4>Nombre: </h4>
                            <input type="text">
                            <h4>Nombre: </h4>
                            <input type="number">
                            <h4>Nombre: </h4>
                            <input type="text">
                            <h4>Nombre: </h4>
                            <input type="text">
                        </div>

                        <div class="col-md-12">
                            <button onclick="" type="button" class="btn btn-primary">Agregar gasto</button>
                        </div>
                    </div>
                </div>
            `;
            break;

        case 'get_expenses':
            content.innerHTML = '';
            content.innerHTML = 'Agregando gasto';
            get_expenses();

            break;

        default:
            break;
    }

}
