<template>
    <div>
        <header>
            <navBarRetour></navBarRetour>
        </header>
        <h1>Modifier ticket</h1>
        <div>
            <formModifierTicket :type_problemes="type_problemes" :problemes="problemes" :ticket="ticket" :user="user">                 
            </formModifierTicket>
        </div>
    </div>
</template>
<script>
import NavBarRetour from "../Components/NavBarRetour.vue"
import formModifierTicket from "../Components/formModifierTicket.vue"
export default {
    name: "ajouterTicket",
    components: {
        NavBarRetour,
        formModifierTicket
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
    },
    ticket:{
      type: Object,
      defaultValue(){
        return[];
      }
    },
    user:{
      type: Object,
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