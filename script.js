
async function projectsPages() {
    
    let data = await fetch("/api.php")
        .then((response) => {return response.json()})
        .then((response) => {  
            
           for(property in response) {
            
            createLinks(response[`${property}`]);
           }           
            
        })           
    ;  
    
}

function createLinks(folder) {
    let link = document.createElement("a");
    link.setAttribute("href", "./Projects/" + folder + "/")
    link.setAttribute("class", "folder")
    link.innerText = folder
    document.body.appendChild(link);
}


projectsPages();

function args() {
    let args = {
        nome : "Thiago",
        cargo : "dev"
    }

    // data = new FormData();
    // data.append("nome", "Thiago");
    // data.append("cargo", "Dev");
    
    return args;

    // return Object.fromEntries(data);
}


async function teste() {

    let init = {
        method: 'POST',
        body: JSON.stringify(args()),
        headers: {
            "Content-type": "application/x-www-form-urlencoded"
        },
        
    }
    
    let data = await fetch("http://localhost:9000/apiTeste.php", init)
        .then(response => response.json())
        .then(response => console.log( response ));   
        
    
}

function JsonToqueryStringFormat(json) {
    let queryString = json.replaceAll(":", "=");
    queryString = queryString.replaceAll(",", "&");    
    queryString = queryString.replaceAll("{", "");
    queryString = queryString.replaceAll("}", "");
    queryString = queryString.replaceAll("\"", "");

    return queryString;
}



function xhr() {

    let http = new XMLHttpRequest();
    let url = '/apiTeste.php';
    let params = JsonToqueryStringFormat(args())
    http.open('POST', url, true);

    //Send the proper header information along with the request
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {//Call a function when the state changes.
    if(http.readyState == 4 && http.status == 200) {
        alert(http.responseText);
    }
    }
    http.send(params);
}



function t() {
    let _data = {
        title: "foo",
        body: "bar", 
        userId:1
      }
      
      fetch('https://jsonplaceholder.typicode.com/posts', {
        method: "POST",
        body: JSON.stringify(_data),
        headers: {"Content-type": "application/json; charset=UTF-8"}
      })
      .then(response => response.json()) 
      .then(json => console.log(json))
      .catch(err => console.log(err));
}
