<?php

if ($_POST) {
    $bayaran = $_POST['bayaran'] ?? '';
    $kode = $_POST['kode'] ?? '';
    $harga = 50000;
    $message = array();
    $message2 = '';
    $bayaranKembali = 0;

    if (empty($bayaran) || empty($kode)) {
        $message[] = "Harap lengkapi semua data.";
    }

    if (!preg_match("/^[0-9]*$/", $bayaran)) {
        $message[] = "Jumlah bayaran hanya boleh mengandung angka.";
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $kode)) {
        $message[] = "Kode pembayaran hanya boleh mengandung huruf.";
    }

    if (!empty($message)) {
        foreach ($message as $msg) {
            echo "<p style='color:red;'>&gt;&gt; " . htmlspecialchars($msg) . "</p>";
        }
    } else {

        function kodeDiskon($kode) {
            switch (strtolower($kode)) {
                case 'p':
                    $diskon = 0.05;
                    break;
                case 'w':
                    $diskon = 0.02;
                    break;
                case 'd':
                    $diskon = 0.10;
                    break;
                default:
                    $diskon = 0;
            }
            return $diskon;
        }

        $diskon = kodeDiskon($kode);

        function totalBayar($harga, $diskon){
            return $harga - ($harga * $diskon);
        }

        $totalBayar = totalBayar($harga, $diskon);

        function pembayaran($bayaran, $totalBayar){
            if ($bayaran < $totalBayar) {
                return null;
            } else {
                $bayaranKembali = $bayaran - $totalBayar;
                return $bayaranKembali;
            }
        }

        $bayaranKembali = pembayaran($bayaran, $totalBayar);

        if ($bayaranKembali === null) {
            $message2 = "Jumlah yang dibayar kurang dari total pembayaran. Silakan bayar sesuai jumlah yang ditentukan.";
            $bayaranKembali = 0;
        }

        if (!empty($message2)) {
            echo "<p style='color:red;'>" . htmlspecialchars($message2) . "</p>";
        } else {
            echo "<h2>Informasi Pembayaran</h2>";
            echo "<p><strong>Jumlah yang dibayar : </strong>Rp " . htmlspecialchars($bayaran) . "</p>";
            echo "<p><strong>Kode diskon : </strong>" . htmlspecialchars($kode) . "</p>";

            if ($diskon == 0) {
                echo "<p>Maaf! Kode diskon tidak valid. Tidak ada diskon yang diberikan.</p>";
            } else {
                echo "<p>Selamat! Anda mendapatkan diskon " . ($diskon * 100) . "%.</p>";
            }

            echo "<p style='font-weight: bold; font-size: 18px;'>Total Pembayaran : Rp " . htmlspecialchars($totalBayar) . "</p>";
            echo "<p style='font-weight: bold; font-size: 18px;'>Kembalian : Rp " . htmlspecialchars($bayaranKembali) . "</p>";
        }
    }
} else {
    echo "Silahkan isi formulir untuk melakukan pembayaran.";
}

?>