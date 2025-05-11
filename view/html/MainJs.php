<script src="../../dist/js/tabler.min.js?1692870487" defer></script>
<script src="../../dist/js/demo.min.js?1692870487" defer></script>
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