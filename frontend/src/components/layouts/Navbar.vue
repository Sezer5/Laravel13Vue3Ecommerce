<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <router-link class="navbar-brand" to="/">
      <img
        src="https://cdn.pixabay.com/photo/2014/04/02/11/16/shopping-305728_1280.png"
        alt="Logo"
        width="60"
        height="60"
      />
    </router-link>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <router-link class="nav-link" to="/">
            <i class="bi bi-house-door-fill"></i> Home
          </router-link>
        </li>
        <li class="nav-item active">
          <router-link class="nav-link" to="/register">
            <i class="bi bi-person-add"></i> Register
          </router-link>
        </li>
        <li class="nav-item active">
          <router-link class="nav-link" to="/login">
            <i class="bi bi-box-arrow-right"></i> Login
          </router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script setup>
</script>

<style scoped>
</style>