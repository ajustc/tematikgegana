function previewImg() {
  const file_bukti = document.querySelector("#file_bukti");
  // const sampulLabel = document.querySelector('.form-label');
  const imgPreview = document.querySelector(".img-preview");

  // sampulLabel.textContent = sampul.files[0].name;

  const fotoBukti = new FileReader();
  fotoBukti.readAsDataURL(file_bukti.files[0]);

  fotoBukti.onload = function (e) {
    imgPreview.src = e.target.result;
  };
}
