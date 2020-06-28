import api from './config';

export default {
  list:() => {
    return api.get('assuntos')
  },
  save:(assunto) => {
    return api.post('assuntos', assunto)
  },
  update:(assunto) => {
    return api.put('assuntos/'+assunto.id, assunto);
  },
  delete:(assunto) => {
    return api.delete('assuntos', {data: assunto})
  },
  search:(assunto) => {
    return api.get('assuntos', {data: assunto})
  },
  arvore:(assunto) => {
    return api.get('programa', {data: assunto})
  }
}
