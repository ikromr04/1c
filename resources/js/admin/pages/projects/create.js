let createProjectPage = document.querySelector('.create-project-page');

if (createProjectPage) {
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
    cleanPaste: false,
  });

  const sim = document.querySelector('#desc');

  if (sim) {
    new Simditor({
      textarea: sim,
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
      cleanPaste: false,
    });
  }
}
