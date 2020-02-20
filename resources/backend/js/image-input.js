(function() {
	const INPUT_SELECTOR               = '[data-role="image-id-input"]';
	const SELECT_IMAGE_SELECTOR        = '[data-role="select-image"]';
	const IMAGE_PREVIEW_SELECTOR       = '.image-preview';
	const IMAGE_UPLOAD_BUTTON_SELECTOR = '[data-role="image-upload-button"]';

	$(function() {
		const $input          = $(INPUT_SELECTOR);
		const $preview        = $(IMAGE_PREVIEW_SELECTOR);
		const $selectImageBtn = $(SELECT_IMAGE_SELECTOR);
		let currentPage   = 1;
		const $modal      = $('<div class="modal image-selector" id="myPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'
			+ '<div class="modal-dialog">'
			+ '<div class="modal-content">'
			+ '<button type="button" class="btn btn-default modal-close-btn" data-dismiss="modal" aria-hidden="true">'
			+ '<span class="remove" aria-hidden="true"></span></button>'
			+ '<div class="modal-header"></div>'
			+ '<div class="modal-body">'
			+ '</div>'
			+ '<div class="modal-footer">'
			+ '<button id="decrement-page" class="btn btn-primary">-</button>'
			+ '<button id="increment-page" class="btn btn-primary">+</button>'
			+ '</div>'
			+ '</div>'
			+ '</div>'
			+ '</div>'
		);

		const incrementPage = () => {
			currentPage++;

			updateImages(currentPage);
		};

		const decrementPage = () => {
			currentPage--;

			updateImages(currentPage);
		};

		$('body').on('click', '#increment-page', incrementPage);
		$('body').on('click', '#decrement-page', decrementPage);

		const updateImages = (page) => {
			const getImagesUrl = $selectImageBtn.data('url');

			$.ajax(
				{
					url:  getImagesUrl + '?page=' + page,
					type: 'GET',
					success: function(response) {
						const imagesBlock = document.createElement('div');
						imagesBlock.classList.add('image-selector__container');

						response.forEach((image) => {
							const inputRadio = document.createElement('input');
							inputRadio.name = 'image-radio';
							inputRadio.type = 'radio';

							const img = document.createElement('img');
							img.src = image.src;

							const imageDiv = document.createElement('div');
							imageDiv.classList.add('image-selector__item');
							imageDiv.append(inputRadio);
							imageDiv.append(img);

							$(inputRadio).on('change', () => {
								$input.val(image.id);
								$preview.attr('src', image.src);
								$preview.removeClass('d-none');
							});

							imagesBlock.appendChild(imageDiv);
						});

						$modal.find('.modal-body').empty().append($(imagesBlock));
					}
				}
			);

			$modal.modal();
		};

		$(SELECT_IMAGE_SELECTOR).on('click', function(e) {
			e.preventDefault();

			updateImages(currentPage);
		});

		$(IMAGE_UPLOAD_BUTTON_SELECTOR).on('click', function() {
			$('#image-upload-input').trigger('click');
		});

		$('#image-upload-input').on('change', function() {
			const form  = new FormData();
			form.append('image', this.files[0]);
			form.append('_token', $('#token').val());
			$.ajax({
				url: $(this).data('upload-url'),
				type: 'POST',
				data: form,
				success: function(response) {
					const image = response;
					$input.val(image.id);
					$preview.attr('src', image.src);
					$preview.removeClass('d-none');
				},
				cache: false,
				contentType: false,
				processData: false
			});
		});
	});
})();
