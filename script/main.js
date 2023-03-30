function navbar_open(){
    let close = document.getElementById("close")
    close.style.transform = "translateY(0px)";
    let open = document.getElementById("open")
    open.style.transform = "translateY(-200px)";
    console.log("Marche")
    
}
function navbar_close(){
    let close = document.getElementById("close")
    let open = document.getElementById("open")
    close.style.transform = "translateY(-200px)";
    open.style.transform = "translateY(0px)";
    console.log("Marche")
}