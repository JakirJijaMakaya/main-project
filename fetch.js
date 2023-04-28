const formAuth = document.getElementById("form-auth");
const output = document.querySelector(".profile")

formAuth.addEventListener("submit", auth);

function auth(event){
    event.preventDefault();
    let data = new FormData(formAuth);
    fetch("api/auth.php",{
        method: 'POST',
        body: data
    }).then(
        (response)=>{
        return response.text();
    }
    ).then(
        (text) =>{
            if(text){
                output.innerHTML = "вы арестованны"
                formAuth.style.display = "none";
            }
            else {
                let p = document.createElement("p");
                p.innerHTML = "нельзя"
                output.prepend(p);
            }
        }
         
    )
}