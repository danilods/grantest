import api from './config';

export default {
  list:() => {
    return api.get('orgaos')
  },
  save:(orgao) => {
    return api.post('orgaos', orgao)
  },
  update:(orgao) => {
    return api.put('orgaos/'+orgao.id, orgao);
  },
  delete:(orgao) => {
    return api.delete('orgaos', {data: orgao})
  }
}
