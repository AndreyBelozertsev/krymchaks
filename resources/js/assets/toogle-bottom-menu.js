const toogleButton = document.querySelectorAll('[data-toogle]');
const toogleBox = document.querySelectorAll('[data-toogle-box]');

if(toogleButton){
    for (let i=0; i< toogleButton.length; i++) {
        toogleButton[i].addEventListener('click', async (e) => {
            let id = toogleButton[i].dataset.toogle;
            let box = document.querySelector('[data-toogle-box="'+id+'"]');
            let contain = box.classList.contains('hidden');
            addHiddenClass(toogleBox);
            if(contain){
                box.classList.remove('hidden');
            }else{
                box.classList.add('hidden');
            }

        })
    }
}
function addHiddenClass(elements){
    for (let i=0; i< elements.length; i++) {
        elements[i].classList.add('hidden');
    }
}