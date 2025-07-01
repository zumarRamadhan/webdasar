<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fc;
    }

    .sidebar {
      width: 230px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #ffffff;
      padding: 1.5rem 1rem;
      border-right: 1px solid #eee;
    }

    .sidebar .nav-link {
      color: #333;
      font-weight: 500;
      margin-bottom: 1rem;
    }

    .sidebar .nav-link.active {
      background-color: #e7e6fd;
      color: #5c4dff;
      border-radius: 10px;
    }

    .main-content {
      margin-left: 250px;
      padding: 2rem;
    }

    .card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .chart-placeholder {
      background-color: #f0f2fa;
      height: 150px;
      border-radius: 12px;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #888;
    }
  </style>
</head>
<body>

  <div class="sidebar d-flex flex-column">
    <div class="text-center">
        <img class="mb-4" src="logo.png" alt="" height="100">
    </div>
    <nav class="nav flex-column mb-auto">
      <a href="#" class="nav-link active"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
      <a href="#" class="nav-link"><i class="bi bi-briefcase me-2"></i> Offers</a>
      <a href="#" class="nav-link"><i class="bi bi-person-lines-fill me-2"></i> People</a>
      <hr />
      <a href="edit_user.php" class="nav-link"><i class="bi bi-sliders me-2"></i> Settings</a>
      <a href="#" id="logoutBtn" class="nav-link text-danger"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
    </nav>
  </div>

  <div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="fw-bold">Dashboard</h4>
      <input type="search" class="form-control w-25" placeholder="Search..." />
    </div>

    <div class="row g-4 mb-4">
      <div class="col-md-3">
        <div class="card p-3">
          <h6 class="text-muted">Total employees</h6>
          <h4 class="fw-bold">352</h4>
          <p class="text-success small mb-0">↑ 15%</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card p-3">
          <h6 class="text-muted">Number of Leave</h6>
          <h4 class="fw-bold">24</h4>
          <p class="text-danger small mb-0">↓ 10%</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card p-3">
          <h6 class="text-muted">New employees</h6>
          <h4 class="fw-bold">27</h4>
          <p class="text-success small mb-0">↑ 12%</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card p-3">
          <h6 class="text-muted">Happiness Rate</h6>
          <h4 class="fw-bold">80%</h4>
          <p class="text-danger small mb-0">↓ 12%</p>
        </div>
      </div>
    </div>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="card p-4">
          <h6>Working Format</h6>
          <div class="chart-placeholder">Pie Chart Here</div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card p-4">
          <h6>Project Employment</h6>
          <div class="chart-placeholder">Bar Chart Here</div>
        </div>
      </div>
    </div>

    <div class="row g-4 mt-4">
      <div class="col-md-6">
        <div class="card p-4">
          <h6>Staff Turnover</h6>
          <div class="chart-placeholder">Bar Chart Here</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card p-4">
          <div class="d-flex justify-content-between">
            <h6>Recruitment Progress</h6>
            <a href="#" class="text-primary">View all</a>
          </div>
          <div class="chart-placeholder">Recruitment Table Placeholder</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Logout Confirmation Script -->
  <script>
    document.getElementById('logoutBtn').addEventListener('click', function(e) {
      e.preventDefault();
      if (confirm("Apakah Anda yakin ingin logout?")) {
        window.location.href = "logout_bootstrap.php";
      }
    });
  </script>

</body>
</html>