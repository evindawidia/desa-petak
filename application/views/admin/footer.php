</div>
<script src="<?= base_url() ?>public/admin/dist/js/custom.js"></script>
<script>
    $(".datatable").DataTable({
        "ordering": false
    })
    $(".delete").click(function(e) {
        e.preventDefault();
        var url = $(this).attr("href");
        Question(function() {
            location.href = url;
        }, "Anda yakin menghapus data ini ? ")
    })
</script>

</body>

</html>