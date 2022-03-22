<template>
    <div>
        <div class="fiche">
            <div class="content">
                <div class="two">
                    <div class="first">
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__480.png" class="image">
                    </div>
                    <div class="second">
                        <p>Nom: {{operateur.name}}</p>
                        <p>Domaine de compétence :</p>
                        <ul>
                            <li v-for="domaine_competence in operateur.domaine_competences" :key="domaine_competence.dom_id">{{domaine_competence.dom_libelle}}</li>
                            <li v-if="operateur.domaine_competences == 0">Aucun domaine de compétence</li>
                        </ul>
                        <p>Rôle : {{operateur.role.rol_libelle}}</p>
                        <p>Ticket en cours : {{operateur.tickets_count}}</p>
                    </div>
                </div>
                <div class="footer">
                    <Link as="button" class="button" id="grey" :href="$route('redirigerTicket',{tic_id:ticket.tic_id,ope_id:operateur.id})">Rediriger vers cette opérateur</Link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "FicheOperateur",
    props: {
        user: {
            type: Object
        },
        operateur: {
            type: Object
        },
        ticket: {
            type: Object
        }
    },
    setup() {
        
    },
}
</script>
<style scoped>
.fiche{
    border: black 1px solid;
    border-radius: 15px;
    margin: auto;
    margin-top: 10px;
    width: 600px;
}
.content{
    padding: 5px;
}
.two{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
}
.button{
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 15px;
    width: 250px;
    height: 40px;
    padding: 3px 0;
}
.button:hover{
    cursor: pointer;
}
#grey{
    background-color: grey
}
.footer{
    padding-top: 15px;
    margin: auto;
    width: fit-content
}
.image{
    height: 150px;
    width: auto;
    border-radius: 100%;
}
.first{
    padding: 10px
}
.second{
    grid-column: 2/4;
}
</style>