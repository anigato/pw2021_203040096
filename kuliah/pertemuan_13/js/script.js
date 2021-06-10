// ambil elemen2 yang dibutuhkan
// ambil elemen2 yang dibutuhkan
var keyword = document.getElementById('keyword');
var tombolcari = document.getElementById('tombol-cari');
var product = document.getElementById('product-row');


// tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function () {
	if (window.location.pathname == "/pertemuan_13/index.php") {
		fetch('ajax/index_ajax.php?keyword=' + keyword.value)
			.then((response) => response.text())
			.then((response) => (product.innerHTML = response));
	} else {
		fetch('ajax/admin_ajax.php?keyword=' + keyword.value)
			.then((response) => response.text())
			.then((response) => (product.innerHTML = response));
	}

});

//preview img
function previewImage() {
	const img = document.querySelector('.img');
	const imgPreview = document.querySelector('.img-preview');

	const oFRreader = new FileReader();
	oFRreader.readAsDataURL(img.files[0]);
	oFRreader.onload = function (oFREvent) {
		imgPreview.src = oFREvent.target.result;
	}
}