
const form = document.getElementById('sendMail');
if (form) {
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const button = e.target.querySelector('button[type="submit"]');
        const preloader = document.getElementById('preloader');
        const responseBlock = document.querySelector('.response');
        button.setAttribute('disabled', 'disabled');
        preloader.classList.remove("hidden");
        responseBlock.innerHTML = '';
        let inputs = document.getElementsByClassName('is-invalid');
        
        let inputsError = document.getElementsByClassName('invalid-feedback');
        for (let i = 0; i < inputs.length; i++){
            inputs[i].classList.remove("is-invalid");
        }
        for (let i = 0; i < inputsError.length; i++){
            inputsError[i].innerHTML ='';
        }

        let object = {};
        new FormData(form).forEach(function(value, key){
            object[key] = value;
        });
        let formJson = JSON.stringify(object);
        
        const res = await fetch(form.action, {
            method: "POST",
            headers: {
                'Content-type' : 'application/json',
                'Accept' : 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: formJson
        });
        const json = await res.json();
        
        if(json.errors){
            
            for(let key in json.errors){
                let field = document.getElementById(key);
                field.classList.add('is-invalid'); 
                let fieldError = document.getElementById(key + '-error');
                fieldError.style.display ='block';
                fieldError.innerHTML = json.errors[key];
            }
        }else if(json.success){
            responseBlock.innerHTML = 'Письмо успешно отправлено!';
        } else {
            responseBlock.innerHTML = 'Письмо не доставлено, возможно Вы ввели не корректный email адрес';
        }
        preloader.classList.add("hidden");
        button.disabled = false;
    });
}
