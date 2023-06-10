// Array of image file names
var imageArray = [
  'images/Pressure Washing/image1.jpg',
  'images/Pressure Washing/image2.jpg',
  'images/Pressure Washing/image3.jpg',
];

// Index to keep track of the current image
var currentIndex = 0;

// Function to change the image source
function changeImage() {
  var img = document.getElementById("carouselImg");
  img.src = images[currentIndex];

  // Increment the index
  currentIndex++;

  // Reset the index if it exceeds the array length
  if (currentIndex >= images.length) {
    currentIndex = 0;
  }
}

// Call the changeImage function initially
changeImage();

// Set an interval to call the changeImage function every 3 seconds
setInterval(changeImage, 3000);
