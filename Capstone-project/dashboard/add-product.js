const form = document.querySelector(".Add-productForm form"),
    uploadBtn = form.querySelector(".button input"),
    errorText = form.querySelector(".error-text");
form.onsubmit = (e)=>{
    e.preventDefault();
}

uploadBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "add-product-script.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data === "success"){
                    location.href="add-product.php";
                    alert("Product Added Successfully");
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