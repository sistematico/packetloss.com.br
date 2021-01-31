<template>
  <div class="sobre has-text-left">
    <div class="columns is-centered">
      <div class="column is-10">
        <h1 class="title">Clan</h1>
        <h2 class="subtitle">Integrantes do Clan</h2>        
        <Box :membros="membros" />
      </div>
    </div>
  </div>
</template>
<script>
// https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=XXXXXXXXXXXXXXXXXXXXXXXXXXXXX&steamids=76561197960435530
import Box from '@/components/Box.vue'

export default {
  name: "Clan",
  components: { Box },
  data() {
    return {
      age: 0,
      membros: [
        { 
          id: 1, 
          nick: 'Pé de Porco', 
          nome: 'Lucas', 
          bio: 'Founder', 
          avatar: 'https://avatars0.githubusercontent.com/u/97509?s=460&u=4da056969b86bd0197d307b2c8968705acedd1b2&v=4',
          steam: '#',
          email: '#',
          steamid: '76561198015731201'
        },
        { 
          id: 2, 
          nick: 'Hudson', 
          nome: 'Hudson', 
          bio: 'Membro', 
          avatar: '/img/avatar/happy-m-2.png',
          steam: '#',
          email: '#',
          steamid: null
        },
        { 
          id: 3, 
          nick: 'superxcassio', 
          nome: 'Cássio', 
          bio: 'Membro', 
          avatar: '/img/avatar/happy-m-3.png',
          steam: '#',
          email: '#',
          steamid: null
        },
      ]
    };
  },
  mounted: function () {
    this.ageCalc("1983,10,09");
  },
  methods: {
    ageCalc: function (dateString) {
      let today = new Date();
      let birthDate = new Date(dateString);
      let age = today.getFullYear() - birthDate.getFullYear();
      let m = today.getMonth() - birthDate.getMonth();
      if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
      }
      this.age = age;
    },
  },
};
</script>


