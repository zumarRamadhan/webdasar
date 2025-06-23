<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 1;
} else {
    $_SESSION['counter'] += 1;
    if ($_SESSION['counter'] > 100) {
        $_SESSION['counter'] = 0;
    }
}

if (!isset($_SESSION['data_input'])) {
    $_SESSION['data_input'] = [];
}

if (isset($_GET['delete'])) {
    $index = (int)$_GET['delete'];
    if (isset($_SESSION['data_input'][$index])) {
        array_splice($_SESSION['data_input'], $index, 1);
    }
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit();
}

$editMode = false;
$editIndex = -1;
$editData = ['nama' => '', 'umur' => '', 'keterangan' => ''];

if (isset($_GET['edit'])) {
    $editIndex = (int)$_GET['edit'];
    if (isset($_SESSION['data_input'][$editIndex])) {
        $editData = $_SESSION['data_input'][$editIndex];
        $editMode = true;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nama']) && isset($_POST['Umur'])) {
    $nama = trim($_POST['nama']);
    $umur = trim($_POST['Umur']);

    if ($nama !== '' && $umur !== '' && is_numeric($umur)) {
        $umur = (int)$umur;

        if ($umur >= 1 && $umur <= 5) {
            $keterangan = 'Balita';
        } elseif ($umur > 5 && $umur <= 14) {
            $keterangan = 'Anak Kecil';
        } elseif ($umur >= 17 && $umur <= 25) {
            $keterangan = 'Remaja';
        } elseif ($umur > 25 && $umur <= 55) {
            $keterangan = 'Dewasa';
        } elseif ($umur > 55 && $umur <= 100) {
            $keterangan = 'Tua';
        } else {
            $keterangan = 'Tidak Diketahui';
        }

        $dataBaru = [
            'nama' => $nama,
            'umur' => $umur,
            'keterangan' => $keterangan
        ];

        if (isset($_POST['edit_index']) && is_numeric($_POST['edit_index'])) {
            $i = (int)$_POST['edit_index'];
            $_SESSION['data_input'][$i] = $dataBaru;
        } else {
            $_SESSION['data_input'][] = $dataBaru;
        }

        header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Page</title>
    <style>
        body {
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
            height: 100vh;
            background-image: url("bg.png");
            background-attachment: fixed;
            color: white;
        }

        form {
            background-color: #1E2235;
            padding: 30px;
            border-radius: 16px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            margin-bottom: 30px;
        }

        form table {
            width: 100%;
        }

        form td {
            padding: 10px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 10px;
            background-color: #2A2E45;
            color: #fff;
            font-size: 16px;
            margin-top: 5px;
        }

        input::placeholder {
            color: #bbb;
        }

        button[type="submit"] {
            background-color: #4F7BFF;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 12px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #3A63D8;
        }

        .btn-logout {
            background-color: #FF4C4C;
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: bold;
            border: none;
            margin-top: 10px;
            margin-left: 10px;
            cursor: pointer;
        }

        .btn-close {
            background-color: #4F7BFF;
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: bold;
            border: none;
            margin-top: 10px;
            margin-left: 10px;
            cursor: pointer;
        }

        table.data-table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            background: #1F2937;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        table.data-table th,
        table.data-table td {
            padding: 15px;
            text-align: center;
            color: white;
        }

        table.data-table th {
            background-color: #374151;
            font-weight: bold;
        }

        table.data-table tr:not(:first-child):hover {
            background-color: #2C3344;
        }

        .btn-edit {
            background-color: orange;
            padding: 8px 16px;
            font-size: 14px;
            margin-right: 5px;
            border-radius: 10px;
            color: black;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-delete {
            background-color: #FF4C4C;
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            text-decoration: none;
        }

        .actions {
            display: flex;
            justify-content: center;
        }

        #logoutModal {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        #logoutModal .modal-content {
            background-color: #1E2235;
            color:white;
            width: max-content;
            padding:26px;
            font-weight:600;
            font-size:20px;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

    <h1><?php echo "Selamat datang " . $_SESSION['username'] . " Ke-" . $_SESSION['counter']; ?></h1>

    <form method="post">
        <input type="hidden" name="edit_index" value="<?= $editMode ? $editIndex : '' ?>">
        <table>
            <tr>
                <td colspan="2" style="text-align: center; font-weight: bold; font-size: 24px;">
                    <?= $editMode ? 'Edit Data' : 'Input Data' ?>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required value="<?= htmlspecialchars($editData['nama']) ?>" placeholder="John Carter" /></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="number" name="Umur" required min="1" max="100" value="<?= htmlspecialchars($editData['umur']) ?>" placeholder="Masukkan umur" /></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit"><?= $editMode ? 'Update' : 'Kirim' ?></button>
                    <button class="btn-logout" type="button" onclick="confirmLogout()">Log Out</button>
                </td>
            </tr>
        </table>
    </form>

    <?php if (!empty($_SESSION['data_input'])): ?>
        <table class="data-table">
            <tr>
                <th>Nama</th>
                <th>Umur</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($_SESSION['data_input'] as $i => $data): ?>
                <tr>
                    <td><?= htmlspecialchars($data['nama']) ?></td>
                    <td><?= htmlspecialchars($data['umur']) . ' Tahun' ?></td>
                    <td><?= htmlspecialchars($data['keterangan']) ?></td>
                    <td class="actions">
                        <a class="btn-edit" href="?edit=<?= $i ?>">Edit</a>
                        <a class="btn-delete" href="?delete=<?= $i ?>" onclick="return confirm('Yakin ingin hapus data ini?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <div id="logoutModal">
        <div class="modal-content">
            <p>Apakah Anda yakin ingin logout?</p>
            <button class="btn-logout" onclick="window.location.href='logout.php'">Iya</button>
            <button class="btn-close" onclick="closeModal()">Tidak</button>
        </div>
    </div>

    <script>
        function confirmLogout() {
            document.getElementById('logoutModal').style.display = 'flex';
        }
        function closeModal() {
            document.getElementById('logoutModal').style.display = 'none';
        }
    </script>

</body>
</html>