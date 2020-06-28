<template>
  <div id="view">
    <nav>
      <div class="nav-wrapper blue darken-1">
        <a href="#" class="brand-logo center">ASSUNTOS</a>
      </div>
    </nav>

    <div class="container">
      <form @submit.prevent="save">
        <label for="name">Título do assunto</label>
        <input
          name="name"
          type="text"
          placeholder="Ex: Engenharia de Software/Modelo MVC"
          v-model="assunto.titulo_assunto"
        />
        <md-field>
          <label for="font">Disciplina</label>
          <md-select v-model="assunto.raiz_id" name="font" id="font">
            <md-option
              v-for="assunto of assuntos"
              :value="assunto.id"
              :key="assunto.id"
              >{{ assunto.titulo_assunto }}</md-option
            >
          </md-select>
        </md-field>

        <button class="waves-effect waves-light btn-small">
          Salvar<i class="material-icons right">save</i>
        </button>
      </form>
      <div class="">
        <table>
          <thead>
            <tr>
              <th>
                ASSUNTO
              </th>
              <th>DISCIPLINA</th>
              <th>OPÇÕES</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="assunto of assuntos" :key="assunto.id">
              <td>
                {{ assunto.titulo_assunto }}
              </td>
              <td v-if="assunto.raiz_id !== null">
                {{ assunto.titulo_assunto }}
              </td>
              <td v-else>
                NÃO HÁ
              </td>

              <td>
                <button
                  @click="editar(assunto)"
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
import AssuntoService from "../../services/AssuntoService";

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
      assuntosSelect: [],
      assuntosList: [
        {
          id: 1,
          name: "teste 1",
          id: 2,
          name: "teste 2",
          id: 3,
          name: "teste 3",
          id: 4,
          name: "teste 4"
        }
      ],
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
      AssuntoService.list()
        .then(response => {
          this.assuntos = response.data.data;
          console.log("ass", this.assuntos);
        })
        .catch(e => {
          console.log(e);
        });
    },

    save() {
      if (!this.assunto.id) {
        AssuntoService.save(this.assunto)
          .then(response => {
            this.assunto = {};
            alert("Salvo com sucesso");
            this.list();
            this.errors = [];
          })
          .catch(e => {
            this.erros = e.response.data.errors;
          });
      } else {
        AssuntoService.update(this.assunto)
          .then(response => {
            this.assunto = {};
            alert("atualizado com sucesso");
            this.list();
            this.errors = [];
          })
          .catch(e => {
            this.erros = e.response.data.errors;
          });
      }
    },
    editar(assunto) {
      this.assunto = assunto;
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
</style>
