const body = document.querySelector('body'),
  createPublication = body.querySelector('.publications-create-page');

if (createPublication) {
  Simditor.locale = 'ru-RU';
  new Simditor({
    textarea: $('#simditor'),
    toolbar: ['title',
      'bold',
      'italic',
      'underline',
      'strikethrough',
      'fontScale',
      'color',
      'ol',
      'ul',
      'blockquote',
      'code',
      'table',
      'link',
      'hr',
      'indent',
      'outdent'],
    cleanPaste: true,
  });
}