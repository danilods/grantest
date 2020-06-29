<template>
  <div id="view">
    <nav>
      <div class="header-form">
        <h2>QUESTÕES</h2>
      </div>
    </nav>

    <div class="container">
      <form @submit.prevent="save">
        <label for="name">Enunciado da questão</label>
        <input
          name="name"
          type="text"
          placeholder="Comando da questão"
          v-model="questao.enunciado"
        />

        <label for="name">Ano</label>
        <input
          name="name"
          type="text"
          placeholder="Ano do certame"
          v-model="questao.ano"
        />
        <div class="question-select-group">
          <md-field>
            <label for="font">Assunto</label>
            <md-select v-model="questao.assunto_id" name="font" id="font">
              <md-option
                v-for="assunto of assuntos"
                :value="assunto.id"
                :key="assunto.id"
                >{{ assunto.titulo_assunto }}</md-option
              >
            </md-select>
          </md-field>

          <md-field>
            <label for="font">Órgão</label>
            <md-select v-model="questao.orgao_id" name="font" id="font">
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
            <md-select v-model="questao.banca_id" name="font" id="font">
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
      <div class="table">
        <table>
          <thead>
            <tr>
              <th>Enunciado</th>
              <th>Assunto</th>

              <th>Banca</th>
              <th>Órgão</th>

              <th>OPÇÕES</th>
            </tr>
          </thead>
        <div class="loader" v-if="loading==true">
          <img src="../../assets/ball-scale-multiple.gif" alt="loader">
        </div>
          <tbody>
            <tr v-for="questao of questoes" :key="questao.id">
              <td>{{ questao.enunciado }}</td>
              <td>{{ questao.assuntos.titulo_assunto }}</td>

              <td>{{ questao.bancas.nome_banca }}</td>
              <td>{{ questao.orgaos.name }}</td>

              <td>
                <button
                  @click="editar(questoes)"
                  class="waves-effect btn-small blue darken-1"
                >
                  <i class="material-icons">create</i>
                </button>
                <button class="waves-effect btn-small red darken-1">
                  <i class="material-icons">delete_sweep</i>
                </button>
              </td>
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
        raiz_id: ""
      },
      banca: {
        id: "",
        nome_banca: ""
      },
      orgao: {
        id: "",
        name: "",
        sigla_orgao: ""
      },
      questao: {
        id: "",
        cod_questao: "QUEST@",
        enunciado: "",
        modalidade: 0,
        ano: "",
        assunto_id: "",
        banca_id: "",
        orgao_id: "",
        assuntos: {},
        bancas: {},
        orgaos: {},
        item_questoes: []
      },
      questoes: [],
      value: null,
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
    this.listQuestions();
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
    getResults(page) {
      if (typeof page === "undefined") {
        page = 1;
      }

      this.QuestoesService
        .get("/categories?page=" + page)
        .then(response => {
          return response.json();
        })
        .then(data => {
          this.questoes = data;
        });
    },
    listQuestions() {
      this.loading=true;

      QuestoesService.list()
        .then(response => {

          this.questoes = response.data.data;
          console.log(this.questoes);
        })
        .catch(e => {
          console.log(e);
        }).finally(() => this.loading=false);
    },

    list() {
      AssuntoService.list()
        .then(response => {
          this.assuntos = response.data.data;
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

    },

    save() {
      if (!this.questao.id) {
        QuestoesService.save(this.questao)
          .then(response => {
            this.questao = {};
            alert("Salvo com sucesso");
            this.list();
            this.errors = [];
          })
          .catch(e => {
            this.erros = e.response.data.errors;
          });
      } else {
        QuestoesService.update(this.questao)
          .then(response => {
            this.questao = {};
            alert("atualizado com sucesso");
            this.list();
            this.errors = [];
          })
          .catch(e => {
            this.erros = e.response.data.errors;
          });
      }
    },
    editar(questao) {
      this.questao = questao;
    }
  }
};
</script>

<style>
.table {
  margin: 20 0 0 20px;
  background: rgba(241, 244, 245, 0.541);
}
.md-list {
  background: #00132a;
  z-index: 2;
}

.question-select-group {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
.loader img{
  margin-left: 400px;
}
</style>
