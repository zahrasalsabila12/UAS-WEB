const toggle = document.getElementById('lightMode');
const body = document.querySelector('body');

toggle.addEventListener('click', function(){
    this.classList.toggle('bx-moon');
    if(this.classList.toggle('bx-sun')){
        body.style.background = '#EDDFB3';
        body.style.color = 'black';
        body.style.transition = '2s';
    }else{
        body.style.background = 'black';
        body.style.color = 'white';
        body.style.transition = '2s';
    }
})

function popUpBox() {
    if(confirm("Anda yakin ingin submit?")){
        alert("Pertanyaan Anda berhasil disubmit")
    } else{
        alert("Pertanyaan Anda gagal disubmit")
    }
}

const p1 = document.getElementById("Qform");
p1.innerHTML = "Silahkan ajukan pertanyaan Anda"
p1.style.color = "Brown";