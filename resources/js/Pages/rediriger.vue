<template>
    <div>
        <header>
            <navBarDemandeur></navBarDemandeur>
        </header>
        <h1> Rediriger Ticket
        </h1>
        <div class="content" v-for="operateur in operateurs" :key="operateur.id">
            <FicheOperateur
            v-if="(operateur.rol_id!=1&&operateur.id != ticket.ope_id && operateur.tickets_count <4) ||(operateur.rol_id==3&& user.rol_id!=3)"
            :user="user"
            :operateur="operateur"
            :ticket="ticket">

            </FicheOperateur>
        </div>
    </div>
</template>
<script>
import FicheOperateur from "..//Components/ficheOperateur.vue";
import navBarDemandeur from "../Components/NavBarRetour.vue";
export default {
    name: "Rediriger",
    components: {
        FicheOperateur,
        navBarDemandeur
    },
    props: {
        user:{
            type: Object
        },
        operateurs:{
            type: Array,
            defaultValue() {
                return []
            }
        },

        ticket:{
            type: Object
        }
    },
    setup() {
        
    },
}
</script>
<style scoped>
h1 {
  margin: auto;
  width: 250px;
  padding-top: 40px;
  padding-bottom: 10px;
}
</style>