<?php

function infoKuota($kuota) {
    switch ($kuota) {
        case '1':
            return "1GB / 3 hari";
        case '2':
            return "2GB / 5 hari";
        case '5':
            return "5GB / 7 hari";
        default:
            return "";
    }
}

function dapatDiskon($totalBayar) {
    if ($totalBayar >= 25000) {
        return 0.20;
    } else {
        return 0;
    }
}

function totalHarga($diskon, $totalBayar) {
    return $totalBayar - ($totalBayar * $diskon);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pulsa = $_POST['pulsa'] ?? '';
    $paket = $_POST['paket'] ?? '';
    $message = array();

    if (empty($pulsa) || empty($paket)) {
        $message[] = "Harap pilih pulsa dan paket data.";
    }

    if (!in_array($pulsa, ['5000', '10000', '20000'])) {
        $message[] = "Pilihan pulsa tidak valid.";
    }

    if (!in_array($paket, ['1', '2', '5'])) {
        $message[] = "Pilihan paket data tidak valid.";
    }

    if (!empty($message)) {
        foreach ($message as $msg) {
            echo "<p style='color:red;'>" . htmlspecialchars($msg) . "</p>";
        }
    } else {

        if ($pulsa == '5000') {
            $hargaPulsa = 6000;
        } elseif ($pulsa == '10000') {
            $hargaPulsa = 11000;
        } else {
            $hargaPulsa = 21000;
        }

        if ($paket == '1') {
            $hargaPaket = 10000;
        } elseif ($paket == '2') {
            $hargaPaket = 15000;
        } else {
            $hargaPaket = 20000;
        }

        $totalBayar = $hargaPulsa + $hargaPaket;
        $diskon = dapatDiskon($totalBayar);
        $total = totalHarga($diskon, $totalBayar);

        echo "<h2>Informasi Belanja</h2>";
        echo "<p>Pulsa : Rp " . htmlspecialchars($pulsa) . "</p>";
        echo "<p>Paket Data : " . htmlspecialchars(infoKuota($paket)) . "</p>";
        echo "<p>Total Harga : Rp " . htmlspecialchars($total) . "</p>";
        echo "<p>Diskon : " . htmlspecialchars($diskon * 100) . "%</p>";

        if ($diskon == 0) {
            echo "<p>Maaf tidak ada diskon yang diberikan.</p>";
        } else {
            echo "<p>Selamat! Anda mendapatkan diskon "
                . htmlspecialchars($diskon * 100) . "%.</p>";
        }
    }
} else {
    echo "Silahkan pilih produk yang ingin dibeli.";
}
?>
