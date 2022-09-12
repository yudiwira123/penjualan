const body = document.querySelector('body'),
    sidebar = body.querySelector('nav'),
    toggle = body.querySelector(".toggle"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");


toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});

modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");

    if (body.classList.contains("dark")) {
        modeText.innerText = "Light mode";
        $('.table').addClass('table-dark');
        $('.table').removeClass('bg-white');
        $('h2').addClass('text-white');
        $('h3').addClass('text-white');
        $('label').addClass('text-white');
    } else {
        modeText.innerText = "Dark mode";
        $('.table').removeClass('table-dark');
        $('.table').addClass('bg-white');
        $('h2').removeClass('text-white');
        $('h3').removeClass('text-white');
        $('label').removeClass('text-white');
    }
});
$( document ).ready(function() {
    $('.table').addClass('bg-white');
    $('.table').DataTable();
    
});