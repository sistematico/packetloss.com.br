<template>
  <Body class="d-flex flex-column h-100" />
  <Header />
  <main class="flex-shrink-0">
    <div class="container">
      <!-- <h1 class="mt-5">Sticky footer with fixed navbar</h1> -->
      <!-- <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code class="small">padding-top: 60px;</code> on the <code class="small">main &gt; .container</code>.</p> -->
      <!-- <p>Back to <a href="/docs/5.3/examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p> -->
      <slot />
    </div>
  </main>
  <Footer />
</template>
<style scoped>
main > .container {
  padding: 60px 15px 0;
}
</style>
