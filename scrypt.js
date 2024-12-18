$(document).ready(function() {
   
    $.ajax({
        url: 'utilisateurs.php',
        method: 'GET',
        success: function(response) {
            if (response.length > 0) {
               
                response.forEach(function(user) {
                    console.log("id: " + user.id + " - Identifiant: " + user.identifiant);
              
                });
            } else {
                console.log("No users found.");
            }
        },
        error: function() {
            console.error('Error fetching user data.');
        }
    });
});

cameraOptions.onchange = () => {
  const updatedConstraints = {
    ...constraints,
    deviceId: {
      exact: cameraOptions.value
    }
  };
  startStream(updatedConstraints);
};

const pauseStream = () => {
  video.pause();
  play.classList.remove('d-none');
  pause.classList.add('d-none');
};

const doScreenshot = () => {
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  canvas.getContext('2d').drawImage(video, 0, 0);
  screenshotImage.src = canvas.toDataURL('image/webp');
  screenshotImage.classList.remove('d-none');
};

pause.onclick = pauseStream;
screenshot.onclick = doScreenshot;