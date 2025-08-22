<?php
require_once 'vendor/autoload.php';
use PhpOffice\PhpWord\TemplateProcessor;

// Ambil input
$nomor    = trim($_POST['nomor'] ?? '');
$kegiatan = trim($_POST['kegiatan'] ?? '');
$dasar    = trim($_POST['dasar'] ?? '');
$jumlah   = (int)($_POST['jumlah'] ?? 1);
$tempat   = trim($_POST['tempat'] ?? '');

// 🔹 Format Hari/Tanggal
$tanggalMulai   = $_POST['tanggal_mulai'] ?? '';
$tanggalSelesai = $_POST['tanggal_selesai'] ?? '';

if ($tanggalMulai && $tanggalSelesai) {
    $hari = date('d-m-Y', strtotime($tanggalMulai)) . ' s/d ' . date('d-m-Y', strtotime($tanggalSelesai));
} elseif ($tanggalMulai) {
    $hari = date('d-m-Y', strtotime($tanggalMulai));
} else {
    $hari = '';
}

// 🔹 Format Waktu
$waktuMulai   = $_POST['waktu_mulai'] ?? '';
$waktuSelesai = $_POST['waktu_selesai'] ?? '';

if ($waktuMulai && $waktuSelesai) {
    $waktu = $waktuMulai . ' - ' . $waktuSelesai;
} elseif ($waktuMulai) {
    $waktu = $waktuMulai . ' - Selesai';
} else {
    $waktu = '';
}

// Pilih template
if ($jumlah <= 2) {
    $templatePath = __DIR__ . '/template.docx';
} else {
    $templatePath = __DIR__ . '/template_multi.docx';
}
$template = new TemplateProcessor($templatePath);

// 🔹 Data umum
$template->setValue('nomor', $nomor);
$template->setValue('kegiatan', $kegiatan);
$template->setValue('dasar', $dasar);
$template->setValue('hari', $hari);
$template->setValue('tempat', $tempat);
$template->setValue('waktu', $waktu);

// 🔹 Jika jumlah 1 atau 2 → isi manual
if ($jumlah === 1 || $jumlah === 2) {
    $nama1    = trim($_POST['nama1'] ?? '');
    $jabatan1 = trim($_POST['jabatan1'] ?? '');
    $nama2    = trim($_POST['nama2'] ?? '');
    $jabatan2 = trim($_POST['jabatan2'] ?? '');

    if ($jumlah === 1) {
        $pelaksana = "Nama : $nama1\nJabatan : $jabatan1";
    } else {
        $pelaksana = "Nama : $nama1\nJabatan : $jabatan1\n\n"
                   . "Nama : $nama2\nJabatan : $jabatan2";
    }
    $template->setValue('pelaksana', $pelaksana);
}

// 🔹 Jika jumlah > 2 → tabel (template_multi.docx harus ada ${no} dan ${nama_jabatan})
if ($jumlah > 2) {
    $rows = [];
    for ($i = 1; $i <= $jumlah; $i++) {
        $nama    = trim($_POST["nama$i"] ?? '');
        $jabatan = trim($_POST["jabatan$i"] ?? '');
        $rows[] = [
            'no'           => $i,
            'nama_jabatan' => $nama . ' – ' . $jabatan,
        ];
    }
    $template->cloneRowAndSetValues('no', $rows);
}

// 🔹 Nama file aman
$rawFilename = 'SPRIN_' . $nomor . '.docx';
$filename = preg_replace('/[\\\\\\/:"*?<>|]+/', '_', $rawFilename);
$outPath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $filename;

$template->saveAs($outPath);

// Download
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . filesize($outPath));
readfile($outPath);
unlink($outPath);
exit;
