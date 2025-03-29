// Image and Location Data
const images = [
    { src: "it dept.jpg", location: "IT Department" },
    { src: "library.jpeg.jpg", location: "Library" },
    { src: "medical facility.jpg", location: "Medical Facility" },
    { src: "parking.jpeg", location: "Parking Area" },
    { src: "ucobank.jpg", location: "UCO bank" },
    { src: "ecell.jpg", location: "E-Cell" },
    { src: "boys hostel.png", location: "Boys Hostel" },
    { src: "mainpagelogo.jpeg", location: "A Block" },
    { src: "girls hostel.jpg", location: "Girls Hostel" },
    { src: "ground.jpg", location: "Ground" },
    { src: "guesthouse.jpg", location: "Guesthouse" }
];

let currentIndex = 0;
const imgElement = document.getElementById("slideshow-img");
const locationText = document.getElementById("location-text");

// Function to change the image every 2 seconds
function changeImage() {
    currentIndex = (currentIndex + 1) % images.length;
    imgElement.style.opacity = "0"; // Fade out

    setTimeout(() => {
        imgElement.src = images[currentIndex].src;
        imgElement.alt = images[currentIndex].location; // Update alt text
        locationText.textContent = images[currentIndex].location; // Update location text
        imgElement.style.opacity = "1"; // Fade in
    }, 500); // Wait 500ms before changing the image (smooth transition)
}

// Change image every 2 seconds
setInterval(changeImage, 2000);
