<?php
    echo "<h1> Data Kontak</h1>";
    echo '<form method="POST" action="">
            <p>Nama        : <br />input type="text" name="nama" /></p>
            <p>Telepon     : <br />input type="text" name="telepon" /></p>
            <p>Email       : <br />input type="text" name="email" /></p>
            <button type="submit">Kirim</button>
           </form>';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];
        $email = $_POST['email'];
        echo "Terima kasih, " . htmlspecialchars($nama) . "!Informasi selanjutnya akan dikirim ke nomor telepon" . 
        htmlspecialchars($telepon) . "dan email " . htmlspecialchars($email);
    }else{
        echo "Silakan isi formulir di atas untuk mengirimkan data kontak.";
    }
?>
