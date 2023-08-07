const createProductPage = document.querySelector('.create-product-page');

if (createProductPage) {
  const simditors = createProductPage.querySelectorAll('[data-type="simditor"]');
  const template = createProductPage.querySelector('#product-content').content;
  const contentTemplate = template.querySelector('dd');
  const productItem = createProductPage.querySelector('.product-item');
  const form = createProductPage.querySelector('form');

  window.addNewProductContent = function() {
    const newContent = contentTemplate.cloneNode(true);
    const newSimditor = newContent.querySelector('[data-type="simditor"]');
    productItem.appendChild(newContent);

    new Simditor({
      textarea: newSimditor,
      pasteImage: true,
      upload: {
        url: '/upload/simditor_photo', //image upload url by server
        fileKey: 'simditor_photo', //name of input
        connectionCount: 3,
        leaveConfirm: 'Пожалуйста дождитесь окончания загрузки изображений на сервер! Вы уверены что хотите закрыть страницу?'
      },
      imageButton: 'upload',
      toolbar: [
        'title',
        'bold',
        'italic',
        'underline',
        'strikethrough',
        'fontScale',
        'color',
        'ol',
        'ul',
        'blockquote',
        'table',
        'link',
        'image',
        'hr',
        'indent',
        'outdent',
        'alignment',
      ],
    });
  };

  Simditor.locale = 'ru-RU';
  simditors.forEach(simditor => {
    new Simditor({
      textarea: simditor,
      pasteImage: true,
      upload: {
        url: '/upload/simditor_photo', //image upload url by server
        fileKey: 'simditor_photo', //name of input
        connectionCount: 3,
        leaveConfirm: 'Пожалуйста дождитесь окончания загрузки изображений на сервер! Вы уверены что хотите закрыть страницу?'
      },
      imageButton: 'upload',
      toolbar: [
        'title',
        'bold',
        'italic',
        'underline',
        'strikethrough',
        'fontScale',
        'color',
        'ol',
        'ul',
        'blockquote',
        'table',
        'link',
        'image',
        'hr',
        'indent',
        'outdent',
        'alignment',
      ],
    });
  });

  form.addEventListener('submit', (evt) => {
    evt.preventDefault();
    const elements = form.querySelectorAll('[data-name="content"]');
    let contents = [];
    for (let i = 0; i < elements.length; i++) {
      contents[i] = elements[i].value;
    }
    contents = JSON.stringify(contents)
    const contentsElement = document.createElement('textarea');
    contentsElement.name = 'contents';
    contentsElement.classList.add('visually-hidden');
    contentsElement.value = contents;
    form.appendChild(contentsElement);
    form.submit();
  });

  window.previewProductPicture = function() {
    // get user's uploaded image
    const imgPath = document.querySelector('#picture').files[0];
    const reader = new FileReader();

    reader.onloadend = () => {
      // convert image file to base64 string and save to localStorage
      localStorage.setItem("image", reader.result);

      let img = document.querySelector('.picture');
      img.src = localStorage.getItem('image');
    };

    if (imgPath) {
      reader.readAsDataURL(imgPath);
    }
  }
}
