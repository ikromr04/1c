<form data-form="update-text" class="form hidden" action="{{route('texts')}}" method="post">
  @csrf
  <input name="texts-caption" type="hidden" required>
  <textarea class="textarea" name="text" required></textarea>
  <div class="btn-wrapper">
    <button type="button" onclick="window.updateText(event)">Редактировать</button>
    <button type="button" onclick="location.reload()">Отмена</button>
  </div>
</form>

<form data-form="update-page" class="form hidden" action="{{route('pages')}}" method="post">
  @csrf
  <input name="pages-id" type="hidden" required>
  <input name="title" type="text" autocomplete="off" required>
  <div class="btn-wrapper">
    <button type="button" onclick="window.updatePage(event)">Редактировать</button>
    <button type="button" onclick="location.reload()">Отмена</button>
  </div>
</form>

<form data-form="delete-product" class="form hidden" action="{{route('products.delete')}}" method="post">
  @csrf
  <input name="products-id" type="hidden" required>
  <p>Вы уверены что хотите удалить этот продукт?</p>
  <div class="btn-wrapper">
    <button type="button" onclick="window.deleteProduct(event)">Удалить</button>
    <button type="button" onclick="location.reload()">Отмена</button>
  </div>
</form>

<form class="form hidden" action="{{route('advantages')}}?action=create" method="post" data-form="create-advantage">
  @csrf
  <textarea class="textarea" name="content" required></textarea>
  <div class="btn-wrapper">
    <button class="submit-btn" type="submit" onclick="window.createAdvantage(event)">Добавить</button>
    <button class="cancel-btn" type="button" onclick="location.reload()">Отмена</button>
  </div>
</form>
<form class="form hidden" action="{{route('advantages')}}?action=update" method="post" data-form="update-advantage">
  @csrf
  <input type="hidden" name="id" required>
  <textarea class="textarea" name="content" required></textarea>
  <div class="btn-wrapper">
    <button class="submit-btn" type="submit" onclick="window.updateAdvantage(event)">Редактировать</button>
    <button class="cancel-btn" type="button" onclick="location.reload()">Отмена</button>
  </div>
</form>
<form class="form hidden" action="{{route('advantages')}}?action=delete" method="post" data-form="delete-advantage">
  @csrf
  <input type="hidden" name="id" required>
  <p class="warning">Вы уверены что хотите удалить это преимущество?</p>
  <div class="btn-wrapper">
    <button class="submit-btn" type="submit" onclick="window.deleteAdvantage(event)">Удалить</button>
    <button class="cancel-btn" type="button" onclick="location.reload()">Отмена</button>
  </div>
</form>

<form data-form="create-company" class="form form--company hidden" action="{{route('companies')}}?action=create" method="post" enctype="multipart/form-data">
  @csrf
  <figure class="company-form-card">
    <div class="company-logo-preview"></div>
    <h3 class="company-title">Название</h3>
    <p class="company-category">Категория</p>
  </figure>
  <div class="company-form-inner">
    <input name="logo" type="file" accept="image/*" required>
    <p>(png, .jpeg, .jpg / 150x80 / max: 20kb)</p>
    <input name="site" type="text" placeholder="https://tajmotors.tj" required>
    <input name="title" type="text" placeholder="Taj-Motors" required>
    <input name="category" type="text" placeholder="Автосалон" required>
    <div class="btn-wrapper">
      <button type="submit" onclick="window.createCompany(event)">Добавить</button>
      <button type="button" onclick="location.reload()">Отмена</button>
    </div>
  </div>
</form>
<form data-form="update-company" class="form form--company hidden" action="{{route('companies')}}?action=update" method="post" enctype="multipart/form-data">
  @csrf
  <div class="company-form-inner">
    <input name="id" type="hidden">
    <input name="logo" type="file" accept="image/*" required>
    <input name="site" type="text" placeholder="https://tajmotors.tj" required>
    <input name="title" type="text" placeholder="Taj-Motors" required>
    <input name="category" type="text" placeholder="Автосалон" required>
    <div class="btn-wrapper">
      <button type="submit" onclick="window.updateCompany(event)">Редактировать</button>
      <button type="button" onclick="location.reload()">Отмена</button>
    </div>
  </div>
</form>
<form data-form="delete-company" class="form hidden" action="{{route('companies')}}?action=delete" method="post">
  @csrf
  <input name="id" type="hidden">
  <p>Вы уверены что хотите удалить эту компанию?</p>
  <div class="btn-wrapper">
    <button type="submit" onclick="window.deleteCompany(event)">Удалить</button>
    <button type="button" onclick="location.reload()">Отмена</button>
  </div>
</form>

<form data-form="delete-project" class="form hidden" action="{{route('projects.delete')}}" method="post">
  @csrf
  <input name="id" type="hidden" required>
  <p>Вы уверены что хотите удалить этот проект?</p>
  <div class="btn-wrapper">
    <button type="button" onclick="window.deleteProject(event)">Удалить</button>
    <button type="button" onclick="location.reload()">Отмена</button>
  </div>
</form>

<form class="form hidden" action="{{route('success.steps')}}?action=create" method="post" data-form="create-success-step">
  @csrf
  <textarea class="textarea" name="text" required></textarea>
  <div class="btn-wrapper">
    <button class="submit-btn" type="submit" onclick="window.createSuccessStep(event)">Добавить</button>
    <button class="cancel-btn" type="button" onclick="location.reload()">Отмена</button>
  </div>
</form>
<form class="form hidden" action="{{route('success.steps')}}?action=update" method="post" data-form="update-success-step">
  @csrf
  <input type="hidden" name="id" required>
  <textarea class="textarea" name="text" required></textarea>
  <div class="btn-wrapper">
    <button class="submit-btn" type="submit" onclick="window.updateSuccessStep(event)">Редактировать</button>
    <button class="cancel-btn" type="button" onclick="location.reload()">Отмена</button>
  </div>
</form>
<form class="form hidden" action="{{route('success.steps')}}?action=delete" method="post" data-form="delete-success-step">
  @csrf
  <input type="hidden" name="id" required>
  <p class="warning">Вы уверены что хотите удалить это преимущество?</p>
  <div class="btn-wrapper">
    <button class="submit-btn" type="submit" onclick="window.deleteSuccessStep(event)">Удалить</button>
    <button class="cancel-btn" type="button" onclick="location.reload()">Отмена</button>
  </div>
</form>

<form data-form="create-member" class="form form--company hidden" action="{{route('members')}}?action=create" method="post" enctype="multipart/form-data">
  @csrf
  <figure class="member-form-card">
    <div class="member-avatar-preview"></div>
    <h3 class="member-name">Имя Фамилия</h3>
    <p class="member-position">Должность</p>
  </figure>
  <div class="company-form-inner">
    <input name="avatar" type="file" accept="image/*" required>
    <p>(png, .jpeg, .jpg / 150x150 / max: 20kb)</p>
    <input name="name" type="text" placeholder="Бобоев Фаррух" required>
    <input name="position" type="text" placeholder="Специалист" required>
    <div class="btn-wrapper">
      <button type="submit" onclick="window.createMember(event)">Добавить</button>
      <button type="button" onclick="location.reload()">Отмена</button>
    </div>
  </div>
</form>
<form data-form="update-member" class="form form--company hidden" action="{{route('members')}}?action=update" method="post" enctype="multipart/form-data">
  @csrf
  <div class="company-form-inner">
    <input name="id" type="hidden">
    <input name="avatar" type="file" accept="image/*" required>
    <input name="name" type="text" placeholder="Бобоев Фаррух" required>
    <input name="position" type="text" placeholder="Специалист" required>
    <div class="btn-wrapper">
      <button type="submit" onclick="window.updateMember(event)">Редактировать</button>
      <button type="button" onclick="location.reload()">Отмена</button>
    </div>
  </div>
</form>
<form data-form="delete-member" class="form hidden" action="{{route('members')}}?action=delete" method="post">
  @csrf
  <input name="id" type="hidden">
  <p>Вы уверены что хотите удалить этого члена команды?</p>
  <div class="btn-wrapper">
    <button type="submit" onclick="window.deleteMember(event)">Удалить</button>
    <button type="button" onclick="location.reload()">Отмена</button>
  </div>
</form>

<form data-form="create-certificate" class="form form--company hidden" action="{{route('certificates')}}?action=create" method="post" enctype="multipart/form-data">
  @csrf
  <div class="company-form-inner">
    <label for="certificate-img" class="certificate-preview">
      <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
      <img src="{{asset('img/default.png')}}">
    </label>
    <input id="certificate-img" name="img" type="file" accept="image/*" required>
    <div class="btn-wrapper">
      <button type="submit" onclick="window.createCertificate(event)">Добавить</button>
      <button type="button" onclick="location.reload()">Отмена</button>
    </div>
  </div>
</form>
<form data-form="update-certificate" class="form form--company hidden" action="{{route('certificates')}}?action=update" method="post" enctype="multipart/form-data">
  @csrf
  <input name="id" type="hidden">
  <input name="img" type="file" accept="image/*" required>
  <div class="btn-wrapper">
    <button type="submit" onclick="window.updateCertificate(event)">Редактировать</button>
    <button type="button" onclick="location.reload()">Отмена</button>
  </div>
</form>
<form data-form="delete-certificate" class="form hidden" action="{{route('certificates')}}?action=delete" method="post">
  @csrf
  <input name="id" type="hidden">
  <p>Вы уверены что хотите удалить этот сертификат?</p>
  <div class="btn-wrapper">
    <button type="submit" onclick="window.deleteCertificate(event)">Удалить</button>
    <button type="button" onclick="location.reload()">Отмена</button>
  </div>
</form>

<form data-form="delete-publication" class="form hidden" action="{{route('publications.delete')}}" method="post">
  @csrf
  <input name="id" type="hidden">
  <p>Вы уверены что хотите удалить эту публикацию?</p>
  <div class="btn-wrapper">
    <button type="submit">Удалить</button>
    <button type="button" onclick="location.reload()">Отмена</button>
  </div>
</form>