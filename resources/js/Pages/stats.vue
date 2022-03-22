<template>
    <div>
        <header>
            <navBarRetour></navBarRetour>
            <h1>Statistiques</h1>
        </header>
        <div class="content">
            <div class="card-body">
                <p>Total tickets :</p>
                <p class="stat">{{allTickets}}</p>
            </div>
            <hr class="solid">
            <div class="card-body">
                <p>Tickets résolus :</p>
                <p class="stat">{{allSolvedTickets}}</p>
            </div>
            <hr class="solid">
            <div class="card-body">
                <p>Tickets non résolu :</p>
                <p class="stat">{{allWaitingTickets}}</p>
            </div>
            <hr class="solid">
            <div class="card-body">
                <p>Tickets en cours :</p>
                <p class="stat">{{allNotSolvedTickets}}</p>
            </div>
            <hr class="solid">
            <div class="card-body">
                <p>Problème logiciels : </p>
                <p class="stat">{{problemeLogiciel}}</p>
            </div>
            <hr class="solid">
            <div class="card-body">
                <p>Problème matériels :</p>
                <p class="stat">{{problemeMateriel}}</p>
            </div>
            <hr class="solid">
            <div class="card-body">
                <p>Problème Utilisateur :</p>
                <p class="stat">{{problemeUtilisateur}}</p>
            </div>
            <hr class="solid">
        </div>  
    </div>
    

</template>
<script>
import NavBarRetour from "../Components/NavBarRetour.vue"
export default {
    name: "ajouterTicket",
    components: {
        NavBarRetour,
    },
    props:{
        allTickets:{
        type: Number
        },
        allSolvedTickets:{
        type: Number
        },
        allWaitingTickets:{
        type: Number
        },
        allNotSolvedTickets:{
        type: Number
        },
        problemeLogiciel:{
        type: Number
        },
        problemeMateriel:{
        type: Number
        },
        problemeUtilisateur:{
        type: Number
        }
    }
    
}
</script>
<style scoped>
h1{
    margin: auto;
    width: 180px;
    padding-top: 40px;
    padding-bottom: 100px;
}
.content{
    display: grid;
    margin-top: 100px;
    border: solid black 1px;
    width: max-content;
    padding: 50px;
    margin: auto;
}
.card-body{
    display: inline-flex;
    width: 25vw;
    margin: auto;
}
.stat{
    position: absolute;
    right: 40vw;
}
hr.solid {
  border-top: 1px solid #bbb;
  width: 30vw;
}
</style>