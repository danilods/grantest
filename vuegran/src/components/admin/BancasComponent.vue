<template>
  <div id="view">
    <nav>
      <div class="header-form">
        <h2>BANCA ORGANIZADORA</h2>
      </div>
    </nav>

    <div class="container">
      <form @submit.prevent="save">
        <label>Nome da Banca</label>
        <input
          type="text"
          placeholder="Nome da banca"
          v-model="banca.nome_banca"
        />

        <button class="waves-effect waves-light btn-small">
          Salvar<i class="material-icons left">save</i>
        </button>
      </form>
      <div class="table">
        <table>
          <thead>
            <tr>
              <th>NOME</th>
              <th>OPÇÕES</th>
            </tr>
          </thead>
          <div class="loader" v-if="loading == true">
            <img src="../../assets/ball-scale-multiple.gif" alt="loader" />
          </div>
          <tbody>
            <tr v-for="banca of bancas" :key="banca.id">
              <td>{{ banca.nome_banca }}</td>
              <td>
                <button
                  @click="editar(banca)"
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
import Banca from "../../services/bancas";

export default {
  name: "bancas",
  data() {
    return {
      banca: {
        id: "",
        nome_banca: ""
      },
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
    list() {
      this.loading=true;
      Banca.list()
        .then(response => {
          this.bancas = response.data.data;
        })
        .catch(e => {
          console.log(e);
        }).finally(() => this.loading=false);
    },

    save() {
      if (!this.banca.id) {
        Banca.save(this.banca)
          .then(response => {
            this.banca = {};
            alert("Registro salvo com sucesso");
            this.list();
            this.errors = [];
          })
          .catch(e => {
            this.erros = e.response.data.data.errors;
          });
      } else {
        Banca.update(this.banca)
          .then(response => {
            this.banca = {};
            alert("Registro atualizado com sucesso");
            this.list();
            this.errors = [];
          })
          .catch(e => {
            this.erros = e.response.data.errors;
          });
      }
    },
    editar(banca) {
      this.banca = banca;
    }
  }
};
</script>

<style>
.loader img{
  margin-left: 400px;
}
</style>
