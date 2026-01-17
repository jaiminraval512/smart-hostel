let button =document.querySelector("#button");

button.addEventListener("click",function(){
    window.location.href = "http://localhost/php/php_/hostel-management-system/students/add_student.php";
});

window.addEventListener("load", function() {
        var loader = document.getElementById("loader-wrapper");
        loader.style.display = "none";
    });