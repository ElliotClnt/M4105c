<template>
    <div>
        <div v-if="checkedStatut.includes(ticket.sta_id) && checkedTypeProbleme.includes(ticket.probleme.type_probleme.typ_id)" class="ticket">
            <div class="header">
                <p class="title">{{ticket.tic_titre}}</p>
            </div>
            <div class="content">
                <div class="ReportInfo">
                    <p class="subTitle">Type: {{ticket.probleme.type_probleme.typ_libelle}}, {{ticket.probleme.pro_libelle}}</p>
                    <p class="subTitle">Priority: {{ticket.tic_importance}}/5</p>
                    <p class="subTitle">Computer number: {{ticket.tic_numposte}}</p>
                    <p>Description: {{ticket.tic_description}}</p>
                    <img :src="ticket.tic_piecejointe">
                </div>
                <div class="separator"></div>
                <div class="StatusInfo">
                    <p>Report: {{ticket.tic_datecreation}}</p>
                    <p>Status: {{ticket.statut.sta_libelle}}</p>
                    <p>Resolution: <span v-if="ticket.tic_dateresolution===null">Indéterminé</span>{{ticket.tic_dateresolution}}</p>
                </div>
            </div>
            <div class="footer">
                <Link as="button" class="button" id="blue" :href="$route('modifierTicket',{id:ticket.tic_id})" v-if="ticket.sta_id==1">Modifier</Link>
                <button class="button" id="red" v-if="user.rol_id!=1&&ticket.sta_id==1" @click="showModal">Fermer</button>
                <StatutModal v-show="isModalVisible" @close="closeModal" :ticket="ticket"></StatutModal>
                <Link as="button" class="button" id="green" v-if="user.rol_id!=1&&ticket.sta_id==1" :href="$route('rediriger',{id:ticket.tic_id})">Rediriger</Link>
            </div>
        </div>
    </div>
</template>
<script>

import StatutModal from '../Pages/statutsModal.vue';

export default {
    name:"ConsulterTicketDemandeur",
    components:{
        StatutModal,
    },
    props:{
        ticket:{
            type: Object,
        },
        checkedStatut:{
            type: Array,
        },
        checkedTypeProbleme:{
            type: Array,
        },
        user:{
            type:Object,
        }
    },
    data(){
        return{
            isModalVisible: false,
        }
    },
    methods:{
        showModal(){
            this.isModalVisible = true;
        },
        closeModal(){
            this.isModalVisible = false;
        }
    }
    
}
</script>
<style scoped>
    .ticket{
        border: solid #000000 1px;
        background-color: #ffffff;
        padding: 5px;
        margin-top: 5px;
        width: 42vw;
        min-width: 350px;
    }
    img{
        height: 100px;
        width: auto;
    }
    .ticket p {
        margin: 2px;
    }
    .title{
        font-weight: bold;
        font-size: 20px;
    }
    .subTitle{
        font-size: 16px;
    }
    .ReportInfo{
        font-size: 16px;
        grid-column: 1/7;
    }
    .StatusInfo
    {
        font-size: 16px;
        padding-left: 10px;
        grid-column: 8/11;
    }
    .content{
        display: grid;
        grid-template-columns: repeat(10, 1fr);
        
    }
    .separator{
        border-right: 1px solid #DEDEDE;
    }
    .footer{
        padding-top: 15px;
        margin: auto;
        width: fit-content
    }
    #red{
        background-color: red;
        
    }
    #blue{
        background-color: royalblue;
    }
    .button{
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 15px;
        width: 100px;
        height: 40px;
        padding: 3% 0;
    }
    .button:hover{
        cursor: pointer;
    }
    #green{
        background-color: green;
    }
</style>
