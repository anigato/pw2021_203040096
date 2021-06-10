	<!-- Latest jQuery form server -->
	<script src="https://code.jquery.com/jquery.min.js"></script>

	<!-- Bootstrap JS form CDN -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

	<!-- sweetalert -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="js/script.js"></script>
	<script>
		jQuery(document).ready(function($) {
			$('.logout-link').on('click', function() {
				var getLink = $(this).attr('href');

				Swal.fire({
					title: 'Warning!',
					text: 'Yakin ingin keluar?',
					icon: 'warning',
					// html:true,
					showCancelButton: true,
					cancelButtonColor: '#d33',
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Ya'
				}).then((result) => {
					if (result.value) {
						Swal.fire({
							title: 'Success!',
							text: 'Kamu berhasil keluar',
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'OK'
						}).then((result) => {
							if (result.value) {
								window.location.href = getLink;
							}
						})
					}
				});
				return false;
			});
		});
	</script>