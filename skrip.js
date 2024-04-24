function dataperson() {
    let nama = document.getElementById('Nama').value;
    let pekerjaan = document.getElementById('Pekerjaan').value;
    let hobby = document.getElementById('Hobby').value;
    let hasilElem = document.getElementById('hasil');
    let input = 'Hello ' + nama + '. Pekerjaan Anda adalah ' + pekerjaan + '. Hobby Anda adalah ' + hobby + '.';
    let noInput = 'Silahkan lengkapi form';
    hasilElem.textContent = (nama && pekerjaan && hobby) ? input : noInput;
}