
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
