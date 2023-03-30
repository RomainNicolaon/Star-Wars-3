data_area = document.querySelector('.equipe-membre');
var membres = [
    {
        image: "../images/icon/user6.png",
        name: "Romain",
        email: "romain.maitrephp@cefim.com",
        description: "Désigné maitre PHP par la Super Team"
    },
    {
        image: "../images/icon/user9.png",
        name: "Titouan",
        email: "titouan.expertdesign@cefim.com",
        description: "Expert du design, mention spécial binôme PHP"
    },
    {
        image: "../images/icon/user4.png",
        name: "Athénaïs",
        email: "athenais.passionjs@cefim.com",
        description: "S'est découvert une affinité avec le JavaScript, n'a pas cédé aux avances du PHP"
    },
    {
        image: "../images/icon/user1.png",
        name: "Name",
        email: "rejoignezlecefim@cefim.com",
        description: "Member 1 description"
    },

]

allMembers();

function allMembers() {

    membres.forEach(membre => {

        data_area.innerHTML += `
                <div class="ficheMembre">
                    <div ><img src="${membre.image}" class="avatar" alt="avatar"/></div>
                    <div class="name">${membre.name}</div>
                    <div class="email">${membre.email}</div>
                    <div class="description">${membre.description}</div>
                    <button type="submit" id="button_less" onclick="this.parentElement.remove()"><img  src="../images/trash-solid.svg" class="trashImg" alt"supprimer"/></button>
                </div>`;
                
    });
   };
   let buttonless = document.getElementById("button_less")
   
   function deleteMember () {
    document.querySelector('.ficheMembre').remove();
}

button_less.onclick = deleteMember

let buttonAdd = document.getElementById("button_add");
let form = document.getElementById("hidden");

function afficheForm() {
    if(getComputedStyle(hidden).display != "none"){
        hidden.style.display = "none";
      } else {
        hidden.style.display = "flex";
      }
    };
    buttonAdd.onclick = afficheForm;






function addMember() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let description = document.getElementById('description').value;
    let img = document.getElementsByName('radioChoice').value;
    

      
    if (document.getElementById('imageProfile1').checked) {
        img = document.getElementById('imageProfile1').value;
       }
       if (document.getElementById('imageProfile3').checked) {
        img = document.getElementById('imageProfile3').value;
       }
       if (document.getElementById('imageProfile4').checked) {
        img = document.getElementById('imageProfile4').value;
       }
       if (document.getElementById('imageProfile6').checked) {
        img = document.getElementById('imageProfile6').value;
       }
       if (document.getElementById('imageProfile7').checked) {
        img = document.getElementById('imageProfile7').value;
       }
       if (document.getElementById('imageProfile10').checked) {
        img = document.getElementById('imageProfile10').value;
       }


    
    

    data_area.innerHTML += `
    <div class="ficheMembre">
        <div ><img src="${img}" class="avatar" alt="avatar"/></div>
        <div class="name">${name}</div>
        <div class="email">${email}</div>
        <div class="description">${description}</div>
        <button type="submit" id="button_less" onclick="this.parentElement.remove()"><img src="../images/trash-solid.svg" class="trashImg"  alt"supprimer"/></button>
    </div>`;

};

