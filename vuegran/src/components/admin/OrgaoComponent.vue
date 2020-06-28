<template>
  <div id="view">
    <nav>
      <div class="nav-wrapper blue darken-1">
        <a href="#" class="brand-logo center">ÓRGÃO</a>
      </div>
    </nav>

    <div class="container">
      <form @submit.prevent="save">
        <label for="name">Nome do órgão</label>
        <input
          name="name"
          type="text"
          placeholder="Ex: Tribunal de Justiça do Maranhão"
          v-model="orgao.name"
        />
        <label for="sigla">Sigla do órgão</label>
        <input
          name="sigla"
          type="text"
          placeholder="TJ-MA"
          v-model="orgao.sigla_orgao"
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
              <th>SIGLA DO ÓRGÃO</th>
              <th>OPÇÕES</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="orgao of orgaos" :key="orgao.id">
              <td>{{ orgao.name }}</td>
              <td>{{ orgao.sigla_orgao }}</td>
              <td>
                <button
                  @click="editar(orgao)"
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
import OrgaoService from "../../services/OrgaoService";

export default {
  name: "orgaos",
  data() {
    return {
      orgao: {
        id: "",
        name: "",
        sigla_orgao: ""
      },
      orgaos: [],
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
      OrgaoService.list()
        .then(response => {
          this.orgaos = response.data.data;
        })
        .catch(e => {
          console.log(e);
        });
    },

    save() {
      if (!this.orgao.id) {
        OrgaoService.save(this.orgao)
          .then(response => {
            this.orgao = {};
            alert("Salvo com sucesso");
            this.list();
            this.errors = [];
          })
          .catch(e => {
            this.erros = e.response.data.errors;
          });
      } else {
        OrgaoService.update(this.orgao)
          .then(response => {
            this.orgao = {};
            alert("atualizado com sucesso");
            this.list();
            this.errors = [];
          })
          .catch(e => {
            this.erros = e.response.data.errors;
          });
      }
    },
    editar(orgao) {
      this.orgao = orgao;
    }
  }
};
</script>

<style></style>
