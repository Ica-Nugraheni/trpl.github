<?php
require '../koneksi.php';

if (!isset($_GET['proses'])) {
    die("Akses langsung tidak diperbolehkan!");
}

$proses = $_GET['proses'];

switch ($proses) {
    case 'insert':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kode_mk = $_POST['kode_mk'];
            $nama_mk = $_POST['nama_mk'];
            $sks = $_POST['sks'];
            $prodi_id = $_POST['prodi_id'];
            $semester = $_POST['semester'];

            // Cek apakah kode mata kuliah sudah ada
            $stmtCheck = $db->prepare("SELECT * FROM mata_kuliah WHERE kode_mk = ?");
            $stmtCheck->bind_param("s", $kode_mk);
            $stmtCheck->execute();
            $stmtCheck->store_result();

            if ($stmtCheck->num_rows > 0) {
                echo "<script>
                    alert('Data gagal disimpan! Kode Mata Kuliah sudah terdaftar');
                    window.location='index.php?p=mata_kuliah&aksi=input';
                </script>";
                $stmtCheck->close();
                exit();
            }
            $stmtCheck->close();

            // Insert data mata kuliah
            $stmt = $db->prepare("INSERT INTO mata_kuliah (kode_mk, nama_mk, sks, prodi_id, semester) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiii", $kode_mk, $nama_mk, $sks, $prodi_id, $semester);

            if ($stmt->execute()) {
                echo "<script>
                    alert('Data Berhasil Disimpan');
                    window.location='index.php?p=mata_kuliah';
                </script>";
            } else {
                echo "<script>
                    alert('Data Gagal Disimpan: " . $stmt->error . "');
                    window.location='index.php?p=mata_kuliah&aksi=input';
                </script>";
            }

            $stmt->close();
        }
        break;

    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kode_mk = $_POST['kode_mk'];
            $nama_mk = $_POST['nama_mk'];
            $sks = $_POST['sks'];
            $prodi_id = $_POST['prodi_id'];
            $semester = $_POST['semester'];

            // Update data mata kuliah
            $stmt = $db->prepare("UPDATE mata_kuliah SET nama_mk = ?, sks = ?, prodi_id = ?, semester = ? WHERE kode_mk = ?");
            $stmt->bind_param("siiss", $nama_mk, $sks, $prodi_id, $semester, $kode_mk);

            if ($stmt->execute()) {
                echo "<script>
                    alert('Data Berhasil Diupdate');
                    window.location='index.php?p=mata_kuliah';
                </script>";
            } else {
                echo "<script>
                    alert('Data Gagal Diupdate: " . $stmt->error . "');
                    window.location='index.php?p=mata_kuliah';
                </script>";
            }

            $stmt->close();
        }
        break;

    case 'delete':
        if (!isset($_GET['kode'])) {
            echo "<script>
                alert('Kode tidak ditemukan!');
                window.location='index.php?p=mata_kuliah';
            </script>";
            exit();
        }

        $kode = $_GET['kode'];

        // Delete data mata kuliah
        $stmt = $db->prepare("DELETE FROM mata_kuliah WHERE kode_mk = ?");
        $stmt->bind_param("s", $kode);

        if ($stmt->execute()) {
            echo "<script>
                alert('Data Berhasil Dihapus');
                window.location='index.php?p=mata_kuliah';
            </script>";
        } else {
            echo "<script>
                alert('Data Gagal Dihapus: " . $stmt->error . "');
                window.location='index.php?p=mata_kuliah';
            </script>";
        }

        $stmt->close();
        break;

    default:
        echo "<script>
            alert('Proses tidak valid!');
            window.location='index.php?p=mata_kuliah';
        </script>";
        break;
}

$db->close();
?>
