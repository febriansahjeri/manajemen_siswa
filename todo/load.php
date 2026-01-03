<?php
include "../config/database.php";

if (!isset($_SESSION['login'])) exit;

$user = $_SESSION['nama'];

$q = mysqli_query($conn,"
  SELECT * FROM todos
  WHERE user='$user'
  ORDER BY id DESC
");

while ($t = mysqli_fetch_assoc($q)) {
  $checked = $t['status'] ? "checked" : "";
  $done    = $t['status'] ? "done" : "";

  echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
    <div>
      <input type='checkbox' onclick='toggle($t[id])' $checked>
      <span class='$done'>{$t['title']}</span>
    </div>
    <button class='btn btn-sm btn-danger' onclick='removeTask($t[id])'>✖</button>
  </li>";
}
