(function () {
  var INPUT_SELECTOR = '[data-role="image-id-input"]';
  var SELECT_IMAGE_SELECTOR = '[data-role="select-image"]';
  var IMAGE_PREVIEW_SELECTOR = '.image-preview';
  $(function () {
    var $input = $(INPUT_SELECTOR);
    var $preview = $(IMAGE_PREVIEW_SELECTOR);
    var currentPage = 1;
    var $modal = $('<div class="modal image-selector" id="myPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' + '<div class="modal-dialog">' + '<div class="modal-content">' + '<button type="button" class="btn btn-default modal-close-btn" data-dismiss="modal" aria-hidden="true">' + '<span class="remove" aria-hidden="true"></span></button>' + '<div class="modal-header"></div>' + '<div class="modal-body">' + '</div>' + '<div class="modal-footer">' + '</div>' + '</div>' + '</div>' + '</div>');
    $(SELECT_IMAGE_SELECTOR).on('click', function (e) {
      e.preventDefault();
      var getImagesUrl = $(this).data('url');

      var updateImages = function updateImages(page) {
        $.ajax({
          url: getImagesUrl + '?page=' + page,
          type: 'GET',
          success: function success(response) {
            var imagesBlock = document.createElement('div');
            imagesBlock.classList.add('image-selector__container');
            response.forEach(function (image) {
              var inputRadio = document.createElement('input');
              inputRadio.name = 'image-radio';
              inputRadio.type = 'radio';
              var img = document.createElement('img');
              img.src = image.src;
              var imageDiv = document.createElement('div');
              imageDiv.classList.add('image-selector__item');
              imageDiv.append(inputRadio);
              imageDiv.append(img);
              $(inputRadio).on('change', function () {
                $input.val(image.id);
                $preview.attr('src', image.src);
              });
              imagesBlock.appendChild(imageDiv);
              $modal.find('.modal-body').append($(imagesBlock));
            });
          }
        });
        $modal.modal();
      };

      updateImages(currentPage);
    });
    $('#image-upload-input').on('change', function () {
      var form = new FormData();
      form.append('image', this.files[0]);
      form.append('_token', $('#token').val());
      $.ajax({
        url: $(this).data('upload-url'),
        type: 'POST',
        data: form,
        success: function success(response) {
          var image = response;
          $input.val(image.id);
          $preview.attr('src', image.src);
        },
        cache: false,
        contentType: false,
        processData: false
      });
    });
  });
})();
