window.previewProjectLogo = function() {
  // get user's uploaded image
  const imgPath = document.querySelector('input[type=file]').files[0];
  const reader = new FileReader();

  reader.onloadend = () => {
    // convert image file to base64 string and save to localStorage
    localStorage.setItem("image", reader.result);

    let img = document.getElementById('image');
    img.src = localStorage.getItem('image');
    img.style.objectFit = 'contain';
  };

  if (imgPath) {
    reader.readAsDataURL(imgPath);
  }

}