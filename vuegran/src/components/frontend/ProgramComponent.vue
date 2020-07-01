<template>
  <div id="view">
    <nav>
      <div class="header-form">
        <h2>PROGRAMA DE ESTUDOS</h2>
      </div>
    </nav>

    <div class="container">
      <span
        >*Selecione o órgão, a banca e clique "Gerar programa" para visualizar o
        número de questões por assunto</span
      >
      <form @submit.prevent="save">
        <div class="question-select-group">
          <md-field>
            <label for="font">Órgão</label>
            <md-select name="font" id="font" v-model="programa.orgao_id">
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
            <md-select name="font" id="font" v-model="programa.banca_id">
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
          Gerar programa<i class="material-icons right">build</i>
        </button>
      </form>
    <div class="total">
        <span >{{totalQuestoes}} questões encontradas.</span>
    </div>


      <div class="">
        <table>
          <thead>
            <tr>
              <th>
                ASSUNTO
              </th>
              <th>N˚ de questões</th>
              <th>OPÇÕES</th>
            </tr>
          </thead>
          <div class="loader" v-if="loading == true">
            <img src="../../assets/ball-scale-multiple.gif" alt="loader" />
          </div>
          <tbody>
            <tr v-for="program of dadosPrograma" :key="program.id">
              <td>
                {{ program.titulo_assunto }}
              </td>
              <td>
                {{ program.num_questoes }}
              </td>

              <td></td>
            </tr>
          </tbody>
        </table>
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
      programa: {
        banca_id: "",
        orgao_id: ""
      },
      dadosPrograma: {
        id: "",
        titulo_assunto: "",
        num_questoes: "",
        root: "",
        total: ""
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
      arvoreDeAssuntos: {},
      selectedAssunto: null,
      totalQuestoes: 0,
      assuntos: [],
      orgaos: [],
      bancas: [],

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
    save() {
      this.loading = true;
      this.totalQuestoes = 0;
      QuestoesService.getProgram(this.programa).then(response => {
        console.log(response.data.original);
        this.dadosPrograma = response.data.original.original;
        this.totalQuestoes = response.data.original.total[0].total;
        console.log(this.totalQuestoes);
      }).catch(e => {
        console.log(e);
      }).finally(() => this.loading=false)  ;
    },
    listProgram() {
      AssuntoService.arvore()
        .then(response => {
          this.assuntos = response.data;

          console.log(this.assuntos);
        })
        .catch(e => {
          console.log(e);
        });
    },
    list() {
      this.loading = true;
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
        })
        .finally(() => (this.loading = false));
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
  color: orangered;
  margin-left: 20px;
}

.loader img {
  margin-left: 400px;
}
.total {
  display: flex;
  align-items: center;
  margin: 14px auto;
  height: 28px;
  width: 304px;
  padding: 4px;
  background: green;
  border-radius: 20px;
  color: #fff;
}

.total span {
  margin-left: 40px;
  text-align: center;
}
</style>
