let editProjectPage = document.querySelector('.edit-project-page');

if (editProjectPage) {
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
      'table',
      'hr',
      'indent',
      'outdent'
    ],
    cleanPaste: true,
  });
}