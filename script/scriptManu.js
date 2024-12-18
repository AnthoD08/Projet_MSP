var form = document.getElementById('formManu')


form.addEventListener('submit', scanManuel)

function scanManuel(){
    var ISBN = document.getElementById('ISBN').value
    postScan(ISBN)
}


