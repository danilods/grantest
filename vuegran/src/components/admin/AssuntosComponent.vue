<template>
  <div id="view">
    <nav>
      <div class="header-form">
        <h2>ASSUNTOS/DISCIPLINAS</h2>
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
      <div class="container-assuntos">
        <ul id="root">
          <li v-for="assunto of assuntos" :key="assunto.id">
            <h4>{{ assunto.titulo_assunto }}</h4>
            <ul id="children">
              <li v-for="children of assunto.assuntos" :key="children.id">
                <span>{{ children.titulo_assunto }}</span>
              </li>
            </ul>
          </li>
        </ul>
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
        assuntos: {}
      },
      value: null,
      selectedAssunto: null,
      assuntos: {},
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
          this.assuntos = response.data;
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

#root li{
  margin: 4px 16px 8px 54px;
  padding-top: 10px;
  padding-bottom: 10px;
}

#root li h4{
  border-bottom: 1px solid;
  margin-bottom: 14px;

}
#children li{
  color:rgb(34, 33, 33);
  height: 42px;
  border: 1px transparent;
  border-radius: 10px;
  background: #153e9736;

}

#children span{
  margin-left: 14px;
  padding-top: 24px;
}
</style>
