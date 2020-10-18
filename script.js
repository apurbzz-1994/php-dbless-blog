//this is event driven
document.querySelectorAll(".d-mode-toggle").forEach(item => {
    item.addEventListener("click", function(){
    document.documentElement.classList.toggle('dark-mode');
    if(item.innerHTML === "Enable Dark Mode"){
        item.innerHTML = "Disable Dark Mode";
    }else if(item.innerHTML === "Disable Dark Mode"){
        item.innerHTML = "Enable Dark Mode";
    }
})
});