<template>
    <div>
        <header>
            <navBarRetour></navBarRetour>
        </header>
        <h1>Nouveau ticket</h1>
        <div>
            <formTicket :type_problemes="type_problemes" :problemes="problemes">                 
            </formTicket>
        </div>
    </div>
</template>
<script>
import NavBarRetour from "../Components/NavBarRetour.vue"
import formTicket from "../Components/formTicket.vue"
export default {
    name: "ajouterTicket",
    components: {
        NavBarRetour,
        formTicket
    },
    props: {
    type_problemes: {
      type: Array,
      defaultValue(){
        return [];
      },
    },
    problemes: {
      type: Array,
      defaultValue(){
        return [];
      },
    }
  }
}
</script>
<style scoped>
h1{
    margin: auto;
    width: 250px;
    padding-top: 40px;
  }
</style>