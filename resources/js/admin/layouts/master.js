const html = document.querySelector('html'),
  modals = html.querySelectorAll('.modal');

//! hide modals start
html.addEventListener('click', e => {
  modals.forEach(modal => {
    modal.classList.add('hidden');
  });
});
//! hide modals end
const body = document.querySelector('body');

// when user clicks on editable content, show actions list
body.addEventListener('contextmenu', showActions);

// hide the actions list if the user clicks outside of editable content
body.addEventListener('click', hideActions);

function showActions(e) {
  e.preventDefault();

  hideActions(e);
  hideForms();

  const table = e.target.dataset.table;

  switch (table) {
    case 'texts':
      switchTextsActions(e);
      break;

    case 'pages':
      switchPagesActions(e);
      break;

    case 'products':
      switchProductsActions(e);
      break;

    case 'advantages':
      switchAdvantagesActions(e);
      break;

    case 'companies':
      switchCompaniesActions(e);
      break;

    case 'projects':
      switchProjectsActions(e);
      break;

    case 'project':
      switchProjectActions(e);
      break;

    case 'success-steps':
      switchSuccessStepsActions(e);
      break;

    case 'members':
      switchMembersActions(e);
      break;

    case 'certificates':
      switchCertificatesActions(e);
      break;

    case 'publications':
      switchPublicationsActions(e);
      break;
  }
}

function hideActions(e) {
  if (!e.target.matches('.actions')) {
    const actions = body.querySelectorAll('.actions-list');

    actions.forEach(action => {
      action.style.left = '-200%';
      action.style.top = '-200%';
    });
  }
}

function hideForms() {
  const forms = body.querySelectorAll('.form');

  forms.forEach(form => {
    form.classList.add('hidden');
  });
}

function switchTextsActions(e) {
  // show text's actionsList
  const actionsList = body.querySelector('[data-list="texts-actions"]');

  actionsList.style.left = e.pageX + 8 + 'px';
  actionsList.style.top = e.pageY + 8 + 'px';
  //* when update button is clicked switch to text's update form
  const updateBtn = actionsList.querySelector('[data-action="update"]');

  updateBtn.onclick = () => {
    if (e.target.dataset.caption == 'how-began-text') {
      body.querySelector('.how-began-form').classList.remove('hidden');
      return;
    }
    // show form
    const form = body.querySelector('[data-form="update-text"]');

    form.classList.remove('hidden');
    // fill form
    const formCaption = form.querySelector('[name="texts-caption"]'),
      formText = form.querySelector('[name="text"]');

    formCaption.value = e.target.dataset.caption;
    formText.value = e.target.innerHTML;
    // dynamically preview result
    formText.oninput = () => {
      e.target.innerHTML = formText.value;
    }
  }
}
const textToHTML = function(str) {

  // check for DOMParser support
  if (support) {
    var parser = new DOMParser();
    var doc = parser.parseFromString(str, 'text/html');
    return doc.body.innerHTML;
  }

  // Otherwise, create div and append HTML
  var dom = document.createElement('div');
  dom.innerHTML = str;
  return dom;

};

function switchButtonsActions(e) {
  // show buttons's actionsList
  const actionsList = body.querySelector('[data-list="buttons-actions"]');

  actionsList.style.left = e.pageX + 8 + 'px';
  actionsList.style.top = e.pageY + 8 + 'px';
  // when update button is clicked switch to buttons's update form
  const updateBtn = actionsList.querySelector('[data-action="update"]');

  updateBtn.onclick = () => {
    // show form
    const form = body.querySelector('[data-form="update-button"]');

    form.classList.remove('hidden');
    // fill form
    const formCaption = form.querySelector('[name="buttons-caption"]'),
      formText = form.querySelector('[name="text"]');

    formCaption.value = e.target.dataset.caption;
    formText.value = e.target.textContent;
    // dynamically preview result
    formText.oninput = () => {
      e.target.textContent = formText.value;
    }
  }
}

function switchPagesActions(e) {
  // show page's actionsList
  const actionsList = body.querySelector('[data-list="pages-actions"]');

  actionsList.style.left = e.pageX + 8 + 'px';
  actionsList.style.top = e.pageY + 8 + 'px';
  // show add link according to route
  const createLinks = actionsList.querySelectorAll('[data-action="create"]');
  createLinks.forEach(link => {
    if (link.dataset.table == e.target.dataset.route) {
      link.classList.remove('hidden');
    } else {
      link.classList.add('hidden');
    }
  });
  // when update button is clicked switch to page's update form
  const updateBtn = actionsList.querySelector('[data-action="update"]');

  updateBtn.onclick = () => {
    // show form
    const form = body.querySelector('[data-form="update-page"]');

    form.classList.remove('hidden');
    // fill form
    const formPageID = form.querySelector('[name="pages-id"]'),
      formTitle = form.querySelector('[name="title"]');

    formPageID.value = e.target.dataset.pageId;
    formTitle.value = e.target.innerHTML;
    // dynamically preview result
    formTitle.oninput = () => {
      e.target.textContent = formTitle.value;
    }
  }
}

function switchProductsActions(e) {
  // show product's actionsList
  const actionsList = body.querySelector('[data-list="products-actions"]');

  actionsList.style.left = e.pageX + 8 + 'px';
  actionsList.style.top = e.pageY + 8 + 'px';
  // when delete button is clicked switch to product's delete form
  const deleteBtn = actionsList.querySelector('[data-action="delete"]');

  deleteBtn.onclick = () => {
    // show form
    const form = body.querySelector('[data-form="delete-product"]');

    form.classList.remove('hidden');
    // fill form
    const formProductsID = form.querySelector('[name="products-id"]');

    formProductsID.value = e.target.dataset.productId;
  }

  // when edit button is clicked switch to product's edit page
  const editLink = actionsList.querySelector('[data-action="edit"]');
  editLink.href = editLink.href + `?id=${e.target.dataset.productId}`;
}

function switchAdvantagesActions(e) {
  // show advantage's actionsList
  const actions = body.querySelector('[data-list="advantages-actions"]');

  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px';
  //* when create button is clicked switch to advantage's create form
  const createBtn = actions.querySelector('[data-action="create"]');
  createBtn.onclick = () => {
      // show form
      const form = body.querySelector('[data-form="create-advantage"]');
      form.classList.remove('hidden');
    }
    //* when update button is clicked switch to advantage's update form
  const updateBtn = actions.querySelector('[data-action="update"]');
  updateBtn.onclick = () => {
      // show form
      const form = body.querySelector('[data-form="update-advantage"]');
      form.classList.remove('hidden');
      // fill form
      const input = form.querySelector('[name="id"]'),
        textarea = form.querySelector('[name="content"]');

      input.value = e.target.dataset.advantageId;
      textarea.value = e.target.textContent;
      // dynamically preview result
      textarea.oninput = () => {
        e.target.textContent = textarea.value;
      }
    }
    //* when delete button is clicked switch to advantage's delete form
  const deleteBtn = actions.querySelector('[data-action="delete"]');
  deleteBtn.onclick = () => {
    // show form
    const form = body.querySelector('[data-form="delete-advantage"]');
    form.classList.remove('hidden');
    // fill form
    const input = form.querySelector('[name="id"]');
    input.value = e.target.dataset.advantageId;
  }
}

function switchCompaniesActions(e) {
  // show companies' actions' list
  const actions = body.querySelector('[data-list="companies-actions"]');

  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px';
  //* when create button is clicked switch to company's create form
  const createBtn = actions.querySelector('[data-action="create"]');
  createBtn.onclick = () => {
      // show form
      const form = body.querySelector('[data-form="create-company"]');
      form.classList.remove('hidden');
      // dynamically preview result
      const logoPreview = form.querySelector('.company-logo-preview'),
        titlePreview = form.querySelector('.company-title'),
        categoryPreview = form.querySelector('.company-category'),
        inputLogo = form.querySelector('[name="logo"]'),
        inputTitle = form.querySelector('[name="title"]'),
        inputCategory = form.querySelector('[name="category"]');

      inputLogo.oninput = () => {

        const file = new FormData();
        file.append('file', inputLogo.files[0]);

        $.ajax({
          type: 'post',
          enctype: 'multipart/form-data',
          url: '/img-tempstore',
          data: file,
          processData: false,
          contentType: false,
          cache: false,
          timeout: 600000,

          success: function success(response) {
            logoPreview.style.backgroundImage = `url(../img/tempstore/${response})`;
          }
        });
      }
      inputTitle.oninput = () => {
        titlePreview.textContent = inputTitle.value;
      }
      inputCategory.oninput = () => {
        categoryPreview.textContent = inputCategory.value;
      }
    }
    //* when update button is clicked switch to company's update form
  const updateBtn = actions.querySelector('[data-action="update"]');
  updateBtn.onclick = () => {
      // show form
      const form = body.querySelector('[data-form="update-company"]');

      form.classList.remove('hidden');
      // fill form
      const logoPreview = e.target.querySelector('img'),
        titlePreview = e.target.querySelector('h3'),
        categoryPreview = e.target.querySelector('p'),
        inputID = form.querySelector('[name="id"]'),
        inputLogo = form.querySelector('[name="logo"]'),
        inputSite = form.querySelector('[name="site"]'),
        inputTitle = form.querySelector('[name="title"]'),
        inputCategory = form.querySelector('[name="category"]');

      inputID.value = e.target.dataset.id;
      inputSite.value = e.target.dataset.site;
      inputTitle.value = e.target.dataset.title;
      inputCategory.value = e.target.dataset.category;
      // dynamically preview result
      inputLogo.oninput = () => {

        const file = new FormData();
        file.append('file', inputLogo.files[0]);

        $.ajax({
          type: 'post',
          enctype: 'multipart/form-data',
          url: '/img-tempstore',
          data: file,
          processData: false,
          contentType: false,
          cache: false,
          timeout: 600000,

          success: function success(response) {
            logoPreview.src = e.target.dataset.src + '/tempstore/' + response;
          }
        });
      }
      inputTitle.oninput = () => {
        titlePreview.textContent = inputTitle.value;
      }
      inputCategory.oninput = () => {
        categoryPreview.textContent = inputCategory.value;
      }
    }
    //* when delete button is clicked switch to advantage's delete form
  const deleteBtn = actions.querySelector('[data-action="delete"]');
  deleteBtn.onclick = () => {
    // show form
    const form = body.querySelector('[data-form="delete-company"]');
    form.classList.remove('hidden');
    // fill form
    const inputID = form.querySelector('[name="id"]');
    inputID.value = e.target.dataset.id;
  }
}

function switchProjectsActions(e) {
  // show projects's actions' list
  const actions = body.querySelector('[data-list="projects-actions"]');

  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px';
  // when delete button is clicked switch to projects' delete form
  const deleteBtn = actions.querySelector('[data-action="delete"]');

  deleteBtn.onclick = () => {
    // show form
    const form = body.querySelector('[data-form="delete-project"]');

    form.classList.remove('hidden');
    // fill form
    const inputID = form.querySelector('[name="id"]');

    inputID.value = e.target.dataset.id;
  }
}

function switchProjectActions(e) {
  // show project's actions' list
  let actions = body.querySelector('[data-list="project-actions"]');

  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px';
  // when delete button is clicked switch to project's delete form
  let deleteBtn = actions.querySelector('[data-action="delete"]');

  deleteBtn.onclick = () => {
    // show form
    let form = body.querySelector('[data-form="delete-project"]');

    form.classList.remove('hidden');
    // fill form
    const inputID = form.querySelector('[name="id"]');

    inputID.value = e.target.dataset.id;
  }

  // give project's id to edit link
  let editLink = actions.querySelector('[data-action="edit"]');
  editLink.href += `?id=${e.target.dataset.id}`;
}

function switchSuccessStepsActions(e) {
  // show success-steps' actionsList
  const actions = body.querySelector('[data-list="success-steps-actions"]');

  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px';
  //* when create button is clicked switch to success-steps' create form
  const createBtn = actions.querySelector('[data-action="create"]');
  createBtn.onclick = () => {
      // show form
      const form = body.querySelector('[data-form="create-success-step"]');
      form.classList.remove('hidden');
    }
    //* when update button is clicked switch to success-steps' update form
  const updateBtn = actions.querySelector('[data-action="update"]');
  updateBtn.onclick = () => {
      // show form
      const form = body.querySelector('[data-form="update-success-step"]');
      form.classList.remove('hidden');
      // fill form
      const inputID = form.querySelector('[name="id"]'),
        text = form.querySelector('[name="text"]');

      inputID.value = e.target.dataset.id;
      text.value = e.target.textContent;
      // dynamically preview result
      text.oninput = () => {
        e.target.textContent = text.value;
      }
    }
    //* when delete button is clicked switch to success-steps' delete form
  const deleteBtn = actions.querySelector('[data-action="delete"]');
  deleteBtn.onclick = () => {
    // show form
    const form = body.querySelector('[data-form="delete-success-step"]');
    form.classList.remove('hidden');
    // fill form
    const inputID = form.querySelector('[name="id"]');
    inputID.value = e.target.dataset.id;
  }
}

function switchMembersActions(e) {
  // show members' actions' list
  const actions = body.querySelector('[data-list="members-actions"]');

  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px';
  //* when create button is clicked switch to members' create form
  const createBtn = actions.querySelector('[data-action="create"]');
  createBtn.onclick = () => {
      // show form
      const form = body.querySelector('[data-form="create-member"]');
      form.classList.remove('hidden');
      // dynamically preview result
      const avatarPreview = form.querySelector('.member-avatar-preview'),
        namePreview = form.querySelector('.member-name'),
        positionPreview = form.querySelector('.member-position'),
        inputAvatar = form.querySelector('[name="avatar"]'),
        inputName = form.querySelector('[name="name"]'),
        inputPosition = form.querySelector('[name="position"]');

      inputAvatar.oninput = () => {

        const file = new FormData();
        file.append('file', inputAvatar.files[0]);

        $.ajax({
          type: 'post',
          enctype: 'multipart/form-data',
          url: '/img-tempstore',
          data: file,
          processData: false,
          contentType: false,
          cache: false,
          timeout: 600000,

          success: function success(response) {
            avatarPreview.style.backgroundImage = `url(../img/tempstore/${response})`;
          }
        });
      }
      inputName.oninput = () => {
        namePreview.textContent = inputName.value;
      }
      inputPosition.oninput = () => {
        positionPreview.textContent = inputPosition.value;
      }
    }
    //* when update button is clicked switch to members' update form
  const updateBtn = actions.querySelector('[data-action="update"]');
  updateBtn.onclick = () => {
      // show form
      const form = body.querySelector('[data-form="update-member"]');

      form.classList.remove('hidden');
      // fill form
      const avatarPreview = e.target.querySelector('img'),
        namePreview = e.target.querySelector('h3'),
        positionPreview = e.target.querySelector('p'),
        inputID = form.querySelector('[name="id"]'),
        inputAvatar = form.querySelector('[name="avatar"]'),
        inputName = form.querySelector('[name="name"]'),
        inputPosition = form.querySelector('[name="position"]');

      inputID.value = e.target.dataset.id;
      inputName.value = e.target.dataset.name;
      inputPosition.value = e.target.dataset.position;
      // dynamically preview result
      inputAvatar.oninput = () => {

        const file = new FormData();
        file.append('file', inputAvatar.files[0]);

        $.ajax({
          type: 'post',
          enctype: 'multipart/form-data',
          url: '/img-tempstore',
          data: file,
          processData: false,
          contentType: false,
          cache: false,
          timeout: 600000,

          success: function success(response) {
            avatarPreview.src = e.target.dataset.src + '/tempstore/' + response;
          }
        });
      }
      inputName.oninput = () => {
        namePreview.textContent = inputName.value;
      }
      inputPosition.oninput = () => {
        positionPreview.textContent = inputPosition.value;
      }
    }
    //* when delete button is clicked switch to members' delete form
  const deleteBtn = actions.querySelector('[data-action="delete"]');
  deleteBtn.onclick = () => {
    // show form
    const form = body.querySelector('[data-form="delete-member"]');
    form.classList.remove('hidden');
    // fill form
    const inputID = form.querySelector('[name="id"]');
    inputID.value = e.target.dataset.id;
  }
}

function switchCertificatesActions(e) {
  // show certificates' actions' list
  const actions = body.querySelector('[data-list="certificates-actions"]');

  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px';
  //* when create button is clicked switch to certificates' create form
  const createBtn = actions.querySelector('[data-action="create"]');
  createBtn.onclick = () => {
      // show form
      const form = body.querySelector('[data-form="create-certificate"]');
      form.classList.remove('hidden');
      // dynamically preview result
      const imgWrap = form.querySelector('.certificate-preview'),
        imgPreview = imgWrap.querySelector('img'),
        inputImg = form.querySelector('[name="img"]');

      inputImg.oninput = () => {

        const file = new FormData();
        file.append('file', inputImg.files[0]);

        imgWrap.classList.add('loading');

        $.ajax({
          type: 'post',
          enctype: 'multipart/form-data',
          url: '/img-tempstore',
          data: file,
          processData: false,
          contentType: false,
          cache: false,
          timeout: 600000,

          success: function success(response) {
            imgPreview.src = e.target.dataset.src + '/tempstore/' + response;
            imgWrap.classList.remove('loading');
          }
        });
      }
    }
    //* when update button is clicked switch to certificates' update form
  const updateBtn = actions.querySelector('[data-action="update"]');
  updateBtn.onclick = () => {
      // show form
      const form = body.querySelector('[data-form="update-certificate"]');

      form.classList.remove('hidden');
      // fill form
      const imgPreview = e.target.querySelector('img'),
        inputID = form.querySelector('[name="id"]'),
        inputImg = form.querySelector('[name="img"]');

      inputID.value = e.target.dataset.id;
      // dynamically preview result
      inputImg.oninput = () => {

        const file = new FormData();
        file.append('file', inputImg.files[0]);

        $.ajax({
          type: 'post',
          enctype: 'multipart/form-data',
          url: '/img-tempstore',
          data: file,
          processData: false,
          contentType: false,
          cache: false,
          timeout: 600000,

          success: function success(response) {
            imgPreview.style.objectFit = 'fill';
            imgPreview.src = e.target.dataset.src + '/tempstore/' + response;
          }
        });
      }
    }
    //* when delete button is clicked switch to certificates' delete form
  const deleteBtn = actions.querySelector('[data-action="delete"]');
  deleteBtn.onclick = () => {
    // show form
    const form = body.querySelector('[data-form="delete-certificate"]');
    form.classList.remove('hidden');
    // fill form
    const inputID = form.querySelector('[name="id"]');
    inputID.value = e.target.dataset.id;
  }
}

function switchPublicationsActions(e) {
  // show publications' actions' list
  const actions = body.querySelector('[data-list="publications-actions"]');

  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px';

  const updateAction = actions.querySelector('[data-action="update"]');

  updateAction.href = e.target.dataset.href;
  //* when delete button is clicked switch to publications' delete form
  const deleteBtn = actions.querySelector('[data-action="delete"]');
  deleteBtn.onclick = () => {
    // show form
    const form = body.querySelector('[data-form="delete-publication"]');
    form.classList.remove('hidden');
    // fill form
    const inputID = form.querySelector('[name="id"]');
    inputID.value = e.target.dataset.id;
  }
}

window.updateText = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');

  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      caption: form.querySelector('[name="texts-caption"]').value,
      text: form.querySelector('[name="text"]').value,
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.updateButton = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');

  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      caption: form.querySelector('[name="buttons-caption"]').value,
      text: form.querySelector('[name="text"]').value,
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.updatePage = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');

  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      pageID: form.querySelector('[name="pages-id"]').value,
      title: form.querySelector('[name="title"]').value,
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.deleteProduct = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');

  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      productID: form.querySelector('[name="products-id"]').value,
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.createAdvantage = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');

  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      content: form.querySelector('[name="content"]').value,
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.updateAdvantage = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');

  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value,
      content: form.querySelector('[name="content"]').value,
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.deleteAdvantage = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');

  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value,
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.createCompany = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');
  request = new FormData(form);

  $.ajax({
    type: form.method,
    enctype: 'multipart/form-data',
    url: form.action,
    data: request,
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000,

    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.updateCompany = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');
  request = new FormData(form);

  $.ajax({
    type: form.method,
    enctype: 'multipart/form-data',
    url: form.action,
    data: request,
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000,

    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.deleteCompany = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');

  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value,
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.deleteProject = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');

  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value,
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.createSuccessStep = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');

  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      text: form.querySelector('[name="text"]').value,
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.updateSuccessStep = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');

  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value,
      text: form.querySelector('[name="text"]').value,
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.deleteSuccessStep = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');

  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value,
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.createMember = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');
  request = new FormData(form);

  $.ajax({
    type: form.method,
    enctype: 'multipart/form-data',
    url: form.action,
    data: request,
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000,

    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.updateMember = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');
  request = new FormData(form);

  $.ajax({
    type: form.method,
    enctype: 'multipart/form-data',
    url: form.action,
    data: request,
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000,

    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.deleteMember = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');

  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value,
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}


window.createCertificate = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');
  request = new FormData(form);

  $.ajax({
    type: form.method,
    enctype: 'multipart/form-data',
    url: form.action,
    data: request,
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000,

    success: function success(response) {
      console.log(response);
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.updateCertificate = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');
  request = new FormData(form);

  $.ajax({
    type: form.method,
    enctype: 'multipart/form-data',
    url: form.action,
    data: request,
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000,

    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}

window.deleteCertificate = (event) => {
  event.preventDefault();

  const form = event.target.closest('form');

  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value,
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
}