$(document).ready(function () {
	$('#tombol-cari').hide();

	$('#keyword').on('keyup',function () {
		$.get('LiveSearch/index.php?keyword=' + $('#keyword').val(), function (data) {
			$('.table-responsive').html(data);
		});
	});
})