const formInsert = document.getElementById("form-insert-student");
const msg = document.querySelector(".message");
const content = document.querySelector(".content");

formInsert.addEventListener("submit", (event)=>{
    event.preventDefault();
    let formData = new FormData(formInsert);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "insertStudent.php");
    xhr.send(formData);
    xhr.onload = () => {
        if(xhr.response == "ok"){
            msg.innerHTML = "студент добавлен!";
            msg.classList.add("success");
            msg.classList.add("show-message");
            let div = document.createElement("div");
            let fname = formData.get("fname");
            let lname = formData.get("lname");
            let gender = formData.get("gender");
            let age = formData.get("age");
            div.innerHTML = `${fname}, ${lname}, ${gender}, ${age}`;
            content.append(div);
        }
        else {
            msg.innerHTML = "ошибка! что-то пошло не так";
            msg.classList.add("reject");
            msg.classList.add("show-message");
        }
    };
});
// отправка данных без формы - метод
// лайки у студентов
const btnsLike = document.querySelectorAll(".like");

function setLike(str1, str2){
return function(event){
    let idStudent = event.target.closest(".student").dataset.id;
    console.log(idStudent);

    let xhr = new XMLHttpRequest();
    xhr.open("GET","api/setLike.php?id=" + idStudent);
    xhr.onload = function() {
        if(xhr.response=="ok"){
            let num = +event.target.closest(".student").querySelector(".num-like").innerHTML;

            event.target.closest(".student").querySelector(".num-like").innerHTML = num + 1;
            console.log(str1);
        }
        else{
            console.log(str2);
        }
    }
    xhr.send();
}
}


for(btn of btnsLike) {
    btn.addEventListener("click", setLike("успешно","ошибка"));
}