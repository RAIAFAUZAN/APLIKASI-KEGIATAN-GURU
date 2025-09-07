// ==== Bootstrap, AdminLTE, dan jQuery ====
import './bootstrap';
import 'admin-lte/dist/js/adminlte.min.js';
import $ from 'jquery';

// jQuery harus dipasang ke window biar dikenali plugin lama
window.$ = $;
window.jQuery = $;

// ==== DataTables core + plugin Bootstrap 5 ====
import 'datatables.net-bs5';
import 'datatables.net-responsive-bs5';
import 'datatables.net-buttons-bs5';

// ==== Plugin tombol export (opsional) ====
import 'datatables.net-buttons/js/buttons.html5.js';
import 'datatables.net-buttons/js/buttons.print.js';

// ==== Inisialisasi DataTable ====
$(document).ready(function () {
    $('#myTable').DataTable({
        responsive: true,
        dom: 'Bfrtip', // tempat tombol
        buttons: ['copy', 'excel', 'pdf', 'print'],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json' // optional: bahasa Indonesia
        }
    });
});
