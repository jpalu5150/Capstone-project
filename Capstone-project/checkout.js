const form = document.querySelector(".checkout-form form"),
checkoutBtn = form.querySelector(".checkout-btn"),
errorText = form.querySelector(".error-text");
form.onsubmit = (e)=>{
    e.preventDefault();
}

checkoutBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "checkout-write.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data === "success"){
                    location.href="checkout.php";
                    alert("You Have Checked out Your order Successfully!");
                }else{
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}