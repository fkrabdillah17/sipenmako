function namaFilefoto() {
    const foto = document.querySelector('#foto');
    const fotoLabel = document.querySelector('.custom-file-label');
    
    fotoLabel.textContent = foto.files[0].name;
    
    // const fileFoto = new FileReader();
    // fileFoto.readAsDataURL(foto.files[0]);
    
    // fileFoto.onload = function(e) {
    
    // }
}
