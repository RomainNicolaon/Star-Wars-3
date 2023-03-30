function navbar_open(){
    let close = document.getElementById("close")
    close.style.transform = "translateY(0px)";
    let open = document.getElementById("open")
    open.style.transform = "translateY(-200px)";
    console.log("Marche")
    let navbar = document.querySelector(".hero-banner-titles")
    navbar.style.transform = "translateY(0px)";
    document.body.style.overflowY = "hidden";

}
function navbar_close(){
    let close = document.getElementById("close")
    let open = document.getElementById("open")
    close.style.transform = "translateY(-200px)";
    open.style.transform = "translateY(0px)";
    let navbar = document.querySelector(".hero-banner-titles")
    navbar.style.transform = "translateY(-1000px)";
    console.log("Marche")
    document.body.style.overflowY = "inherit";
}