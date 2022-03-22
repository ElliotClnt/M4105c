<template>
  <div>
    <header>
      <navBarDemandeur></navBarDemandeur>
    </header>
    <h1>Vos tickets</h1>
    <div class="content">
      <div class="option">
        <button
          id="black"
          @click="trierParRecents"
        >Plus recents</button>

        <button
          id="black"
          @click="trierParAnciens"
        >Plus anciens</button>

        <button
          id="black"
          @click="trierParPlusImportant"
        >Plus important</button>

        <button
          id="black"
          @click="trierParMoinsImportant"
          >Moins important</button>

      </div>
      <div class="tickets">
        <div v-for="ticket in tickets" :key="ticket.tic_id">
          <ConsulterTicketDemandeur
          v-if="user.id==ticket.ope_id || user.id==ticket.id"
            :user="user"
            :ticket="ticket"
            :checkedStatut="checkedStatut"
            :checkedTypeProbleme="checkedTypeProbleme"
          ></ConsulterTicketDemandeur>
        </div>
      </div>
      <div class="separator"></div>
      <div class="trie">
        <rechercheTicket
          @selectedStatutChanged="selectedStatutChanged"
          @selectedTypeProblemeChanged="selectedTypeProblemeChanged"
          id="trie"
          :type_problemes="type_problemes"
          :statuts="statuts"
          :selectedStatuts="checkedStatut"
          :selectedTypeProbleme="checkedTypeProbleme"
        ></rechercheTicket>
      </div>
    </div>
  </div>
</template>

<script>
import ConsulterTicketDemandeur from "../Components/ConsulterTicketDemandeur.vue";
import navBarDemandeur from "../Components/NavBarRetour.vue";
import rechercheTicket from "../Components/RechercheTicket.vue";
export default {
  name: "VueDemandeur",
  components: {
    ConsulterTicketDemandeur,
    navBarDemandeur,
    rechercheTicket,
  },
  props: {
    tickets: {
      type: Array,
      defaultValue() {
        return [];
      },
    },
    problemes: {
      type: Array,
      defaultValue() {
        return [];
      },
    },
    user: {
      type: Object,
      defaultValue() {
        return [];
      },
    },
    type_problemes: {
      type: Array,
      defaultValue() {
        return [];
      },
    },
    statuts: {
      type: Array,
      defaultValue() {
        return [];
      },
    },
    statut: {
      type: Array,
    },
  },
  data() {
    return {
      checkedStatut: [],
      checkedTypeProbleme: [],
      orderBy: undefined,
      orderByValue: undefined
    };
  },
  methods: {
    selectedStatutChanged(event) {
      this.checkedStatut = event;
      this.reloadData();
    },
    selectedTypeProblemeChanged(event) {
      this.checkedTypeProbleme = event;
      this.reloadData();
    },
    trierParAnciens() {
      this.orderBy = "ASC";
      this.orderByValue = "created_at"
      this.reloadData();
    },
    trierParRecents() {
      this.orderBy = "DESC";
      this.orderByValue = "created_at"
      this.reloadData();
    },
    trierParPlusImportant() {
      this.orderBy = "DESC";
      this.orderByValue = "tic_importance"
      this.reloadData();
    },
    trierParMoinsImportant() {
      this.orderBy = "ASC";
      this.orderByValue = "tic_importance"
      this.reloadData();
    },
    reloadData() {
      this.$inertia.get(this.$route('vueDemandeur', {
        _query: {
          sta_ids: this.checkedStatut,
          typ_probs: this.checkedTypeProbleme,
          order_by: this.orderBy,
          order_by_value: this.orderByValue
        }
      }), {},{
        preserveState: true,
        preserveScroll: true
      })
    },

  },
   mounted() {
    if(this.checkedStatut.length==0 && this.checkedTypeProbleme.length==0){
      this.checkedStatut = [1,2,3]
      this.checkedTypeProbleme = [1,2,3]
    }
  },
};
</script>
<style scoped>
* {
  margin: 0;
  padding: 0;
}
.content {
  display: grid;
  grid-template-columns: repeat(15, 1fr);
}
.tickets {
  margin-left: 15vw;
  margin-bottom: 10px;
  grid-column: 1/9;
}
h1 {
  margin: auto;
  width: 200px;
  padding-top: 40px;
  padding-bottom: 10px;
}
.separator {
  border-right: 1px solid #dedede;
}
.trie {
  grid-column: 10/13;
}
.option {
  display: flex;
  margin-left: 15vw;
}
.option input{
  margin-right: 10px;
}

#black {
  appearance: none;
  background-color: transparent;
  border: 2px solid #1A1A1A;
  border-radius: 12px;
  box-sizing: border-box;
  color: #3B3B3B;
  cursor: pointer;
  display: inline-block;
  font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  font-weight: 600;
  line-height: normal;
  margin: 0;
  min-height: 30px;
  min-width: 120px;
  outline: none;
  text-align: center;
  text-decoration: none;
  transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: 100%;
  margin-right: 10px;
  will-change: transform;
}

#black:disabled {
  pointer-events: none;
}

#black:hover {
  color: #fff;
  background-color: #1A1A1A;
  box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
  transform: translateY(-2px);
}

#black:active {
  box-shadow: none;
  transform: translateY(0);
}
</style>