<template>
  <widgetbot server="723690800575283210" channel="723690800575283213" width="100%" height="600"></widgetbot>
</template>
<script>
export default {
  name: "Discord",
  mounted() {
    let widgetBotScript = document.createElement("script")
    widgetBotScript.setAttribute(
      "src",
      "https://cdn.jsdelivr.net/npm/@widgetbot/html-embed"
    )
    document.head.appendChild(widgetBotScript)
  },
};
</script>