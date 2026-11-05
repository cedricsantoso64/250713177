<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $tlp = $_POST['telepon'] ?? '';
    $verifikasi = $_POST['verifikasi'] ?? '';
    $message = array();

    if (empty($nama) || empty($tlp) || empty($verifikasi)) {
        $message[] = "Harap lengkapi semua data.";
    }

    if (!preg_match("/^[a-zA-Z ]+$/", $nama) && !empty($nama)) {
        $message[] = "Nama hanya boleh mengandung huruf dan spasi.";
    }

    if (!preg_match("/^(\+62|08)[0-9]{9,11}$/", $tlp) && !empty($tlp)) {
        $message[] = "Nomor telepon harus diawali +62 atau 08 dan terdiri dari 9 sampai 11 digit.";
    }

    if ($verifikasi !== 'WhatsApp' && $verifikasi !== 'SMS' && !empty($verifikasi)) {
        $message[] = "Pilihan verifikasi tidak valid.";
    }

    if (!empty($message)) {
        foreach ($message as $msg) {
            echo "<p style='color:red;'>" . htmlspecialchars($msg) . "</p>";
        }
    } else {
        if ($verifikasi == 'WhatsApp') {
            $lokasi = "WhatsApp";
        } else {
            $lokasi = "SMS";
        }

        echo "<h2>Informasi Pendaftaran</h2>";
        echo "<p>Nama : " . htmlspecialchars($nama) . "</p>";
        echo "<p>Telepon : " . htmlspecialchars($tlp) . "</p>";
        echo "<p>Verifikasi kode OTP : " . htmlspecialchars($verifikasi) . "</p>";
        echo "<p>Pendaftaran akun Anda terkirim. Silahkan mengecek "
            . htmlspecialchars($lokasi) . " "
            . htmlspecialchars($tlp)
            . " untuk mendapatkan kode OTP verifikasi.</p>";
    }
} else {
    echo "Silahkan lengkapi formulir di atas.";
}
?>
