<template>
  <div class="rechercheTicket">
    <!-- <div class="rechercheBar">
      <input
        id="searchbar"
        onkeyup=""
        type="text"
        name="search"
        placeholder="Identidiant, Nom du demandeur,..."
      />
    </div> -->
    <div class="status">
      <p class="titre">Etat du ticket</p>
      <div v-for="statut in statuts" :key="statut.sta_id">
        <input
          type="checkbox"
          name="statut"
          :value="statut.sta_id"
          v-model="search.statuts"
          @change="selectedStatutChanged"
        />
        <label for="statut">{{ statut.sta_libelle }}</label>
      </div>
    </div>
    <div class="typeProblem">
      <p class="titre">Type de problème</p>
      <div v-for="type_probleme in type_problemes" :key="type_probleme.typ_id">
        <input
          type="checkbox"
          name="typeProbleme"
          :value="type_probleme.typ_id"
          v-model="search.type_problemes"
          @change="selectedTypeProblemeChanged"
        />
        <label for="typeProbleme">{{ type_probleme.typ_libelle }}</label>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "rechercheTicket",
  props: {
    statuts: {
      type: Array,
    },
    type_problemes: {
      type: Array,
    },
    selectedStatuts: {
      type: Array
    },
    selectedTypeProbleme: {
      type: Array
    }
  },
  data() {
    return {
      search: {
        statuts: [],
        type_problemes: [],
      },
    };
  },
  watch: {
    selectedStatuts(statuts) {
      this.search.statuts = statuts;
    },
     selectedTypeProbleme(type_problemes) {
      this.search.type_problemes = type_problemes;
    }
  },
  methods: {
    selectedStatutChanged(e) {
      this.$emit("selectedStatutChanged", this.search.statuts);
    },
    selectedTypeProblemeChanged(e) {
      this.$emit("selectedTypeProblemeChanged", this.search.type_problemes);
    },
    checkAll() {
      (this.search.statuts), (this.search.type_problemes);
    },
  },
  mounted() {
    this.checkAll();
  },
};
</script>
<style scoped>
#searchbar {
  width: 250px;
  border-radius: 15px;
  border: solid 1px gray;
  padding-left: 5px;
}
.rechercheTicket {
  margin-left: 5px;
}
.titre {
  font-weight: bold;
}
input:hover {
  cursor: pointer;
}

</style>