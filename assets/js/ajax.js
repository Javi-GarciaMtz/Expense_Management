
function get_expenses(){
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