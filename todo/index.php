<?php
include "../config/database.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
<title>To-Do List</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
.done { text-decoration: line-through; color: gray; }
</style>
</head>
<body>

<?php include "../dashboard/navbar.php"; ?>

<div class="container mt-4">
<h3>📝 To-Do List</h3>

<div class="input-group mb-3">
  <input type="text" id="task" class="form-control" placeholder="Tulis tugas...">
  <button class="btn btn-primary" onclick="addTask()">Tambah</button>
</div>

<ul class="list-group" id="todoList"></ul>
</div>

<script>
loadTask();

function loadTask() {
  fetch("load.php")
    .then(res => res.text())
    .then(data => document.getElementById("todoList").innerHTML = data);
}

function addTask() {
  let task = document.getElementById("task").value;
  if(task === "") return;

  fetch("add.php", {
    method: "POST",
    body: new URLSearchParams({ task })
  }).then(() => {
    document.getElementById("task").value = "";
    loadTask();
  });
}

function toggle(id) {
  fetch("toggle.php?id=" + id).then(() => loadTask());
}

function removeTask(id) {
  fetch("delete.php?id=" + id).then(() => loadTask());
}
</script>

</body>
</html>
