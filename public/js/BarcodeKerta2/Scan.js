$(document).ready(function() {
    $('.dropdown-submenu a.test').on("click", function(e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    $('#TableType').DataTable({
        order: [
            [0, 'desc']
        ],
    });

    $('#TableType1').DataTable({
        order: [
            [0, 'desc']
        ],
    });
});