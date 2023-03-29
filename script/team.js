data_area = document.querySelector('.equipe-membre');
var membres = [
    {
        image: "/images/icon/user1.png",
        name: "Member 1",
        email: "jaaj@jaaj",
        description: "Member 1 description"
    },
    {
        image: "/images/icon/user1.png",
        name: "Member 1",
        email: "jaaj@jaaj",
        description: "Member 1 description"
    },
    {
        image: "/images/icon/user1.png",
        name: "Member 1",
        email: "jaaj@jaaj",
        description: "Member 1 description"
    },
    {
        image: "/images/icon/user1.png",
        name: "Member 1",
        email: "jaaj@jaaj",
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
                    <div class="email"></div>
                    <div class="description"></div>
                    <button type="submit" class="button_less"><img src="" alt"supprimer"/></button>
                </div>`;
    });

};

function afficheForm() {
    
}



function addMember() {
    
    newMember = {
         
        image: "/images/icon/user3.png",
        name: "toto",
        email: "jaaj@jaaj",
        description: "Member 2 description"
    };


    data_area.innerHTML += `
    <div class="ficheMembre">
        <div ><img src="${newMember.image}" class="avatar" alt="avatar"/></div>
        <div class="name">${newMember.name}</div>
        <div class="email"></div>
        <div class="description"></div>
        <button type="submit" class="button_less" onclick='']><img src="" alt"supprimer"/></button>
    </div>`;

};

