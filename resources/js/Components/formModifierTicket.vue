<template>
  <div class="form">
    <form @submit.prevent="form.post($route('doModifierTicket'))">
      <div>
        <label for="titre">Titre de votre problème</label>
        <input id="titre" type="titre" v-model="form.tic_titre" required />
      </div>
        <label for="description">Description</label>
      <div>
        <textarea id="description" type="textarea" maxlength="255" required v-model="form.tic_description"></textarea>
      </div>
      <div>
        <label for="piecejointe">Piece Jointe</label>
        <input id="piecejointe" type="text" v-model="form.tic_piecejointe"/>
      </div>

      <div>
        <label for="numpost">Numéro Poste</label>
        <input type="text" id="numpost" required v-model="form.tic_numposte"/>
      </div>

      <label for="type_de_prob">Type de problème</label>
      <div class="typeProbleme">
        <div>
          <div v-for="typProb in type_problemes" :key="typProb.typ_id">
            <input
              name="typeProbleme"
              type="radio"
              :value="typProb.typ_id"
              v-model="form.selected_typProb"
            />
            <label>{{ typProb.typ_libelle }}</label>
          </div>      
        </div>
      </div>
      <div v-for="probleme in problemes" :key="probleme.pro_id" class="a">
       <div v-if="form.selected_typProb == probleme.typ_id">
            <div class="b">
                <input id="probleme" type="radio" :value="probleme.pro_id" v-model="form.pro_id" name="probleme"/>
                <label>{{ probleme.pro_libelle }}</label>
            </div>
        </div>
      </div>

      <div>
        <label for="importance">Importance</label>
        <input
          type="number"
          name="importance"
          id="importance"
          min="0"
          max="5"
          v-model="form.tic_importance"
          required
        />
        <label>/5</label>
      </div>
        <p v-if="user.rol_id == 1">Date résolution : <span v-if="ticket.tic_dateresolution==null">Indéterminé</span>{{ticket.tic_dateresolution}}</p> 

        <p v-else>
          Date résolution :
          <input type="date" v-model="form.tic_dateresolution">
        </p>

      <input
        type="submit"
        value="Modifier votre ticket"
        name="modifierTicket"
        id="modifierTicket"
      />

    </form>
  </div>
</template>


<script>
export default {
  name: "formTicket",
  props: {
    type_problemes: {
      type: Array,
    },
    problemes: {
      type: Array,
    },
    ticket:{
      type: Object,
    },
    user:{
      type: Object,
    }
  },
  data() {
    return {
      form: this.$inertia.form({
      tic_id:this.ticket.tic_id,
      tic_titre:this.ticket.tic_titre,
      tic_description:this.ticket.tic_description,
      tic_piecejointe:this.ticket.tic_piecejointe,
      tic_numposte:this.ticket.tic_numposte,
      tic_importance:this.ticket.tic_importance,
      selected_typProb: this.ticket.probleme.typ_id,
      pro_id:this.ticket.pro_id,
      tic_dateresolution:this.ticket.tic_dateresolution,
      }),
    };
  },
};
</script>

<style scoped>
.form{
  border: solid 1px black;
  width: 50vw;
  height: auto;
  margin: auto;
  margin-top: 12vh;
  padding: 5px;
}
.probleme{
  margin-left: 2vw;
  display: inline-block;
}
input{
  border: none;
  border-bottom: solid 1px gray;
}
textarea{
  resize: vertical;
  width: 30vw;
  height: 15vh;
}
form div{
  margin-bottom: 10px;
}
.a{
  display: inline-flex;
}
.b{
  width: 200px;
  margin-left: 20px;
}
#modifierTicket{
  cursor:pointer;
}
</style>