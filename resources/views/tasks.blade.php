<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Создать задачу</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="container mt-5">

  <h1 class="mb-4">Создать задачу</h1>

  <form id="loginForm" class="mb-4">
    <h4>Авторизация</h4>
    <div class="mb-2">
      <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="mb-2">
      <input type="password" id="password" name="password" class="form-control" placeholder="Пароль" required>
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
  </form>

  <form id="taskForm" class="mb-4" style="display:none;">
    <h4>Создать задачу</h4>
    <div class="mb-2">
      <input type="text" id="title" name="title" class="form-control" placeholder="Титл" required>
    </div>
    <div class="mb-2">
      <textarea name="text" id="text" class="form-control" placeholder="Описание задачи" required></textarea>
    </div>
    <div class="mb-2">
    <label>Теги:</label>
    <select name="tags[]" id="tagsSelect" class="form-select" multiple>
    </select>
  </div>
    <button type="submit" class="btn btn-success">Создать</button>
  </form>
  

    <form id="tagForm" class="mb-4" style="display:none;">
    <h4>Создать тег</h4>
    <div class="mb-2">
      <input type="text" id="title" name="title" class="form-control" placeholder="Название (3–20 символов)" required>
    </div>
    <button type="submit" class="btn btn-success">Создать</button>
  </form>

  <h4>Список задач</h4>
  <div id="taskList" class="border-top pt-3"></div>

<script>

let apiToken = null;

$('#loginForm').on('submit', function(e) {
  e.preventDefault();
  $.post('/api/login', $(this).serialize())
    .done(res => {
      apiToken = res.token;
      $('#taskForm').show();
      $('#tagForm').show();
        loadTasks();
        loadTags();
    })
    .fail(() => alert("Некорректный email/пароль"));
});

function loadTasks() {
  $.ajax({
    url: '/api/tasks',
    method: 'GET',
    headers: { Authorization: 'Bearer ' + apiToken },
    success: function(tasks) {
      $('#taskList').empty();
      tasks.forEach(task => {
        let tagsHtml = '';
        if (task.tags && task.tags.length > 0) {
          tagsHtml = task.tags.map(tag => 
            `<span class="badge bg-primary me-1">${tag.title}</span>`
          ).join('');
        }
        
        $('#taskList').append(`
          <div class="card mb-2" id="task-${task.id}">
            <div class="card-body">
              <h5 class="card-title">${task.title}</h5>
              <p class="card-text">${task.text || ''}</p>
              <div class="tags-container mb-2">${tagsHtml}</div>
              <button class="btn btn-danger btn-sm" onclick="deleteTask(${task.id})">Удалить</button>
              <button class="btn btn-warning btn-sm" onclick="updateTask(${task.id})">Обновить</button>
            </div>
          </div>
        `);
      });
    }
  });
}

function loadTags() {
  $.ajax({
    url: '/api/tags',
    method: 'GET',
    headers: { Authorization: 'Bearer ' + apiToken },
    success: function(tags) {
      $('#tagsSelect').empty();
      tags.forEach(tag => {
        $('#tagsSelect').append(
          new Option(tag.title, tag.id)
        );
      });
    }
  });
}
$('#taskForm').on('submit', function(e) {
  e.preventDefault();
  const formData = {
    title: $('[name="title"]').val(),
    text: $('[name="text"]').val(),
    tags: $('#tagsSelect').val() || []
  };

  $.ajax({
    url: '/api/tasks',
    method: 'POST',
    headers: { Authorization: 'Bearer ' + apiToken },
    data: formData,
    success: function(task) {
      loadTasks();
      $('#taskForm')[0].reset();
      $('#tagsSelect').val(null);
    }
  });
});

function deleteTask(id) {
  $.ajax({
    url: '/api/tasks/' + id,
    method: 'DELETE',
    headers: { Authorization: 'Bearer ' + apiToken },
    success: function() {
      $('#task-' + id).remove();
    }
  });
}

</script>

</body>
</html>