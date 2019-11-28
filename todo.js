let xhttp;
let json;

//Check if xmlHttpRequest object is available
if (window.XMLHttpRequest) {
    xhttp = new XMLHttpRequest();
} else {
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
}

// let form = document.setTodo;

// let title = document.setTodo.title;
// let bobdy = document.setTodo.bobdy;
// let importance = document.setTodo.importance;
// form.addEventListener("submit", function(event){
//     event.preventDefault();
//     sendMessages("todoSet.php");
// });

function deleteTodo(event,id){
    event.preventDefault();
    xhttp.onreadystatechange = function(){
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            alert("TODO DELETED");
            getMessages("todoGet.php");

        }
    }
    xhttp.open("get", "todoSet.php?id="+id, true);
    xhttp.send();
}


let todo = document.querySelector(".col-sm-6");
function getMessages(fileToFetch){
    xhttp.onreadystatechange = function(){
        let div = document.createElement("div");
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            //convert to json 
            
                json = JSON.parse(JSON.parse(xhttp.responseText));
                if (json != "") {
                //loop through to get properties
                for (let key = 0; key < json.length; key++) {
                    let time = JSON.stringify(json[key].time);
                    div = ` <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <h4>${json[key].title}</h4> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="false"  onclick="deleteTodo(event,${json[key].id})">&times;</span>
                                </button>
                                <p>${json[key].body}</p>
                                <small>importance: ${json[key].importance}</small>
                                <i class="float-right">
                                    <a href="#" id="form" onclick="document.forms[${key}].style.display=(document.forms[${key}].style.display==='none')? 'block':'none'">edit</a>
                                </i>
                                <form action="todoEdit.php" role="form" id="hidden" method="post">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="title">title</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="title" id="title" value="${json[key].title}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="body">body</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <textarea name="body" id="body" cols="30" rows="4" style="resize: none"  class="form-control">${json[key].body}</textarea>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="importance">impotrance</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <select name="importance" id="importance" class="form-control">
                                                    <option value="primary">primary</option>
                                                    <option value="secondary">secondary</option>
                                                    <option value="tertiary">tertiary</option>
                                                </select>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8 offset-3">
                                        <input type="hidden" value="${json[key].id}" name="id">
                                            <input type="submit" value="update"  class="btn btn-danger mt-4">                 
                                        </div>
                                    </div>
                                </form>
                            </div> `;
                    
                    div.innerHTML = json;
                    todo.innerHTML += div;
                }
            } else {
                todo.innerHTML = `
                <div class="container">
                    <h2>Welcome To Lil Cent World....</h2>
                    <p>Use the <code>.spinner-grow</code> class if you want the spinner/loader to grow instead of "spin":</p>
                                                        
                    <div class="spinner-grow text-muted"></div>
                    <div class="spinner-grow text-primary"></div>
                    <div class="spinner-grow text-success"></div>
                    <div class="spinner-grow text-info"></div>
                    <div class="spinner-grow text-warning"></div>
                    <div class="spinner-grow text-danger"></div>
                    <div class="spinner-grow text-secondary"></div>
                    <div class="spinner-grow text-dark"></div>
                    <div class="spinner-grow text-light"></div>
                </div>
                `;
            }
            
        }
        
    }

    xhttp.open("get", fileToFetch, true);
    xhttp.send();
}

getMessages("todoGet.php");
// console.log(json);