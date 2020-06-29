import api from './config';

export default {
  list:() => {
    return api.get('questoes')
  },
  save:(questoes) => {
    console.log(questoes);
    return api.post('questoes', questoes)
  },
  update:(questoes) => {
    return api.put('questoes/'+questoes.id, questoes);
  },
  delete:(questoes) => {
    return api.delete('questoes', {data: questoes})
  },
  getProgram:(programa) => {
    return api.get('questoes/'+programa.banca_id+'/'+programa.orgao_id);
  },
  paginate:(page) => {
    return api.get('questoes/?page='+page);
  }
}
