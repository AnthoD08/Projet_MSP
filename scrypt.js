$(document).ready(function() {
    // Check if the user is logged in and fetch user data
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