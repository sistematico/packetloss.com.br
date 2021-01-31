<template>
  <div class="audioplayer">
    <vue-plyr ref="plyr">
      <audio controls crossorigin playsinline>
        <source src="" type="audio/mp3" />
      </audio>
    </vue-plyr>
  </div>
</template>
<script>
export default {
  name: "Player",
  mounted() {
    const vm = this

    document.addEventListener('click', function (ev) {
      if (ev.target.id === 'refreshbtn') {
        vm.$parent.$parent.playRandomSong();
      }
    })
  }
}
</script>