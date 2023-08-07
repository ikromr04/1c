const body = document.querySelector('body'),
  header = body.querySelector('.heade');

if (header) {

  header.addEventListener('contextmenu', e => {
    e.preventDefault();
    hideActions()

    const left = e.pageX,
      top = e.pageY;

    let actions, showFormBtn, form, hideFormBtn, textarea, caption;

    if (e.target.dataset.type == 'text') {
      actions = header.querySelector('[data-label="texts-actions"]');
      showFormBtn = actions.querySelector('[data-action="open-texts-form"]');
      form = header.querySelector('[data-label="texts-form"]');
      hideFormBtn = form.querySelector('.cancel-btn');
      textarea = form.querySelector('.simditor-body');
      caption = form.querySelector('#caption');
    }
    if (e.target.dataset.type == 'page') {
      actions = header.querySelector('[data-label="pages-actions"]');
      showFormBtn = actions.querySelector('[data-action="open-pages-form"]');
      form = header.querySelector('[data-label="pages-form"]');
      hideFormBtn = form.querySelector('.cancel-btn');
      textarea = form.querySelector('.simditor-body');
      caption = form.querySelector('#page-id');

      const item = actions.querySelector('[data-action="create-product"]');

      if (e.target.dataset.route) {
        item.classList.remove('none');
      } else {
        item.classList.add('none');
      }
    }
    if (e.target.dataset.type == 'product') {
      actions = header.querySelector('[data-label="products-actions"]');
      showFormBtn = actions.querySelector('[data-action="open-products-form"]');
      form = header.querySelector('[data-label="products-form"]');
      hideFormBtn = form.querySelector('.cancel-btn');
      textarea = form.querySelector('.simditor-body');
      caption = form.querySelector('#product-id');

      const deleteBtn = actions.querySelector('[data-action="open-confirm-form"]'),
        deleteForm = header.querySelector('[data-label="confirm-form"]'),
        input = deleteForm.querySelector('#product-id');

      deleteBtn.onclick = () => {
        deleteForm.classList.remove('hidden');
      }
      input.value = e.target.dataset.caption;
    }
    if (e.target.dataset.type) {
      showActions(actions, left, top);
      ableActionsEvents(showFormBtn, form, hideFormBtn);
      previewResult(textarea, e.target, caption);
    }

  }, false);

  //* =>> texts block
  const text = new Simditor({
    textarea: $('#text'),
    toolbar: false,
  });
  //* <<= texts block
  //* =>> pages block
  const page = new Simditor({
    textarea: $('#page'),
    toolbar: false,
  });
  //* <<= pages block
  //* =>> products block
  const product = new Simditor({
    textarea: $('#product'),
    toolbar: false,
  });
  //* <<= products block

  body.addEventListener('click', e => {
    if (e.target.dataset.group != 'actions') {
      hideActions();
    }
  });

  function showActions(actions, left, top) {
    actions.style.top = top + 10 + 'px';
    actions.style.left = left + 10 + 'px';
  }
  function ableActionsEvents(showBtn, form, hideBtn) {
    showBtn.onclick = () => {
      form.classList.remove('hidden');
      hideActions();
    }
    hideBtn.onclick = () => {
      form.classList.add('hidden');
      location.reload();
    }
  }
  function previewResult(textarea, target, caption) {
    textarea.innerHTML = target.innerHTML;
    textarea.oninput = () => {
      target.innerHTML = textarea.innerHTML;
    }
    caption.value = target.dataset.caption;
  }
  function hideActions() {
    const actions = header.querySelectorAll('.actions');

    actions.forEach(action => {
      action.style.top = '100%';
      action.style.left = '100%';
    });
  }
}