<template>
  <div id="view">
    <nav>
      <div class="nav-wrapper blue darken-1">
        <a href="#" class="brand-logo center">QUESTÕES</a>
      </div>
    </nav>

    <div class="container">
      <form @submit.prevent="save">
        <div class="question-select-group">
          <md-field>
            <label for="font">Órgão</label>
            <md-select name="font" id="font">
              <md-option
                v-for="orgao of orgaos"
                :value="orgao.id"
                :key="orgao.id"
                >{{ orgao.name }}</md-option
              >
            </md-select>
          </md-field>

          <md-field>
            <label for="font">Banca</label>
            <md-select name="font" id="font">
              <md-option
                v-for="banca of bancas"
                :value="banca.id"
                :key="banca.id"
                >{{ banca.nome_banca }}</md-option
              >
            </md-select>
          </md-field>
        </div>

        <button class="waves-effect waves-light btn-small">
          Salvar<i class="material-icons right">save</i>
        </button>
      </form>
      <div class="site-map">
        <ul id="root">
          <li v-for="assunto of assuntos" :key="assunto.id">
            {{ assunto.titulo_assunto }}*
            <ul id="children" v-for="children of assunto.assuntos" :key="children.id">
               <li>
                  {{ children.titulo_assunto }}**</li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
<script>
import QuestoesService from "../../services/QuestoesService";
import AssuntoService from "../../services/AssuntoService";
import Banca from "../../services/bancas";
import OrgaoService from "../../services/OrgaoService";

export default {
  name: "assuntos",
  data() {
    return {
      assunto: {
        id: "",
        titulo_assunto: "",
        raiz_id: "",
        assuntos: [],
        assunto: {}
      },
      value: null,
      selectedAssunto: null,
      assuntos: [],
      banca: {
        id: "",
        nome_banca: ""
      },
      orgao: {
        id: "",
        name: "",
        sigla_orgao: ""
      },
      arvoreDeAssuntos:{},
      selectedAssunto: null,
      assuntos: [],
      orgaos: [],
      bancas: [],
      assuntosSelect: [],

      errors: [],
      loading: false,
      message: ""
    };
  },

  mounted() {
    this.list();
  },
  methods: {
    getAssuntos(searchTerm) {
      this.assuntosSelect = new Promise(resolve => {
        window.setTimeout(() => {
          if (!searchTerm) {
            resolve(this.assuntosList);
          } else {
            const term = searchTerm.toLowerCase();

            resolve(
              this.assuntosList.filter(({ name }) =>
                name.toLowerCase().includes(term)
              )
            );
          }
        }, 500);
      });
    },

    list() {
      AssuntoService.arvore()
        .then(response => {
          this.assuntos = response.data;

          console.log(this.assuntos);
        })
        .catch(e => {
          console.log(e);
        });

      OrgaoService.list()
        .then(response => {
          this.orgaos = response.data.data;
        })
        .catch(e => {
          console.log(e);
        });

      Banca.list()
        .then(response => {
          this.bancas = response.data.data;
        })
        .catch(e => {
          console.log(e);
        });
    }
  }
};
</script>

<style>
.md-list {
  background: #fff;
  z-index: 2;
  color: black;
}
.md-select-value {
  background: rgb(82, 177, 240);
  color: black;
}
.question-select-group {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.sitemap a {
  color: #000;
  text-decoration: none;
}

 #root {
  margin-top: 20px;
  color: #000;
  font-weight: bold;
}

 #children {
  color:orangered;
  margin-left: 20px;
}
</style>
