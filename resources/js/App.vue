<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'App',
  mounted() {
    console.log('Vue App mounted successfully');
    // Hide loading screen when Vue app is mounted
    const loading = document.getElementById('loading');
    if (loading) {
      loading.style.display = 'none';
    }
  },
  errorCaptured(err, instance, info) {
    console.error('Vue Error:', err, info);
    const loading = document.getElementById('loading');
    if (loading) {
      loading.innerHTML = `
        <div style="text-align: center; color: #e53e3e;">
          <h3>Vue Application Error</h3>
          <p>Error: ${err.message}</p>
          <p>Info: ${info}</p>
          <button onclick="location.reload()" style="margin-top: 20px; padding: 10px 20px; background: #3182ce; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Reload Page
          </button>
        </div>
      `;
    }
    return false;
  }
}
</script> 