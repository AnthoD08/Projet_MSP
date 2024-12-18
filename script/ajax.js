function postScan(code){
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'post-scanner', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {

        if (xhr.status === 200) {
            window.location.href = "livre/" + code;
        } else {
            console.log('aucun code');
        }

    };

    xhr.send(`code=${encodeURIComponent(code)}}`);
};