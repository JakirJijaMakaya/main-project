const formAuth = document.getElementById("form-auth");

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
        (text) => { console.log(text)}
    )
}