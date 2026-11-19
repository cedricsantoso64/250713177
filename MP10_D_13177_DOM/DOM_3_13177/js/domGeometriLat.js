var nodeLuas;
var nodeKeliling;

function init() {
    nodeLuas = document.getElementById("hasilLuas").firstChild;
    nodeKeliling = document.getElementById("hasilKeliling").firstChild;
    hitungGeometri();
}

function hitungGeometri() {
    var p = parseFloat(document.getElementById("panjang").value);
    var l = parseFloat(document.getElementById("lebar").value);

    var luas = p * l;
    var keliling = 2 * (p + l);

    nodeLuas.data = luas;
    nodeKeliling.data = keliling;

    var kotak = document.getElementById("kotakVisual");
    kotak.style.width = (p * 10) + "px";
    kotak.style.height = (l * 10) + "px";
}