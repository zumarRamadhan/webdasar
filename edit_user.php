<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <title>Edit Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url("bg-light.png");
    }
  </style>
</head>
<body class="container py-5">

  <h3>✏️Edit Username & Password Login</h3>

  <!-- Bootstrap Alert Placeholder -->
  <div id="alertBox" class="alert alert-success alert-dismissible fade show d-none mt-4" role="alert">
    <span id="alertMessage"></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <!-- Form -->
  <form id="userForm" class="mt-4" onsubmit="return saveUser()">
    <div class="mb-3">
      <label for="username" class="form-label">Masukkan Username Baru</label>
      <input type="text" class="form-control" id="username" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Masukkan Password Baru</label>
      <input type="password" class="form-control" id="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="bootstrap_dashboard.php" class="btn btn-danger ms-2">Kembali</a>
  </form>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Load user saat halaman dibuka
    window.addEventListener("DOMContentLoaded", () => {
      const savedUser = localStorage.getItem("loginUser");
      if (savedUser) {
        const user = JSON.parse(savedUser);
        document.getElementById("username").value = user.username;
        document.getElementById("password").value = user.password;
      }
    });

    function saveUser() {
      const username = document.getElementById("username").value.trim();
      const password = document.getElementById("password").value.trim();
      localStorage.setItem("loginUser", JSON.stringify({ username, password }));

      // Tampilkan alert Bootstrap
      const alertBox = document.getElementById("alertBox");
      const alertMessage = document.getElementById("alertMessage");
      alertMessage.textContent = "User login berhasil disimpan!";
      alertBox.classList.remove("d-none");

      // Opsional: auto-hide setelah 3 detik
      setTimeout(() => {
        const bsAlert = bootstrap.Alert.getOrCreateInstance(alertBox);
        bsAlert.close();
      }, 3000);

      return false; // Hindari reload form
    }
  </script>
</body>
</html>
