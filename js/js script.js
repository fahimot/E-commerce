document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({behavior:'smooth'});
    });
});

window.addEventListener('scroll', function(){
    var backToTopButton = document.querySelector('.back_to_top');

    if(this.window.scrollY>300){
        backToTopButton.style.display='block';
    } else {
        backToTopButton.style.display='none';
    }
});