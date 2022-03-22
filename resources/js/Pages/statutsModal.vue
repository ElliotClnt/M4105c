<template>
<div class="modal-backdrop">
    <div class="modal">
      <header class="modal-header">
        <slot name="header">
          Fermer ticket
        </slot>
      </header>
      <section class="modal-body">
        <slot name="body">
          Ce ticket a-t-il été résolu ?
        </slot>
       </section>

      <footer class="modal-footer">
        <slot name="footer">
        </slot>
        <Link class="button" as="button" @click="close">Annuler</Link>
        <Link class="button" as="button" :href="$route('fermerTicket',{id:ticket.tic_id,sta_id:3})">Non Résolu</Link>
        <Link class="button" as="button" :href="$route('fermerTicket',{id:ticket.tic_id,sta_id:2})">Résolu</Link>
      </footer>
    </div>
  </div>
</template>
<script>
export default {
    name: "StatutModal",
    components: {
    },
    props: {
      ticket:{
            type: Object,
      }
    },
    methods:{
        close() {
            this.$emit('close');
      },
    }
}
</script>
<style scoped>
.modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .modal {
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
    height: 200px;
    width: 350px;
  }

  .modal-header,
  .modal-footer {
    padding: 15px;
    display: flex;
  }

  .modal-header {
    font-weight: bold;
    width: max-content;
    margin-left: auto;
    margin-right: auto;
  }
  .separator{
    border-bottom: 1px solid #eeeeee;
    width: 350px;
  }

  .modal-footer {
    border-top: 1px solid #eeeeee;
    width: 300px;
    margin: auto;
    display: inline-flex;
  }

  .modal-body {
    position: relative;
    padding: 20px 10px;
    margin-left: auto;
    margin-right: auto;
  }

  .btn-close {
    position: absolute;
    top: 0;
    right: 0;
    border: none;
    font-size: 20px;
    padding: 10px;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
  }

  .btn-green {
    color: white;
    background: #4AAE9B;
    border: 1px solid #4AAE9B;
    border-radius: 2px;
  }
  .button{
    width: 100px;
    margin: 5px;
  }
</style>