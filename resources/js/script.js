let search = document.getElementById('search');
let btn_search = document.querySelector('.search');

btn_search.addEventListener('click', function(){

   if( search.style.display === "block"){
    search.style.display = "none"
   }else{
    search.style.display = "block"
   }
    // btn_search.style.display = "none";
})

let scroll_Y = function () {
    var supportPageOffset = window.pageXOffset !== undefined;
    var isCSS1Compat = ((document.compatMode || "") === "CSS1Compat");
    return supportPageOffset ? window.pageYOffset : isCSS1Compat ? document.documentElement.scrollTop : document.body.scrollTop;
}

let element = document.querySelector('.navigation')
let rect = element.getBoundingClientRect()
let top_elt = element.getBoundingClientRect().top + scroll_Y()
let fake = document.createElement('div')
//Ajouter une class au div pour pouvoir le ciblé pour la version mobile
fake.classList.add('hauteur')
fake.style.width = rect.width + "px"
fake.style.height = rect.height + "px"
let onScroll = function () {
   let hasScrollClass = element.classList.contains('fixed')
   if(scroll_Y() > top_elt && !hasScrollClass){
       element.classList.add('fixed')
       element.parentNode.insertBefore(fake, element)
   }else if(scroll_Y() < top_elt && hasScrollClass){
       element.classList.remove('fixed')
       element.parentNode.removeChild(fake)
   }
}

window.addEventListener('scroll', onScroll)


//Mobile

let menu_btn = document.querySelector("i.menu");

menu_btn.addEventListener('click', function(){
    let menu = document.querySelector('.navigation ul');
    let isActive = menu.classList.contains('active')
    let close = document.querySelector('i.menu');
    if(isActive){
        console.log('non active')
        menu.classList.remove('active')
        close.classList.remove('fa-window-close')
        close.classList.add('fa-bars')

       }else{
        console.log('active')
        menu.classList.add('active')
        close.classList.remove('fa-bars')
        close.classList.add('fa-window-close')
    }

    console.log(menu)
})

