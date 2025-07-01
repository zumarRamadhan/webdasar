<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Setting - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fc;
    }

    .container {
      max-width: 700px;
      margin-top: 50px;
    }

    .card {
      border-radius: 15px;
      border: none;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .form-label {
      font-weight: 500;
    }
  </style>
</head>
<body>

  <div class="container">
    <h3 class="mb-4 text-center fw-bold">Pengaturan Akun</h3>

    <!-- Form Ubah Username -->
    <div class="card mb-4 p-4">
      <h5 class="mb-3">Ubah Username</h5>
      <form method="POST" action="update_username.php">
        <div class="mb-3">
          <label for="currentUsername" class="form-label">Username Saat Ini</label>
          <input type="text" class="form-control" id="currentUsername" name="currentUsername" required>
        </div>
        <div class="mb-3">
          <label for="newUsername" class="form-label">Username Baru</label>
          <input type="text" class="form-control" id="newUsername" name="newUsername" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Username</button>
      </form>
    </div>

    <!-- Form Ubah Password -->
    <div class="card mb-4 p-4">
      <h5 class="mb-3">Ubah Password</h5>
      <form method="POST" action="update_password.php">
        <div class="mb-3">
          <label for="currentPassword" class="form-label">Password Saat Ini</label>
          <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
        </div>
        <div class="mb-3">
          <label for="newPassword" class="form-label">Password Baru</label>
          <input type="password" class="form-control" id="newPassword" name="newPassword" required>
        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Konfirmasi Password Baru</label>
          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan Password</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>