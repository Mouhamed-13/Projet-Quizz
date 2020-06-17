function onFileSelected(event) {
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var imgtag = document.getElementById("top");
  var imgtag1 = document.getElementById("myimage1");
  imgtag.title = selectedFile.name;
  imgtag1.title = selectedFile.name;

  reader.onload = function(event) {
    imgtag.src = event.target.result;
    imgtag1.src = event.target.result;
  };

  reader.readAsDataURL(selectedFile);
}