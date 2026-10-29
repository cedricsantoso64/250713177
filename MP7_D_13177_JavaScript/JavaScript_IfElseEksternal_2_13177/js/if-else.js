var iJam;
var sJenis;

iJam = prompt("Masukkan lama parkir (jam).", 1);
sJenis = prompt("Jenis kendaraan: (M)otor atau Mo(B)il?", "M");

if (iJam > 3) {
    if( sJenis == "M") {
        alert("Tarif parkir motor Rp 6.000");
    } else {
        alert("Tarif parkir mobil Rp 12.000");
    }
} else {
    if (sJenis == "M") {
        alert("Tarif parkir motor Rp 3.000");
    } else {
        alert("Tarif parkir mobil Rp 6.000");
    }
}

