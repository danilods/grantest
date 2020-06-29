<template>
  <div id="app">
    <nav id="header-menu">
      <ul>
         <li>
          <a href="/"><span>Home</span></a>
        </li>
        <li>
          <router-link to="/programa"><span>Programas</span></router-link>
        </li>

        <li>
          <router-link to="/orgaos"><span>Orgaos</span></router-link>
        </li>
        <li>
          <router-link to="/bancas"><span>Bancas</span></router-link>
        </li>
        <li>
          <router-link to="/assuntos"><span>Assuntos</span></router-link>
        </li>

        <li>
          <router-link to="/questoes"><span>questões</span></router-link>
        </li>
      </ul>
    </nav>
    <div id="content">

      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  name: "app"
};
</script>
<style>
#app body {
  margin-top: -10px;
  background: #c0bfbf;
  height: 100vh;
}

#header-menu {
  background-image: url("./assets/banner-web.png");
  width: 100%;
  height: 320px;
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover;
}

#header-menu ul {
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
  padding: 8px;
  text-decoration: none;
  text-transform: uppercase;
  transition: 0.3s;
}

#header-menu ul li a span {
  display: flex;
  justify-content: center;
  color: #fff;
}

#header-menu ul li a:focus {
  outline: none;
}
#header-menu ul li a.active {
  background: rgba(255, 1, 44, 0.795);
  color: #fff;
  border-radius: 6px;
}

#content {
  height: 100vh;
}

.table {
  margin: 20px 0 20px 0;
  background: rgba(241, 244, 245, 0.315);
  color: #000;
}
#view {
  background: #fff;
  width: 920px;
  margin: 40px auto;
  border-radius: 20px;
  -webkit-box-shadow: -1px 3px 11px 19px rgba(0, 0, 0, 0.23);
  -moz-box-shadow: -1px 3px 11px 19px rgba(0, 0, 0, 0.23);
  box-shadow: -1px 3px 11px 19px rgba(0, 0, 0, 0.23);
}

#view nav {
  margin-top: -98px;
  margin-left: 0px;
  margin-bottom: 14px;
  border-radius: 20px;
  height: 104px;
  background: #006f98;
}

#view .title {
  height: 84px;
  font-size: 24px;
  color: #fff;
}

#view .title span {
  font-size: 28px;
}

.header-form h2 {
  padding-top: 24px;
  text-align: center;
  margin-top: 40px;
  color: #fff;
}
</style>
