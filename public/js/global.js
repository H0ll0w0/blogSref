const scrollTop = document.querySelector('.scrollTop');

window.addEventListener('scroll', checkHeight)

function checkHeight(){
    if(window.scrollY >= 200) {
        scrollTop.style.display = "flex" 
    } else {
        scrollTop.style.display = "none"
    }
}

scrollTop.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    })
})