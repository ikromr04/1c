/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**********************************************!*\
  !*** ./resources/js/admin/layouts/master.js ***!
  \**********************************************/
var html = document.querySelector('html'),
    modals = html.querySelectorAll('.modal'); //! hide modals start

html.addEventListener('click', function (e) {
  modals.forEach(function (modal) {
    modal.classList.add('hidden');
  });
}); //! hide modals end

var body = document.querySelector('body'); // when user clicks on editable content, show actions list

body.addEventListener('contextmenu', showActions); // hide the actions list if the user clicks outside of editable content

body.addEventListener('click', hideActions);

function showActions(e) {
  e.preventDefault();
  hideActions(e);
  hideForms();
  var table = e.target.dataset.table;

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

    case 'vacancy':
      switchVacancyActions(e);
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
    var actions = body.querySelectorAll('.actions-list');
    actions.forEach(function (action) {
      action.style.left = '-200%';
      action.style.top = '-200%';
    });
  }
}

function hideForms() {
  var forms = body.querySelectorAll('.form');
  forms.forEach(function (form) {
    form.classList.add('hidden');
  });
}

function switchTextsActions(e) {
  // show text's actionsList
  var actionsList = body.querySelector('[data-list="texts-actions"]');
  actionsList.style.left = e.pageX + 8 + 'px';
  actionsList.style.top = e.pageY + 8 + 'px'; //* when update button is clicked switch to text's update form

  var updateBtn = actionsList.querySelector('[data-action="update"]');

  updateBtn.onclick = function () {
    if (e.target.dataset.caption == 'how-began-text') {
      body.querySelector('.how-began-form').classList.remove('hidden');
      return;
    } // show form


    var form = body.querySelector('[data-form="update-text"]');
    form.classList.remove('hidden'); // fill form

    var formCaption = form.querySelector('[name="texts-caption"]'),
        formText = form.querySelector('[name="text"]');
    formCaption.value = e.target.dataset.caption;
    formText.value = e.target.innerHTML; // dynamically preview result

    formText.oninput = function () {
      e.target.innerHTML = formText.value;
    };
  };
}

var textToHTML = function textToHTML(str) {
  // check for DOMParser support
  if (support) {
    var parser = new DOMParser();
    var doc = parser.parseFromString(str, 'text/html');
    return doc.body.innerHTML;
  } // Otherwise, create div and append HTML


  var dom = document.createElement('div');
  dom.innerHTML = str;
  return dom;
};

function switchButtonsActions(e) {
  // show buttons's actionsList
  var actionsList = body.querySelector('[data-list="buttons-actions"]');
  actionsList.style.left = e.pageX + 8 + 'px';
  actionsList.style.top = e.pageY + 8 + 'px'; // when update button is clicked switch to buttons's update form

  var updateBtn = actionsList.querySelector('[data-action="update"]');

  updateBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="update-button"]');
    form.classList.remove('hidden'); // fill form

    var formCaption = form.querySelector('[name="buttons-caption"]'),
        formText = form.querySelector('[name="text"]');
    formCaption.value = e.target.dataset.caption;
    formText.value = e.target.textContent; // dynamically preview result

    formText.oninput = function () {
      e.target.textContent = formText.value;
    };
  };
}

function switchPagesActions(e) {
  // show page's actionsList
  var actionsList = body.querySelector('[data-list="pages-actions"]');
  actionsList.style.left = e.pageX + 8 + 'px';
  actionsList.style.top = e.pageY + 8 + 'px'; // show add link according to route

  var createLinks = actionsList.querySelectorAll('[data-action="create"]');
  createLinks.forEach(function (link) {
    if (link.dataset.table == e.target.dataset.route) {
      link.classList.remove('hidden');
    } else {
      link.classList.add('hidden');
    }
  }); // when update button is clicked switch to page's update form

  var updateBtn = actionsList.querySelector('[data-action="update"]');

  updateBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="update-page"]');
    form.classList.remove('hidden'); // fill form

    var formPageID = form.querySelector('[name="pages-id"]'),
        formTitle = form.querySelector('[name="title"]');
    formPageID.value = e.target.dataset.pageId;
    formTitle.value = e.target.innerHTML; // dynamically preview result

    formTitle.oninput = function () {
      e.target.textContent = formTitle.value;
    };
  };
}

function switchProductsActions(e) {
  // show product's actionsList
  var actionsList = body.querySelector('[data-list="products-actions"]');
  actionsList.style.left = e.pageX + 8 + 'px';
  actionsList.style.top = e.pageY + 8 + 'px'; // when delete button is clicked switch to product's delete form

  var deleteBtn = actionsList.querySelector('[data-action="delete"]');

  deleteBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="delete-product"]');
    form.classList.remove('hidden'); // fill form

    var formProductsID = form.querySelector('[name="products-id"]');
    formProductsID.value = e.target.dataset.productId;
  }; // when edit button is clicked switch to product's edit page


  var editLink = actionsList.querySelector('[data-action="edit"]');
  editLink.href = editLink.href + "?id=".concat(e.target.dataset.productId);
}

function switchAdvantagesActions(e) {
  // show advantage's actionsList
  var actions = body.querySelector('[data-list="advantages-actions"]');
  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px'; //* when create button is clicked switch to advantage's create form

  var createBtn = actions.querySelector('[data-action="create"]');

  createBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="create-advantage"]');
    form.classList.remove('hidden');
  }; //* when update button is clicked switch to advantage's update form


  var updateBtn = actions.querySelector('[data-action="update"]');

  updateBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="update-advantage"]');
    form.classList.remove('hidden'); // fill form

    var input = form.querySelector('[name="id"]'),
        textarea = form.querySelector('[name="content"]');
    input.value = e.target.dataset.advantageId;
    textarea.value = e.target.textContent; // dynamically preview result

    textarea.oninput = function () {
      e.target.textContent = textarea.value;
    };
  }; //* when delete button is clicked switch to advantage's delete form


  var deleteBtn = actions.querySelector('[data-action="delete"]');

  deleteBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="delete-advantage"]');
    form.classList.remove('hidden'); // fill form

    var input = form.querySelector('[name="id"]');
    input.value = e.target.dataset.advantageId;
  };
}

function switchCompaniesActions(e) {
  // show companies' actions' list
  var actions = body.querySelector('[data-list="companies-actions"]');
  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px'; //* when create button is clicked switch to company's create form

  var createBtn = actions.querySelector('[data-action="create"]');

  createBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="create-company"]');
    form.classList.remove('hidden'); // dynamically preview result

    var logoPreview = form.querySelector('.company-logo-preview'),
        titlePreview = form.querySelector('.company-title'),
        categoryPreview = form.querySelector('.company-category'),
        inputLogo = form.querySelector('[name="logo"]'),
        inputTitle = form.querySelector('[name="title"]'),
        inputCategory = form.querySelector('[name="category"]');

    inputLogo.oninput = function () {
      var file = new FormData();
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
          logoPreview.style.backgroundImage = "url(../img/tempstore/".concat(response, ")");
        }
      });
    };

    inputTitle.oninput = function () {
      titlePreview.textContent = inputTitle.value;
    };

    inputCategory.oninput = function () {
      categoryPreview.textContent = inputCategory.value;
    };
  }; //* when update button is clicked switch to company's update form


  var updateBtn = actions.querySelector('[data-action="update"]');

  updateBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="update-company"]');
    form.classList.remove('hidden'); // fill form

    var logoPreview = e.target.querySelector('img'),
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
    inputCategory.value = e.target.dataset.category; // dynamically preview result

    inputLogo.oninput = function () {
      var file = new FormData();
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
    };

    inputTitle.oninput = function () {
      titlePreview.textContent = inputTitle.value;
    };

    inputCategory.oninput = function () {
      categoryPreview.textContent = inputCategory.value;
    };
  }; //* when delete button is clicked switch to advantage's delete form


  var deleteBtn = actions.querySelector('[data-action="delete"]');

  deleteBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="delete-company"]');
    form.classList.remove('hidden'); // fill form

    var inputID = form.querySelector('[name="id"]');
    inputID.value = e.target.dataset.id;
  };
}

function switchProjectsActions(e) {
  // show projects's actions' list
  var actions = body.querySelector('[data-list="projects-actions"]');
  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px'; // when delete button is clicked switch to projects' delete form

  var deleteBtn = actions.querySelector('[data-action="delete"]');

  deleteBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="delete-project"]');
    form.classList.remove('hidden'); // fill form

    var inputID = form.querySelector('[name="id"]');
    inputID.value = e.target.dataset.id;
  };
}

function switchProjectActions(e) {
  // show project's actions' list
  var actions = body.querySelector('[data-list="project-actions"]');
  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px'; // when delete button is clicked switch to project's delete form

  var deleteBtn = actions.querySelector('[data-action="delete"]');

  deleteBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="delete-project"]');
    form.classList.remove('hidden'); // fill form

    var inputID = form.querySelector('[name="id"]');
    inputID.value = e.target.dataset.id;
  }; // give project's id to edit link


  var editLink = actions.querySelector('[data-action="edit"]');
  editLink.href += "?id=".concat(e.target.dataset.id);
}

function switchVacancyActions(e) {
  // show project's actions' list
  var actions = body.querySelector('[data-list="vacancy-actions"]');
  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px'; // when delete button is clicked switch to project's delete form

  var deleteBtn = actions.querySelector('[data-action="delete"]');

  deleteBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="delete-vacancy"]');
    form.classList.remove('hidden'); // fill form

    var inputID = form.querySelector('[name="id"]');
    inputID.value = e.target.dataset.id;
  }; // give project's id to edit link


  var editLink = actions.querySelector('[data-action="edit"]');
  editLink.href += "?id=".concat(e.target.dataset.id);
}

function switchSuccessStepsActions(e) {
  // show success-steps' actionsList
  var actions = body.querySelector('[data-list="success-steps-actions"]');
  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px'; //* when create button is clicked switch to success-steps' create form

  var createBtn = actions.querySelector('[data-action="create"]');

  createBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="create-success-step"]');
    form.classList.remove('hidden');
  }; //* when update button is clicked switch to success-steps' update form


  var updateBtn = actions.querySelector('[data-action="update"]');

  updateBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="update-success-step"]');
    form.classList.remove('hidden'); // fill form

    var inputID = form.querySelector('[name="id"]'),
        text = form.querySelector('[name="text"]');
    inputID.value = e.target.dataset.id;
    text.value = e.target.textContent; // dynamically preview result

    text.oninput = function () {
      e.target.textContent = text.value;
    };
  }; //* when delete button is clicked switch to success-steps' delete form


  var deleteBtn = actions.querySelector('[data-action="delete"]');

  deleteBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="delete-success-step"]');
    form.classList.remove('hidden'); // fill form

    var inputID = form.querySelector('[name="id"]');
    inputID.value = e.target.dataset.id;
  };
}

function switchMembersActions(e) {
  // show members' actions' list
  var actions = body.querySelector('[data-list="members-actions"]');
  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px'; //* when create button is clicked switch to members' create form

  var createBtn = actions.querySelector('[data-action="create"]');

  createBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="create-member"]');
    form.classList.remove('hidden'); // dynamically preview result

    var avatarPreview = form.querySelector('.member-avatar-preview'),
        namePreview = form.querySelector('.member-name'),
        positionPreview = form.querySelector('.member-position'),
        inputAvatar = form.querySelector('[name="avatar"]'),
        inputName = form.querySelector('[name="name"]'),
        inputPosition = form.querySelector('[name="position"]');

    inputAvatar.oninput = function () {
      var file = new FormData();
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
          avatarPreview.style.backgroundImage = "url(../img/tempstore/".concat(response, ")");
        }
      });
    };

    inputName.oninput = function () {
      namePreview.textContent = inputName.value;
    };

    inputPosition.oninput = function () {
      positionPreview.textContent = inputPosition.value;
    };
  }; //* when update button is clicked switch to members' update form


  var updateBtn = actions.querySelector('[data-action="update"]');

  updateBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="update-member"]');
    form.classList.remove('hidden'); // fill form

    var avatarPreview = e.target.querySelector('img'),
        namePreview = e.target.querySelector('h3'),
        positionPreview = e.target.querySelector('p'),
        inputID = form.querySelector('[name="id"]'),
        inputAvatar = form.querySelector('[name="avatar"]'),
        inputName = form.querySelector('[name="name"]'),
        inputPosition = form.querySelector('[name="position"]');
    inputID.value = e.target.dataset.id;
    inputName.value = e.target.dataset.name;
    inputPosition.value = e.target.dataset.position; // dynamically preview result

    inputAvatar.oninput = function () {
      var file = new FormData();
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
    };

    inputName.oninput = function () {
      namePreview.textContent = inputName.value;
    };

    inputPosition.oninput = function () {
      positionPreview.textContent = inputPosition.value;
    };
  }; //* when delete button is clicked switch to members' delete form


  var deleteBtn = actions.querySelector('[data-action="delete"]');

  deleteBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="delete-member"]');
    form.classList.remove('hidden'); // fill form

    var inputID = form.querySelector('[name="id"]');
    inputID.value = e.target.dataset.id;
  };
}

function switchCertificatesActions(e) {
  // show certificates' actions' list
  var actions = body.querySelector('[data-list="certificates-actions"]');
  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px'; //* when create button is clicked switch to certificates' create form

  var createBtn = actions.querySelector('[data-action="create"]');

  createBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="create-certificate"]');
    form.classList.remove('hidden'); // dynamically preview result

    var imgWrap = form.querySelector('.certificate-preview'),
        imgPreview = imgWrap.querySelector('img'),
        inputImg = form.querySelector('[name="img"]');

    inputImg.oninput = function () {
      var file = new FormData();
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
    };
  }; //* when update button is clicked switch to certificates' update form


  var updateBtn = actions.querySelector('[data-action="update"]');

  updateBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="update-certificate"]');
    form.classList.remove('hidden'); // fill form

    var imgPreview = e.target.querySelector('img'),
        inputID = form.querySelector('[name="id"]'),
        inputImg = form.querySelector('[name="img"]');
    inputID.value = e.target.dataset.id; // dynamically preview result

    inputImg.oninput = function () {
      var file = new FormData();
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
    };
  }; //* when delete button is clicked switch to certificates' delete form


  var deleteBtn = actions.querySelector('[data-action="delete"]');

  deleteBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="delete-certificate"]');
    form.classList.remove('hidden'); // fill form

    var inputID = form.querySelector('[name="id"]');
    inputID.value = e.target.dataset.id;
  };
}

function switchPublicationsActions(e) {
  // show publications' actions' list
  var actions = body.querySelector('[data-list="publications-actions"]');
  actions.style.left = e.pageX + 8 + 'px';
  actions.style.top = e.pageY + 8 + 'px';
  var updateAction = actions.querySelector('[data-action="update"]');
  updateAction.href = e.target.dataset.href; //* when delete button is clicked switch to publications' delete form

  var deleteBtn = actions.querySelector('[data-action="delete"]');

  deleteBtn.onclick = function () {
    // show form
    var form = body.querySelector('[data-form="delete-publication"]');
    form.classList.remove('hidden'); // fill form

    var inputID = form.querySelector('[name="id"]');
    inputID.value = e.target.dataset.id;
  };
}

window.updateText = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      caption: form.querySelector('[name="texts-caption"]').value,
      text: form.querySelector('[name="text"]').value
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
};

window.updateButton = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      caption: form.querySelector('[name="buttons-caption"]').value,
      text: form.querySelector('[name="text"]').value
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
};

window.updatePage = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      pageID: form.querySelector('[name="pages-id"]').value,
      title: form.querySelector('[name="title"]').value
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
};

window.deleteProduct = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      productID: form.querySelector('[name="products-id"]').value
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
};

window.createAdvantage = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      content: form.querySelector('[name="content"]').value
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
};

window.updateAdvantage = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value,
      content: form.querySelector('[name="content"]').value
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
};

window.deleteAdvantage = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
};

window.createCompany = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
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
};

window.updateCompany = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
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
};

window.deleteCompany = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
};

window.deleteProject = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
};

window.deleteVacancy = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
};

window.createSuccessStep = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      text: form.querySelector('[name="text"]').value
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
};

window.updateSuccessStep = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value,
      text: form.querySelector('[name="text"]').value
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
};

window.deleteSuccessStep = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
};

window.createMember = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
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
};

window.updateMember = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
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
};

window.deleteMember = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
};

window.createCertificate = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
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
};

window.updateCertificate = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
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
};

window.deleteCertificate = function (event) {
  event.preventDefault();
  var form = event.target.closest('form');
  $.ajax({
    type: form.method,
    url: form.action,
    data: {
      id: form.querySelector('[name="id"]').value
    },
    success: function success(response) {
      if (response == 'success') {
        location.reload();
      }
    }
  });
};
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**********************************************!*\
  !*** ./resources/js/admin/layouts/header.js ***!
  \**********************************************/
var body = document.querySelector('body'),
    header = body.querySelector('.heade');

if (header) {
  var showActions = function showActions(actions, left, top) {
    actions.style.top = top + 10 + 'px';
    actions.style.left = left + 10 + 'px';
  };

  var ableActionsEvents = function ableActionsEvents(showBtn, form, hideBtn) {
    showBtn.onclick = function () {
      form.classList.remove('hidden');
      hideActions();
    };

    hideBtn.onclick = function () {
      form.classList.add('hidden');
      location.reload();
    };
  };

  var previewResult = function previewResult(textarea, target, caption) {
    textarea.innerHTML = target.innerHTML;

    textarea.oninput = function () {
      target.innerHTML = textarea.innerHTML;
    };

    caption.value = target.dataset.caption;
  };

  var hideActions = function hideActions() {
    var actions = header.querySelectorAll('.actions');
    actions.forEach(function (action) {
      action.style.top = '100%';
      action.style.left = '100%';
    });
  };

  header.addEventListener('contextmenu', function (e) {
    e.preventDefault();
    hideActions();
    var left = e.pageX,
        top = e.pageY;
    var actions, showFormBtn, form, hideFormBtn, textarea, caption;

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
      var item = actions.querySelector('[data-action="create-product"]');

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
      var deleteBtn = actions.querySelector('[data-action="open-confirm-form"]'),
          deleteForm = header.querySelector('[data-label="confirm-form"]'),
          input = deleteForm.querySelector('#product-id');

      deleteBtn.onclick = function () {
        deleteForm.classList.remove('hidden');
      };

      input.value = e.target.dataset.caption;
    }

    if (e.target.dataset.type) {
      showActions(actions, left, top);
      ableActionsEvents(showFormBtn, form, hideFormBtn);
      previewResult(textarea, e.target, caption);
    }
  }, false); //* =>> texts block

  var text = new Simditor({
    textarea: $('#text'),
    toolbar: false
  }); //* <<= texts block
  //* =>> pages block

  var page = new Simditor({
    textarea: $('#page'),
    toolbar: false
  }); //* <<= pages block
  //* =>> products block

  var product = new Simditor({
    textarea: $('#product'),
    toolbar: false
  }); //* <<= products block

  body.addEventListener('click', function (e) {
    if (e.target.dataset.group != 'actions') {
      hideActions();
    }
  });
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**********************************************!*\
  !*** ./resources/js/admin/layouts/footer.js ***!
  \**********************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!******************************************!*\
  !*** ./resources/js/admin/pages/home.js ***!
  \******************************************/
$('.admin-companies-carousel').owlCarousel({
  loop: false,
  autoplay: false,
  nav: false,
  responsive: {
    0: {
      items: 1
    },
    390: {
      items: 2
    },
    576: {
      items: 3
    },
    768: {
      items: 3
    },
    992: {
      items: 4
    },
    1200: {
      items: 5
    },
    1440: {
      margin: 40,
      items: 6
    }
  }
});
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*********************************************************!*\
  !*** ./resources/js/admin/pages/publications/create.js ***!
  \*********************************************************/
var body = document.querySelector('body'),
    createPublication = body.querySelector('.publications-create-page');

if (createPublication) {
  Simditor.locale = 'ru-RU';
  new Simditor({
    textarea: $('#simditor'),
    toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', 'ol', 'ul', 'blockquote', 'code', 'table', 'link', 'hr', 'indent', 'outdent'],
    cleanPaste: true
  });
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!****************************************************!*\
  !*** ./resources/js/admin/pages/projects/index.js ***!
  \****************************************************/
window.previewProjectLogo = function () {
  // get user's uploaded image
  var imgPath = document.querySelector('input[type=file]').files[0];
  var reader = new FileReader();

  reader.onloadend = function () {
    // convert image file to base64 string and save to localStorage
    localStorage.setItem("image", reader.result);
    var img = document.getElementById('image');
    img.src = localStorage.getItem('image');
    img.style.objectFit = 'contain';
  };

  if (imgPath) {
    reader.readAsDataURL(imgPath);
  }
};
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*****************************************************!*\
  !*** ./resources/js/admin/pages/projects/create.js ***!
  \*****************************************************/
var createProjectPage = document.querySelector('.create-project-page');

if (createProjectPage) {
  Simditor.locale = 'ru-RU';
  new Simditor({
    textarea: $('#simditor'),
    toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', 'ol', 'ul', 'blockquote', 'table', 'hr', 'indent', 'outdent'],
    cleanPaste: false
  });
  var sim = document.querySelector('#desc');

  if (sim) {
    new Simditor({
      textarea: sim,
      toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', 'ol', 'ul', 'blockquote', 'table', 'hr', 'indent', 'outdent'],
      cleanPaste: false
    });
  }
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***************************************************!*\
  !*** ./resources/js/admin/pages/projects/edit.js ***!
  \***************************************************/
var editProjectPage = document.querySelector('.edit-project-page');

if (editProjectPage) {
  Simditor.locale = 'ru-RU';
  new Simditor({
    textarea: $('#simditor'),
    toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', 'ol', 'ul', 'blockquote', 'table', 'hr', 'indent', 'outdent'],
    cleanPaste: false
  });
  var sim = document.querySelector('#desc');

  if (sim) {
    new Simditor({
      textarea: sim,
      toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', 'ol', 'ul', 'blockquote', 'table', 'hr', 'indent', 'outdent'],
      cleanPaste: false
    });
  }
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*****************************************************!*\
  !*** ./resources/js/admin/pages/products/create.js ***!
  \*****************************************************/
var createProductPage = document.querySelector('.create-product-page');

if (createProductPage) {
  var simditors = createProductPage.querySelectorAll('[data-type="simditor"]');
  var template = createProductPage.querySelector('#product-content').content;
  var contentTemplate = template.querySelector('dd');
  var productItem = createProductPage.querySelector('.product-item');
  var form = createProductPage.querySelector('form');

  window.addNewProductContent = function () {
    var newContent = contentTemplate.cloneNode(true);
    var newSimditor = newContent.querySelector('[data-type="simditor"]');
    productItem.appendChild(newContent);
    new Simditor({
      textarea: newSimditor,
      pasteImage: true,
      upload: {
        url: '/upload/simditor_photo',
        //image upload url by server
        fileKey: 'simditor_photo',
        //name of input
        connectionCount: 3,
        leaveConfirm: 'Пожалуйста дождитесь окончания загрузки изображений на сервер! Вы уверены что хотите закрыть страницу?'
      },
      imageButton: 'upload',
      toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', 'ol', 'ul', 'blockquote', 'table', 'link', 'image', 'hr', 'indent', 'outdent', 'alignment']
    });
  };

  Simditor.locale = 'ru-RU';
  simditors.forEach(function (simditor) {
    new Simditor({
      textarea: simditor,
      pasteImage: true,
      upload: {
        url: '/upload/simditor_photo',
        //image upload url by server
        fileKey: 'simditor_photo',
        //name of input
        connectionCount: 3,
        leaveConfirm: 'Пожалуйста дождитесь окончания загрузки изображений на сервер! Вы уверены что хотите закрыть страницу?'
      },
      imageButton: 'upload',
      toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', 'ol', 'ul', 'blockquote', 'table', 'link', 'image', 'hr', 'indent', 'outdent', 'alignment']
    });
  });
  form.addEventListener('submit', function (evt) {
    evt.preventDefault();
    var elements = form.querySelectorAll('[data-name="content"]');
    var contents = [];

    for (var i = 0; i < elements.length; i++) {
      contents[i] = elements[i].value;
    }

    contents = JSON.stringify(contents);
    var contentsElement = document.createElement('textarea');
    contentsElement.name = 'contents';
    contentsElement.classList.add('visually-hidden');
    contentsElement.value = contents;
    form.appendChild(contentsElement);
    form.submit();
  });

  window.previewProductPicture = function () {
    // get user's uploaded image
    var imgPath = document.querySelector('#picture').files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
      // convert image file to base64 string and save to localStorage
      localStorage.setItem("image", reader.result);
      var img = document.querySelector('.picture');
      img.src = localStorage.getItem('image');
    };

    if (imgPath) {
      reader.readAsDataURL(imgPath);
    }
  };
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***************************************************!*\
  !*** ./resources/js/admin/pages/products/edit.js ***!
  \***************************************************/
var editProductPage = document.querySelector('.edit-product-page');

if (editProductPage) {
  var simditors = editProductPage.querySelectorAll('[data-type="simditor"]');
  var template = editProductPage.querySelector('#product-content').content;
  var contentTemplate = template.querySelector('dd');
  var productItem = editProductPage.querySelector('.product-item');
  var form = editProductPage.querySelector('form');

  window.addNewProductContent = function () {
    var newContent = contentTemplate.cloneNode(true);
    var newSimditor = newContent.querySelector('[data-type="simditor"]');
    productItem.appendChild(newContent);
    new Simditor({
      textarea: newSimditor,
      pasteImage: true,
      upload: {
        url: '/upload/simditor_photo',
        //image upload url by server
        fileKey: 'simditor_photo',
        //name of input
        connectionCount: 3,
        leaveConfirm: 'Пожалуйста дождитесь окончания загрузки изображений на сервер! Вы уверены что хотите закрыть страницу?'
      },
      imageButton: 'upload',
      toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', 'ol', 'ul', 'blockquote', 'table', 'link', 'image', 'hr', 'indent', 'outdent', 'alignment']
    });
  };

  Simditor.locale = 'ru-RU';
  simditors.forEach(function (simditor) {
    new Simditor({
      textarea: simditor,
      pasteImage: true,
      upload: {
        url: '/upload/simditor_photo',
        //image upload url by server
        fileKey: 'simditor_photo',
        //name of input
        connectionCount: 3,
        leaveConfirm: 'Пожалуйста дождитесь окончания загрузки изображений на сервер! Вы уверены что хотите закрыть страницу?'
      },
      imageButton: 'upload',
      toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', 'ol', 'ul', 'blockquote', 'table', 'link', 'image', 'hr', 'indent', 'outdent', 'alignment']
    });
  });
  form.addEventListener('submit', function (evt) {
    evt.preventDefault();
    var elements = form.querySelectorAll('[data-name="content"]');
    var contents = [];

    for (var i = 0; i < elements.length; i++) {
      contents[i] = elements[i].value;
    }

    contents = JSON.stringify(contents);
    var contentsElement = document.createElement('textarea');
    contentsElement.name = 'contents';
    contentsElement.classList.add('visually-hidden');
    contentsElement.value = contents;
    form.appendChild(contentsElement);
    var elementsEditable = form.querySelectorAll('[data-name="content-editable"]');
    var contentIds = form.querySelectorAll('[data-name="content-id"]');
    var contentsEditable = [];
    console.log(contentIds);

    for (var _i = 0; _i < elementsEditable.length; _i++) {
      var item = {};
      item.id = contentIds[_i].value;
      item.content = elementsEditable[_i].value;
      contentsEditable[_i] = item;
    }

    contentsEditable = JSON.stringify(contentsEditable);
    var contentsEditableEl = document.createElement('textarea');
    contentsEditableEl.name = 'contents_edit';
    contentsEditableEl.classList.add('visually-hidden');
    contentsEditableEl.value = contentsEditable;
    form.appendChild(contentsEditableEl);
    form.submit();
  });

  window.previewProductPicture = function () {
    // get user's uploaded image
    var imgPath = document.querySelector('#picture').files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
      // convert image file to base64 string and save to localStorage
      localStorage.setItem("image", reader.result);
      var img = document.querySelector('.picture');
      img.src = localStorage.getItem('image');
    };

    if (imgPath) {
      reader.readAsDataURL(imgPath);
    }
  };

  window.deleteProductContent = function (element, id) {
    $.ajax({
      url: "/admin/products/delete-content?id=".concat(id),
      success: function success(response) {
        if (response == 'success') {
          element.remove();
        }
      }
    });
  };
}
})();

/******/ })()
;