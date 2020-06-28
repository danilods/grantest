import BancasComponent from "./components/admin/BancasComponent";
import OrgaoComponent from "./components/admin/OrgaoComponent";
import AssuntosComponent from "./components/admin/AssuntosComponent";
import QuestoesComponent from "./components/admin/QuestoesComponent";
import CreateQuestionsComponent from "./components/admin/Questoes/CreateQuestionsComponent";

import HomeComponent from "./components/frontend/HomeComponent";

import ProgramComponent from "./components/frontend/ProgramComponent";

export default [
  { path: "/bancas", component: BancasComponent, name: "bancas" },
  { path: "/orgaos", component: OrgaoComponent, name: "orgaos" },
  { path: "/assuntos", component: AssuntosComponent, name: "assuntos" },
  { path: "/questoes", component: QuestoesComponent, name: "questoes" },
  { path: "/questoes/create", component: CreateQuestionsComponent, name: "questoes.add" },

  { path: "/home", component: HomeComponent, name: "home" },
  { path: "/programa", component: ProgramComponent, name: "programa" }
];
