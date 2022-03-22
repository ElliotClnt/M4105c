<template>
  <div class="form">
    <form @submit.prevent="form.post($route('insertTicket'))">
      <div>
        <label for="titre">Titre de votre problème</label>
        <input id="titre" type="text" v-model="form.tic_titre" required />
      </div>
        <label for="description">Description</label>
      <div>
        <textarea id="description" type="textarea" maxlength="255" v-model="form.tic_description" required ></textarea>
      </div>
      <div>
        <label for="pj">Piece Jointe</label>
        <input id="pj" type="text" v-model="form.tic_piecejointe"/>
      </div>

      <div>
        <label for="numpost">Numéro Poste</label>
        <input type="text" id="numpost" min="0" v-model="form.tic_numposte" required/>
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
                <input id="probleme" type="radio" name="probleme" v-model="form.pro_id" :value="probleme.pro_id"/>
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
      <div>
        <p class="error" v-if="Object.keys(form.errors).length!=0">Veuillez remplir tout les champs obligatoire</p>
      </div>

      <input
        type="submit"
        value="Ajouter votre ticket"
        name="ajouterTicket"
        id="ajouterTicket"
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
  },
  data() {
    return {
      form: this.$inertia.form({
      tic_titre:"",
      tic_description:"",
      tic_piecejointe:"",
      tic_numposte:0,
      tic_importance:1,
      pro_id:null,
      selected_typProb:null
      }),
    };
  },
};
</script>

<style scoped>

.error{
  color: red;
}

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

</style>