function fn_ValForm() {
    var sMsg = "";
    var umurPeserta = "";
    var emailPeserta = /^[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9]@[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9][\.][a-z0-9]{2,4}$/;
    var kategoriPeserta = "";

    if (document.getElementById("nama").value == "") {
        sMsg += "\n* Anda Belum mengisikan Nama";
    } 
    if (document.getElementById("email").value == "") {
        sMsg += "\n* Anda Belum mengisikan Email";
    } else if (!emailPeserta.test(document.getElementById("email").value)) {
        sMsg += "\n* Email anda Salah";
    }
    if (document.getElementById("umur").value == "") {
        sMsg += "\n* Anda Belum mengisikan Umur";
    } else if(document.getElementById("umur").value <= 25) {
        umurPeserta += "\n* Peserta Mahasiswa";
    } else {
        umurPeserta += "\n* Peserta Umum";
    }
    if(document.getElementById("kategori").value == "") {
        sMsg += "\n* Anda belum mengisikan Kategori";
    } else {
         switch(document.getElementById("kategori").value) {
            case "W":
                kategoriPeserta += "Workshop";
                break;

            case "S":
                kategoriPeserta += "Seminar";
                break;
            
            case "L":
                kategoriPeserta += "Lomba Coding";
                break;

            default:
                kategoriPeserta += "";
                break;
        }
    }

    if (sMsg != "") {
        alert("Peringatan: \n" +sMsg);
        return false;
    } else {
        alert(`Terima kasih ${document.getElementById("nama").value} ! Anda terdaftar di acara ${kategoriPeserta} ${umurPeserta}`);
        return true;
    }

}