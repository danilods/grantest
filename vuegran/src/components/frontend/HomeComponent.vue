<template>
  <div class="container-card">

    <div class="card">
        <a href="/programa"><img src="../../assets/programa.png" alt="" /></a>
    </div>
    <div class="card">
                 <a href="/orgaos"><img src="../../assets/orgaos.png" alt="" /></a>

    </div>
    <div class="card">
                <a href="/assuntos"><img src="../../assets/assunto.png" alt="" /></a>

    </div>
    <div class="card">
                <a href="/questoes"><img src="../../assets/questoes.png" alt="" /></a>
    </div>
  </div>
</template>
<style>
.container-card {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  max-width: 720px;
  margin: -94px auto;
}

.card {
  display: flex;
  align-items: center;
  -webkit-box-shadow: 0px 0px 32px 13px #007aaa;
  -moz-box-shadow: 0px 0px 32px 13px #007aaa;
  box-shadow: 0px 0px 32px 13px #007aaa;

  height: 248px;
  width: 320px;
  margin-bottom: 20px;
  border-radius: 24px transparent;
  border-color: #007aaa;
}

.card a{

  width: 100%;
  height: 100%;
}

.card a img{
   width: 100%;
  height: 100%;
}

.card:hover {
  -webkit-box-shadow: 0px 0px 22px 26px #007aaa;
  -moz-box-shadow: 0px 0px 22px 26px #007aaa;
  box-shadow: 0px 0px 22px 26px #007aaa;
}
</style>
