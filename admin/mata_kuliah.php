<?php
require '../koneksi.php';

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'view';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Mata Kuliah</h1>
</div>

<?php
switch ($aksi) {
    case 'view':
        ?>
        <div class="container">
            <div class="py-2">
                <a href="index.php?p=mata_kuliah&aksi=input" class="btn btn-success">Input Data Baru</a>
            </div>
            <table class="table table-bordered border  bg-white " id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode MK</th>
                        <th>Nama MK</th>
                        <th>SKS</th>
                        <th>Program Studi</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = mysqli_query($db, "SELECT mata_kuliah.*, prodi.nama_prodi 
                                              FROM mata_kuliah 
                                              LEFT JOIN prodi ON mata_kuliah.prodi_id = prodi.id") 
                                              or die("Query Error: " . mysqli_error($db));
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['kode_mk']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama_mk']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['sks']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama_prodi']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['semester']) . "</td>";
                        echo "<td>
                            <a href='index.php?p=mata_kuliah&aksi=edit&kode=" . urlencode($row['kode_mk']) . "' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='proses_mata_kuliah.php?proses=delete&kode=" . urlencode($row['kode_mk']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Delete</a>
                        </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        break;

    case 'input':
        ?>
        <div class="container">
    <form action="proses_mata_kuliah.php?proses=insert" method="POST" class="row g-3">
        <div class="col-md-8">
            <label class="form-label">Kode MK</label>
            <input type="text" class="form-control" name="kode_mk" required>
        </div>
        <div class="col-md-8">
            <label class="form-label">Nama MK</label>
            <input type="text" class="form-control" name="nama_mk" required>
        </div>
        <div class="col-md-8">
            <label class="form-label">SKS</label>
            <input type="number" class="form-control" name="sks" required>
        </div>
        <div class="col-md-8">
            <label class="form-label">Program Studi</label>
            <select name="prodi_id" class="form-select" required>
                <option value="">--Pilih Program Studi--</option>
                <?php
                $queryProdi = mysqli_query($db, "SELECT * FROM prodi");
                while ($prodi = mysqli_fetch_assoc($queryProdi)) {
                    echo "<option value='" . htmlspecialchars($prodi['id']) . "'>" . htmlspecialchars($prodi['nama_prodi']) . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-8">
            <label class="form-label">Semester</label>
            <input type="number" class="form-control" name="semester" required>
        </div>
        <div class="col-md-8">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="?p=mata_kuliah" class="btn btn-success">Kembali</a>
        </div>
    </form>
</div>

        <?php
        break;

    case 'edit':
        $kode = isset($_GET['kode']) ? mysqli_real_escape_string($db, $_GET['kode']) : '';
        if (!empty($kode)) {
            $query = mysqli_query($db, "SELECT * FROM mata_kuliah WHERE kode_mk='$kode'");
            $data = mysqli_fetch_assoc($query);
        }
        if (!$data) {
            die("Data tidak ditemukan!");
        }
        ?>
        <div class="container">
            <form action="proses_mata_kuliah.php?proses=update" method="POST">
                <input type="hidden" name="kode_mk" value="<?= htmlspecialchars($data['kode_mk']) ?>">
                <div class="mb-3">
                    <label class="form-label">Nama MK</label>
                    <input type="text" class="form-control" name="nama_mk" value="<?= htmlspecialchars($data['nama_mk']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">SKS</label>
                    <input type="number" class="form-control" name="sks" value="<?= htmlspecialchars($data['sks']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <select name="prodi_id" class="form-select" required>
                        <option value="">--Pilih Program Studi--</option>
                        <?php
                        $queryProdi = mysqli_query($db, "SELECT * FROM prodi");
                        while ($prodi = mysqli_fetch_assoc($queryProdi)) {
                            $selected = ($prodi['id'] == $data['prodi_id']) ? 'selected' : '';
                            echo "<option value='" . htmlspecialchars($prodi['id']) . "' $selected>" . htmlspecialchars($prodi['nama_prodi']) . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Semester</label>
                    <input type="number" class="form-control" name="semester" value="<?= htmlspecialchars($data['semester']) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="?p=mata_kuliah" class="btn btn-success">Kembali</a>
            </form>
        </div>
        <?php
        break;
}
?>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan MENU data per halaman",
            zeroRecords: "Data tidak ditemukan",
            info: "Menampilkan halaman PAGE dari PAGES",
            infoEmpty: "Tidak ada data tersedia",
            infoFiltered: "(difilter dari MAX total data)",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Selanjutnya",
                previous: "Sebelumnya"
            }
        }
    });
});
</script>
