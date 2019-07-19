function onChange() {
    var selecter = document.getElementById('sort-select'),
        option = selecter.options[selecter.selectedIndex].value;

    if (option === "accommodations") {
        sortTable($('#accommodation').index());
    } else if (option === "price") {
        sortTable($('#price').index());
    } else if (option === 'id') {
        sortTable($('#id').index());
    }
}

function sortTable(index) {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("table");
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[index];
            y = rows[i + 1].getElementsByTagName("td")[index];
            if (parseFloat(x.innerHTML) < parseFloat(y.innerHTML.toLowerCase())) {
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}