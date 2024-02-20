const menuBtn = document.getElementById('menu-btn');

const sidebar = document.getElementById('sidebar');

const menuIcon = document.querySelector('.menu-btn i');

menuBtn.addEventListener('click', () => {
    const isOpen = sidebar.classList.contains('active-nav');
    
    if (isOpen) {
        sidebar.classList.remove('active-nav');
        menuIcon.style.color = 'white'; 
    } else {
        sidebar.classList.add('active-nav');
        menuIcon.style.color = 'black'; 
    }
});
