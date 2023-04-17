const formInsert = document.getElementById("form-insert-student");
formInsert.addEventListener("submit", (event)=>{
    event.preventDefault();
    console.log("OlgaBudova");
    let formData = new FormData(formInsert);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "insertStudent.php");
    xhr.send(formData);
    xhr.onload = () => {
        console.log(xhr.response)
    };
});