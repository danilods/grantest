<template>
  <div id="app">
    <nav id="header-menu">
      <div class="logo"> <img src="./assets/logo.png"></div>
      <ul>
                <li><router-link to="/programa"><span>Programas</span></router-link></li>

        <li><router-link to="/orgaos"><span>Orgaos</span></router-link></li>
        <li><router-link to="/bancas"><span>Bancas</span></router-link></li>
        <li><router-link to="/assuntos"><span>Assuntos</span></router-link></li>

        <li><router-link to="/questoes"><span>questões</span></router-link></li>
      </ul>
    </nav>
    <div id="content">
      <router-view></router-view>
      </div>
  </div>
</template>

<script>

export default {
  name: "app",

};
</script>
<style>


#app {
  margin-top: -10px;
  background: #e4e4e4;
}
#header-menu {
  background: #214685;
  margin: auto;
  height: 260px;
}

#header-menu .logo {
  padding: 10px 16px;
  height: 24px;
  width: 24px;
  float: left;
  font-size: 24px;
  transition: .3s;
}

#header-menu .logo img{
  margin-top: -8px;
  height: 94px;
  width: 180px;
  float: left;
}
#header-menu ul{
  list-style: none;
  float: right;
  margin: 0;
  padding: 0;
  display: flex;
}
#header-menu ul li {
  width: 194px;
  list-style: none;
  color: #fff;
}

#header-menu ul li a {
  line-height: 28px;
  color: #fff;
  margin-top: 24px;
  padding: 8px ;
  text-decoration: none;
  text-transform: uppercase;
  transition: .3s;

}

#header-menu ul li a span{
  display: flex;
  justify-content: center;
  color: #fff;
}

#header-menu ul li a:focus{
  outline: none;
}
#header-menu ul li a.active{
  background: rgba(255, 1, 44, 0.795);
  color: #fff;
  border-radius: 6px;
}

#content {
  height: 100vh;
}

.table {
  margin: 20px 0 20px 0;
  background: rgba(241, 244, 245, 0.315)
}
#view {
  background: #fff;
  width: 920px;
  margin: -76px auto;
  box-shadow: #c5c5c5;
  border-radius: 20% solid;
}

#view .title {
  height: 84px;
  font-size: 24px;
  color: #fff;
}

#view .title span {
  font-size: 28px;
}
</style>
