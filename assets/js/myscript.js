const flashData = $('.flash-data').data('flashdata');

if( flashData ) {
	Swal.fire({
		title: 'Data Mahasiswa',
		text: 'Berhasil ' + flashData,
		type: 'success'
	});
}

$('.tombol-hapus').on('click', function(event) {
	event.preventDefault();
	const hrefHapus = $(this).attr('href');
	Swal.fire({
	  title: 'Anda Yakin?',
	  text: "Data Mahasiswa Akan Dihapus!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus Data!'
	}).then((result) => {
	  if (result.value) {
	    	document.location.href = hrefHapus;
	  }
	});

});