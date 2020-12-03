$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });
    $('#dtVerticalScrollExample').DataTable({
        "scrollY": "200px",
        "scrollCollapse": true,
    });
    $('.dataTables_length').addClass('bs-select');
});