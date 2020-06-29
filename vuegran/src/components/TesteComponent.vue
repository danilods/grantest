<template>
  <div class="container-card">
    <div class="card">
      <div class="card-body"></div>
    </div>
    <div class="card">
      <div class="card-body"></div>
    </div>
    <div class="card">
      <div class="card-body"></div>
    </div>
    <div class="card">
      <div class="card-body"></div>
    </div>
  </div>
</template>
<style>
  .container-card {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;

  }

  .card {
    height: 140px;
    widows: 140px;
    border-radius: 20px solid;

  }
</style>
