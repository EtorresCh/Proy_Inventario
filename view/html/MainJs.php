<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
<script src="../../dist/libs/select2/js/select2.min.js"></script>
<script src="../../dist/js/tabler.min.js?1692870487" defer></script>
<script src="../../dist/js/demo.min.js?1692870487" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script>
document.addEventListener("DOMContentLoaded", function () {
  const currentPath = window.location.pathname;
  document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
    const tempLink = document.createElement("a");
    tempLink.href = link.href;
    const linkPath = tempLink.pathname;
    if (currentPath.endsWith(linkPath)) {
      document.querySelectorAll('.navbar-nav .nav-item').forEach(item =>
        item.classList.remove('active')
      );
      link.closest('.nav-item').classList.add('active');
    }
  });
});
</script>